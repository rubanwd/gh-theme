<?php


//Infinite Scroll for POSTS

function ajax_script_load_more_posts($args) {
    //init ajax
    $ajax = false;
    //check ajax call or not
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $ajax = true;
    }
    //number of posts per page default
    $num =10;
    //page number
    $paged = $_POST['page'] + 1;
    //args
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' =>$num,
        'paged'=>$paged
    );
    //query
    $query = new WP_Query($args);
    //check
    if ($query->have_posts()):
        //loop articales
        while ($query->have_posts()): $query->the_post();
            //include articles template
            include 'ajax-content/index-content.php';
        endwhile;
    else:
        echo 0;
    endif;
    //reset post data
    wp_reset_postdata();
    //check ajax call
    if($ajax) die();
}


function script_load_more_posts($args = array()) {
    //initial posts load
    echo '<div id="ajax-primary" class="content-area">';
        echo '<div id="ajax-content" class="content-area">';
            ajax_script_load_more_posts($args);
        echo '</div>';
        echo '<a href="#" id="loadMorePosts" class="load-more" data-page="1" data-url="'.admin_url("admin-ajax.php").'" >Load More Posts...</a>';
    echo '</div>';
}

add_shortcode('ajax_posts', 'script_load_more_posts');

add_action('wp_ajax_nopriv_ajax_script_load_more_posts', 'ajax_script_load_more_posts');
add_action('wp_ajax_ajax_script_load_more_posts', 'ajax_script_load_more_posts');





//Infinite Scroll for ALL PRODUCTS

function ajax_script_load_more_products($args) {
    //init ajax
    $ajax = false;
    //check ajax call or not
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $ajax = true;
    }
    //number of posts per page default
    $num =10;
    //page number
    $paged = $_POST['page'] + 1;
    //args
    $args = array(
        'post_type' => 'products',
        'post_status' => 'publish',
        'posts_per_page' =>$num,
        'paged'=>$paged
    );
    //query
    $query = new WP_Query($args);
    //check
    if ($query->have_posts()):
        //loop articales
        while ($query->have_posts()): $query->the_post();

            //include articles template
            include 'ajax-content/products-all-content.php';
        endwhile;
    else:
        echo 0;
    endif;
    //reset post data
    wp_reset_postdata();
    //check ajax call
    if($ajax) die();
}


function script_load_more_products($args = array()) {
    //initial posts load
    echo '<div id="ajax-primary" class="content-area">';
        echo '<div id="ajax-content" class="content-area">';
            ajax_script_load_more_products($args);
        echo '</div>';
        echo '<a href="#" id="loadMoreProducts" class="load-more" data-page="1" data-url="'.admin_url("admin-ajax.php").'" >Load More Products...</a>';
    echo '</div>';
}

add_shortcode('ajax_products', 'script_load_more_products');

add_action('wp_ajax_nopriv_ajax_script_load_more_products', 'ajax_script_load_more_products');
add_action('wp_ajax_ajax_script_load_more_products', 'ajax_script_load_more_products');






//Infinite Scroll for PRODUCTS HARDWARE

function ajax_script_load_more_hardware($args) {
    //init ajax
    $ajax = false;
    //check ajax call or not
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $ajax = true;
    }
    //number of posts per page default
    $num =10;
    //page number
    $paged = $_POST['page'] + 1;
    //args
    $args = array(
        'post_type' => 'products',
        'category_name' => 'games-hardware',
        'order'   => 'DESC',
        'post_status' => 'publish',
        'posts_per_page' =>$num,
        'paged'=>$paged
    );
    //query
    $query = new WP_Query($args);
    //check
    if ($query->have_posts()):
        //loop articales
        while ($query->have_posts()): $query->the_post();
            //include articles template
            include 'ajax-content/products-hardware-content.php';
        endwhile;
    else:
        echo 0;
    endif;
    //reset post data
    wp_reset_postdata();
    //check ajax call
    if($ajax) die();
}


