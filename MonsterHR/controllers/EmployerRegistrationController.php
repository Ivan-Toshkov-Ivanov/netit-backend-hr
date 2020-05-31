<?php
namespace controllers;

class EmployerRegistrationController {
    
    public function index() {
        
         if(isset($_POST) && isset($_POST['post_tokken'])) {
        
        $company         = $_POST['company'];
        $industry        = $_POST['industry'];
        $password        = $_POST['password'];
        $description     = $_POST['description']; 
        
        if(\employer\Employer::registration(($company), $industry, $password,$description)) {
            echo "Success registration";
        }
        }
        
    }
}

