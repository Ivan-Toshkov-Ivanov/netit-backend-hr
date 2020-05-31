<?php

namespace routes;

class PostApi {
    
    // TODO: refactor repeating fetch logic
    public function index($id = null) {
        
        $collection = \jobpost\JobPost::fetch($id);
        echo json_encode($collection);
    }
     
    public function getJobsByCompany() {
     
        if(isset($_SESSION['user_reference']['role']) && $_SESSION['user_reference']['role'] == 'HR'){ 
           $HRid = \user\User::id();
           $company = \hr\HR::HRcompany($HRid); 
       }
       else{
          $company = \employer\Employer::company(); 
       }
      $collection = \jobpost\JobPost::fetchJobsByCompany($company);
          echo json_encode($collection);
       
    }
    
    public function applyJob(){
        $userId = \user\User::id();
        $fname = \user\User::userFname($userId);
        $lname = \user\User::userLname($userId);
        $city = \user\User::userCity($userId);
        $age = \user\User::userAge($userId);
        $education = \user\User::userEducation($userId);
        
        if( \user\User::UserAboutAvailable($fname, $lname, $city, $age, $education, $userId) == 1){
     
        $jobId      = $_GET['id'];
        $companyId  = \employer\Employer::CompanyId($jobId);
        $apply = \jobpost\JobPost::apply($userId, $fname, $lname, $city, $age, $education, $jobId, $companyId);  
        }else{
            redirect('user-about');
            
        }
        
    }
    
    public function create() {
    
        $jobId            = $_POST['id'];
        $jobPosition      = $_POST['job_position'];
        $jobIndustry      = $_POST['industry'];
        $jobCompany       = $_POST['company'];
        $jobCity          = $_POST['city'];
        $jobDescription   = $_POST['description'];
        $jobCompanyId     = \employer\Employer::id();
        
        
        $recordId = \jobpost\JobPost::create($jobPosition,$jobIndustry,$jobCompany,$jobCity,$jobDescription,$jobCompanyId);
        
        if($recordId) {
                    
            $collection = \jobpost\JobPost::fetch($recordId);
            echo json_encode($collection);
        }
        else {
            echo "Error";
        }
    }
    public function update() {
        
        $jobId            = $_POST['id'];
        $jobPosition      = $_POST['job_position'];
        $jobIndustry      = $_POST['industry'];
        $jobCompany       = $_POST['company'];
        $jobCity          = $_POST['city'];
        $jobDescription   = $_POST['description'];
         
        $response = \jobpost\Jobpost::update($jobId,$jobIndustry,$jobPosition,$jobCompany,$jobCity,$jobDescription);
        
        if($response) {
            echo "Success";
        }
        else {
            echo "Fail";
        }
    }
        public function delete() {
        
        $jobId = $_POST['id'];
        $response = \jobpost\JobPost::delete($jobId);
        
        if($response) {
            echo "Success";
        }
        else {
            echo "Fail";
        }        
        
    }
    
   
    
}