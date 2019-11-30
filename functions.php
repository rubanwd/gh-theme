<?php 
require_once( __DIR__ . '/includes/slider-post-type.php');
require_once( __DIR__ . '/includes/products-post-type.php');
require_once( __DIR__ . '/includes/ajax-load-functions.php');

// Include better comments file
// require_once( get_template_directory() .'/better-comments.php' );



add_filter('use_block_editor_for_post', '__return_false');

// include custom jQuery
function shapeSpace_include_custom_jquery() {

    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);

    wp_enqueue_script('like_post', get_template_directory_uri().'/js/post-like.js', array('jquery'), '1.0', true );
    wp_localize_script('like_post', 'ajax_var', array(
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax-nonce')
    ));

    // wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array('jquery'), '1.0', true );

}
add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery');



// Swipe

add_action( 'wp_head', 'adjacent_posts_rel_link_wp_head',50 );


// Move Yoast to bottom
function yoasttobottom() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');


// Disable Yoast SEO on Custom Post Type
function my_remove_wp_seo_meta_box() {
    remove_meta_box('wpseo_meta', 'slider', 'normal');
}
add_action('add_meta_boxes', 'my_remove_wp_seo_meta_box', 100);










// function my_custom_login() {
//     echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/css/custom-login-styles.css" />';
// }
// add_action('login_head', 'my_custom_login');



// Admin login page 

