var contentContainer           = document.getElementById("content");
var postCollection             = []; 
var objectCollection           = { postCollection : [] };
var contentFullView            = document.getElementById("content-fullview");
var contentFullViewJobpost     = document.getElementById("content-fullview-jobpost");
var applyJob                   = document.getElementById("applyjob");
var jobId                      = document.getElementById("job_id");
var jobPosition                = document.getElementById("job_position");
var jobIndustry                = document.getElementById("industry");
var jobCompany                 = document.getElementById("company");
var jobCity                    = document.getElementById("city");
var jobDescription             = document.getElementById("description");

applyJob.style.display = 'none';

var renderFullView = function(postId) {
    
    Ajax.getJSON(`posts/index/${postId}`, function(element) {
        
        contentFullView.style.display       = "block";
        jobId.innerHTML                     = element[0].id;
        jobPosition.innerHTML               = element[0].position;
        jobCity.innerHTML                   = element[0].city;
        jobCompany.innerHTML                = element[0].company;
        jobDescription.innerHTML            = element[0].description;
        contentContainer.style.display      = 'none';
        applyJob.style.display              = 'block';
        
  
    });
};

applyJob.addEventListener('click', function(e) {
    
    var postId = jobId.innerHTML;
    console.log(jobId.innerHTML);
    Ajax.getJSON(`posts/applyJob/?id=${postId}`, function(data) {
     renderFullView(postId);   
    });
});
   

var renderJobPost = function(collection) {
    
    for(var $index = 0; $index < collection.length; $index ++) {
        var element = collection[$index];
        var template =`
                       
                       <div class='job-post'>
                       <div class='job-id'>${element.id}</div>
                       <div class='job-position'>${element.position}</div>
                       <div class='job-city'>${element.city}</div>
                       <div class='job-company'>${element.company}</div>
                       <button onclick="renderFullView(${element.id})"> Read </button>
                       </div>
                       
                          `;
       
        postCollection.push(template);
    }
    
    var postTemplate = postCollection.join('');
    contentContainer.innerHTML = postTemplate;
    
    
};



Ajax.getJSON("posts", function(collection) {
    renderJobPost(collection);
}, function() {
    console.log("GET error")
    console.log(error);            
});




