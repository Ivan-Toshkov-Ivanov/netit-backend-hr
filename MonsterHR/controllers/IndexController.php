<?php

namespace controllers;

class IndexController {
    
    private $jobPostCollection = array();
    
    
    public function index() {
        $this->jobPostCollection = \jobpost\JobPost::fetch();
    }
    
    public function getJobPostCollection($param = null) {
        return $this->jobPostCollection;
    }
  
}

