function validateRegisterForm(){
    //get references to inputs
    var regId = document.getElementById('regId');
    var email = document.getElementById('email');
    var uname = document.getElementById('uname');
    var pword = document.getElementById('pword');

    //get references to error texts
    var regid_error = document.getElementById('regid_error');
    var email_error = document.getElementById('email_error');
    var uname_error = document.getElementById('uname_error');
    var pword_error = document.getElementById('pword_error');

    //hide all the error messages
    regid_error.style.display = "none";
    email_error.style.display = "none";
    uname_error.style.display = "none";
    pword_error.style.display = "none";

    

    switch ('') {
        case regId.value:
            regid_error.style.display = "inline-block";
            return false;
        case email.value:
            email_error.style.display = "inline-block";
            return false;
        case uname.value:
            uname_error.style.display = "inline-block";
            return false;
        case pword.value:
            pword_error.style.display = "inline-block";
            return false;            
    }

    return true;
    
}

function validateLoginForm(){
    //get references to inputs    
    var uname = document.getElementById('uname');
    var pword = document.getElementById('pword');

    //get references to error texts    
    var uname_error = document.getElementById('uname_error');
    var pword_error = document.getElementById('pword_error');

    //hide all the error messages   
    uname_error.style.display = "none";
    pword_error.style.display = "none";

    

    switch ('') {       
        case uname.value:
            uname_error.style.display = "inline-block";
            return false;
        case pword.value:
            pword_error.style.display = "inline-block";
            return false;            
    }

    return true;
    
}

function submitSearch(){
    var searchText = document.getElementById('searchText');
    if(searchText.value == ''){
        return false;
    }else{
        return true;
    }
}


function validateUnameUpdateForm(){
    //get references to inputs    
    var uname = document.getElementById('uname');    

    //get references to error texts    
    var uname_error = document.getElementById('uname_error');    

    //hide all the error messages   
    uname_error.style.display = "none";    


    if(uname.value == ''){
            uname_error.style.display = "inline-block";
            return false;                    
    }

    return true;
    
}

function validatePwordUpdateForm(){
    //get references to inputs       
    var pword = document.getElementById('pword');
    var newPword = document.getElementById('newPword');
    var newRPword = document.getElementById('newPwordRepeat');

    //get references to error texts        
    var pword_error = document.getElementById('pword_error');
    var new_pword_error = document.getElementById('new_pword_error');
    var new_pword_repeat_error = document.getElementById('new_pword_repeat_error');

    //hide all the error messages   
    
    pword_error.style.display = "none";
    new_pword_error.style.display = "none";
    new_pword_repeat_error.style.display = "none";
    

    switch ('') {               
        case pword.value:
            pword_error.style.display = "inline-block";
            return false;
        case newPword.value:
            new_pword_error.style.display = "inline-block";
            return false;
        case newRPword.value:
            new_pword_repeat_error.innerHTML = "Please re-type the password";
            new_pword_repeat_error.style.display = "inline-block";
            return false;            
    }

    if(newPword.value != newRPword.value){
        new_pword_repeat_error.innerHTML = "Passwords does not match";
        new_pword_repeat_error.style.display = "inline-block";
        return false;
    }

    return true;
    
}