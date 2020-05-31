
var postContainer                        = document.getElementById("post-container");
var candidatesContainer                  = document.getElementById("candidates-container");

var candidateMessageInput                = document.getElementById("candidate-message");
var candidateMessageButton               = document.getElementById("candidate-massege-button");
var candidatesStatusEditor               = document.getElementById("candidateStatusEditor");
var candidateStatusSubmit                = document.getElementById("candidateStatusSubmit");  
var candidatesCollectionReference = [];
var candidatesOptionReference = [];
var postCollectionReference = [];
var candidatesStatusReference = [];

candidatesStatusEditor.style.display = 'none';
candidateMessageInput.style.display = 'none';
candidateMessageButton.style.display = 'none';
candidateStatusSubmit.style.display = 'none';

var renderPost = function() {
    
    Ajax.getJSON('posts/getJobsByCompany', function(collection) {
        
        postCollectionReference = collection;
        renderPostContainer(postCollectionReference);
       
    });  
  
};


var renderPostContainer = function(collection) {

    var templateCollection = [];
      
    for(var $index = 0; $index < collection.length; $index++) {
        
       
        var element = collection[$index];
        var template = `<div class="mt-3">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                  <div>ID:${element.id}</div> 
                                  <div>Position:${element.position}</div> 
                                  <div>Industry:${element.industry}</div> 
                                  <div>City:${element.city}</div>
                                  <div>Company:${element.company}</div>
                                  <div>Description:${element.description}</div> 
                                </div>
                                </div>
                              <div class="row"> 
                                <div class="col-sm">    
                                    <button class="btn btn-danger" onclick="jobCandidates(${element.id})">Candidates</button>
                                </div>                           
                              </div>  
                            </div>
                        </div>`;
       
        templateCollection.push(template);
 
       }
        postContainer.innerHTML = templateCollection.join('');

};
renderPost();

var jobCandidates = function(index) {
          
    Ajax.getJSON(`candidates/index/${index}`, function(collection) {
  
        candidatesCollectionReference = collection;
        renderJobCandidates(candidatesCollectionReference);
      
     });
 
};

var renderJobCandidates = function(collection) {
 
   
    var templateCollection = [];
    for(var $index = 0; $index < collection.length; $index++) {
        
        var element = collection[$index];
        var template = `<div class="mt-3">
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                  <div>First name:${element.fname}</div> 
                                  <div>Last name:${element.lname}</div> 
                                  <div>City:${element.city}</div>
                                  <div>Age:${element.age}</div>
                                  <div>Education:${element.education}</div> 
                                  <div>JobID:${element.job_id}</div>
                                  <div>Status:${element.status}</div>  
                                  <div>UserID:${element.user_id}</div>  
                                  
                                <button class="btn btn-danger" onclick="renderStatuses(${element.id})">Edit Status</button>
                                <button class="btn btn-primary" onclick="renderMessage(${element.user_id})">Message</button>
                                <button class="btn btn-danger" onclick="deleteCandidate(${element.id})">Delete</button>
                                </div>
                              </div>
                            </div>
                        </div>`;

     templateCollection.push(template); 
     candidatesContainer.innerHTML = templateCollection;

        }
  
};

 var renderStatuses = function(index){
   candidatesContainer.style.display = 'none';
   candidatesStatusEditor.style.display = 'inline-block';
   candidateStatusSubmit.style.display = 'inline-block'
   
    Ajax.getJSON(`candidates/listStatus`, function(collection) {
        var templateCollection = [];
    
    for(var $index = 0; $index < collection.length; $index ++) {
         var element = collection[$index];
         var template = `<option name = "statusOption"  value="${element.status}">${element.status}</option>`;

     templateCollection.push(template);
    candidatesStatusEditor.innerHTML = templateCollection.join('');
 
    } 
    });
    Ajax.getJSON(`candidates/index/${index}`, function(collection) {
     
    var  templateSubmit = []; 
    var templateStatusSubmit = `<button class="btn btn-primary" onclick="editStatusCandidate(${index})">Submit</button>`;
    templateSubmit.push(templateStatusSubmit);
    candidateStatusSubmit.innerHTML = templateSubmit;
     
 });
    
 }


var editStatusCandidate = function(index){
   candidatesContainer.style.display = 'none';
   candidatesStatusEditor.style.display = 'inline-block';
   candidateStatusSubmit.style.display = 'inline-block'
  var status = candidateStatusEditor.value;
  
    Ajax.post(`candidates/updateStatus/?id=${index}&status=${status}`, function() {
       
    });  
    
};



var renderMessage = function(index){
   candidatesContainer.style.display = 'none';
   candidatesStatusEditor.style.display ='none';
   candidateMessageInput.style.display = 'block';
   candidateMessageButton.style.display = 'block'; 
   
   Ajax.getJSON(`candidates/index/${index}`, function(collection) {
    var templateMessage = [];
    var templateMessageSend = `<button class="btn btn-primary" onclick="sendMessage(${index})">Send</button>`;
    templateMessage.push(templateMessageSend);
    candidateMessageButton.innerHTML = templateMessage;
});
     
};
 
var sendMessage = function(index){
          
        var message = candidateMessageInput.value;
        Ajax.post(`candidates/message/?id=${index}&message=${message}`, function(){
        
     });
    };
    
 var deleteCandidate = function(index) {
     Ajax.post(`candidates/delete/${index}`, function(){
        
     });
 };