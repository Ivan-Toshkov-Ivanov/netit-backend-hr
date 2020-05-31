<?php
namespace jobpost;

class JobPost {
    
    public static function create($position,$industry,$company,$city,$description,$companyId) {
        
        $query = "INSERT INTO monster.job_posts(position,industry,company,city,description,company_id)"
                . " VALUES ('{$position}','{$industry}','{$company}','{$city}','{$description}',{$companyId})";   
        
       \db\Database::getInstance()->query($query);  
       return \db\Database::getInstance()->lastInsertedId();
    }
        
    public static function update($jobId,$jobIndustry,$jobPosition,$jobCompany,$jobCity,$jobDescription) {
        
        $query = "UPDATE monster.job_posts SET industry = '{$jobIndustry}',position='{$jobPosition}', company = '{$jobCompany}',city ='{$jobCity}',description = '{$jobDescription}' WHERE id = {$jobId}";
        \db\Database::getInstance()->query($query);
        
        return (\db\Database::getInstance()->affectedRows() == 1);    
    }
    
    public static function delete($jobId) {
        
        $query = "DELETE FROM monster.job_posts WHERE id = {$jobId}";
        \db\Database::getInstance()->query("DELETE FROM monster.job_posts WHERE id = {$jobId}");
        
        return (\db\Database::getInstance()->affectedRows() == 1);    
    }        
    
    public static function fetch($id = null) {
            
           $query = "SELECT * FROM monster.job_posts";
            
           if($id) {
               $query = "$query WHERE id = {$id}";
               
           }
           
           \db\Database::getInstance()->query($query);
           return \db\Database::getInstance()->fetchCollection();
           
        }
    public static function fetchJobsByCompany($company) {
            
           $query = "SELECT * FROM monster.job_posts WHERE company = '{$company}'";
                 
           \db\Database::getInstance()->query($query);
           return \db\Database::getInstance()->fetchCollection();
           
        }

       
    public static function apply($userId,$fname,$lname,$city,$age,$education,$jobId,$companyId){
            
            $query = "INSERT INTO monster.job_candidates(user_id,fname,lname,city,age,education,status,job_id,company_id)"
                . " VALUES ('{$userId}','{$fname}','{$lname}','{$city}','{$age}','{$education}','applied','{$jobId}','{$companyId}')";   
        
       \db\Database::getInstance()->query($query);  
       return \db\Database::getInstance()->lastInsertedId();
        }
        
    
    
   
        
    
    
}