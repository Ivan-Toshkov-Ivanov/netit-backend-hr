  <head>
        <meta charset="UTF-8">
        <title>HR</title>
        <link rel="stylesheet" href="style/private.css"> 
        <link rel="stylesheet" href="style/style.css"> 
       
    </head>
    <body>       
        <div id="application-header" class="web-header">
            <h1 class="logo">Jobs</h1>
             <div id="private-header-placeholder">
                <ul>
                    <li><a href="user-profile.php">Home</a></li>
                    <li><a href="user-message.php">Message</a></li>
                    <li><a href="user-about.php">About</a></li>
                </ul>
            </div> 
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
                <div class="candidate-messages">
                    <div style="text-align: center"><h2>Messages</h2>
                        <div id     = "candidates-message-container" >  
                        </div> 
                    </div>    
                </div>
            </div>    
                
     
                 
        <script src="scripts/client/netitquery.js"></script>
        <script src="scripts/vendor/jquery.js"></script>
        <script src="scripts/application/private/user-message.js"></script>
    </body>
</html>


