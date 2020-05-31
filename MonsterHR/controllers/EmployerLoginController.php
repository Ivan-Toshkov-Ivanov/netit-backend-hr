<?php

namespace controllers;

class EmployerLoginController {
    
    public function index() {
        
        if(isset($_POST) && isset($_POST['post_tokken'])) {
            
            $company      = $_POST['company'];
            $password   = $_POST['password'];
            
           
            if(\employer\Employer::isAvailable($company, $password)) { 
                
               $userObject = \employer\Employer::login($company, $password); 
               \employer\Employer::set($userObject);
               
               redirect('employer');
               
             
            }
            
            \session\Session::setFlashMessage('error_message', 'Потребителя не е намерен в системата');
            
            
            
        }
    }
}

