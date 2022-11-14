let slideIndex=1;function plusSlides(e){showSlides(slideIndex+=e)}function currentSlide(e){showSlides(slideIndex=e)}function showSlides(e){let s;for(e>slides.length&&(slideIndex=1),e<1&&(slideIndex=slides.length),s=0;s<slides.length;s++)slides[s].style.display="none";slides[slideIndex-1].style.display="block"}showSlides(slideIndex);
//# sourceMappingURL=carrusel.js.map
