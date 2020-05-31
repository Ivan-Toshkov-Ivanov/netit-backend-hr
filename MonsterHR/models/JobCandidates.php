<?php

namespace models;

class JobCandidates {

    
    public static function fetchByJob($jobId = null) {
        $query = $query = "SELECT * FROM monster.job_candidates WHERE job_id = {$jobId}";
     
        \db\Database::getInstance()->query($query);
        return \db\Database::getInstance()->fetchCollection();
    } 
  
    public static function listCandidates($companyId = null) {
           $query = "SELECT * FROM monster.job_candidates WHERE company_id={$companyId}";
           \db\Database::getInstance()->query($query);
           return \db\Database::getInstance()->fetchCollection('id');
           
        }
    public static function deleteCandidate($Id) {
        
         $query = "DELETE FROM monster.job_candidates WHERE id={$Id}";
          \db\Database::getInstance()->query("DELETE FROM monster.job_candidates WHERE id={$Id}");
           return (\db\Database::getInstance()->affectedRows() == 1); 
    }
    public static function updateStatus($id,$status){
        $query = "UPDATE monster.job_candidates SET status='{$status}'WHERE id={$id}";
        \db\Database::getInstance()->query($query);
        
        return (\db\Database::getInstance()->affectedRows() == 1);    
    }
    public static function fetchCandidatesByUser($userId){
        $query = "SELECT monster.job_posts.position,monster.job_posts.company,monster.job_candidates.status,monster.job_candidates.job_id FROM monster.job_candidates "
        . "INNER JOIN monster.job_posts ON monster.job_candidates.job_id=monster.job_posts.id WHERE monster.job_candidates.user_id={$userId}";
        \db\Database::getInstance()->query($query);
           return \db\Database::getInstance()->fetchCollection();
    }
    public static function fetchStatus(){
        $query = "SELECT * FROM monster.status";
         \db\Database::getInstance()->query($query);
           return \db\Database::getInstance()->fetchCollection();

        
    }
    public static function message ($userId,$HRid,$message){
        $query = "INSERT INTO monster.messages (user_id,hr_id,message) VALUES('{$userId}','{$HRid}','{$message}')";
         \db\Database::getInstance()->query($query);  
       return \db\Database::getInstance()->lastInsertedId();
    }
    public static function messageByUser($userId){
        $query = "SELECT monster.hr_personal_data.fname,monster.hr_personal_data.lname,monster.hr_personal_data.company,monster.messages.message FROM monster.messages "
                . "INNER JOIN monster.hr_personal_data ON monster.hr_personal_data.hr_id=monster.messages.hr_id WHERE monster.messages.user_id={$userId}";
         \db\Database::getInstance()->query($query);
           return \db\Database::getInstance()->fetchCollection();        
    }
}

