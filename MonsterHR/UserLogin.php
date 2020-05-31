<?php

include './external_autoload.php';

(new controllers\UserLoginController())->index();

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HR</title>
        <link rel="stylesheet" href="style/style.css">   
    </head>
    <body>       
        <div id="application-header" class="web-header">
            <h1 class="logo">User Login</h1>
        </div>
        <?php 
            
            if(\session\Session::checkFlashMessage('error_message')) {
                
                echo '<div class="message error">';
                echo \session\Session::getFlashMessage('error_message');
                echo '</div>';                
            }
        ?>        
                  
        <div class="wrapper">
            <form method="POST" name="login">
              
                <input class="form-input" type="text" placeholder="E-mail" name="email">
                <input class="form-input" type="text" placeholder="Password" name="password">
                
                
                <input class="button" type="submit" name="post_submit">
                <input type="hidden" name="post_tokken" value="1">
            </form>
        </div>
        
    </body>
</html>

