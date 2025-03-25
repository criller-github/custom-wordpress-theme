# Image Compression for Webshops

## Objective
Optimere webshoppenes performance ved at reducere billedernes indlæsningstid baseret på billedstørrelse. Dette opnås ved at komprimere billeder ved upload, så de fylder mindre uden et væsentligt tab af kvalitet, hvilket fører til hurtigere sideindlæsning og en bedre brugeroplevelse.

## Overview
Billedkomprimering implementeres på to forskellige måder:
- **Twenty Twenty-Four Theme:**  
  Her anvendes plugin'et Smush til automatisk billedoptimering.
- **Custom Theme:**  
  Her har jeg udviklet en server-side løsning i form af et WordPress-plugin, der komprimerer billeder ved upload.

## 1. Twenty Twenty-Four Theme: Smush

- **Fordele:**  
  - nem at sætte op og bruge deres indbygged "smush" funktion
  - lazy loading
- **Udfordringer:**  
  - meget content er "blokeret" bag en paywall
  - svær at finde rundt i
  - ved ikke hvad deres kode gør

## Lighthouse Performance Sammenligning med prebuild theme plugin Smush og wordpress' normale billedekomprimering
To tests blev udført med Lighthouse for at sammenligne den indbyggede WordPress billedkomprimering med plugin'et Smush:

- **First Contentful Paint (FCP):**
  - WordPress: 0.8 s
  - Smush Plugin: 0.8 s

- **Largest Contentful Paint (LCP):**
  - WordPress: 1.1 s
  - Smush Plugin: 1.0 s

- **Speed Index:**
  - WordPress: 0.8 s
  - Smush Plugin: 0.8 s



## 2. Custom Theme: Eget Image Compression Plugin
Denne løsning er et server-side WordPress-plugin, der automatisk komprimerer billeder ved upload. Pluginet:
- **Åbner billeder:**  
  Ved hjælp af PHP’s GD-bibliotek åbnes billederne (JPEG eller PNG).
- **Komprimerer billeder:**  
  JPEG-billeder gemmes med en reduceret kvalitet, og PNG-billeder konverteres til JPEG for at reducere filstørrelsen.
- **Opdaterer uploads:**  
  Pluginet opdaterer de uploadede data, så WordPress benytter den nye, komprimerede fil.

- **Fordele:**  
  - Fleksibilitet til at ændre billedkvaliteten manuelt.
- **Udfordringer:**  
  - Der skal skrives kode manuelt for at få løsningen til at virke, i modsætning til at bruge en færdiglavet plugin-løsning.

## Lighthouse Performance Sammenligning med custom theme plugin, normal wordpress, og Smush plugin
To tests blev udført med Lighthouse for at sammenligne den indbyggede WordPress billedkomprimering med vores eget plugin:

- **First Contentful Paint (FCP):**
  - WordPress: 0.7 s
  - Custom Plugin: 0.6 s

- **Largest Contentful Paint (LCP):**
  - WordPress: 1.1 s
  - Custom Plugin: 1.0 s

- **Speed Index:**
  - WordPress: 0.7 s
  - Custom Plugin: 0.6 s
