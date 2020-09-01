<?php

/***
 * Theme functions and definitions 
 *
 */

add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );

register_nav_menus(
    array(
        'header' => esc_html__( 'Primary', 'fsd-task' ),
        'footer' => esc_html__( 'Footer', 'fsd-task' )
    )
);

add_filter ( 'nav_menu_css_class', 'custom_menu_item_class', 10, 4 );

function custom_menu_item_class ( $classes, $item, $args, $depth ){
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}

