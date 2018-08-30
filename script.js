var slideIndex = 1;

showImage(slideIndex);

function plusIndex(n){
    showImage(slideIndex += n);
}

function showImage(n){
    var slide=document.getElementsByClassName("slides");
    var dots=document.getElementsByClassName("dots");
    
    if (n > slide.length){
        slideIndex = 1
    };
    
    if (n < 1){slideIndex = slide.length};
        
    for (var i=0 ; i < slide.length ; i++ ) {
        slide[i].style.display = "none";
    } ; 
    slide[slideIndex-1].style.display = "block";
    
    for (i=0;i<dots.length;i++) {

        dots[i].className = dots[i].className.replace(" active","");

    };


    
    dots[slideIndex - 1].className += " active";
    
    
}

function currentslide(n){
    showImage(slideIndex = n);
}

//-----------------------------------------------------------
    
 function alertpopup() {
    alert("Login First!");
}   
 function bookalert() {
    alert("Your Taxi Will Arive Soon!");
} 
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


