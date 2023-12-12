$(document).ready(function(){
    const slider = $('.slider');
    const imagesCount = slider.find('img').length;
    let currentIndex = 0;

    function showImage(index) {
        const slideWidth = $('.slider img').width();
        const displacement = -slideWidth * index;
        slider.css('transform', 'translateX(' + displacement + 'px)');
    }

    // Auto slide function
    function autoSlide() {
        currentIndex = (currentIndex + 1) % imagesCount;
        showImage(currentIndex);
    }

    let slideInterval = setInterval(autoSlide, 3000); // Change slide every 3 seconds

    // Pause auto slide on hover
    $('.slider-container').hover(function() {
        clearInterval(slideInterval);
    }, function() {
        slideInterval = setInterval(autoSlide, 3000);
    });
});
