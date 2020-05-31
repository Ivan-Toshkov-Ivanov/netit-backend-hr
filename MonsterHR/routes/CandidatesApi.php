<?php

namespace routes;

class CandidatesApi {
    
    public function index($jobId = null) {
        $jobId = $_GET['id'];
        $collection = \models\JobCandidates::fetchByJob($jobId);
        echo json_encode($collection);
    }
    
    public function delete(){
        $Id = $_GET['id'];
        $response = \models\JobCandidates::deleteCandidate($Id);
    }
    public function updateStatus(){
        $id = $_GET['id'];
        $status = $_GET['status'];
        $response = \models\JobCandidates::updateStatus($id, $status);
    }
    public function fetchCandidatesByUser(){
        $userId = \user\User::id();
        $collection = \models\JobCandidates::fetchCandidatesByUser($userId);
        echo json_encode($collection);
    }
    public function listStatus(){
        $collection = \models\JobCandidates::fetchStatus();
        echo json_encode($collection);
    }
    public function message(){
        $userId = $_GET['id'];
        $HRid = \user\User::id();
        $message = $_GET['message'];
        $response = \models\JobCandidates::message($userId, $HRid, $message);
    }
    public function messageByUser(){
        $userId = \user\User::id();
        $collection = \models\JobCandidates::messageByUser($userId);
        echo json_encode($collection);
    }
}

