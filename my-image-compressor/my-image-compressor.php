<?php
/*
Plugin Name: My Simple Image Compressor
Description: Automatically compress JPEG/PNG images when uploaded to the Media Library.
Version: 1.0
Author: Christian Bresson
*/

// Hook når WordPress uploader et billede, bliver vores funktion kaldt
add_filter('wp_handle_upload', 'mic_compress_uploaded_image');


function mic_compress_uploaded_image($upload) {
    //først får vi stien til filen og gemmer den i en variabel $file_path
    $file_path = $upload['file'];
    // her kigger vi på filnavnet og gemmer det i en variabel $file_type og laver det til små bogstaver med strtolower() funktionen
    $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
    // kvaliteten af billede som vi selv kan sætte/ændre
    $quality = 75;

    //først tjekker vi filtypen (jpg/png) så vi ved hvordan at vi åbner det
    //derefter bruger vi imagecreatefromjpeg() funktionen til at "åbne" billedet og gemme det i en variabel $image
    //vi gemmer derefter billedet igen med den nye kvalitet med imagejpeg() funktionen
    //til sidst "lukker" vi billedet med imagedestroy() funktionen for at frigive hukommelsen
    if ($file_type == 'jpg' || $file_type == 'jpeg') {
        $image = imagecreatefromjpeg($file_path);
        if ($image) {
            imagejpeg($image, $file_path, $quality);
            imagedestroy($image);
        }
    }

    // Hvis billedet er en PNG
    elseif ($file_type == 'png') {
        //hvis billedet hedder "png" bruger vi imagecreatefrompng() for at åbne det
        $image = imagecreatefrompng($file_path);
        if ($image) { // hvis billedet er blevet åbnet korrekt som PNG
            //så laver vi et nyt navn til billedet hvor vi skifter ".png" ud med ".jpg"
            $new_file_path = preg_replace('/\.png$/i', '.jpg', $file_path);
            //vi gemmer derefter billedet igen, som en jpg fil, med imagejpeg() funktionen
            imagejpeg($image, $new_file_path, $quality);
            //vi "lukker" billedet med imagedestroy() funktionen for at frigive hukommelsen
            imagedestroy($image);
            // derefter sletter vi det oprindelige png billede, da vi nu har en ny version der fylder mindre
            unlink($file_path);
            //til sidst ændrer vi informationen så WordPress ved, at det nu skal bruge den nye jpg version i stedet for den gamle png
            $upload['file'] = $new_file_path;
            $upload['url'] = preg_replace('/\.png$/i', '.jpg', $upload['url']);
        }
    }

    //til sidst sender vi de opdaterede oplysninger tilbage til WordPres
    return $upload;
}