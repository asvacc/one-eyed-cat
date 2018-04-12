$(document).ready(function(){
    initHeadhesive();
    initMobileNav();
    initHomepageSlider();
    initAnchorScrolling();
});

function initMobileNav(){
    $('nav .burger').on('click', function(e){
        $('.burger').toggleClass('active');
        $('.mobile-nav').toggleClass('active');
        $('.mobile-mask').toggleClass('active');
        $('body').toggleClass('mobile-nav-active');
    }); 
}

function initHeadhesive(){
    var options = {
        offset: "header",
        offsetSide: 'bottom'
    }

    var header = new Headhesive('nav.desktop-nav', options);
}

function initHomepageSlider(){
    $header = $('header');
    $slides = $header.find('.slides');
    $controls = $header.find('.controls');
    $speed = $('header').data('speed');

    var slideshow = window.setInterval(function(){
        aslideshow();
    }, $speed);

    $controls.find('.dot').click(function(e){
        window.clearInterval(slideshow);
        $number = $(this).data("slide");
        $controls.find('.dot.active').removeClass('active');
        $(this).addClass('active');
        $slides.find('.active').removeClass('active');
        $active = $slides.find('.slide[data-slide='+$number+']');
        $active.addClass("active");

        slideshow = window.setInterval(function(){
            aslideshow();
        }, $speed);

    });

    function aslideshow(){
        if($slides.find('.active').next().length < 1){
            $slides.find('.active').removeClass('active');
            $controls.find('.active').removeClass('active');
            $slides.find('.slide').first().addClass('active');
            $controls.find('.dot').first().addClass('active');
        } else {
            $slides.find('.active').removeClass('active').next().addClass('active');
            $controls.find('.active').removeClass('active').next().addClass('active');
        }
    }
}

function initAnchorScrolling(){
    $('a[href^="#"]').click(function(e) {
        e.preventDefault();
        $(window).stop(true).scrollTo(
            this.hash,
            {
                duration:500,
                offset: -$('.headhesive').innerHeight()
            }
        );
    });
} 

function initMap() {
    if($('#map').length > 0){
        var mapOptions = {
            zoom: 14,
            center: new google.maps.LatLng(42.88644679999999, -78.8783689),
            styles: [
                {
                    "featureType": "all",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "saturation": 36
                        },
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 40
                        }
                    ]
                },
                {
                    "featureType": "all",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "all",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 17
                        },
                        {
                            "weight": 1.2
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "saturation": "-100"
                        },
                        {
                            "lightness": "-54"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "lightness": "0"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "saturation": "-89"
                        },
                        {
                            "lightness": "-55"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 29
                        },
                        {
                            "weight": 0.2
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 18
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 19
                        }
                    ]
                },
                {
                    "featureType": "transit.station",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "saturation": "-100"
                        },
                        {
                            "lightness": "-51"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                }
            ],
            disableDefaultUI: true
        };
    var map = new google.maps.Map(document.getElementById('map'), mapOptions);
    }
}