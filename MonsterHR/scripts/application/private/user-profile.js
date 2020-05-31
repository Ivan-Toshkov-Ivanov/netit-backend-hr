var candidatesContainer                  = document.getElementById("candidates-container");
var candidatesCollectionReference = [];


var jobCandidates = function() {
           
    Ajax.getJSON(`candidates/fetchCandidatesByUser`, function(collection) {
        
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
                                  
                                  <div class="position">${element.position}</div> 
                                  <div class="company">${element.company}</div> 
                                  <div class="status">${element.status}</div>
                                  <div class="jobid">JobID:${element.job_id}</div>
                                </div>
                               </div>
                              </div>
                            </div>
                        </div>`;
        templateCollection.push(template);
    
    
    candidatesContainer.innerHTML = templateCollection.join('');
    }
    
};
jobCandidates();