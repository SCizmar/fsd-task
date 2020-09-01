<?php
/**
 * Template part for displaying homepage slider in page.php
 *
 */

?>

<?php if( have_rows('slides') ): ?>
    <section class="slider-container">
        <div class="slider">

        <?php while( have_rows('slides') ): the_row(); ?>
            <div class="slide-content">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="slider-content col-sm-12 col-md-8 col-lg-5">
                            <h5 class="section-name"><?php the_sub_field('slide_small_title'); ?></h5>
                            <h2 class="slide-title"><?php the_sub_field('slide_main_title'); ?></h2>
                            <div class="slide-description">
                                <div class="red-line"></div>
                                <p><?php the_sub_field('slide_text'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
        <div class="prev-arrow">
            <img src="<?php echo get_template_directory_uri(); ?>/images/chevron-right.svg" alt="prev arrow">
        </div>
        <div class="next-arrow">
            <img src="<?php echo get_template_directory_uri(); ?>/images/chevron-right.svg" alt="prev arrow">
        </div>
    </section>
<?php endif; ?>