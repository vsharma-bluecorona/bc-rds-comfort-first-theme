<?php

    $widget_id = $args['globals']['promotion']['widget_id'];
    $category_name = $args['category_taxonomy'];
    $current_date = date('m/d/Y');
    if (empty($category_name) || in_array('all', $category_name)) {
        query_posts(array(
            'post_type' => 'bc_promotions',
            'posts_per_page' => 6,
            'paged' => $paged,
            'order' => 'DESC',
            'post_status' => 'publish',
            'meta_key' => 'promotion_expiry_date1',
            'meta_value' => $current_date,
            'meta_compare' => '>=',
        ));
    } else {
        query_posts(array(
            'post_type' => 'bc_promotions',
            'posts_per_page' => 6,
            'paged' => $paged,
            'order' => 'DESC',
            'post_status' => 'publish',
            'meta_key' => 'promotion_expiry_date1',
            'meta_value' => $current_date,
            'meta_compare' => '>=',
            'tax_query' => [
                'relation' => 'OR', 
                [
                    'taxonomy' => 'bc_promotion_category',
                    'field'    => 'name',
                    'terms' => $category_name,
                    'operator' => 'IN', 
                ],
            ],
    
        ));

    }
    
    $title_tag = isset($args['globals']['promotion']['title_tag']) ? $args['globals']['promotion']['title_tag'] : "h1";
    $heading_tag = isset($args['globals']['promotion']['heading_tag']) ? $args['globals']['promotion']['heading_tag'] : "h2";
        ?>
        <div class="d-block  pb-lg-0 ">
            <?php
            global $template;
            if (!empty($template) && !empty($template) && basename($template) == 'rds-landing.php') {
                ?>
                <div class="container-fluid px-0 true_white_bg">
                <?php } else { ?>
                    <div class="container-fluid pb-lg-0  px-lg-3 pb-4 true_white_bg">
                    <?php } ?>
                    <div class="container px-1 px-lg-3">

                        <div class="row mx-0">
                            <div class="homepage_coupon col-lg-12 px-0 pt-lg-5 mt-4 pb-lg-4 px-0">   
                                <<?= $title_tag ?> class="mb-0 pb-2 text-center text-capitalize"><?php echo $args['globals']['promotion']['title']; ?></<?= $title_tag ?>>
                                <<?= $heading_tag ?> class="text-center d-block pb-4 pb-lg-5 px-5 mx-3 px-md-0 mx-md-0"><?php echo $args['globals']['promotion']['heading']; ?></<?= $heading_tag ?>>
                                <div class="coupon_slider px-lg-3 position-relative px-lg-5">
                                    <div  id="coupon__Swiper_one" class="swiper swiper-container swiper mySwiper d-lg-block d-nlock">
                                        <div class="swiper-wrapper" style="overflow: visible;">
                                            <?php
                                            if (have_posts()) :
                                                while (have_posts()) : the_post();
                                                $promotion_type = get_post_meta(get_the_ID(), 'promotion_type', TRUE);
                                                $noexpiry = get_post_meta(get_the_ID(), 'promotion_noexpiry', true);
                                                $date = get_post_meta(get_the_ID(), 'promotion_expiry_date1', true);
                                                if (strtotime($date) >= strtotime(current_time('m/d/Y')) || $noexpiry == 1) {
                                                    $title = get_post_meta(get_the_ID(), 'promotion_title1', true);
                                                    $color = get_post_meta(get_the_ID(), 'promotion_color', true);
                                                    $subheading = get_post_meta(get_the_ID(), 'promotion_subheading', true);
                                                    $heading = get_post_meta(get_the_ID(), 'promotion_heading', true);
                                                    $footer_heading = get_post_meta(get_the_ID(), 'promotion_footer_heading', true);
                                                    ?>
                                                    <div class="swiper-slide border-radius-10 h-auto color_primary_bg p-3" style="background-color: <?php echo $color; ?>;">
                                                        <div class="coupon_name border-dashed-3 h-100 pt-4 pb-5 p-4 px-lg-0 text-center">
                                                        <span class="d-block text-center px-lg-0 px-3 pt-lg-0 pt-2  coupon_heading"><?php echo $heading; ?></span>
                                                        <span class="d-block text-center py-2 px-lg-0 px-2 pt-lg-0 pt-2 my-lg-1 coupon_sub_heading"><?php echo $subheading; ?></span>
                                                        <h4 class="mb-0 pb-lg-3 pt-lg-0 py-3 coupon_title coupon_offer"><?php echo $title; ?></h4>
                                                        <a data-bs-toggle="modal" data-bs-target="#request_coupon_form" onclick="couponButtonClick(this);" class="btn btn-primary home-coupon-btn-size">Redeem Offer <i class="icon-chevron-right1 text_18 line_height_18 ms-2 me-0"></i></a>
                                                        <span class="pt-lg-3 px-3 pt-2 d-block coupon_expiry"><?php if($noexpiry !=1){ echo 'Expires '.$date.'<br>';}?><span class="d-block coupon_disclaimer"><?php echo $footer_heading; ?></span></span>
                                                    </div>
                                                    </div>
                                                    <?php
                                                }
                                            endwhile;
                                        endif;
                                            ?>
                                        </div>   
                                    </div>
                                    <div class="swiper m-home-coupon-swiper-<?= $widget_id; ?> d-lg-none d-none pb-5 mb-4">
                                        <div class="swiper-wrapper">
                                            <?php
                                            if (have_posts()) :
                                                while (have_posts()) : the_post();
                                                $promotion_type = get_post_meta(get_the_ID(), 'promotion_type', TRUE);
                                                $noexpiry = get_post_meta(get_the_ID(), 'promotion_noexpiry', true);
                                                $date = get_post_meta(get_the_ID(), 'promotion_expiry_date1', true);
                                                if (strtotime($date) >= strtotime(current_time('m/d/Y')) || $noexpiry == 1) {
                                                    $title = get_post_meta(get_the_ID(), 'promotion_title1', true);
                                                    $color = get_post_meta(get_the_ID(), 'promotion_color', true);
                                                    $subheading = get_post_meta(get_the_ID(), 'promotion_subheading', true);
                                                    $heading = get_post_meta(get_the_ID(), 'promotion_heading', true);
                                                    $footer_heading = get_post_meta(get_the_ID(), 'promotion_footer_heading', true);
                                                    ?>
                                                    <div class="swiper-slide h-auto border-radius-10 color_primary_bg p-3 " style="background-color: <?php echo $color; ?>;">
                                                        <div class="coupon_name border-dashed-3 h-100 pt-4 pb-5 p-4 px-lg-0 text-center">
                                                        <span class="d-block text-center px-lg-0 px-3 pt-lg-0 pt-2 coupon_subtitle coupon_heading"><?php echo $heading; ?></span>
                                                        <span class="d-block text-center py-2 px-lg-0 px-2 pt-lg-0 pt-2 my-lg-1 coupon_sub_heading"><?php echo $subheading; ?></span>
                                                        <h4 class="mb-0 pb-lg-3 pt-lg-0 py-3 coupon_title coupon_offer"><?php echo $title; ?></h4>
                                                        <a data-bs-toggle="modal" data-bs-target="#request_coupon_form" onclick="couponButtonClick(this);" class="btn btn-primary home-coupon-btn-size">Redeem Offer <i class="icon-chevron-right1 text_18 line_height_18 ms-2 me-0"></i></a>
                                                        <span class="pt-lg-3 px-3 pt-2 d-block coupon_expiry"><?php if($noexpiry !=1){ echo 'Expires '.$date.'<br>';}?><span class="d-block coupon_disclaimer"><?php echo $footer_heading; ?></span></span>
                                                    </div>
                                                    </div>
                                                    <?php
                                                }
                                            endwhile;
                                        endif;
                                            ?>
                                        </div>   
                                    </div>


                                    <?//php
                                    //global $template;
                                    //var_dump($front,$currentId);
                                    //if ((!empty($template) && basename($template) == 'rds-landing.php') || ($front==$currentId)) {
                                        ?>
                                        <div class="swiper-button-next d-none d-lg-block home-coupon-next home_coupon_next_a-<?= $widget_id; ?>">
                                            <i class="icon-chevron-right1 text_25 true_black line_height_42  transform"></i>
                                        </div>
                                        <div class="swiper-button-prev d-none d-lg-block home-coupon-prev home_coupon_prev_a-<?= $widget_id; ?>">

                                            <i class="icon-chevron-left1 text_25 true_black line_height_42  transform"></i>
                                        </div>
                                        
                                    <?//php } else { ?>
                                        <div data-dark-color="color_primary" data-light-color="true_white" class="apply-conditional-color swiper-pagination coupon-pagination home-coupon-pagination-<?= $widget_id; ?> pagination-variation-a position-relative d-lg-none d-none "></div>
                                        <div data-dark-color="color_primary" data-light-color="true_white" class="apply-conditional-color swiper-pagination coupon-pagination m-home-coupon-pagination-<?= $widget_id; ?> pagination-variation-a position-relative d-lg-none d-block "></div>
                                    <?//php } ?>

                                     

                                </div>
                                <div class="text-center mt-lg-3 pt-5 ">
                                            <a href="<?php echo get_home_url() . $args['globals']['promotion']['button_link']; ?>" class="btn btn-primary home-view-all-coupon-size"><?php echo $args['globals']['promotion']['button_text']; ?></a>
                                        </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php
             wp_reset_query();
     ?>
