<?php 
/**
 * Template for displaying footer
 */
?>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <p class="copyright">&copy; <?php echo date("Y"); ?> fsd. All rights reserved</p>
                </div>
                <?php 
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'menu_id'        => 'footer-menu',
                            'container'      => '',
                            'menu_class'     => 'footer-menu'
                        )
                    )
                ?>
            </div>
        </div>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

    <?php wp_footer(); ?>
</body>
</html>