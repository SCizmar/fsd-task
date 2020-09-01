<?php
/**
 * Template part for displaying products section in page.php
 *
 */

$args = array(
    'post_type' => 'cars',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'ASC',
    'exclude' => 1
);

$tax = 'category';
$terms = get_terms($tax);
$filters = get_categories($args);

$loop = new WP_Query( $args );

?>

        <section class="products">
            <h2 class="section-title"><?php the_field('products_section_title'); ?></h2>
            <div class="container">
                <div class="row">
                    <ul class="filters">
                        <li class="active"><a href="#">All</a></li>
                        <?php foreach($filters as $filter) {?>
                            <li><a href="#" class="category-filter" title="<?php echo $filter->slug; ?>" ><?php echo $filter->name; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="row car-cards">
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
                </div>
            </div>

        </section>