<div class="modal fade request_form coupon-popup-form px-lg-0 px-0 pt-5 pt-md-0" id="request_coupon_form" tabindex="-1" role="dialog" data-bs-backdrop="false" data-bs-keyboard="false" aria-labelledby="requestcoupon_Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered px-lg-0 px-2 " role="document">
                    <div class="modal-content border-0 rounded-0 text-center">
                        <div class="modal-header border-0 p-0">
                            <button type="button" class="close coupon-popup-close position-absolute bg-transparent border-0 pb-0 px-0" data-bs-dismiss="modal" aria-label="Close" style="opacity:1; z-index: 999; color:#fff ;">
                                <i class="icon-xmark1 text_30 line_height_26"></i>
                            </button>
                        </div>
                        <div class="modal-body p-lg-4 p-2 w-100 my-auto mx-auto coupons">
                            <div class="border-dashed-7-secondary pt-lg-4 pb-lg-4 py-4 footer_form_A ui_kit_footer_form elementor-popupform">
                                <h3 class="px-lg-0 sm_text_normal_c  text_medium px-4"><?php echo $args['globals']['promotion']['popup_form_heading']; ?></h3>
                                <div class="my-md-0 mt-lg-4 mt-3 w-lg-260 mx-auto text-start text-lg-center d-flex align-items-center justify-content-center pb-4 px-lg-0 px-4">
                                    <i class="icon-shield-check1 text_30 line_height_30 me-2 position-relative color_secondary"></i>
                                    <span class="default_font_family_c text_bold text_16 line_height_25 sm_text_16  sm_line_height_30 true_black"><?php echo $args['globals']['promotion']['popup_form_subheading']; ?></span>
                                </div>
                                <div class="px-lg-4 mx-lg-3  px-3 mx-2">
                                    <div class="px-lg-1">
                                    <?php
                                    $form_id = $args['globals']['promotion']['popup_gravity_form_id'];
                                    echo do_shortcode('[gravityforms id=' . $form_id . ' ajax=true]');
                                    ?>
                                </div>
                                <p class="mt-3"  style=" font-size: 13px; line-height: 22px;">Loans provided by Regions Bank, Member FDIC, (650 S. Main St., Suite 1000, Salt Lake City, UT 84101) on approved credit, for a limited time. 0.00% fixed APR, subject to change. Minimum loan amounts apply. Interest starts accruing when funds are disbursed. Repayment term is 36 months. Actual loan term may be shorter if less than the full approved amount of credit is used. First monthly loan payment due 30 days after funds are disbursed. 36 monthly payments of $27.78 per $1,000 borrowed. The minimum monthly payment will be no less than $50.00.</p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
        jQuery(document).ready(function () {
      var couponSwiperOne = new Swiper('#coupon__Swiper_one', {
            loop:false,
        autoplay:true,
        noSwiping: true,
        slidesPerView: 2,
        spaceBetween: 30,
        allowSlidePrev: true,
        allowSlideNext: true,

        navigation: {
                nextEl: '.swiper-button-next.home-coupon-next ',
                prevEl: '.swiper-button-prev.home-coupon-prev',
            },
            pagination: {
                el: '.swiper-pagination.home-promotion-pagination',
                clickable: true,
            },
  });
      });

