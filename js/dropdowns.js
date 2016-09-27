function toggleDropdown(){
    var dropdown = document.getElementsByClassName('dropdown-menu-container');

    dropdown[0].classList.toggle('show');
    if(dropdown[0].classList.contains('show')){
        document.getElementById('profile-icon').classList.add('profile-icon-selected');
    }
}

window.onclick = function(event){
    if(!event.target.matches('.clickable')){

        var dropdown = document.getElementsByClassName('dropdown-menu-container');
        if(dropdown[0].classList.contains('show')){
            dropdown[0].classList.remove('show');
            document.getElementById('profile-icon').classList.remove('profile-icon-selected');
        }
    }

    
    
}