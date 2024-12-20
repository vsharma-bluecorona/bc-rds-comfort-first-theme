        <div class="d-block order-7 order-lg-7 ">
            <div class="container-fluid pt-lg-5">
    
                <div class="container mb-lg-5 position-relative">
                    <div class="row ">
                        <div class="col-lg-6 pb-lg-0 pb-2">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/careers/employee-1.webp" srcset="<?php echo get_stylesheet_directory_uri(); ?>/img/careers/employee-1.webp 1x, <?php echo get_stylesheet_directory_uri(); ?>/img/careers/employee-1@2x.webp 2x, <?php echo get_stylesheet_directory_uri(); ?>/img/careers/employee-1@3x.webp 3x" alt="Review Image" width="540" height="406
                            " class="img-fluid pl-3 mh-lg-406 object-fit w-100 employee-b-img">
                        </div>
                        <div class="col-lg-6">
                            <h4 class="text-center px-lg-5 mx-xl-4 mx-lg-2 pb-lg-4 pb-4 mt-4 mt-lg-0 mb-0"><?php echo $args['page_templates']['career_page']['employee_Of_the_month']['heading']; ?></h4>
                            <div class="swiper employee-review-swiper pt-1 text-start">
                                <div class="swiper-wrapper">

                             <?php $testimonialsItems = $args['page_templates']['career_page']['employee_Of_the_month']['items']; 
                            foreach ($testimonialsItems as $value) {
                                echo'<div class="swiper-slide">
                                        <div class="slide-icon d-flex align-items-end pb-3">
                                            <i class="icon-quote-left1 text_50 line_height_50 true_black me-3"></i>
                                            <i class="icon-star1 stars_color  text_15 line_height_42 me-1"></i>
                                            <i class="icon-star1 stars_color text_15 line_height_42 me-1"></i>
                                            <i class="icon-star1 stars_color text_15 line_height_42 me-1"></i>
                                            <i class="icon-star1 stars_color text_15 line_height_42 me-1"></i>
                                            <i class="icon-star1 stars_color text_15 line_height_42 me-1"></i>
                                        </div>
                                        <p class="pt-2 pe-2 pb-2">'.$value['description'].'</p>
                                        <strong class="d-block">'.$value['name'].'</strong>
                                        <p class="mb-0 position-relative top_n2 text_12 line_height_19_8">'.$value['title'].'</p>
                                        <p class="mb-0 position-relative top_n2 transform">'.$value['location'].','.$value['state'].'</p>
                                    </div>';
                                } ?> 


                                </div>
                            </div>
                            <div class="swiper-pagination position-relative employee-review-pagination pagination-variation-a text-lg-start text-center  my-lg-0 mb-4 toppagination-margin"></div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
<script type="text/javascript">
      jQuery(document).ready(function(){
         var swiperEmployeeB = new Swiper(".employee-review-swiper", {
                spaceBetween: 10,
                slidesPerView: 1,
                autoplay: {
                    delay: 8000,
                    disableOnInteraction: false,
                },    
                pagination: {
                  el: ".employee-review-pagination",
                  clickable: true,
                },
                
            });
            
        });
</script>