function custom_loginlogo() {
    echo '<style type="text/css">
        h1 a {background-image: url('.get_bloginfo('template_directory').'/img/emblem-w.png) !important; }
        body.login { background-color: #213451;}
        .login .button-primary {
          background-color:#213451 !important;
          color: #ffffff;
          border: 1px solid #fff;
        }

        .login .button-primary:hover {
          background-color:#508b00 !important;
          color: #fff;
          border: 1px solid #fff;
        }

        .login .button-primary:active {
          background-color:#508b00 !important;
          border: 1px solid #fff;
        }

        body.login a {color: #fff!important;font-size:16px;}
        body.login a:hover {color: #508b00!important;}


    </style>';
}
add_action('login_head', 'custom_loginlogo');

function custom_loginlogo_url($url) {

     return home_url( '/' );

}
add_filter( 'login_headerurl', 'custom_loginlogo_url' );





















 
function get_custom_cat_template($single_template) {
     global $post;
 
       if ( in_category( 'video-games' )) {
          $single_template = dirname( __FILE__ ) . '/single-products-games.php';
     } elseif ( in_category( 'games-hardware' )) {
          $single_template = dirname( __FILE__ ) . '/single-products-hardware.php';
        }
     return $single_template;
}
 
add_filter( "single_template", "get_custom_cat_template" ) ;
 
















//  remove the comment review icon from the wp-admin bar

// function remove_admin_bar_links() {
//     global $wp_admin_bar, $current_user;

//     if ($current_user->ID != 1) {
//         $wp_admin_bar->remove_menu('wp-logo');          // Remove the Wordpress logo
//         $wp_admin_bar->remove_menu('about');            // Remove the about Wordpress link
//         $wp_admin_bar->remove_menu('wporg');            // Remove the Wordpress.org link
//         $wp_admin_bar->remove_menu('documentation');    // Remove the Wordpress documentation link
//         $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link


//         $wp_admin_bar->remove_menu('notes');         // Remove the comments link
//     }
// }
// add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );






// Function to change email address
 
function wpb_sender_email( $original_email_address ) {
    return 'info@playgamesbro.com';
}

function wpb_sender_name( $original_email_from ) {
    return 'PlayGamesBro';
}
 
add_filter( 'wp_mail_from', 'wpb_sender_email' );
add_filter( 'wp_mail_from_name', 'wpb_sender_name' );








// Change LoginURL

// add_filter('login_url','custom_login_url');

// function custom_login_url($login_url) {

//     return site_url('/login/');
// }




// Redirect to previus page after login

if ( (isset($_GET['action']) && $_GET['action'] != 'logout') || (isset($_POST['login_location']) && !empty($_POST['login_location'])) ) {
    add_filter('login_redirect', 'my_login_redirect', 10, 3);
    function my_login_redirect() {


        $previous = "javascript:history.go(-1)";
                            if(isset($_SERVER['HTTP_REFERER'])) {
                                $previous = $_SERVER['HTTP_REFERER'];
                            }



        
        exit();
    }
}




















// Restrict access to the WordPress dashboard
    

// add_action( 'init', 'my_custom_dashboard_access_handler');
 
// function my_custom_dashboard_access_handler() {
 
//    // Check if the current page is an admin page
//    // && and ensure that this is not an ajax call
//    if ( is_admin() && !current_user_can( 'manage_users' ) && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX )){
      
//       //Get all capabilities of the current user
//       $user = get_userdata( get_current_user_id() );
//       $caps = ( is_object( $user) ) ? array_keys($user->allcaps) : array();
 
//       //All capabilities/roles listed here are not able to see the dashboard
//       $block_access_to = array('subscriber', 'contributor', 'my-custom-role', 'my-custom-capability');
      
//       if(array_intersect($block_access_to, $caps)) {
//          wp_redirect( home_url() );
//          exit;
//       }
//    }
// }





// Disable Admin Bar for All Users Except for Administrators

add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
      show_admin_bar(false);
    }
}



add_action( 'template_redirect', 'protect_goal_page' );
function protect_goal_page() {
    if (!(is_user_logged_in()) && is_page('Brotherhood')){
        wp_redirect( site_url() . '/login' );
        exit;
    }

}




// Social Sharing


function crunchify_social_sharing_buttons_bottom($content) {
    global $post;
    if(is_singular() || is_home()){
    
        // Get current page URL 
        $crunchifyURL = urlencode(get_permalink());
 
        // Get current page title
        $crunchifyTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
        // $crunchifyTitle = str_replace( ' ', '%20', get_the_title());
        
        // Get Post Thumbnail for pinterest
        $crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
        $googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;

        $whatsappURL = 'whatsapp://send?text='.$crunchifyTitle . ' ' . $crunchifyURL;

 
        // Based on popular demand added Pinterest too
        $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
 
        // Add sharing button at the end of page/page content

        $content .= '<div class="crunchify-social crunchify-social-bottom">';
        $content .= '<a rel="nofollow" class="crunchify-link crunchify-twitter" href="'. $twitterURL .'" target="_blank"><i class="fab fa-twitter"></i></a>';
        $content .= '<a rel="nofollow" class="crunchify-link crunchify-facebook" href="'.$facebookURL.'" target="_blank"><i class="fab fa-facebook-f"></i></a>';
        $content .= '<a rel="nofollow" class="crunchify-link crunchify-whatsapp" href="'.$whatsappURL.'" target="_blank"><i class="fab fa-whatsapp"></i></a>';
        $content .= '<a rel="nofollow" class="crunchify-link crunchify-googleplus" href="'.$googleURL.'" target="_blank"><i class="fab fa-google-plus-g"></i></a>';
        $content .= '<a rel="nofollow" class="crunchify-link crunchify-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank"><i class="fab fa-pinterest-p"></i></a>';
        $content .= '</div>';
        
        return $content;
    }else{
        // if not a post/page then don't include sharing button
        return $content;
    }
};
add_filter( 'the_content', 'crunchify_social_sharing_buttons_bottom');




// Like system



function getPostLikeLink($post_id)
{
    $themename = "twentyeleven";
 
    $vote_count = get_post_meta($post_id, "votes_count", true);
 
    $output = '<p class="post-like">';
    if(hasAlreadyVoted($post_id))
        $output .= ' <span title="'.__('I like this article', $themename).'" class="like alreadyvoted"></span>';
    else
        $output .= '<a rel="nofollow" href="#" data-post_id="'.$post_id.'">
                    <span  title="'.__('I like this article', $themename).'"class="qtip like"></span>
                </a>';
    $output .= '<span class="count">'.$vote_count.'</span></p>';
     
    return $output;
}


function hasAlreadyVoted($post_id)
{
    global $timebeforerevote;
 
    // Retrieve post votes IPs
    $meta_IP = get_post_meta($post_id, "voted_IP");
    $voted_IP = $meta_IP[0];
     
    if(!is_array($voted_IP))
        $voted_IP = array();
         
    // Retrieve current user IP
    $ip = $_SERVER['REMOTE_ADDR'];
     
    // If user has already voted
    if(in_array($ip, array_keys($voted_IP)))
    {
        $time = $voted_IP[$ip];
        $now = time();
         
        // Compare between current time and vote time
        if(round(($now - $time) / 60) > $timebeforerevote)
            return false;
             
        return true;
    }
     
    return false;
}


function post_like()
{
    // Check for nonce security
    $nonce = $_POST['nonce'];
  
    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Busted!');
     
    if(isset($_POST['post_like']))
    {
        // Retrieve user IP address
        $ip = $_SERVER['REMOTE_ADDR'];
        $post_id = $_POST['post_id'];
         
        // Get voters'IPs for the current post
        $meta_IP = get_post_meta($post_id, "voted_IP");
        $voted_IP = $meta_IP[0];
 
        if(!is_array($voted_IP))
            $voted_IP = array();
         
        // Get votes count for the current post
        $meta_count = get_post_meta($post_id, "votes_count", true);
 
        // Use has already voted ?
        if(!hasAlreadyVoted($post_id))
        {
            $voted_IP[$ip] = time();
 
            // Save IP and increase votes count
            update_post_meta($post_id, "voted_IP", $voted_IP);
            update_post_meta($post_id, "votes_count", ++$meta_count);
             
            // Display count (ie jQuery return value)
            echo $meta_count;
        }
        else
            echo "already";
    }
    exit;
}


add_action('wp_ajax_nopriv_post-like', 'post_like');
add_action('wp_ajax_post-like', 'post_like');









































function myprefix_search_posts_per_page($query) {
    if ( $query->is_search ) {
        $query->set( 'posts_per_page', '10' );
    }
    return $query;
}
add_filter( 'pre_get_posts','myprefix_search_posts_per_page' );





if ( function_exists( 'register_nav_menus' ) )
{
	register_nav_menus(
		array(
			'main-menu'=>__('Main menu'),
            'page-menu'=>__('Page menu')
		)
	);
}

// function custom_menu(){
// 	echo '<ul>';
// 	wp_list_pages('title_li=&');
// 	echo '</ul>';
// }







// function cp_replace_featured_image_metabox( $post_type, $context ) {
//     $my_post_type = 'page';
//     if ( $post_type == $my_post_type && 'side' == $context ) {
//         remove_meta_box( 'postimagediv', $my_post_type, 'side' );
//         add_meta_box( 'postimagediv', __( 'First Slide' ), 'post_thumbnail_meta_box', $my_post_type, 'side', 'low' );
//     }
// }
// add_action( 'do_meta_boxes', 'cp_replace_featured_image_metabox', 10, 2 );

// if (class_exists('MultiPostThumbnails')) {
 
//     new MultiPostThumbnails(array(
//     'label' => 'Second Slide',
//     'id' => 'second-slide',
//     'post_type' => 'page'
//      ) );

//     new MultiPostThumbnails(array(
//     'label' => 'Third Slide',
//     'id' => 'third-slide',
//     'post_type' => 'page'
//      ) );

//     new MultiPostThumbnails(array(
//     'label' => 'Fourth Slide',
//     'id' => 'fourth-slide',
//     'post_type' => 'page'
//      ) );



//     new MultiPostThumbnails(array(
//     'label' => 'Gif Image',
//     'id' => 'gif-img',
//     'post_type' => 'products'
//      ) );


//  }


// if ( function_exists('register_sidebar') ) {
    
//     register_sidebar(array(
//         'name' => 'Right Sidebar',
//         'before_widget' => '<div class="right-sidebar">',
//         'before_title' => '<h2 class="right-sidebar__title">',
//         'after_title' => '</h2><div class="text">',
//         'after_widget' => '</div></div>'
//      ));

// }





// function people_init() {
//     // create a new taxonomy
//     register_taxonomy(
//         'people',
//         'projects',
//         array(
//             'label' => __( 'Category' ),
//             'rewrite' => array( 'slug' => 'category' ),
//             'capabilities' => array(
//                 'assign_terms' => 'edit_guides',
//                 'edit_terms' => 'publish_guides'
//             )
//         )
//     );
// }
// add_action( 'init', 'people_init' );



















function mytheme_setup() {
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'mytheme_setup');

// remove_filter( 'the_content', 'wpautop' );

function excerpt($num) {
    $limit = $num+1;
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt)."<a href='" .get_permalink($post->ID) ." '></a>";
    echo $excerpt;
}

