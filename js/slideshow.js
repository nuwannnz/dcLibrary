var slideIndex = 0;
showSlide();

function showSlide(){
    var slides = document.getElementsByClassName('slide');

    //hide all the slides
    for(var i=0; i < slides.length; i++ ){
        slides[i].style.display = "none";
    }

    //increment the slideIndex
    slideIndex++;

    if(slideIndex > slides.length){
        slideIndex = 1;
    }

    slides[slideIndex -1].style.display = "block";
    setTimeout(showSlide,3000);
}