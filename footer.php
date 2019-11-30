            <footer>
                <div class="footer-info">
                    
                    <div class="footer-cols">
                        <div class="footer-cols__first footer-col footer-cols__general 
                        ">



                            <img class="logo-footer" src="<?php bloginfo('template_url'); ?>/img/pgb-logo-full-wg.png" alt="logo">

                            <h4>Be always up to date with the latest video games and hardware</h4>



                        </div>
                        <div class="footer-cols__first footer-cols__general">
                            <h3>
                                Quick Links
                            </h3>
                            <?php
                                if ( function_exists( 'wp_nav_menu' ) )
                                    wp_nav_menu(array( 'theme_location' => 'page-menu',
                                                        'fallback_cb'=> 'page_menu',
                                                        'container' => 'ul',
                                                        'menu_id' => 'page-nav'));
                                else custom_menu();
                            ?>

     
                        </div>

                        <div class="footer-cols__first footer-cols__general" id="contact">
                            <h3>
                                Contact
                            </h3>
                            <ul>
                                <li><a href="<?php echo get_site_url(); ?>/about-us/">About PGB</a></li>
                                <li><a href="<?php echo get_site_url(); ?>/contact">Contact Us</a></li>
                                <?php
                                if (is_user_logged_in()) {
                                    $user = wp_get_current_user();?>
                                    <a rel="nofollow" class="login-footer" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a><?php
                                } else { ?>


                                    <a rel="nofollow" class="login-footer" href="<?php echo wp_registration_url() ?>" class="simplemodal-register" ><?php echo __('Signup'); ?></a>
                                    <span style="color:#fff;"> / </span>
                                    <a rel="nofollow" class="login-footer" href="<?php echo wp_login_url(get_permalink()) ?>"><?php echo __('Login'); ?></a>

                                <?php } ?>
                            </ul>
                        </div>
                        <div class="footer-cols__fourth footer-cols__general" style="margin-bottom: 50px;">
                            <h3>
                                Newsletter for Bro
                            </h3>
                            <div class="form-newsletter">
                                <?php echo do_shortcode( '[contact-form-7 id="38" title="newsletter"]' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-soc">
                        <a rel="nofollow" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a rel="nofollow" href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a rel="nofollow" href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a rel="nofollow" href="#" target="_blank"><i class="fab fa-telegram-plane"></i></a>
                </div>
                <div class="copyright">
                    <p>
                        Copyright &copy; <? echo date(Y);?> PLAY GAMES BRO. ALL RIGHTS RESERVED.
                    </p>
                    
                </div>
            </footer>
        </div>

        <?php wp_footer(); ?>
        
        
        <script src="<?php bloginfo('template_url'); ?>/js/slick.min.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/jquery.slide.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
        
</body>
</html> 