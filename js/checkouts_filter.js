
//ajax to get search results for checkouts
function onFilter(filterText){
    if(filterText.length >0){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("checkoutTable").innerHTML = this.responseText;
            }
        };
        

        var filterRadio = document.getElementsByName("filterMode");
        var filter;
        for(var i=0 ;i<filterRadio.length; i++){
            if(filterRadio[i].checked == true){
                filter = filterRadio[i].value;
            }            
        }
        
        if(filter == 'isbn'){
            xmlhttp.open("GET", "../../submit_forms/checkout_filter_submit.php?isbn=" + filterText, true);
        }else if(filter == 'userId'){
            xmlhttp.open("GET", "../../submit_forms/checkout_filter_submit.php?userId=" + filterText, true);
        }else if(filter == 'date'){
            xmlhttp.open("GET", "../../submit_forms/checkout_filter_submit.php?date=" + filterText, true);
        }
        xmlhttp.send();
    }
}

//ajax to get search results for checkins
function onFilterCheckin(filterText){
    if(filterText.length >0){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("checkinTable").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET", "../../submit_forms/checkin_filter_submit.php?checkoutId=" + filterText, true);
        xmlhttp.send();
    }
}
