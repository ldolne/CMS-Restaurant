<?php


// Gestion des images mises en avant ajoutée à WordPress
add_theme_support('post-thumbnails');

function register_my_menu()
{
    register_nav_menu('desktop-menu', __('Menu Desktop'));
    register_nav_menu('mobile-menu', __('Menu Mobile'));
}

add_action('init', 'register_my_menu');

/*
// enlever Gutenberg

  // for posts
  add_filter('use_block_editor_for_post', '__return_false', 10);
  // for post types
  add_filter('use_block_editor_for_post_type', '__return_false', 10);*/
  
  
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
