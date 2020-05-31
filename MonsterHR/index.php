<?php
include './_external_autoload.php';
$indexControllerReference = new \controllers\IndexController();
$indexControllerReference->index();


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
            
        
        
        <div id="content-fullview">
            <div id="content-fullview-jobpost">
                <div class="mt-3">
                    <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div id="job_id" class="job_id"></div>
                                    <div id="job_position" class="job_position"></div>
                                    <div id="city" class="city"></div>
                                    <div id="company" class="company"></div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                   <div id="description" class="description"></div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                    <button class="button" id="applyjob">apply for job</button>
                                </div>
                            </div>     
                    </div>
                </div>
            </div>        
        </div>
        
        
            <div id="content" class="component">
               
                 <?php 
                 
               //   var_dump($_SESSION);
              //   foreach($indexControllerReference->getJobPostCollection() as $value) {
                    
             //    echo"<a href='details.php?id={$value['id']}'>";
              //   echo"<div class='job-post'>";
             //    echo"<div class='job-position'>{$value['position']}</div>";
            //     echo"<div class='job-city'>{$value['city']}</div>";
             //    echo"<div class='job-company'>{$value['company']}</div>";
             //    echo"</div>";
             //    echo"</a>";
          //  }
         
            ?>  
                
             
             </div>  
        <script src="scripts/client/netitquery.js"></script>
        <script src="scripts/vendor/jquery.js"></script>
        <script src="scripts/application/index.js"></script>
    </body>
</html>