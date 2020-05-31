<?php
include './external_autoload.php';

(new controllers\HRAboutRegistrationController())->index();

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
            <h1 class="logo">Jobs</h1>
            <div id="application-header-placeholder">
                    <ul>
                       <li><a href="UserLogin.php">User Log In</a></li>
                       <li><a href="EmployerLogin.php">Employer Log In</a></li>
                       <li><a href="UserRegistration.php">User Registration</a></li>
                       <li><a href="EmployerRegistration.php">Employer Registration</a></li>
                       <li><a href="Profile.php">Profile</a></li>
                       <li><a href="logout.php">Log out</a></li>
                      
                    </ul>
               </div>           
        </div>
            
            <div id="content" class="component">
                 <?php 
                
                 
                    
                
                 echo"<div class='username'>Username:{$_SESSION['user_reference']['username']}</div>";
                 echo"<div class='email'>Email:{$_SESSION['user_reference']['email']}</div>";
                  echo"<div class='role'>Role:{$_SESSION['user_reference']['role']}</div>";
                 
                 echo"</div>";
                 echo"</a>";
           
         
            ?>  
                <div class="wrapper">
                 <form method="POST" name="about">
                 <input class="form-input" type="text" placeholder="First name" name="fname">
                 <input class="form-input" type="text" placeholder="Last name" name="lname">
                 <input class="form-input" type="text" placeholder="City" name="city">
                 <input class="form-input" type="text" placeholder="Age" name="age">
                 <input class="form-input" type="text" placeholder="Company" name="company">
                 
                 <input class="button" type="submit" name="post_submit">
                <input type="hidden" name="post_tokken" value="1">
                </div>
            </div>
                 
         
    </body>
</html>

