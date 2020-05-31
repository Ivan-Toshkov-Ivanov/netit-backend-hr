<?php

namespace controllers;

class UserLoginController {
    
    public function index() {
        
        if(isset($_POST) && isset($_POST['post_tokken'])) {
            
            $email      = $_POST['email'];
            $password   = $_POST['password'];
            
           
            if(\user\User::isAvailable($email, $password)) { 
                
               $userObject = \user\User::login($email, $password); 
               \user\User::set($userObject);
               
               if(\user\User::role() == 'EMPLOY') {
                   redirect('index');
               }
               
               if(\user\User::role() == 'HR') {
                   redirect('joblist');
               }
            }
            
            \session\Session::setFlashMessage('error_message', 'Потребителя не е намерен в системата');
            
            
            
        }
    }
}