</script>
            <script>
                 jQuery(".promotionC_icon").click(function () {
                        var text = jQuery(this).html().trim();
                        currentText = jQuery(this).text();

                        if (currentText == "More info ") {
                            jQuery(this).html(text.replace('More info ', 'Less info '));
                            if (jQuery('body').hasClass('elementor-editor-active')) {
                             jQuery(this).find('i').toggleClass('icon-plus1 icon-minus1');
                         }
                        } else {
                            jQuery(this).html(text.replace('Less info ', 'More info '));
                             if (jQuery('body').hasClass('elementor-editor-active')) {
                                  jQuery(this).find('i').toggleClass('icon-minus1 icon-plus1');
                              }
                        }
                    });
            </script>
                  <script type="text/javascript">
        jQuery(document).ready(function () {

            jQuery(".coupon-popup-close").click(function () {
                
                jQuery(this).closest("#request_coupon_form").find("form .gfield_label").each(function (k, d) {
                    jQuery(d).attr("style", "");
                    jQuery(d).parent('li').children('label').show();
                    jQuery(d).parent('li').find('.validation_message').hide();
                    jQuery(d).parent('li').removeClass('gfield_error');
                    jQuery(d).parent('li').removeClass('gfield_error');
                    jQuery(d).parent('li').find('input').val('');
                    jQuery(d).parent('li').find('select').val('');
                    jQuery(d).parent('li').children('label').removeClass('float_label');
                    jQuery(d).parent("li").find(".gfield-choice-input").prop("checked", true);
                });
            });
            jQuery(".rds_gform_submit").click(function () {
                console.log(jQuery(this).closest("form").find(".coupon-name input").val());
                var promotiontitleValue = jQuery(this).closest("form").find(".coupon-name input").val();
                if (promotiontitleValue != "") {
                    setTimeout(function () {
                        jQuery('.bc-promotion-title').text(promotiontitleValue);
                    }, 500);
                }
            });
            setInterval(function () {
                    var promotiontitleValue = jQuery('#input_9_10').val();
                    jQuery('.bc-promotion-title').text(promotiontitleValue);
            }, 500);
        });
        function couponButtonClick(attr) {
            var CouponTitle = jQuery(attr).parent('.coupon_name').find('.coupon_title').text();
            var CouponsubTitle = jQuery(attr).parent('.coupon_name').find('.coupon_subtitle').text();
            var Couponsubheading = jQuery(attr).parent('.coupon_name').find('.coupon_sub_heading ').text();
            console.log(CouponTitle + " " + CouponsubTitle + " " + Couponsubheading)
            jQuery(".coupon-name").find('input:text').val(CouponTitle + " " + CouponsubTitle + " " + Couponsubheading);
            jQuery(".bc-promotion-title").text(CouponTitle + " " + CouponsubTitle + " " + Couponsubheading);
        }

    </script>
