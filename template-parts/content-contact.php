<?php
/**
 * Template part for displaying contact section in page.php
 *
 */

?>
<section class="contact">
    <img src="<?php echo get_template_directory_uri(); ?>/images/contact-form-img.png" alt="" class="contact-form-image">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h5 class="section-name"><?php the_field('contact_section_section_name'); ?></h5>
                <h2 class="section-title section-title-dark"><?php the_field('contact_section_section_title'); ?></h2>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-5 offset-lg-1 contact-form-container">
                <span style="color: #fff;"><?php echo do_shortcode('[contact-form-7 id="28" title="Contact form 1"]'); ?></span>
            </div>
        </div>
    </div>
</section>