add_theme_support( 'post-thumbnails' ); 

// add_action( 'admin_menu', 'my_remove_admin_menus' );
// function my_remove_admin_menus() {
//     remove_menu_page( 'edit-comments.php' );
// }

// add_action('init', 'remove_comment_support', 100);

// function remove_comment_support() {
//     remove_post_type_support( 'post', 'comments' );
//     remove_post_type_support( 'page', 'comments' );
// }

// function mytheme_admin_bar_render() {
//     global $wp_admin_bar;
//     $wp_admin_bar->remove_menu('comments');
// }
// add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );


function wpbeginner_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link('<') );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link('>') );
 
    echo '</ul></div>' . "\n";
 
}


// Remove "products" SLUG from url

function na_remove_slug( $post_link, $post, $leavename ) {

    if ( 'products' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}
add_filter( 'post_type_link', 'na_remove_slug', 10, 3 );

function na_parse_request( $query ) {

    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }

    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'products', 'page' ) );
    }
}
add_action( 'pre_get_posts', 'na_parse_request' );


//  end


// Change the default post type from the admin toolbar

// function revcon_change_post_label() {
//     global $menu;
//     global $submenu;
//     $menu[5][0] = 'News';
//     $submenu['edit.php'][5][0] = 'News';
//     $submenu['edit.php'][10][0] = 'Add News';
//     $submenu['edit.php'][16][0] = 'News Tags';
// }
// function revcon_change_post_object() {
//     global $wp_post_types;
//     $labels = &$wp_post_types['post']->labels;
//     $labels->name = 'News';
//     $labels->singular_name = 'News';
//     $labels->add_new = 'Add News';
//     $labels->add_new_item = 'Add News';
//     $labels->edit_item = 'Edit News';
//     $labels->new_item = 'News';
//     $labels->view_item = 'View News';
//     $labels->search_items = 'Search News';
//     $labels->not_found = 'No News found';
//     $labels->not_found_in_trash = 'No News found in Trash';
//     $labels->all_items = 'All News';
//     $labels->menu_name = 'News';
//     $labels->name_admin_bar = 'News';
// }
 
