var candidatesMessageContainer                  = document.getElementById("candidates-message-container");
var candidatesCollectionReference = [];


var jobCandidates = function() {
           
    Ajax.getJSON(`candidates/messageByUser`, function(collection) {
        
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
                                  
                                  <div class="sender-fname">From:${element.fname}</div> 
                                  <div class="sender-lname">${element.lname}</div> 
                                  <div class="sender-company">Company:${element.company}</div> 
                                  <div class="message">Message:${element.message}</div>
                                  
                                </div>
                               </div>
                              </div>
                            </div>
                        </div>`;
        templateCollection.push(template);
    
    
    candidatesMessageContainer.innerHTML = templateCollection.join('');
    }
    
};
jobCandidates();

