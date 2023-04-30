$(document).ready(function () {
    $('.slider').slick({
        arrows: true,
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 5,
        cssEase: 'linear',
        responsive: [
            {
                breakpoint: 960,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 720,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 540,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    })
})