// add_action( 'admin_menu', 'revcon_change_post_label' );
// add_action( 'init', 'revcon_change_post_object' );





// Remove the default post type from the admin toolbar

add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}

add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );

function remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
}

add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );

function remove_draft_widget(){
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}














// Reply functionality for commenys

function mytheme_enqueue_comment_reply() {
    // on single blog post pages with comments open and threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
        // enqueue the javascript that performs in-link comment reply fanciness
        wp_enqueue_script( 'comment-reply' ); 
    }
}
// Hook into wp_enqueue_scripts
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_comment_reply' );



// stop wordpress search showing a "Slider" post type

add_action( 'init', 'update_my_custom_type', 99 );

function update_my_custom_type() {
    global $wp_post_types;

    if ( post_type_exists( 'slider' ) ) {

        // exclude from search results
        $wp_post_types['slider']->exclude_from_search = true;
    }
}


// FOR COMMENT TEMPLATE

if ( ! function_exists( 'shape_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Shape 1.0
 */
function shape_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
    ?>
    <li class="post pingback">
        <p><?php _e( 'Pingback:', 'shape' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'shape' ), ' ' ); ?></p>
    <?php
            break;
        default :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment">
            <div>
                <div class="comment-author vcard">
                    <?php echo get_avatar( $comment, 40 ); ?>
                    <?php printf(sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                </div><!-- .comment-author .vcard -->
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em><?php _e( 'Your comment is awaiting moderation.', 'shape' ); ?></em>
                <?php endif; ?>
 
                <div class="comment-meta commentmetadata">
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
                    <?php
                        /* translators: 1: date, 2: time */
                        printf( __( '%1$s at %2$s', 'shape' ), get_comment_date(), get_comment_time() ); ?>
                    </time></a>
                    <?php edit_comment_link( __( '(Edit)', 'shape' ), ' ' );
                    ?>
                </div><!-- .comment-meta .commentmetadata -->
            </div>
 
            <div class="comment-content"><?php comment_text(); ?></div>
 
            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div><!-- .reply -->
        </article><!-- #comment-## -->
 
    <?php
            break;
    endswitch;
}
endif; // ends check for shape_comment()



