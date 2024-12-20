<div class="container-fluid color_quaternary_bg mb-5">
    <div class="container pb-lg-5 pb-4">
        <div class="swiper carrer_icon_swiper">
            <div class="swiper-wrapper flex-lg-wrap ">
                <?php $iconItems = $args['page_templates']['career_page']['perks']['items']; 
                    foreach ($iconItems as $value) {
                        echo'<div class="swiper-slide col-lg-4 pt-5 text-lg-start text-center pe-lg-4">
                    <div class="d-flex align-items-center justify-content-lg-start justify-content-center">
                        <div class="carrer_icon_inner mw-50 text-start me-lg-3">
                            <i class="'.$value['icon'].'  text_36 line_height_30 color_primary"></i>
                        </div>
                        <div class="carrer_title">
                            <h3 class=" mb-0">'.$value['heading'].'</h3>
                        </div>
                    </div>
                </div>';
                } ?> 
            

            </div>
        </div>
        <div class="swiper-pagination carrer_icon_pagination .pagination-variation-a position-relative d-lg-none"></div>
    </div>
</div>    
    <script>
        jQuery(document).ready(function(){
            var swiperIconB = new Swiper(".carrer_icon_swiper", {
                spaceBetween: 10,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                  },
                pagination: {
                  el: ".carrer_icon_pagination",
                  clickable: true,
                },
                breakpoints: {
                  640: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                    noSwiping: false,
                    allowSlidePrev: false,
                    allowSlideNext: false,
                    autoHeight:true,
                  },
                  768: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                    noSwiping: false,
                    allowSlidePrev: true,
                    allowSlideNext: true,
                  },
                  992: {
                    slidesPerView: 6,
                    spaceBetween: 0,
                    noSwiping: true,
                    allowSlidePrev: false,
                    allowSlideNext: false,
                  },
                },
            });
        });
    </script>