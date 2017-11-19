"use strict";

$(function() {

	// Open DropDown menu
	$(".catList").click(function(e){
		var targetId = e.target.getAttribute('id');
		$(".subdrop").removeClass("show");
        $("#s"+targetId).toggleClass("show");
        
		$(".catList i").removeClass("fa-chevron-up");
        $(".catList i").addClass("fa-chevron-down");
        $("#"+targetId+" i").removeClass("fa-chevron-down");
        $("#"+targetId+" i").addClass("fa-chevron-up");
    });
});

var slideIndex = 0;

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1;} 
    slides[slideIndex-1].style.display = "block"; 
    setTimeout(showSlides, 3000); // Change image every 2 seconds
}

function plusSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slideIndex += n;
    if (slideIndex> slides.length) {slideIndex = 1;} 
    if (slideIndex< 1) {slideIndex = slides.length;} 
    slides[slideIndex-1].style.display = "block"; 
}

showSlides();