function script_load_more_hardware($args = array()) {
    //initial posts load
    echo '<div id="ajax-primary" class="content-area">';
        echo '<div id="ajax-content" class="content-area">';
            ajax_script_load_more_hardware($args);
        echo '</div>';
        echo '<a href="#" id="loadMoreHardware" class="load-more" data-page="1" data-url="'.admin_url("admin-ajax.php").'" >Load More Products...</a>';
    echo '</div>';
}

add_shortcode('ajax_hardware', 'script_load_more_hardware');

add_action('wp_ajax_nopriv_ajax_script_load_more_hardware', 'ajax_script_load_more_hardware');
add_action('wp_ajax_ajax_script_load_more_hardware', 'ajax_script_load_more_hardware');







//Infinite Scroll for PRODUCTS GAMES

function ajax_script_load_more_games($args) {
    //init ajax
    $ajax = false;
    //check ajax call or not
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $ajax = true;
    }
    //number of posts per page default
    $num =10;
    //page number
    $paged = $_POST['page'] + 1;
    //args
    $args = array(
        'post_type' => 'products',
        'category_name' => 'video-games',
        'order'   => 'DESC',
        'post_status' => 'publish',
        'posts_per_page' =>$num,
        'paged'=>$paged
    );
    //query
    $query = new WP_Query($args);
    //check
    if ($query->have_posts()):
        //loop articales
        while ($query->have_posts()): $query->the_post();
            //include articles template
            include 'ajax-content/products-games-content.php';
        endwhile;
    else:
        echo 0;
    endif;
    //reset post data
    wp_reset_postdata();
    //check ajax call
    if($ajax) die();
}


function script_load_more_games($args = array()) {
    //initial posts load
    echo '<div id="ajax-primary" class="content-area">';
        echo '<div id="ajax-content" class="content-area">';
            ajax_script_load_more_games($args);
        echo '</div>';
        echo '<a href="#" id="loadMoreGames" class="load-more" data-page="1" data-url="'.admin_url("admin-ajax.php").'" >Load More Games...</a>';
    echo '</div>';
}

add_shortcode('ajax_games', 'script_load_more_games');

add_action('wp_ajax_nopriv_ajax_script_load_more_games', 'ajax_script_load_more_games');
add_action('wp_ajax_ajax_script_load_more_games', 'ajax_script_load_more_games');





//Infinite Scroll for PRODUCTS VR

function ajax_script_load_more_vr($args) {
    //init ajax
    $ajax = false;
    //check ajax call or not
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $ajax = true;
    }
    //number of posts per page default
    $num =10;
    //page number
    $paged = $_POST['page'] + 1;
    //args
    $args = array(
        'post_type' => 'products',
        'category_name' => 'vr-games',
        'order'   => 'DESC',
        'post_status' => 'publish',
        'posts_per_page' =>$num,
        'paged'=>$paged
    );
    //query
    $query = new WP_Query($args);
    //check
    if ($query->have_posts()):
        //loop articales
        while ($query->have_posts()): $query->the_post();
            //include articles template
            include 'ajax-content/products-vr-content.php';
        endwhile;
    else:
        echo 0;
    endif;
    //reset post data
    wp_reset_postdata();
    //check ajax call
    if($ajax) die();
}


function script_load_more_vr($args = array()) {
    //initial posts load
    echo '<div id="ajax-primary" class="content-area">';
        echo '<div id="ajax-content" class="content-area">';
            ajax_script_load_more_vr($args);
        echo '</div>';
        echo '<a href="#" id="loadMoreGames" class="load-more" data-page="1" data-url="'.admin_url("admin-ajax.php").'" >Load More Games...</a>';
    echo '</div>';
}

add_shortcode('ajax_vr', 'script_load_more_vr');

add_action('wp_ajax_nopriv_ajax_script_load_more_vr', 'ajax_script_load_more_vr');
add_action('wp_ajax_ajax_script_load_more_vr', 'ajax_script_load_more_vr');