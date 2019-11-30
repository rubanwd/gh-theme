<!doctype html>
<html >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <!-- <meta name="description" content=""> -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/main.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/responsive.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/slick.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        
        <title><?php wp_title( '', true, 'right' ); ?></title>
        <?php wp_head(); ?>
        <script>
    document.addEventListener("touchstart", function() {},false);
</script>
    </head>
    <body>
        <div class="search-field">
            <div style="text-align: right;">
                <button class="close_search-field">&#10005;</button>
            </div>
            <?php get_search_form(); ?>
        </div>
        <nav class="mobile-main-nav">
            <div style="text-align: right;">
                <button class="close_main-nav">&#10005;</button>
            </div>
            <?php
                if ( function_exists( 'wp_nav_menu' ) )
                    wp_nav_menu(array( 'theme_location' => 'main-menu',
                                        'fallback_cb'=> 'main_menu',
                                        'container' => 'ul',
                                        'menu_id' => 'main-nav'));
                else custom_menu();
            ?>
        </nav>
        <div class="wrapper">
            <header id="pgb-header">
                <div class="inner-header">

                    <div class="logo">
                        <a href="<?php echo home_url( '/' ) ?>"></a>
                    </div>
                    <div class="header-soc">
                        <a rel="nofollow" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a rel="nofollow" href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a rel="nofollow" href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a rel="nofollow" href="#" target="_blank"><i class="fab fa-telegram-plane"></i></a>
                    </div>
                    <nav class="main-nav">
                        <?php
                            if ( function_exists( 'wp_nav_menu' ) )
                                wp_nav_menu(array( 'theme_location' => 'main-menu',
                                                    'fallback_cb'=> 'main_menu',
                                                    'container' => 'ul',
                                                    'menu_id' => 'main-nav'));
                            else custom_menu();
                        ?>
                    </nav>
                    <button class="mobile_menu_button">
                        <div></div>
                        <div></div>
                        <div></div>
                    </button>
                    <div class="menu-divider"></div>
                    <button id="search-button" class="header-search-button noSelect"><i class="fas fa-search noSelect"></i></button>


                </div>



            </header>
