

<?php while ( have_posts() ) : the_post(); ?>
<?php echo get_post_meta($post->ID, 'price', true); ?>
<?php endwhile; // end of the loop. ?>