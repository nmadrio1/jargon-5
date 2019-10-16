

<?php while ( have_posts() ) : the_post(); ?>
<h1><?php the_title(); ?></h1>
<p><?php the_content()  ?></p>
<?php echo get_post_meta($post->ID, 'price', true); ?>
<?php endwhile; // end of the loop. ?>