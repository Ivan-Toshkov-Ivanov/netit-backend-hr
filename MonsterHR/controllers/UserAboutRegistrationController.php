<?php
namespace controllers;

class UserAboutRegistrationController {
    
    public function index() {
        
         if(isset($_POST) && isset($_POST['post_tokken'])) {
        
        $fname     = $_POST['fname'];
        $lname     = $_POST['lname'];
        $city      = $_POST['city'];
        $age       = $_POST['age']; 
        $education = $_POST['education'];
        $userId    = \user\User::id();
        if(\user\User::about(($fname), $lname, $city,$age,$education,$userId)) {
            echo "Success about registration";
        }
        }
        
    }
}