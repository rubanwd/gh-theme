<?php  
/** 
 * Template Name: Login Page 
 */  
get_header('static');
?>

<script>
    
    var oldURL = document.referrer;


    console.log("message", oldURL);
</script>

<div class="login-content">

    <h2 class="title-pgb">Login</h2>
   
<?php  
if($_POST) 
{  
   
    global $wpdb;  
   
    //We shall SQL escape all inputs  
    $username = $wpdb->escape($_REQUEST['username']);  
    $password = $wpdb->escape($_REQUEST['password']);  
    $remember = $wpdb->escape($_REQUEST['rememberme']);  
   
    if($remember) $remember = "true";  
    else $remember = "false";  
   
    $login_data = array();  
    $login_data['user_login'] = $username;  
    $login_data['user_password'] = $password;  
    $login_data['remember'] = $remember;  
   
    $user_verify = wp_signon( $login_data, false );   
   
    if ( is_wp_error($user_verify) )   
    {  
        echo "<h4>Invalid login or password</h4>";  
       // Note, I have created a page called "Error" that is a child of the login page to handle errors. This can be anything, but it seemed a good way to me to handle errors.  
     } else
    {    
        echo wp_get_referer();
        // echo "<script>javascript:history.go(-2)</script>";
       // echo "<script type='text/javascript'>window.location.href='". home_url( '/brotherhood/' ) ."'</script>";  
       // header( 'Location:' . wp_get_referer() ); 
       // exit();  
     }  
   
} else 
{  
   
    echo "<h4>Enter your login and password or <a href=' " . site_url('/registration/') . " '>Sign up</a></h4>";  
   
}  
 ?>



    <form class="login-form" id="login1" name="form" action="<?php echo home_url(); ?>/login/" method="post">

        <p>
            <input id="username" type="text" placeholder="Username" name="username"><br>  
        </p>

        <p>
            <input id="password" type="password" placeholder="Password" name="password">  
        </p>
        
        <p>
            <input id="submit" type="submit" name="submit" value="Submit">  
        </p>
        
    </form>

</div>
  

<?php get_footer(); ?>