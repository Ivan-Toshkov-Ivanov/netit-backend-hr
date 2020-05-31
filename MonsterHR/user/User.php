<?php

namespace user;

class User {
    
   
    public static function username() {
       return $_SESSION['user_reference']['username'];
    }
    
    public static function email() {
       return $_SESSION['user_reference']['email'];
    }    
    
    public static function role() {
       return $_SESSION['user_reference']['role'];
    }
     public static function id() {
       return $_SESSION['user_reference']['id'];
    }
    public static function isLoged() {
        return isset($_SESSION['user_reference']);
    }    
    
    public static function isNotLoged() {
        return !self::isLoged();
    }
    
    public static function isAdmin() {
        return (self::role() == 'SUPER');
    }
    
    public static function isRegular() {
        return self::role() == 'EMPLOY';
    }    
    
    public static function isHR() {
        return self::role() == 'HR';
    }    
    public static function isCompany(){
        return self::role() == 'COMPANY';
    }
    public static function set($userObject) {
        $_SESSION['user_reference'] = $userObject;
        

    }
      public static function logout() {
        session_destroy();
    }    
    public static function userFname($userId){
        $query =  "SELECT fname FROM monster.user_personal_data WHERE user_id={$userId}";
        
         \db\Database::getInstance()->query($query);
             $row = \db\Database::getInstance()->fetch();
           return $row['fname'];
    }
    
    public static function userLname($userId){
        $query =  "SELECT lname FROM monster.user_personal_data WHERE user_id={$userId}";
        
         \db\Database::getInstance()->query($query);
             $row = \db\Database::getInstance()->fetch();
           return $row['lname'];
    }
    public static function userCity($userId){
        $query =  "SELECT city FROM monster.user_personal_data WHERE user_id={$userId}";
        
         \db\Database::getInstance()->query($query);
             $row = \db\Database::getInstance()->fetch();
           return $row['city'];
    }
    public static function userAge($userId){
        $query =  "SELECT age FROM monster.user_personal_data WHERE user_id={$userId}";
        
         \db\Database::getInstance()->query($query);
             $row = \db\Database::getInstance()->fetch();
           return $row['age'];
    }
    public static function userEducation($userId){
        $query =  "SELECT education FROM monster.user_personal_data WHERE user_id={$userId}";
        
         \db\Database::getInstance()->query($query);
             $row = \db\Database::getInstance()->fetch();
           return $row['education'];
    }
    
 
    
    
    
    
    public static function login($email, $password) {
        
        if(User::isAvailable($email, $password)) {
            
            $queryResult = \db\Database::getInstance()->query("SELECT * FROM monster.users WHERE email = '{$email}' AND password = '{$password}'");
            return \db\Database::getInstance()->fetch();            
        }
        
        return false;
    }
        
    public static function isAvailable($email, $password) {
        
     
        \db\Database::getInstance()->query("SELECT COUNT(*) AS number_of_rows FROM monster.users WHERE email = '{$email}' AND password = '{$password}'");
        $collection = \db\Database::getInstance()->fetch();

          return ($collection['number_of_rows'] == 1);         
    }


    
    public static function registration($username, $email, $password,$role) {
        
        \db\Database::getInstance()->query("INSERT INTO monster.users(username, email, password, role)" 
                        ."VALUES('{$username}', '{$email}', '{$password}', '{$role}')");
                        
        if(\db\Database::getInstance()->lastInsertedId()) {
            return true;
        }
        
        return false;
    }
    public static function about($fname,$lname,$city,$age,$education,$userId) {
        
        $query = "INSERT INTO monster.user_personal_data(fname,lname,city,age,education,user_id)"
                . "VALUES('{$fname}','{$lname}','{$city}','{$age}','{$education}',{$userId})";
       
               \db\Database::getInstance()->query($query);  
                return \db\Database::getInstance()->lastInsertedId(); 
    
    }
    
    public static function UserAboutAvailable($fname,$lname,$city,$age,$education,$userId){
        \db\Database::getInstance()->query("SELECT COUNT(*) AS number_of_rows FROM monster.user_personal_data "
                . "WHERE fname='{$fname}'AND lname='{$lname}'AND city='{$city}'AND age='{$age}'AND education='{$education}'AND user_id={$userId}");
        $collection = \db\Database::getInstance()->fetch();
          return ($collection['number_of_rows'] == 1);     
    }
    

    
}
