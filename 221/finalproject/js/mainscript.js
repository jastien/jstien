//JS FOR SLIDESHOW
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
} //END JS FOR SLIDESHOW

// #1 EVENT: CHANGE MENU COLOR AT HOVER:
$("ul li a").hover(function() {
    $(this).css("color", "#02baff");
}); //END #1 EVENT

// #2 EVENT: CHANGE MENU COLOR BACK AT MOUSELEAVE:
$("ul li a").mouseleave(function() {
    $(this).css("color", "");
}); //END #2 EVENT

//1. and 2. jQuery effect
$('button').button();
$(document).ready(function() {
    $('#slideShow').hide()
    $("#hide").click(function() {
        $("#slideShow").hide();
    });
    $("#show").click(function() {
        $("#slideShow").show();
    });
});
//End 1. and 2. jQuery effect

//Calculate BMI function
function calculateBmi() {
    var weight = document.bmiForm.weight.value
    var height = document.bmiForm.height.value
    if (weight > 0 && height > 0) {
        var finalBmi = weight / (height / 100 * height / 100)
        document.bmiForm.bmi.value = finalBmi
        if (finalBmi < 18.5) {
            document.bmiForm.meaning.value = "That you are too thin."
        }
        if (finalBmi > 18.5 && finalBmi < 25) {
            document.bmiForm.meaning.value = "That you are healthy."
        }
        if (finalBmi > 25) {
            document.bmiForm.meaning.value = "That you have overweight."
        }
    }
    else {
        alert("Please Fill in everything correctly")
    }
}
//End calculate BMI function