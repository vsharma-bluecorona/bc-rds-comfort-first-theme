 <?php 
            $blogid = get_current_blog_id();

            // Setting the heading based on the blog ID
            if ($blogid == 7 || $blogid == 5 || $blogid == 7 || $blogid == 4) {
                $heading_section = "What Sets Us Apart";
            } else {
                $heading_section = "Why Choose Us?";
            }

            // Setting the subheading based on the blog ID
            if ($blogid == 6 || $blogid == 4) {
                $subheading_section = "Get Superior Service From <br> Comfort First";
            } else {
                $subheading_section = "Expect Excellence From Our Team";
            }
        ?>

<div class="px-0 px-lg-3">
<div class="why-choose-widget mt-5 mb-4 py-4 text-center border-radius-top-10">
            <span class="d-block font_alt_1 mt-4 true_white text_34 text_normal line_height_45"><?php echo $heading_section;?></span>
	<span class="d-block font_default true_white mb-3 pb-3 text_normal text_20 line_height_30"><?php echo $subheading_section;?></span>
            <!-- Desktop View Why Us-->
            <div class="pb-2 d-none d-lg-block">
                <div class="media d-flex align-items-center mb-4 ps-3 pe-3">
                    <span class=" ms-xl-2 image-container">
                        <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/trophy-star-duotone.svg'; ?>"  alt="Blue animation of a trophy with a star on it" class=""  width="52" height="47">
                    </span>
                    <div class="media-body text-start ps-xl-3 pe-xl-2">
                        <span class="d-block true_white ml-2 font_default bc_text_18 bc_line_height_26 text_normal">Over 50 Years of Experience</span>
                    </div>
                </div>
                <div class="media d-flex align-items-center mb-3 ps-3 pe-3">
                    <span class=" ms-xl-2 image-container">
                        <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/file-certificate-duotone.svg'; ?>"  alt="file-certificate-duotone" class=""  width="47" height="47">
                    </span>
                    <div class="media-body text-start ps-xl-3 pe-xl-2">
                        <span class="d-block true_white ml-2 font_default bc_text_18 bc_line_height_26 text_normal">Comprehensive Guarantees</span>
                    </div>
                </div>
                <div class="media d-flex align-items-center mb-3 ps-3 pe-3">
                    <span class=" ms-xl-2 image-container">
                        <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/users-duotone.svg'; ?>"  alt="users-duotone" class=""  width="58" height="47">
                    </span>
                    <div class="media-body text-start ps-xl-3 pe-xl-2">
                        <span class="d-block true_white ml-2 font_default bc_text_18 bc_line_height_26 text_normal">Trained, Certified & Licensed Team</span>
                    </div>
                </div>
                <div class="media d-flex align-items-center mb-3 ps-3 pe-3">
                    <span class=" ms-xl-2 image-container">
                        <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/hands-holding-dollar-duotone.svg'; ?>"  alt="hands-holding-dollar-duotone" class=""  width="58" height="47">
                    </span>
                    <div class="media-body text-start ps-xl-3 pe-xl-2">
                        <span class="d-block true_white ml-2 font_default bc_text_18 bc_line_height_26 text_normal">Trustworthy Prices</span>
                    </div>
                </div>
                <div class="media d-flex align-items-center mb-3 ps-3 pe-3">
                    <span class=" ms-xl-2 image-container">
                        <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/shield-check-duotone.svg'; ?>"  alt="shield-check-duotone" class=""  width="47" height="47">
                    </span>
                    <div class="media-body text-start ps-xl-3 pe-xl-2">
                        <span class="d-block true_white ml-2 font_default bc_text_18 bc_line_height_26 text_normal">Quality Installation Procedures</span>
                    </div>
                </div>
                <div class="media d-flex align-items-center mb-3 ps-3 pe-3">
                    <span class=" ms-xl-2 image-container">
                        <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/house-heart-duotone.svg'; ?>"  alt="house-heart-duotone" class=""  width="53" height="47">
                    </span>
                    <div class="media-body text-start ps-xl-3 pe-xl-2">
                        <span class="d-block true_white ml-2 font_default bc_text_18 bc_line_height_26 text_normal">Genuine Care for Your Comfort</span>
                    </div>
                </div>
            </div>
            <!-- End Desktop View Why Us -->
            <!-- Mobile View Why Us-->
            <div class="d-lg-none d-block overflow-hidden">
                <!-- Swiper -->
                <div id="bc_services_widget-7" class="swiper-container swiper mySwiper mySwiper-why-us-widget pb-lg-0 pb-5 mb-0 swiper-container-initialized swiper-container-horizontal">
                    <div class="swiper-wrapper" style="transition-duration: 300ms;">
                    	<div class="swiper-slide text-center">
                            <span class=" ms-xl-2 image-container">
		                        <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/trophy-star-duotone.svg'; ?>"  alt="trophy-star-duotone" class=""  width="52" height="47">
		                    </span>
		                    <div class="media-body text-start ps-xl-3 pe-xl-2">
		                        <span class="d-block text-center py-3 true_white ml-2 font_default bc_text_18 bc_line_height_26 text_normal">Over 50 Years of Experience</span>
		                    </div>
                        </div>
                        <div class="swiper-slide text-center">
                        <span class=" ms-xl-2 image-container">
		                         <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/file-certificate-duotone.svg'; ?>"  alt="file-certificate-duotone" class=""  width="47" height="47">
		                    </span>
		                    <div class="media-body text-start ps-xl-3 pe-xl-2">
		                        <span class="d-block text-center py-3 true_white ml-2 font_default bc_text_18 bc_line_height_26 text_normal">Comprehensive Guarantees</span>
		                    </div>
                        </div>
                        <div class="swiper-slide text-center">
                        <span class=" ms-xl-2 image-container">
		                        <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/users-duotone.svg'; ?>"  alt="users-duotone" class=""  width="58" height="47">
		                    </span>
		                    <div class="media-body text-start ps-xl-3 pe-xl-2">
		                        <span class="d-block text-center py-3 true_white ml-2 font_default bc_text_18 bc_line_height_26 text_normal">Trained, Certified & Licensed Team</span>
		                    </div>
                        </div>
                        <div class="swiper-slide text-center">
                        <span class=" ms-xl-2 image-container">
		                         <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/hands-holding-dollar-duotone.svg'; ?>"  alt="hands-holding-dollar-duotone" class=""  width="58" height="47">
		                    </span>
		                    <div class="media-body text-start ps-xl-3 pe-xl-2">
		                        <span class="d-block text-center py-3 true_white ml-2 font_default bc_text_18 bc_line_height_26 text_normal">Trustworthy Prices</span>
		                    </div>
                        </div>
                        <div class="swiper-slide text-center">
                        <span class=" ms-xl-2 image-container">
		                        <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/shield-check-duotone.svg'; ?>"  alt="shield-check-duotone" class=""  width="47" height="47">
		                    </span>
		                    <div class="media-body text-start ps-xl-3 pe-xl-2">
		                        <span class="d-block text-center py-3 true_white ml-2 font_default bc_text_18 bc_line_height_26 text_normal">Quality Installation Procedures</span>
		                    </div>
                        </div>
                        <div class="swiper-slide text-center">
                        <span class=" ms-xl-2 image-container">
		                        <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/house-heart-duotone.svg'; ?>"  alt="house-heart-duotone" class=""  width="53" height="47">
		                    </span>
		                    <div class="media-body text-start ps-xl-3 pe-xl-2">
		                        <span class="d-block text-center  py-3 true_white ml-2 font_default bc_text_18 bc_line_height_26 text_normal">Genuine Care for Your Comfort</span>
		                    </div>
                        </div>
                        
                    </div>
                    <div class="swiper-pagination-why-us-widget d-lg-none swiper-pagination-clickable swiper-pagination-bullets"></div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

            </div>
            <!-- End Mobile View Why Us -->
        </div>
    </div>
     <script>
			jQuery(document).ready(function(){
			var servicesSwiper = new Swiper('#bc_services_widget-7', {
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