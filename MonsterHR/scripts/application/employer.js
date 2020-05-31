var adminJobEditorForm            = document.getElementById("employer-editor");
var adminJobEditorFormSubmit      = document.getElementById("employer-editor-submit");
var adminJobEditorFormEditCancel  = document.getElementById("employer-editor-edit-cancel");

var jobPositionInput                = document.getElementById("job_position");
var jobIndustryInput                = document.getElementById("industry");
var jobCompanyInput                 = document.getElementById("company");
var jobCityInput                    = document.getElementById("city");
var jobDescriptionInput             = document.getElementById("description");

var messageBaner                    = document.getElementById("message-baner");
var postContainer                   = document.getElementById("post-container");

// State style
messageBaner.style.display                      = "none";
adminJobEditorFormEditCancel.style.display      = "none";

var postId                  = null;
var postCollectionReference = [];


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
                                  <div>Position:${element.position}</div> 
                                  <div>Industry:${element.industry}</div> 
                                  <div>City:${element.city}</div>
                                  <div>Company:${element.company}</div>
                                  <div>Description:${element.description}</div> 
                                </div>
                                </div>
                              <div class="row"> 
                                <div class="col-sm">
                                    <button class="btn btn-primary" onclick="editPost(${$index})">Edit</button>
                                    <button class="btn btn-danger" onclick="deletePost(${$index})">Delete</button>
                                </div>                           
                              </div>  
                            </div>
                        </div>`;
        templateCollection.push(template);
    
    
    postContainer.innerHTML = templateCollection.join('');
    }
    
};



var editPost = function(index) {
    
    jobPositionInput.value                         = postCollectionReference[index].position;
    jobIndustryInput.value                         = postCollectionReference[index].industry;
    jobCompanyInput.value                          = postCollectionReference[index].company;
    jobCityInput.value                             = postCollectionReference[index].city;
    jobDescriptionInput.value                      = postCollectionReference[index].description;
    postId                                         = postCollectionReference[index].id;
    adminJobEditorFormSubmit.value               = "EDIT";
    adminJobEditorFormEditCancel.style.display   = "inline-block";
};

var deletePost = function(index) {
    
    var URLEncodedRequest = {
        id    : postCollectionReference[index].id
    };
    
    Ajax.post('posts/delete', URLEncodedRequest, function() {
        renderPost();
   }, function() {
       console.log("Error");
   });  
};

renderPost();

adminJobEditorFormEditCancel.addEventListener('click', function() {
     
    adminJobEditorFormSubmit.value                = "submit";
    adminJobEditorFormEditCancel.style.display    = "none";
    postId                                        = null;
    jobPositionInput.value                        = null;
    jobIndustryInput.value                        = null; 
    jobCompanyInput.value                         = null;
    jobCityInput.value                            = null;
    jobDescriptionInput.value                     = null;  
    
});
 
adminJobEditorForm.addEventListener('submit', function(e) {
    
     e.preventDefault();
    
    var jobPositionInputValue     = jobPositionInput.value;
    var jobIndustryInputValue     = jobIndustryInput.value; 
    var jobCompanyInputValue      = jobCompanyInput.value; 
    var jobCityInputValue         = jobCityInput.value;
    var jobDescriptionInputValue  = jobDescriptionInput.value; 
    
    if(jobPositionInput.length < 3) {
        alert("You must enter at least 3 characters");
        return;
    };
    

    var URLEncodedRequest = {
        id           : postId,
        job_position : jobPositionInputValue,
        industry     : jobIndustryInputValue,
        company      : jobCompanyInputValue,
        city         : jobCityInputValue,
        description  : jobDescriptionInputValue
    };
    
    if(postId) {

             Ajax.post('posts/update', URLEncodedRequest, function(collection) {

                // success message
                messageBaner.style.display   = "block";
                jobPositionInput.value       = "";
                jobIndustryInput.value       = "";
                jobCompanyInput.value        = "";
                jobCityInput.value           = "";
                jobDescriptionInput.value    = "";

                // render group collection data
                postCollectionReference.push(collection[0]);
                renderPostContainer(postCollectionReference);

                // fade out 
                setTimeout(function() {
                    messageBaner.style.display  = "none";
                }, 3000);                
            }, function() {
                console.log("Error");
            });
    }
    else {
        
          Ajax.postJSON('posts/create', URLEncodedRequest, function(collection) {

            // success message
            messageBaner.style.display  = "block";
            jobPositionInput.value       = "";
            jobIndustryInput.value       = "";
            jobCompanyInput.value        = "";
            jobCityInput.value           = "";
            jobDescriptionInput.value    = "";

            // render group collection data
            postCollectionReference.push(collection[0]);
            renderPostContainer(postCollectionReference);

            // fade out 
            setTimeout(function() {
                messageBaner.style.display  = "none";
            }, 3000);                
        }, function() {
            console.log("Error");
        });   
    }
});


