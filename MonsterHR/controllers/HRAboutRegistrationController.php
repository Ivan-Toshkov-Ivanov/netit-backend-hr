<?php
namespace controllers;

class HRAboutRegistrationController {
    
    public function index() {
        
         if(isset($_POST) && isset($_POST['post_tokken'])) {
        
        $fname     = $_POST['fname'];
        $lname     = $_POST['lname'];
        $city      = $_POST['city'];
        $age       = $_POST['age']; 
        $company   = $_POST['company'];
        $hrId      = \user\User::id();
        if(\user\User::aboutHR(($fname), $lname,$city,$age,$company,$hrId)) {
            echo "Success about registration";
        }
        }
        
    }
}