<?php

namespace controllers;

class EmployerController {
    
    public function index() {
        
        $HRid       = \user\User::id();
        $fname      = \hr\HR::hrFname($HRid);
        $lname      = \hr\HR::hrLname($HRid);
        $city       = \hr\HR::hrCity($HRid);
        $age        = \hr\HR::hrAge($HRid);
        $company    = \hr\HR::HRcompany($HRid);
        
        if(\user\User::isNotLoged()) {
            return redirect('index');
        }
        if(\user\User::isRegular()){
            return redirect('index');
        }
        if(\user\User::isHR() && null==(\hr\HR::HRAboutAvailable($fname, $lname, $city, $age, $company, $HRid))){
           
             return redirect('hr-profile');
        }
        else{isset($_SESSION['user_reference']['company']);}
       
        
    }

    }
    
 
