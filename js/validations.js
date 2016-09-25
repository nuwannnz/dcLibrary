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