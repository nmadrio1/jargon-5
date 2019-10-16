<?php 

   if(! function_exists('jargon_setup')){
       // wordpress functionality
       function jargon_setup(){
           add_theme_support('title_tag');
           add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
       }

   }

   add_theme_support("after_setup", "jargon_setup");
 



 
 
    function jargon_styles () {
        wp_enqueue_style('jargon_reboot', get_template_directory_uri(). '/assets/css/reboot.css');
        wp_enqueue_style('jargon_fonts', "https: //fonts.googleapis.com/css?family=Montserrat:400,700|PT+Sans:400,700|Roboto:400,700&display=swap");
        wp_enqueue_style('jargon_styles', get_stylesheet_uri());
    }

    
    add_action('wp_enqueue_scripts', 'jargon_styles');



 

?>