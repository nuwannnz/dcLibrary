
function onFileSelect(){
    var inputFile = document.getElementById('input-file');
    if(inputFile.files.length > 0){
        var form = document.getElementById('upload-form');
        loadPic('');
    }

}

function loadPic(event){
    var inputFile = document.getElementById('input-file');

    //prevent form from submitting
    //event.preventDefault();

    var file = inputFile.files[0];
    var formData = new FormData();

    formData.append('input-file',file,file.name);
    loadAjax(formData);
    return false;
    
}


//ajax to upload the profile pic
function loadAjax(formDataObj){
    var image = document.getElementById('preview-image');
    var uploadButton = document.getElementById('upload-button');
    var confirmButton = document.getElementById('confirm-button');
    var progressBar = document.getElementById('progressbar');
    var imageName = document.getElementById('image-name');
    
    var xmlHttp = new XMLHttpRequest();
    
    image.style.opacity = "0.4";
    progressBar.style.display = "inline-block";

    xmlHttp.onreadystatechange = function (){
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
            image.attributes.src.value = xmlHttp.responseText;
            image.style.opacity = "1";
            progressBar.style.display = "none";
            uploadButton.value = "Upload a photo"; 
            confirmButton.style.display = "block";        
            imageName.value = xmlHttp.responseText;               
        }
    }

    uploadButton.value = "Uploading...";
    xmlHttp.open("POST", "../../submit_forms/profile_pic_upload_submit.php" , true);
    xmlHttp.send(formDataObj);

}

function submitDefault(){
    document.getElementById('use-default').value = 1;
    document.getElementById('upload-form').submit();
}