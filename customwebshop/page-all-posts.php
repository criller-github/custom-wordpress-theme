<?php
/*
Template Name: Shop
*/
get_header();
?>

<div class="shop-container">
    <h1>Shop</h1>

    <div class="post-grid">
        <?php
        // WP Query for at hente posts
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => -1
        );
        $all_posts_query = new WP_Query($args);

        if ($all_posts_query->have_posts()) :
            while ($all_posts_query->have_posts()) : $all_posts_query->the_post();
                ?>
                <div class="post-item">
                    <!-- Klikbart billede -->
                    <a href="<?php the_permalink(); ?>">
                        <?php 
                        //featured image
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('full'); 
                        }
                        ?>
                    </a>

                    <!-- Titel -->
                    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                    <!-- 25 ord læs merre -->
                    <div class="post-excerpt">
                        <?php
                        $excerpt = wp_trim_words(get_the_content(), 25, '...');
                        echo $excerpt;
                        ?>
                        <a class="read-more" href="<?php the_permalink(); ?>">Læs mere</a>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>lav nogle posts</p>';
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
