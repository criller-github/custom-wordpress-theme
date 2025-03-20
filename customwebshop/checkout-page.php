<?php
/*
 * Template Name: checkout page
 */
get_header();
?>

<div class="front-page-content">
    <h1 class="front-page-title">Din Kurv</h1>
    <p class="front-page-subtext">Din kurv er desværre tom
    <br>
    Gå tll shoppen for at tilføje noget:</p>
    <a class="shop-button" href="<?php echo site_url('/shop'); ?>">SHOP</a>
</div>

<?php get_footer(); ?>
