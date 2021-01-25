"use strict";

// SLide selector
const track = document.querySelector(".carousel__track");

const slides = Array.from(track.children);
const countSlides = slides.length;
var slideChange = slides.length;
const nextButton = document.querySelector(".carousel__button--right");
const prevButton = document.querySelector(".carousel__button--left");
const dotsNav = document.querySelector(".carousel__nav");
const dots = Array.from(dotsNav.children);
const slideWidth = slides[0].getBoundingClientRect().width;

class Slide {
    setSlidePosition() {
      slides.forEach((slide, index) => {
        slide.style.left = slideWidth * index + "px";
      });
    }
  
    nextSlide() {
      nextButton.addEventListener("click", (e) => {
        slideChange = slideChange + 1;
        const nextIndex = slideChange % countSlides; // nextIndex for slide and indicator
        const nextSlide = slides[nextIndex];
        const currentSlide = track.querySelector(".current-slide");
        // const nextSlide = currentSlide.nextElementSibling;
  
        const currentDot = dotsNav.querySelector(".is-selected");
  
        // nextDot = currentDot.nextElementSibling;
        const nextDot = dots[nextIndex];
  
        // const amountToMove = nextSlide.style.left;
        // track.style.transform = "translateX( -" + amountToMove + ")";
        // currentSlide.classList.remove("current-slide");
        // nextSlide.classList.add("current-slide");
        Supporter.moveToSlide(track, currentSlide, nextSlide);
        Supporter.updateDots(currentDot, nextDot);
      });
    }
  
    prevButton() {
      prevButton.addEventListener("click", (e) => {
        slideChange = slideChange - 1;
        const prevIndex = Math.abs(slideChange % countSlides);
        const prevSlide = slides[prevIndex];
        const currentSlide = track.querySelector(".current-slide");
        // const prevSlide = currentSlide.previousElementSibling;
        const currentDot = dotsNav.querySelector(".is-selected");
        // const prevDot = currentDot.previousElementSibling;
        const prevDot = dots[prevIndex];
  
        Supporter.moveToSlide(track, currentSlide, prevSlide);
        Supporter.updateDots(currentDot, prevDot);
      });
    }
  
    dotsNav() {
      dotsNav.addEventListener("click", (e) => {
        const targetDot = e.target.closest("button");
  
        if (!targetDot) return;
  
        const currentSlide = track.querySelector(".current-slide");
        const currentDot = dotsNav.querySelector(".is-selected");
        const targetIndex = dots.findIndex((dot) => dot === targetDot);
        // Update slide change
        slideChange = targetIndex;
        // console.log(targetIndex);
  
        const targetSlide = slides[targetIndex];
  
        Supporter.moveToSlide(track, currentSlide, targetSlide);
        Supporter.updateDots(currentDot, targetDot);
      });
    }
  }
  
  
class Supporter {
    // Slide
    static moveToSlide(track, currentSlide, targetSlide) {
      track.style.transform = "translateX( -" + targetSlide.style.left + ")";
      currentSlide.classList.remove("current-slide");
      targetSlide.classList.add("current-slide");
    }
  
    static updateDots(currentDot, targetDot) {
      currentDot.classList.remove("is-selected");
      targetDot.classList.add("is-selected");
    }
}


document.addEventListener("DOMContentLoaded", () => {
    const slide = new Slide();
      // Slide
    slide.setSlidePosition();
    slide.nextSlide();
    slide.prevButton();
    slide.dotsNav();
});
