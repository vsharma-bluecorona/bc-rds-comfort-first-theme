<?php if (function_exists('get_promotion_query')) {
    // $query = get_promotion_query(3);
    $category_name = $args['category_taxonomy'];
    $current_date = date('m/d/Y');
    if (empty($category_name) || in_array('all', $category_name)) {
        query_posts(array(
            'post_type' => 'bc_promotions',
            'posts_per_page' => 3,
            'order' => 'DESC',
            'post_status' => 'publish',
            'meta_key' => 'promotion_expiry_date1',
            'meta_value' => $current_date,
            'meta_compare' => '>=',
        ));
    } else {
        query_posts(array(
            'post_type' => 'bc_promotions',
            'posts_per_page' => 3,
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


            if (have_posts()) {?>
    <div class="sidebar_coupon  pb-lg-4 px-lg-0 px-2 mx-lg-0 mx-1  order-lg-2 order-2 px-lg-3">
        <span class="default_font_family_c text_bold text_32 line_height_40 text-center d-block pb-2 "><?php echo $args['page_templates']['subpage']['sidebar']['promotion']['heading']; ?></span>
        <span class="default_font_family_c text_light true_black px-5 pb-3 text_22 line_height_40 text-center d-block pb-lg-4 ">Our Goal Is to Keep Your Home Comfortable</span>

        <div class="swiper coupon-swiper">
            <div class="swiper-wrapper">
                <?php     while (have_posts()) : the_post();
                    $promotion_type = get_post_meta(get_the_ID(), 'promotion_type', TRUE);
                    $noexpiry = get_post_meta( get_the_ID(), 'promotion_noexpiry', true );
                     $colorCode = get_post_meta(get_the_ID(), 'promotion_color', true);
                    $date = get_post_meta( get_the_ID(), 'promotion_expiry_date1', true );
                    if(strtotime($date) >= strtotime(current_time('m/d/Y')) || $noexpiry == 1){
                        $title = get_post_meta( get_the_ID(), 'promotion_title1', true );
                        $color = get_post_meta( get_the_ID(), 'promotion_color', true );
                        $subheading = get_post_meta( get_the_ID(), 'promotion_subheading', true );
                        $heading = get_post_meta( get_the_ID(), 'promotion_heading', true );
                        $footer_heading = get_post_meta( get_the_ID(), 'promotion_footer_heading', true ); ?>
                        <div class="swiper-slide h-auto border-radius-10 border-radius-10 color_tertiary_bg p-3" style="background-color: <?php echo $colorCode; ?>;">
                            <div class="coupon_name border-dashed-3 h-100 py-4 p-4 px-lg-0 text-center">
                                <span class="d-block text-center px-lg-0 px-3 pt-lg-0 pt-2  coupon_heading"><?php echo $heading; ?></span>
                                <span class="d-block text-center py-2 px-lg-0 px-2 pt-lg-0 pt-2 my-lg-1 coupon_sub_heading"><?php echo $subheading; ?></span>
                                <h4 class="mb-0 pb-lg-3 pt-lg-0 py-3 coupon_title coupon_offer"><?php echo $title; ?></h4>
                                <a data-bs-toggle="modal" data-bs-target="#request_coupon_form" onclick="couponButtonClick(this);" class="btn btn-primary mw-206">REDEEM OFFER <i class="icon-chevron-right1 text_18 line_height_18 ms-2"></i></a>
                                <span class="pt-lg-3 px-3 pt-2 d-block coupon_expiry"><?php if($noexpiry !=1){ echo 'Expires '.$date.'<br>';}?><span class="d-block coupon_disclaimer"><?php echo $footer_heading; ?></span></span>
                            </div>
                        </div>  
                    <?php }
                endwhile; ?>
            </div>
        </div>
        <div class="swiper-pagination coupon-pagination pagination-variation-a position-relative pb-3"></div>
        <div class="text-center see_all_button">
            <a href="<?php echo get_home_url().$args['page_templates']['subpage']['sidebar']['promotion']['button_link']; ?>" class="btn btn-primary mw-206"><?php echo $args['page_templates']['subpage']['sidebar']['promotion']['button_text']; ?> </a>
        </div>
    </div>
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
                                <h3 class="px-lg-0 sm_text_normal_c text_medium px-4"><?php echo $args['globals']['promotion']['popup_form_heading']; ?></h3>
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
                                <p class="mt-3" style=" font-size: 13px; line-height: 22px;">
Loans provided by Regions Bank, Member FDIC, (650 S. Main St., Suite 1000, Salt Lake City, UT 84101) on approved credit, for a limited time. 0.00% fixed APR, subject to change. Minimum loan amounts apply. Interest starts accruing when funds are disbursed. Repayment term is 36 months. Actual loan term may be shorter if less than the full approved amount of credit is used. First monthly loan payment due 30 days after funds are disbursed. 36 monthly payments of $27.78 per $1,000 borrowed. The minimum monthly payment will be no less than $50.00.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            var swiperSubpageA = new Swiper(".coupon-swiper", {
                spaceBetween: 10,
                slidesPerView: 1,
                autoplay: {
                    delay: 8000,
                    disableOnInteraction: false,
                  },
                pagination: {
                    el: ".coupon-pagination",
                    clickable: true,
                },

            });
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
    <?php } wp_reset_query(); 
} ?>