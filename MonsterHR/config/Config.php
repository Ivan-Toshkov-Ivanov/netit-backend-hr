<?php
namespace config;

class Config {
    
    //public const DB_HOST = 'localhost';
   // public const DB_USER =  'root';
   // public const DB_NAME ='cms';
    //public const DB_PASS ='';
    
    public static function db() {
        
        return array(
            'db_host' => 'localhost' ,
            'db_user' => 'root' ,
            'db_name' => 'monster' ,
            'db_pass' => ''
        );
    }
}