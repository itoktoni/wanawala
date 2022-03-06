<script>
    $(document).ready(function() {

        $('.carousel').each(function() {
            var slider = $(this);
            slider.slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: false,
                arrows: false,
                infinite: true,
                responsive: [{
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            dots: true,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true,
                        }
                    }
                ]
            });

            var sLightbox = $(this);
            sLightbox.slickLightbox({
                src: 'src',
                itemSelector: '.box-image img'
            });
        });
    });
</script>