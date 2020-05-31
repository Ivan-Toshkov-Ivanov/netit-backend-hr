<?php
namespace controllers;

class UserRegistrationController {
    
    public function index() {
        
         if(isset($_POST) && isset($_POST['post_tokken'])) {
        
        $username = $_POST['username'];
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $role     = $_POST['role']; 
        
        if(\user\User::registration(($username), $email, $password,$role)) {
            echo "Success registration";
        }
        }
        
    }
}
