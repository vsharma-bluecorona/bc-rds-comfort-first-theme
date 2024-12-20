<?php
$get_alt_text = rds_alt_text();
$footer_logo_alt = "";
$footer_mobile_logo_alt = "";
$copyright_svg_alt = "";
foreach ($get_alt_text as $value) {

    if (in_array("footer-logo.webp", $value))
        $footer_logo_alt = 'alt="' . $value[3] . '"';

    if (in_array("m-footer-logo.webp", $value))
        $footer_mobile_logo_alt = 'alt="' . $value[3] . '"';

    if (in_array("bc-logo.svg", $value))
        $copyright_svg_alt = 'alt="' . $value[3] . '"';
}
?> 
<footer class="color_secondary_bg  overflow-hidden">
    <div class="container-fluid pt-0 py-lg-5 pb-5">
        <div class="container pt-lg-0 pt-3">
            <div class="row">
                <div class="col-sm-12 col-lg-4 mx-auto text-center">
                    <div class="text-center">
                        <a class="d-inline-block pb-1" href="#">
                        <img src="<?php echo get_exist_image_url('footer','footer-logo'); ?>" srcset="<?php echo get_exist_image_url('footer','footer-logo'); ?> 1x, <?php echo get_exist_image_url('footer','footer-logo@2x'); ?> 2x, <?php echo get_exist_image_url('footer','footer-logo@3x'); ?> 3x" class="d-lg-block d-none img-fluid w-auto" style="max-width: 210px" <?php echo $footer_logo_alt; ?> width="210" height="138">
                        
                        <img src="<?php echo get_exist_image_url('footer','m-footer-logo'); ?>" srcset="<?php echo get_exist_image_url('footer','m-footer-logo'); ?> 1x, <?php echo get_exist_image_url('footer','m-footer-logo@2x'); ?> 2x, <?php echo get_exist_image_url('footer','m-footer-logo@3x'); ?> 3x" class="d-lg-none d-block img-fluid w-auto" style="max-width: 175px" <?php echo $footer_mobile_logo_alt; ?> width="175" height="127">
                        </a>
                    </div>
                    <?php 
                                    // $phoneNum = $args['site_info']['phone'];
                                    // $phoneNumber = preg_replace('/\D/', '', $phoneNum);
                                    // $formatedPhone = substr($phoneNumber, 0, 6) . '-' . substr($phoneNumber, 6); 
                                    ?>
                 <div class="text-center">
                 <a href="tel: <?php echo $args['site_info']['country_code']  . $args['site_info']['phone']; ?> ?>" class="no_hover_underline footer_phone_number position-relative mt-lg-4 mb-lg-4 d-inline-block me-lg-2"><?php echo $args['site_info']['country_code']  . $args['site_info']['phone']; ?></a>
                 </div>

                    <div class="text-center d-flex justify-content-center">
                        <?php
                        $socialItems = $args['site_info']['social_media']['items'];
                        foreach ($socialItems as $value) {
                            echo '<a target="_blank" class="social_media_icons  no_hover_underline   mx-2  sm_text_20 sm_line_height_25 order-' . $value['order'] . '" title="' . $value['icon_class'] . '" href="' . $value['url'] . '">
                    <i class="' . $value['icon_class'] . '"></i> 
                </a>';
                        }
                        ?>

                    </div>

                </div>


            </div>
        </div>
    </div>

    <?php
    $get_rds_template_data_array = rds_template();
    // check is service area is enabled
    $enable_service_areas = $get_rds_template_data_array['globals']['footer'];

    // get service area pagelist on which we need to show
    $service_areas = $get_rds_template_data_array['globals']['footer']['service_areas'];
    $page_ids_to_show_service_areas = array();
    foreach ($service_areas as $value) {
       $get_pageids = $value['page_ids'];
       $page_ids_to_show_service_areas = array_merge($page_ids_to_show_service_areas,$get_pageids);
    }
    if ($enable_service_areas['enable'] == true && is_page($page_ids_to_show_service_areas) ) {
        get_template_part('page-templates/common/servicearea');
    }
    ?>
    <div class=" footer_copyright_bar text-center text-lg-start  font_alt_1 mb-lg-0 mb-5 pt-1 pb-3 pt-lg-4 pb-lg-4">
        <div class="container py-lg-1 pb-3  p-alt  line_height_30   font_alt_1  text_normal  text_16 px-0  ">
            <i class="p-alt icon-copyright4   text_16  line_height_28  "></i> <?php echo date("Y"); ?> <?php echo $args['site_info']['copyright_title']; ?><?php if ($args['site_info']['bluecorona_branding'] == true) { ?><span class="d-none d-sm-inline-block  line_height_30  font_alt_1  text_normal  text_16 d-lg-inline-block">&nbsp;|&nbsp;</span><span class="d-block d-sm-inline-block d-lg-inline-block  p-alt ">Web Design by&nbsp;&nbsp;<a class=" footer_copyright_links no_hover_underline  line_height_30  font_alt_1  text_normal  text_16   a-alt copyright_hover" target="_blank" href="<?php echo $args['site_info']['bluecorona_link']; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/footer/bc-logo.svg" width="19" height="20" <?php echo $copyright_svg_alt; ?>>&nbsp;&nbsp;Blue Corona</a></span><?php } ?>
            <span class="d-none d-sm-inline-block d-lg-inline-block d-none">&nbsp; | &nbsp;</span><a class=" footer_copyright_links no_hover_underline  line_height_30  font_alt_1  text_normal  text_16  a-alt  copyright_hover"  href="#" data-bs-toggle="modal" data-bs-target="#disclaimer">Disclaimer</a><span class="d-inline-block">&nbsp; | &nbsp;</span><a class=" text_16  line_height_30  font_alt_1  text_normal  text_16  footer_copyright_links no_hover_underline   a-alt copyright_hover" href="<?php echo get_home_url() . $args['site_info']['privacy_policy_link']; ?>/">Privacy Policy</a>
        </div> 
    </div>
    <div class="modal fade p-0" id="disclaimer" tabindex="-1" data-bs-backdrop="false" role="dialog" aria-labelledby="disclaimerLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-header border-0 text-end ms-auto pb-0">
                    <button type="button" class="close border-0 bg-transparent ms-auto" data-bs-dismiss="modal" aria-label="Close" style="opacity: 1;">
                        <span aria-hidden="true"><i class="icon-xmark1 true_black line_height_24 text_24"></i></span>
                    </button>
                </div>
                <div class="modal-body px-md-5 px-4 pb-5 col-md-10 offset-md-1 text-lg-start text-center">
                    <div id="disclaimerLabel" class="h1">Disclaimer</div>
                    <p class=""><?php echo $args['site_info']['disclaimer_text']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid m-0 p-0 d-lg-none fixed-bottom btn color_primary_bg" style="position: fixed;">
        <div class="container p-0 btn color_primary_bg">
            <div class="row no-gutters">
                <div class="col-12 schedule_service text-center">
                    <a data-toggle="modal" href="#" data-target="#form-A" class="py-3 d-flex align-items-center btn color_primary_bg no_hover_underline mh-65"><i class="icon-calendar-plus3 me-2 text_18 line_height_18"></i>Schedule Service today <i class="icon-chevron-right2 ms-2 text_18 line_height_18"></i></a>
                </div>
            </div>
        </div>
    </div>
            <script type="text/javascript">
        function couponButtonClick(attr) {
            var CouponTitle = jQuery(attr).parent('.coupon_name').find('.coupon_title').text();
            var CouponsubTitle = jQuery(attr).parent('.coupon_name').find('.coupon_subtitle').text();
            var Couponsubheading = jQuery(attr).parent('.coupon_name').find('.coupon_sub_heading ').text();
            console.log(CouponTitle + " " + CouponsubTitle + " " + Couponsubheading)
            jQuery(".coupon-name").find('input:text').val(CouponTitle + " " + CouponsubTitle + " " + Couponsubheading);
            jQuery(".bc-promotion-title").text(CouponTitle + " " + CouponsubTitle + " " + Couponsubheading);
        }

    </script>
</footer>
