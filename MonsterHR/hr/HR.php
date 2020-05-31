<?php

namespace hr;

class HR {
    
    public static function aboutHR($fname,$lname,$city,$age,$company,$hrId) {
        
        $query = "INSERT INTO monster.hr_personal_data(fname,lname,city,age,company,hr_id)"
                . "VALUES('{$fname}','{$lname}','{$city}','{$age}','{$company}',{$hrId})";
       
               \db\Database::getInstance()->query($query);  
                return \db\Database::getInstance()->lastInsertedId(); 

    }
     public static function HRAboutAvailable($fname,$lname,$city,$age,$company,$userId){
        \db\Database::getInstance()->query("SELECT COUNT(*) AS number_of_rows FROM monster.hr_personal_data "
                . "WHERE fname='{$fname}'AND lname='{$lname}'AND city='{$city}'AND age='{$age}'AND company='{$company}'AND hr_id={$userId}");
        $collection = \db\Database::getInstance()->fetch();
          return ($collection['number_of_rows'] == 1);     
    }
  
    
    public static function hrFname($HRid){
        $query =  "SELECT fname FROM monster.hr_personal_data WHERE hr_id={$HRid}";
        
         \db\Database::getInstance()->query($query);
             $row = \db\Database::getInstance()->fetch();
           return $row['fname'];
    }
    
    public static function hrLname($HRid){
        $query =  "SELECT lname FROM monster.hr_personal_data WHERE hr_id={$HRid}";
        
         \db\Database::getInstance()->query($query);
             $row = \db\Database::getInstance()->fetch();
           return $row['lname'];
    }
    public static function hrCity($HRid){
        $query =  "SELECT city FROM monster.hr_personal_data WHERE hr_id={$HRid}";
        
         \db\Database::getInstance()->query($query);
             $row = \db\Database::getInstance()->fetch();
           return $row['city'];
    }
    public static function hrAge($HRid){
        $query =  "SELECT age FROM monster.hr_personal_data WHERE hr_id={$HRid}";
        
         \db\Database::getInstance()->query($query);
             $row = \db\Database::getInstance()->fetch();
           return $row['age'];
    }
   public static function HRcompany($HRid){
        $query =  "SELECT company FROM monster.hr_personal_data WHERE hr_id={$HRid}";
        
         \db\Database::getInstance()->query($query);
             $row = \db\Database::getInstance()->fetch();
           return $row['company'];
    }
    
}

