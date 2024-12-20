<div class="container-fluid mt-lg-4 mt-n3 pt-lg-5 pt-4 why-choose-bg">
   <div class="container py-lg-3 py-5">
      <div class="row">
         <div class="col-lg-12 text-center">
        <?php 
            $blogid = get_current_blog_id();

            // Setting the heading based on the blog ID
            if ($blogid == 7 || $blogid == 5) {
                $heading_section = "What Sets Us Apart";
            } else {
                $heading_section = "Why Choose Us?";
            }

            // Setting the subheading based on the blog ID
            if ($blogid == 6) {
                $subheading_section = "Get Superior Service From Comfort First";
            }else if($blogid == 3){
                 $subheading_section = "Discover the Comfort First Difference";
            }else{
                $subheading_section = "Expect Excellence From Our Team";
            }
        ?>

        <!-- Outputting the dynamically set heading and subheading -->
        <span class="d-block true_white--imp h1"><?php echo $heading_section;?></span>
        <span class="d-block h2 mt-2 true_white--imp"><?php echo $subheading_section;?> </span>
    </div>

      </div>
      <!-- Desktop View -->
      <div class="d-lg-block d-none">
         <div class="row my-5 pt-5 pb-4">
            <div class="col-lg-4 text-center">
               <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/trophy-star-duotone.svg'; ?>"  alt="trophy-star-duotone" class=""  width="80" height="73">
               <span class="d-block mt-4 pt-3 h4 true_white--imp text_20 line_height_25">Over 50 Years of Experience</span>
            </div>
            <div class="col-lg-4 text-center">
               <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/file-certificate-duotone.svg'; ?>"  alt="file-certificate-duotone" class=""  width="72" height="73">
               <span class="d-block mt-4 pt-3 h4 true_white--imp text_20 line_height_25">Comprehensive Guarantees</span>
            </div>
            <div class="col-lg-4 text-center">
               <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/users-duotone.svg'; ?>"  alt="Blue animation of two humans" class=""  width="90" height="73">
               <span class="d-block px-lg-4 mt-4 pt-3 h4 true_white--imp text_20 line_height_25">Trained, Certified & Licensed Team</span>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-4 text-center">
               <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/hands-holding-dollar-duotone.svg'; ?>"  alt="hands-holding-dollar-duotone" class=""  width="90" height="73">
               <span class="d-block mt-4 pt-3 h4 true_white--imp text_20 line_height_25">Trustworthy Prices</span>
            </div>
            <div class="col-lg-4 text-center">
                <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/shield-check-duotone.svg'; ?>"  alt="Animation of blue shield with a checkmark on it" class=""  width="73" height="73">
               <span class="d-block mt-4 pt-3 h4 true_white--imp text_20 line_height_25">Quality Installation Procedures</span>
            </div>
            <div class="col-lg-4 text-center">
               <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/house-heart-duotone.svg'; ?>"  alt="house-heart-duotone" class=""  width="81" height="73">
               <span class="d-block mt-4 pt-3 h4 true_white--imp text_20 line_height_25">Genuine Care for Your Comfort</span>
            </div>
         </div>
      </div>
      <!-- Mobile View -->
      <div class="d-lg-none d-block my-5 pt-3">
         <div id="services_widget" class="swiper-container swiper mySwiper mySwiper-why-us-widget pb-lg-0 pb-5 mb-0 ">
                    <div class="swiper-wrapper" style="transition-duration: 300ms;">
                     <div class="swiper-slide text-center">
                            <span class=" ms-xl-2 image-container">
                              <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/trophy-star-duotone.svg'; ?>"  alt="trophy-star-duotone" class=""  width="80" height="73">
                          </span>
                          <div class="media-body text-start ps-xl-3 pe-xl-2">
                              <span class="d-block text-center py-3 true_white mt-2 pt-4 pb-4 font_default text_20 bc_line_height_25 text_normal">Over 50 Years of Experience</span>
                          </div>
                        </div>
                        <div class="swiper-slide text-center">
                        <span class=" ms-xl-2 image-container">
                               <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/file-certificate-duotone.svg'; ?>"  alt="file-certificate-duotone" class=""  width="72" height="73">
                          </span>
                          <div class="media-body text-start ps-xl-3 pe-xl-2">
                              <span class="d-block text-center py-3 true_white mt-2 pt-4 pb-4 font_default text_20 bc_line_height_25 text_normal">Comprehensive Guarantees</span>
                          </div>
                        </div>
                        <div class="swiper-slide text-center">
                        <span class=" ms-xl-2 image-container">
                              <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/users-duotone.svg'; ?>"  alt="users-duotone" class=""  width="90" height="73">
                          </span>
                          <div class="media-body text-start ps-xl-3 pe-xl-2">
                              <span class="d-block text-center py-3 true_white mt-2 pt-4 pb-4 font_default text_20 bc_line_height_25 text_normal">Trained, Certified & Licensed Team</span>
                          </div>
                        </div>
                        <div class="swiper-slide text-center">
                        <span class=" ms-xl-2 image-container">
                               <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/hands-holding-dollar-duotone.svg'; ?>"  alt="hands-holding-dollar-duotone" class=""  width="90" height="73">
                          </span>
                          <div class="media-body text-start ps-xl-3 pe-xl-2">
                              <span class="d-block text-center py-3 true_white mt-2 pt-4 pb-4 font_default text_20 bc_line_height_25 text_normal">Trustworthy Prices</span>
                          </div>
                        </div>
                        <div class="swiper-slide text-center">
                        <span class=" ms-xl-2 image-container">
                              <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/shield-check-duotone.svg'; ?>"  alt="shield-check-duotone" class=""  width="73" height="73">
                          </span>
                          <div class="media-body text-start ps-xl-3 pe-xl-2">
                              <span class="d-block text-center py-3 true_white mt-2 pt-4 pb-4 font_default text_20 bc_line_height_25 text_normal">Quality Installation Procedures</span>
                          </div>
                        </div>
                        <div class="swiper-slide text-center">
                        <span class=" ms-xl-2 image-container">
                              <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/house-heart-duotone.svg'; ?>"  alt="house-heart-duotone" class=""  width="81" height="73">
                          </span>
                          <div class="media-body text-start ps-xl-3 pe-xl-2">
                              <span class="d-block text-center  py-3 true_white mt-2 pt-4 pb-4 font_default text_20 bc_line_height_25 text_normal">Genuine Care for Your Comfort</span>
                          </div>
                        </div>
                        
                    </div>
                    <div class="swiper-pagination-why-us-widget text-center d-lg-none swiper-pagination-clickable swiper-pagination-bullets"></div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

      </div>
      <!-- End Mobile View -->
   </div>
