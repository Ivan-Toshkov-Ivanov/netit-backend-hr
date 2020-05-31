<?php
include './external_autoload.php';

(new controllers\EmployerRegistrationController())->index();

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
            <h1 class="logo">Employer Registration</h1>
        </div>
            
        <div class="wrapper">
            <form method="POST" name="registration">
                <input class="form-input" type="text" placeholder="Company" name="company">
                <input class="form-input" type="text" placeholder="Industry" name="industry">
                <input class="form-input" type="text" placeholder="Password" name="password">
                <input class="form-input" type="text" placeholder="Repeat Password" name="repeat-password">
                <textarea class="form-textarea h-160" type="text" placeholder="Description" name="description"></textarea>
                
                <input class="button" type="submit" name="post_submit">
                <input type="hidden" name="post_tokken" value="1">
            </form>
        </div>
        
    </body>
</html>

