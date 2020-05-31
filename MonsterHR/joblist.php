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
            <link rel="stylesheet" href="style/admin.css">     
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
        
        <div id     = "post-container" 
             class  = "employer-editor"></div>
            
            <div id     = "candidates-container" 
                 class  = "employer-editor"></div>
         

             <div id="content" class="component">
                   <select
                                     id   = "candidateStatusEditor"
                                     name = "candidateStatusEditor">

                </select>
             <div id="candidateStatusSubmit"></div>
                 
                 
             <textarea id="candidate-message" class="form-textarea h-160" placeholder="message" name="candidate-message"></textarea>
            
             <div id ="candidate-massege-button"></div>
                <?php 
  
              //  $company   = \employer\Employer::company();
           //   foreach($indexControllerReference->getJobPostCollection() as $value) {
           //      if($company == $value['company']){    
               
            //      $jobId = $value['id'];
            //     echo"<div class='job-post'>";
            //     echo"<div class='job-id'>{$value['id']}</div>";
            //     echo"<div class='job-position'>{$value['position']}</div>";
            //     echo"<div class='job-city'>{$value['city']}</div>";
           //      echo"<div class='job-company'>{$value['company']}</div>";
            //     echo"<div class='description'>{$value['description']}</div>";
            //     echo"<form method='post'> 
            //         <input type='submit' name='ListCandidates'
           //          class='btn' value='List Candidates' /> ";
           //      echo"<input type='hidden' name='post_tokken' value='1'>"; 
           //      echo"</div>";
           //     var_dump($_GET);
           //      foreach($jobControllerReference->getJobCandidatesCollection() as $value){
           //          if($jobId == $value['job_id']) {
                         
          //    echo"<div class='job-post'>";
          //      echo"<div class='fname'>First name:{$value['fname']}</div>";
          //      echo"<div class='lname'>Last name:{$value['lname']}</div>";
          //      echo"<div class='city'>City:{$value['city']}</div>";
           //     echo"<div class='age'>Age:{$value['age']}</div>";
           //     echo"<div class='education'>Education:{$value['education']}</div>";
           //     echo"<div class='jobId'>JobID:{$value['job_id']}</div>";
           //     echo"<form method='post'> 
           //          <input type='submit' name='Message'
           //          class='button' value='Message' /> ";
           //     echo"<input type='hidden' name='post_tokken' value='2'>";
          //      echo"<form method='post'> 
            //         <input type='submit' name='Delete'
           //          class='button' value='Delete' /> ";
           //     echo"<input type='hidden' name='post_tokken' value='3'>";
          //       
          //    echo"</div>";
          //          }
         //     }
                 
         //     }
            
          //    }
         
              ?>
            
               
           
        </div>
        <script src="scripts/client/netitquery.js"></script>
          <script src="scripts/vendor/jquery.js"></script>
          <script src="scripts/application/joblist.js"></script>
        
    </body>
</html>


