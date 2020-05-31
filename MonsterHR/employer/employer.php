<?php
namespace employer;

class Employer{
    
    
      public static function company() {
       return $_SESSION['user_reference']['company'];
    }
    
      public static function industry() {
       return $_SESSION['user_reference']['industry'];
    }
      public static function description() {
       return $_SESSION['user_reference']['description'];
    }
     public static function id() {
       return $_SESSION['user_reference']['id'];
    }
    
    public static function set($userObject) {
        $_SESSION['user_reference'] = $userObject;
        

    }
    public static function CompanyId($jobId) {
            
           $query = "SELECT company_id FROM monster.job_posts WHERE id = '{$jobId}'";
   
           \db\Database::getInstance()->query($query);
             $row = \db\Database::getInstance()->fetch();
           return $row['company_id'];
         }
    
    public static function login($company, $password) {
        
        if(Employer::isAvailable($company, $password)) {
            
            $queryResult = \db\Database::getInstance()->query("SELECT * FROM monster.employer WHERE company = '{$company}' AND password = '{$password}'");
            return \db\Database::getInstance()->fetch();            
        }
        
        return false;
    }
        
    public static function isAvailable($company, $password) {
        
     
        \db\Database::getInstance()->query("SELECT COUNT(*) AS number_of_rows FROM monster.employer WHERE company = '{$company}' AND password = '{$password}'");
        $collection = \db\Database::getInstance()->fetch();

      return ($collection['number_of_rows'] == 1);        
    }


    
    public static function registration($company, $industry, $password,$description) {
        
        \db\Database::getInstance()->query("INSERT INTO monster.employer(company, industry, password, description,role) 
                        VALUES('{$company}', '{$industry}', '{$password}', '{$description}','COMPANY')");
                        
        if(\db\Database::getInstance()->lastInsertedId()) {
            return true;
        }
        
        return false;
    }
    
    public static function logout() {
        session_destroy();
    }    
    
}

