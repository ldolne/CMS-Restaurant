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
