<?php  
/* 
Template Name: Register Page
*/  
   
get_header('static');

?>

<div class="register-content">

    <h2 class="title-pgb-white">Registration</h2>

    <?php  

    global $wpdb, $user_ID;  
    //Check whether the user is already logged in  
    if ($user_ID) 
    {  
       
        // They're already logged in, so we bounce them back to the homepage.  
       
        // header( 'Location:' . home_url() );  
       
    } else {  
       
        $errors = array();  
       
        if( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
          {  
       
            // Check username is present and not already in use  
            $username = $wpdb->escape($_REQUEST['username']);  
            if ( strpos($username, ' ') !== false )
            {   
                $errors['username'] = "Sorry, no spaces allowed in usernames";  
            }  
            if(empty($username)) 
            {   
                $errors['username'] = "Please enter a username";  
            } elseif( username_exists( $username ) ) 
            {  
                $errors['username'] = "Username already exists, please try another";  
            }  
       
            // Check email address is present and valid  
            $email = $wpdb->escape($_REQUEST['email']);  
            if( !is_email( $email ) ) 
            {   
                $errors['email'] = "Please enter a valid email";  
            } elseif( email_exists( $email ) ) 
            {  
                $errors['email'] = "This email address is already in use";  
            }  
       
            // Check password is valid  
            if(0 === preg_match("/.{6,}/", $_POST['password']))
            {  
              $errors['password'] = "Password must be at least six characters";  
            }  
       
            // Check password confirmation_matches  
            if(0 !== strcmp($_POST['password'], $_POST['password_confirmation']))
             {  
              $errors['password_confirmation'] = "Passwords do not match";  
            }  
       
            // Check terms of service is agreed to  
            if($_POST['terms'] != "Yes")
            {  
                $errors['terms'] = "You must agree to Terms of Service";  
            }  
       
            if(0 === count($errors)) {  
       
                $password = $_POST['password'];  
       
                $new_user_id = wp_create_user( $username, $password, $email );  
       
                // You could do all manner of other things here like send an email to the user, etc. I leave that to you.  
       
                $success = 1;  
       
                //header( 'Location:' . get_bloginfo('url') . '/login/?success=1&u=' . $username );  
       
            }

            foreach ($errors as $error)
                {
                    echo "<h4 class='register-error'>Error: '$error' </h4>";
                }
       
        }  
    }  
      
    ?> 



    <form class="register-form" id="wp_signup_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">  


        <p>
            <label for="username">Username</label>  <br>
            <input type="text" name="username" id="username">  
        </p>

        <p>
            <label for="email">Email address</label>  <br>
            <input type="text" name="email" id="email">  
        </p>
      
        <p>
            <label for="password">Password</label>  <br>
            <input type="password" name="password" id="password">  
        </p>
            
        <p>
            <label for="password_confirmation">Confirm Password</label>  <br>
            <input type="password" name="password_confirmation" id="password_confirmation">  
        </p>

        <p>
            <input name="terms" id="terms" type="checkbox" value="Yes"> 
            <label for="terms">I agree to the Terms of Service</label>
        </p>
             
        <p>
            <input type="submit" id="submitbtn" name="submit" value="Sign Up" />  
        </p>
              
    </form>  
    
</div>
  

  
<?php get_footer(); ?>
