<?php
/**
 * Template part for displaying about section in page.php
 *
 */

?>

<section class="about-section">
    <div class="container">
        <div class="row no-gutters about-section-content">
            <div class="col-sm-12 col-lg-6 about-left">
                <div class="audi-slogan-container">
                    <p class="slogan">A progressive design, a powerful engine.</p>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/images/about-us-section.png" alt="Audi Q8">
            </div>
            <div class="col-sm-12 col-lg-5 offset-lg-1 column about-right">
                <h5 class="section-name"><?php the_field('about_section_section_name'); ?></h5>
                <h2 class="section-title"><?php the_field('about_section_section_title'); ?></h2>
                <p class="section-subtitle"><?php the_field('about_section_section_subtitle'); ?></p>
                <p><?php the_field('about_section_section_text'); ?></p>
            </div>
        </div>
    </div>
</section>