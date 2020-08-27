<?php

// Déclaration des fonctions

function cmsrestaurant_supports() {
    // Gestion des titres
    add_theme_support('title-tag');
    // Gestion des images mises en avant ajoutée à WordPress
    //add_theme_support('post-thumbnails');
}

function cmsrestaurant_register_assets() {
    // Pour charger Bootstrap
    wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', [], false, true);
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', [], false, true);
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
}

function register_my_menu()
{
    register_nav_menu('desktop-menu', __('Menu Desktop'));
    register_nav_menu('mobile-menu', __('Menu Mobile'));
}

// Appels des actions

add_action('after_setup_theme', 'cmsrestaurant_supports');
//add_action('wp_enqueue_scripts', 'cmsrestaurant_register_assets');
add_action('init', 'register_my_menu');
add_filter('wp_title', 'cmsrestaurant_title');
add_action('init', function () {
    if(function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Restaurant options'
        ]);
    }
});


// Remove Gutenberg
// for posts
add_filter('use_block_editor_for_post', '__return_false', 10);
// for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);
  
  
  // Nettoyer dashboard avant remise au client
  /*
  
    function my_wpadmin_sidebar_menu() {
      remove_menu_page( 'index.php' );  // 'Dashboard'
      remove_menu_page( 'upload.php' );   // 'Media'
      remove_menu_page( 'edit-comments.php' )
      remove_submenu_page('upload.php','media-new.php'); 
      remove_submenu_page('plugins.php','plugin-install.php'); //plugins
      remove_submenu_page('plugins.php','plugin-editor.php');
  }
  add_action('admin_menu','my_wpadmin_sidebar_menu', 999);
  */

// Removes unused roles

function remove_unused_roles() {
    remove_role( 'subscriber' );
    remove_role( 'contributor' );
    remove_role( 'author' );
    remove_role('shop_manager');
    remove_role('customer');
}

// Add custom type post managing options to new role "cook"
/**
 * Overwrite args of custom post type registered by plugin
 */
function change_capabilities_of_recipe( $args, $post_type ){

    // Do not filter any other post type
    if ( 'recipe' !== $post_type ) {
        // Give other post_types their original arguments
        return $args;
    }

    // Change the capabilities of the "recipe" post_type
    $args['capabilities'] = array(
        'edit_posts' => 'edit_recipes',
        'edit_published_posts' => 'edit_published_recipes',
        'publish_posts' => 'publish_recipes',
        'read_private_posts' => 'read_private_recipes',
        'delete_posts' => 'delete_recipes',
        'delete_private_posts' => 'delete_private_recipes',
        'delete_published_posts' => 'delete_published_recipes'
    );

    // Give the recipe post type it's arguments
    return $args;
}

function add_caps($role) {
    $role = get_role($role);
    $role->add_cap( 'read_private_recipes' );
    $role->add_cap( 'edit_recipes' );
    $role->add_cap( 'edit_published_recipes' );
    $role->add_cap( 'publish_recipes' );
    $role->add_cap( 'delete_recipes' );
    $role->add_cap( 'delete_private_recipes' );
    $role->add_cap( 'delete_published_recipes' );
}

function rpt_add_role_caps() {
    remove_role('cook');
    add_role('cook', __('Cook'));
    add_caps('cook');
    add_caps('editor');
    add_caps('administrator');
}

add_action( 'init', 'remove_unused_roles' );
add_filter( 'register_post_type_args', 'change_capabilities_of_recipe' , 10, 2 );
add_action('admin_init','rpt_add_role_caps',999);

function switch_to_relative_url($html, $id, $caption, $title, $align, $url, $size, $alt)
{
    $imageurl = wp_get_attachment_image_src($id, $size);
    $relativeurl = wp_make_link_relative($imageurl[0]);
    $html = str_replace($imageurl[0],$relativeurl,$html);

    return $html;
}

add_filter('image_send_to_editor','switch_to_relative_url',10,8);



