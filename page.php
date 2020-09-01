<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fsd-task
 */

get_header();
?>
<?php 
// if ( have_posts() ) {
// 	while ( have_posts() ) {
// 		the_post(); 
// 		the_content();
// 	} // end while
// } // end if
?>
        <?php 
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', 'slider' );

                get_template_part( 'template-parts/content', 'about' );
                
                get_template_part( 'template-parts/content', 'featured' );

                get_template_part( 'template-parts/content', 'products' );
                
                get_template_part( 'template-parts/content', 'contact' );

            endwhile;
        ?>
        
    </main>

<?php
get_footer();