</div>
<div class="container-fluid mb-5 mb-lg-3 pb-lg-3 mt-lg-n11 mt-n6-5">
   <div class="container px-0 px-lg-3 text-center custom-padding">
      <img class="m-auto d-none d-md-block" src="<?php echo get_exist_image_url('value-prop','van'); ?>" srcset="<?php echo get_exist_image_url('value-prop','van'); ?> 1x, <?php echo get_exist_image_url('value-prop','van@2x'); ?> 2x, <?php echo get_exist_image_url('value-prop','van@3x'); ?> 3x,'); ?> 3x" alt="van" width="646" height="425">
      <img class="m-auto d-md-none" src="<?php echo get_exist_image_url('value-prop','van'); ?>" srcset="<?php echo get_exist_image_url('value-prop','van'); ?> 1x, <?php echo get_exist_image_url('value-prop','van@2x'); ?> 2x, <?php echo get_exist_image_url('value-prop','van@3x'); ?> 3x,'); ?> 3x" alt="van" width="350" height="230">
     
   </div>
</div>

<script>
   jQuery(document).ready(function(){
      var servicesSwiper = new Swiper('#services_widget', {
         loop:true,
            pagination: {
               el: '.swiper-pagination-why-us-widget',
               clickable: true,
            },
            autoplay: {
               delay:2000,
               disableOnInteraction: false,
            },
      });
   });
</script>