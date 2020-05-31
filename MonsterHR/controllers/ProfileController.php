<?php

namespace controllers;

class ProfileController {
    
    
        public function index() {

        
        if(\user\User::isRegular()) {
            return redirect('user-profile');
        }
        if(\user\User::isHR()) {
            return redirect('hr-profile');
        }
      
        
        
     
    }
}
