<?php get_header(); ?>

<div class="single-product-content">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            
            <?php the_content(); ?>

        <?php endwhile;
    else :
        echo '<p>Lav nogle posts</p>';
    endif;
    ?>
</div>

<?php get_footer(); ?>

