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

function ajax_filter_posts_scripts() {
  // Enqueue scripts
  wp_enqueue_script('jquery');
  wp_register_script('afp_script', get_template_directory_uri() . '/js/ajax-filter-posts.js', 'jquery', null, true);
  wp_enqueue_script('afp_script');

  wp_localize_script( 'afp_script', 'afp_vars', array(
        'afp_nonce' => wp_create_nonce( 'afp_nonce' ), // will use to verify AJAX request
        'afp_ajax_url' => admin_url( 'admin-ajax.php' ),
      )
  );
}
add_action('wp_enqueue_scripts', 'ajax_filter_posts_scripts', 100);

// Script for getting posts
function ajax_filter_get_posts() {
  // Verify nonce
  if (!isset($_POST['afp_nonce']) || !wp_verify_nonce($_POST['afp_nonce'], 'afp_nonce'))
      die('Permission denied');
  $taxonomy = $_POST['taxonomy'];
  // WP Query
  $args = array(
      'post_type' => 'cars',//Custom Post type name
      'posts_per_page' => -1,
  );
  if (!empty($taxonomy)) {
      $args['tax_query'] = array(
          array(
              'taxonomy' => 'car_category',
              'field' => 'slug',
              'terms' => $taxonomy,
          ),
      );
  }
  $loop = new WP_Query($args);
  if ($loop->have_posts()) :
  ?>
  <?php
      while( $loop->have_posts() ) : $loop->the_post();
          $featured_img = get_post_thumbnail_id( $post->ID );
          $img_ar =  wp_get_attachment_image_src( $featured_img, 'full' );
          $posttags = get_the_tags(); ?>
          <div class="col-sm-12 col-md-6 col-lg-3 car-card-column">
              <div class="car-card">

              <?php if( get_field('is_it_new') ) { ?>
                  <span class="new">New</span>
              <?php } ?>

                  <?php if ($featured_img) { ?>
                        <img src="<?php echo $img_ar[0]; ?>" class="car-image">
                  <?php } ?>
                  <p class="specs"><?php the_field('seats_and_doors'); ?></p>
                  <h3 class="model"><?php the_title(); ?></h3>
                  <p class="config">Configurator</p>
                  <?php if( $posttags ) { ?>
                  <ul class="features">
                      <?php
                      foreach($posttags as $tag) {
                          echo '<li>' . $tag->name . '</li>';
                      }
                      ?>
                  </ul>
                  <?php } ?>
                  <div class="price">
                      <div class="price-left-content">
                          <span>Starting from</span>
                          <p class="amount"><?php the_field('starting_price'); ?> €</p>
                      </div>
                      <button class="buy-now button" id="button-<?php the_ID(); ?>" data-modal="modal-<?php the_ID(); ?>">Buy Now</button>
                  </div>
              </div>

              <div data-target="button-<?php the_ID(); ?>" class="modal" id="modal-<?php the_ID(); ?>">
                  <div class="modal-content">
                      <div class="vehicle-data">
                          <div class="vehicle-data-top">
                          <?php if( get_field('is_it_new') ) { ?>
                              <span class="new">New</span>
                          <?php } ?>

                          <?php if ($featured_img) { ?>
                              <img src="<?php echo $img_ar[0]; ?>" class="featured-image">
                          <?php } ?>

                              <p class="specs"><?php the_field('seats_and_doors'); ?></p>
                              <h3 class="model"><?php the_title(); ?></h3>
                          </div>
                          <div class="starting-price">
                              <span>Starting from</span>
                              <p class="amount"><?php the_field('starting_price'); ?> €</p>
                          </div>
                      </div>
                      <div class="vehicle-addons">
                          <h4 class="modal-title">Audi Configurator</h4>
                          <p class="modal-subtitle">Create your own Audi.</p>
                          <?php
                          $car_addons = get_field('addons');
                          if( $car_addons ): ?>
                              <div class="addons-list">
                                  <?php foreach( $car_addons as $car_addon ):
                                      $addon = get_post( $car_addon->ID );
                                      $slug = $car_addon->ID;
                                      $title = get_the_title( $car_addon->ID );
                                      $addon_price = get_field( 'addon_price', $car_addon->ID );
                                  ?>

                                  <label for="<?php echo esc_html( $slug ); ?>" class="popup-checkbox"><?php echo esc_html( $title ); ?>
                                      <span class="price"><?php echo esc_html( $addon_price ); ?></span>
                                      <input type="checkbox" name="<?php echo esc_html( $slug ); ?>" id="<?php echo esc_html( $slug ); ?>">
                                      <span class="checkmark"></span>
                                  </label>
                                  <?php endforeach; ?>
                              </div>
                          <?php endif; ?>
                      </div>


                      <button class="btn-close"></button>
                  </div>
              </div>
          </div>

  <?php endwhile;

      wp_reset_postdata();
  ?>
  <?php
  endif;
  wp_reset_postdata();
  die();
}
add_action('wp_ajax_filter_posts', 'ajax_filter_get_posts');
add_action('wp_ajax_nopriv_filter_posts', 'ajax_filter_get_posts');