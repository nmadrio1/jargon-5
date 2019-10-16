# <img src="./assets/images/wordpress-water-mark.png" width="100" align="center"> WordPress Custom Post Types

## Creating A Custom Post Using Code

In the jargon site example the front page has several examples or custom post types, the featured videos, articles and the team members. If you take a look back at the single.php template for a single post it will not help us build out the pages we need to display the contents of an article. So we need a work around.

Wordpress has this built in for us and when we use custom post types. There are plugins that do all the heavy lifting and make a difficult task easy. First let's show you how this is done by hand before we use a plugin. You can take a look at all the properties of the [register_post_type()](https://codex.wordpress.org/Function_Reference/register_post_type) on the WordPress codex site to get a better understanding of all the options at your disposal.

> Copy the following code to your functions.php file and upload it. Make sure you increase the version number in your style.css so you know what version of the site your working on. When you get to the dashboard make sure and change appearance>theme>jargon 5

```php
//function creates a custom post type of movies
function create_post_type_movies()
{
    // creates label names for the post type in the dashboard the post panel and in the toolbar.
    $labels = array(
               'name' => __('Movies'),
               'singular_name' => __('Movie'),
    );
    // creates the post functionality that you want for a full listing see the link attached above
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'movies'),
         'menu_position' => 5,
         'menu_icon' => 'dashicons-admin-media',
         'supports'=> 'title'
    );

   register_post_type('movies', $args  );
}
// Hooking up our function to theme setup
add_action('init', 'create_post_type_movies');

```

_Note_ that the supports property only support adding a title. For a full list of support options visit the register_post_type [support property](https://codex.wordpress.org/Function_Reference/register_post_type#supports).

Turn on the following supports options

1. editor
1. excerpt
1. custom-fields

I am not crazy about the new editor so I am going to turn it off by adding the following line to my functions.php file.

```php
  add_filter('use_block_editor_for_post', '__return_false', 10);

```

## Custom Post Type Dashboard Icons And Position

If you want a custom icon for your new post type you can use the default wordpress set [dash icons](https://developer.wordpress.org/resource/dashicons/#media-document). Click on this link and take a look at the icon you would like to use for your custom post type. Click on the HTML version and copy the dashicons-name-whatever. Find the property menu_icon property and where is currently says dashicons-admin-media paste in your selection.

If you want wish to create your own dashboard you'll need to use a tool that makes icon fonts. There are free and paid tools for this [iconmoon](https://icomoon.io/#home/) is a popular free choice. Drawback to icon moon is that you have to supply an email to download your font icon.

#### Positions for Core Menu Items

2 Dashboard

4 Separator

5 Posts

10 Media

15 Links

20 Pages

25 Comments

59 Separator

60 Appearance

65 Plugins

70 Users

75 Tools

80 Settings

99 Separator

## Create A Custom Post Type Template.

Once you have your functions.php file coded you will see your new post type in the dashboard sidebar. Click on your new post type and create a new post. Then select view:

1. Where does it take you when you view the template?

1. Why does it take you there?

1. Looking at the [template hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/) what should we name our custom template file for movies?

The template file should be single-movies.php. Just add the text _single movie post template_ to the file and upload it to the theme folder on the server. Now view the post you created where did it take you?

It may have taken you to single-movies.php or to the index.php template. If it took you to the index.php template it means that something went wrong and WordPress can't find the template file.

If this happens you have to start thinking in terms of the permalink. the permalink is the url wordpress assigns to a single piece of content. We now have a post type of movies so if your seeing the index template it means you have your permalink setting to something else other than post. Lets fix this.

1. Go to your dashboard

1. Go to the Settings option.

1. Select the permalinks option.

1. From the permalink settings make sure the Post name radio button is checked.

1. Return to your custom movie post type and view it again you should see your template show up.

## Adding Custom Fields

Make sure that you have enabled support for custom fields under the supports property of the register_post_type(); You will see the custom fields section under the post editor. Locate the enter new link and click on it. You will be presented with a field with the name and value (name value pairs or property and value). Publish your file and now go to the single-movies.php
file and add the following code

```php
<?php while ( have_posts() ) : the_post(); ?>
<?php echo get_post_meta($post->ID, 'name', true); ?>
<?php endwhile; // end of the loop. ?>

```
