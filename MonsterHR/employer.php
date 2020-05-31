<?php
include './_external_autoload.php';

(new controllers\EmployerController())->index();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HR</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="style/style.css">       
    </head>
    <body>
        <div id="application-header" class="web-header">
            <h1 class="logo">Employer HR</h1>
            
                <div id="application-header-placeholder">
                    <ul>
                       <li><a href="employer.php">Add job</a></li>
                       <li><a href="joblist.php">List jobs</a></li>
                       <li><a href="logout.php">Log out</a></li>
                      
                    </ul>
               </div>           
        </div>    
         <div id="message-baner" class="message success">
            Success record !!!
        </div>
        <div id="employer-editor">
            <form method="POST" name="admin-post-editor">
                
                <input id="job_position" class="form-input" type="text" placeholder="Job position" name="job_position">
                <input id="industry" class="form-input" type="text" placeholder="Industry" name="industry">
                <input id="company" class="form-input" type="text" placeholder="Company" name="company">
                <input id="city" class="form-input" type="text" placeholder="City" name="city"> 
                <textarea id="description" class="form-textarea h-160" placeholder="Description" name="description"></textarea>
               
                <input id           ="employer-editor-submit" 
                       class        ="button"
                       type         ="submit" 
                       name         ="post_submit">
                <input id           = "employer-editor-edit-cancel"
                       class        = "button" 
                       type         = "button" 
                       value        = "Cancel edit"
                       name         = "group_cancel" >          
                <input type         ="hidden" 
                       name         ="post_tokken" 
                       value        ="1">
            </form>
        </div>
         <div id     = "post-container" 
             class  = "employer-editor"></div>
            
             
          <script src="scripts/client/netitquery.js"></script>
          <script src="scripts/vendor/jquery.js"></script>
          <script src="scripts/application/employer.js"></script>
    </body>
</html>



