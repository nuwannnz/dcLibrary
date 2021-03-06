

function changeTab(event,tabIndex){

    var tablinks , tabContents;

    //get all the tab contents and hide them
    tabContents = document.getElementsByClassName("tab-content");
    for(var i=0;i < tabContents.length ; i++ ){        
        tabContents[i].style.display = "none";
    }

    //make all the tab links inactive
    tablinks = document.getElementsByClassName("tablink");
    for(var i=0;i < tablinks.length ; i++ ){
        tablinks[i].className = tablinks[i].className.replace(" active-tab","");
    }

    // make the tab with the sent index visible and make the clicked link active
    tabContents[tabIndex].style.display = "block";
    event.currentTarget.className += " active-tab";
}

