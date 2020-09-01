<?php
/**
 * Template part for displaying featured section in page.php
 *
 */

?>

<section class="featured">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h5 class="section-name"><?php the_field('featured_section_section_name'); ?></h5>
                <h2 class="section-title section-title-dark"><?php the_field('featured_section_section_title'); ?></h2>
                <p><?php the_field('featured_section_section_text'); ?></p>
            </div>
        </div>
        <div class="row facts-row">
            <div class="col-12 col-sm-4 col-md-4 col-lg-2">
                <div class="fact-block">
                    <p class="fact-name">Power output</p>
                    <p class="fact-number"><?php the_field('featured_section_power_output_value'); ?></p>
                    <p class="fact-unit"><?php the_field('featured_section_power_output_small_text'); ?></p>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-4 col-lg-2">
                <div class="fact-block">
                    <p class="fact-name">Acceleration</p>
                    <p class="fact-number"><?php the_field('featured_section_acceleration_value'); ?></p>
                    <p class="fact-unit"><?php the_field('featured_section_acceleration_small_text'); ?></p>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-4 col-lg-2">
                <div class="fact-block">
                    <p class="fact-name">Torque</p>
                    <p class="fact-number"><?php the_field('featured_section_torque_value'); ?></p>
                    <p class="fact-unit"><?php the_field('featured_section_torque_small_text'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>