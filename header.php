<?php 
/**
 * Theme header
 */

 ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FSD Task</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="header">
        <?php 
            if ( function_exists( 'the_custom_logo' ) ) {
                the_custom_logo();
            }
        ?>
        <nav class="main-nav">
            <button class="menu-toggle">
                <img src="<?php echo get_template_directory_uri(); ?>/images/hamburger.svg">
            </button>
            <?php 
                wp_nav_menu(
                    array(
                        'theme_location' => 'header',
                        'menu_id'        => 'primary-menu',
                        'container'      => '',
                        'menu_class'     => ''
                    )
                )
            ?>
        </nav>
    </header>