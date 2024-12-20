<?php 
$get_alt_text = rds_alt_text();
        $header_logo_alt = "";
        $header_mobile_logo_alt = "";
        $header_mobile_cta_alt = "";
        foreach ($get_alt_text as $value) {
            if (in_array("header-logo.webp", $value))
                $header_logo_alt = 'alt="' . $value[3] . '"';

            if (in_array("m-header-logo.webp", $value))
                $header_mobile_logo_alt = 'alt="' . $value[3] . '"';

            if (in_array("m-menu-cta-logo.webp", $value))
                $header_mobile_cta_alt = 'alt="' . $value[3] . '"';
        }
        $announcement_class = "d-lg-block";
        $template = basename(get_page_template());
        if ($template == "rds-landing.php" && !$args['page_templates']['landing_page']['announcement_and_nav_toggle']) {
            $announcement_class = "d-none";
        }
        // $phoneNumber = preg_replace("/[^0-9]/", "", $args['site_info']['phone']);
        // $formatedPhone = "(".substr($phoneNumber, 0, 3).") ".substr($phoneNumber, 3, 3)."-".substr($phoneNumber, 6, 4);
        // $phoneNum = $args['site_info']['phone'];
        // $phoneNumber = preg_replace('/\D/', '', $phoneNum);
        // $formatedPhone = substr($phoneNumber, 0, 6) . '-' . substr($phoneNumber, 6);
        ?>
        <!-- Header Deafult Starts -->
        <div class="container-fluid d-none d-lg-block hide-on-touch">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-4 col-12 mr-0 align-self-center pe-0">
                        <a href="<?php echo get_home_url(); ?>/" class="d-inline-block">
                        <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/logo.svg'; ?>"  alt="Comfort First Heating & Cooling logo" class="branding_logo img-fluid w-auto" style="max-width: 269px;" width="269" height="119">
                        </a>
                    </div>
                    <div class="col-lg-9 ps-0 text-end pt-3">
                        <div class="d-lg-flex align-items-center justify-content-end font_default mt-2 pt-2">                           
                            <div class="silo-dropdown bc_color_tertiary_bg ms-auto me-4">
                                <div class="dropdown">
                                    <?php 
                                    
                                $blogid =get_current_blog_id();;

                                if ($blogid == 1) {
                                    $selected = "Select A Location";
                                } elseif ($blogid == 3) {
                                    $selected = "NC Triangle";
                                } elseif ($blogid == 4) {
                                    $selected = "NC Triad";
                                } elseif ($blogid == 5) {
                                    $selected = "Charlotte";
                                } elseif ($blogid == 6) {
                                    $selected = "Jacksonville";
                                } elseif ($blogid == 7) {
                                    $selected = "Outer Banks";
                                } else {
                                    $selected = "Select A Location";
                                }
                                ?>

                                  <button class="btn btn-secondary dropdown-toggle  px-lg-3 px-3 silo-dropdown-btn  d-flex align-items-center mw-251 " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $selected;?> <i class="icon-map-location-dot1 ms-3 bc_text_18"></i>
                                  </button>
                                  <ul class="dropdown-menu w-100 py-0 mt-1" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(3)); ?>/">NC Triangle</a></li>
                                    <li><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(4)); ?>/">NC Triad</a></li>
                                    <li><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(5)); ?>/">Charlotte</a></li>
                                    <li><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(6)); ?>/">Jacksonville</a></li>
                                    <li><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(7)); ?>/">Outer Banks</a></li>
                                  </ul>
                                </div>
                            </div>
                    <?php $site_id = get_current_blog_id();
                            $class = "";
                          if($site_id==1) {

                                $class = "openModalBtn"; 
                                $href="javascript:void(0)";
                                    
                                } else {
                                  $href=get_home_url() . $args['globals']['desktop_schedule_online_button']['url'];
                                }

                                ?>
                            <span class="px-2 py-2 me-2 mb-0 call_today text-end">
                            <?php echo $args['globals']['header']['call_text'] ?> <br><a href="tel: <?php echo $args['site_info']['country_code']; ?><?php echo $args['site_info']['phone']; ?>" class="no_hover_underline phone_number"><i class="icon-phone bc_text_13_7 mr-1"></i>
                                    <?php echo $args['site_info']['country_code']; ?><?php echo $args['site_info']['phone']; ?></a> 
                            </span>
                                                        <?php if ($args['globals']['desktop_schedule_online_button']['enabled']) { if ($args['globals']['desktop_schedule_online_button']['type'] != 'url') { ?>
                                <span id="schedule_online_button_desktop" class="btn btn-primary mw-242 mh-43 no_hover_underline" ><i class="<?php echo $args['globals']['desktop_schedule_online_button']['icon_class']; ?>"></i><?php echo $args['globals']['desktop_schedule_online_button']['label']; ?></span>
                            <?php } else { ?>
                                <a  class="<?php echo $class;?> btn btn-primary mw-206 mh-43 no_hover_underline"  href="<?php echo $href; ?>"><i class="<?php echo $args['globals']['desktop_schedule_online_button']['icon_class']; ?> d-none"></i><?php echo $args['globals']['desktop_schedule_online_button']['label']; ?></a>
                            <?php } } ?>                       
                        </div>
                        <!-- Desktop Navigations Starts -->
                        <?php get_template_part('global-templates/nav/desktop/a'); ?>
                        <!-- Desktop Navigations Ends -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Deafult Ends -->
        <!-- Mobile Header Starts -->
        <div class="container-fluid ui_kit_mobile_header mobile_header_type_A d-lg-none show-on-touch px-0">
            <!-- Mobile Review Section Start -->
            <div class="text-center" style="background-color: #ea17a7;">
                        <span class="announcment_bar_text no_hover_underline d-inline-flex align-items-center">
                           <a <?php if(isset($siteid) && $siteid == 1){?> href="javascript:void(0)" class="openModalBtn no_hover_underline d-inline-flex align-items-center text_bold text-black font_12 px-2" <?php }else{ ?> class="no_hover_underline d-inline-flex align-items-center text_bold text-black font_12 px-2" href="<?php echo get_home_url();?>/toys-for-tots/" <?php } ?>>Toys for Tots - Donate & Save!</a>
                          
                        </span>
                    </div>
                    <div class="text-center">
                        <span class="announcment_bar_text no_hover_underline d-inline-flex align-items-center">
                            <i class="icon-star1 text_14 line_height_14 me-1 stars_color"></i>
                            <i class="icon-star1 text_14 line_height_14 me-1 stars_color"></i>
                            <i class="icon-star1 text_14 line_height_14 me-1 stars_color"></i>
                            <i class="icon-star1 text_14 line_height_14 me-1 stars_color"></i>
                            <i class="icon-star1 text_14 line_height_14 me-1 stars_color"></i>
                            <a class="announcment_bar_text no_hover_underline d-inline-flex align-items-center    ms-1 text_normal" href="<?php echo get_home_url();?>/reviews/">Read Our Reviews <i class="icon-chevron-right1 ms-1 text_16 line_height_16 transform"></i></a>
                        </span>
                    </div>
                <!--  Mobile Review Section end-->

            <div class="container-fluid">
                <div class="row row-eq-height no-gutters align-items-center">
                    <div class="col-2 ps-0 text-center  align-self-center">
                        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler d-inline-flex align-items-center <?= $announcement_class; ?>" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
                            <i class="icon-bars2 true_black  navbar-toggler-icon icon-bars2 text_24 line_height_24"></i>
                        </button>
                    </div>
                    <div class="col-7 text-center px-0">
                        <a href="<?php echo get_home_url(); ?>/" class="d-block">
                        <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/logo.svg'; ?>" width="236" height="104" style="max-width: 236px" class="img-fluid w-atuo" alt="Comfort First Heating & Cooling logo">
                        </a>
                    </div>
                    <div class="col-3 text-center pe-0">
                        <div class="d-flex h-100 phone-icon no_hover_underline ">
                            <a  href="tel:<?php echo $args['site_info']['country_code']; ?><?php echo $args['site_info']['phone']; ?>"   class="d-flex align-items-center justify-content-center w-100 no_hover_underline color_primary_bg h-112">
                                <i class="true_white icon-phone-flip  text_24 line_height_24  "></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade mobile_popup_form_background_color  border-0 " id="cta-a" tabindex="-1" role="dialog" aria-labelledby="cta-a" aria-hidden="true">
            <div class="modal-dialog mt-0" role="document">
                <div class="modal-content border-0 position-absolute mt-md-0">
                    <button type="button" class="close p-0 bg-transparent border-0" data-bs-dismiss="modal" aria-label="Close" style="z-index: 9; position: absolute; right: 20px; top: 20px;">
                        <i class="apply-conditional-color icon-xmark  close_icon text_24 line_height_24  color_quaternary_c" data-dark-color="true_black" data-light-color="true_white"></i>
                    </button>
                    <div class="modal-body px-2 mobile_popup_form_background_color text-center border-0">
                    <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/logo.svg'; ?>" width="236" height="104" style="max-width: 236px" class="img-fluid w-atuo" alt="Comfort First Heating & Cooling logo"> 
                        <div class="text-center pt-4">
                            <a href="tel:<?php echo $args['site_info']['country_code']; ?><?php echo $args['site_info']['phone']; ?>" class="btn btn-quaternary">
                                <i class="icon-phone"></i> call | <?php echo $args['site_info']['country_code']; ?><?php echo $args['site_info']['phone']; ?> <i class="icon-chevron-right2"></i>
                            </a>
                            <?php
                            $footerItems = $args['globals']['ctas'];
                            $i = 0;
                            foreach ($footerItems as $key => $value) {
                                if ($value['enabled'] == true) {
                                    if ($value['type'] == 'url' || $value['type'] == 'sms') {
                                        echo'<a href="' . get_home_url() . $value['type'] . '" class="btn btn-quaternary" id="rds_footer_element_' . $i . '">
                           <i class="' . $value['icon_class'] . '"></i> ' . $value['label'] . '  <i class="icon-chevron-right2"></i>
                        </a>';
                                    } else {
                                        echo'<span id="rds_footer_element_' . $i . '" class="btn btn-quaternary" >
                           <i class="' . $value['icon_class'] . '"></i> ' . $value['label'] . '  <i class="icon-chevron-right2"></i>
                        </span>';
                                    }
                                }
                                $i++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="modal fade true_white_bg  border-0 " id="cta-a-footer" tabindex="-1" role="dialog" aria-labelledby="cta-a-footer" aria-hidden="true">
                <img src="<?php echo get_exist_image_url('hero','ribbon.png'); ?>" srcset="<?php echo get_exist_image_url('hero','ribbon.png'); ?> 1x, <?php echo get_exist_image_url('hero','ribbon@2x.png'); ?> 2x,'); ?> 3x"  class="mb-4 img-fluid h-auto position-relative z-index-9" alt="50+ years of experience ribbon with stars" width="333" height="89"> 
                <button type="button" class="close p-0 bg-transparent border-0" data-bs-dismiss="modal" aria-label="Close" style="z-index: 9; position: absolute; right: 20px; top: 20px;">
                    <i class="apply-conditional-color icon-xmark  close_icon text_24 line_height_24  color_quaternary_c" data-dark-color="true_black" data-light-color="true_black"></i>
                </button>
            <div class="modal-dialog mt-0 mx-0 mx-md-auto" role="document">
                <div class="modal-content border-0 px-1 pb-5 position-absolute mobile_popup_form_background_color footer-popup-modal-content mt-md-0">               
                    <div class="modal-body px-3 mobile_popup_form_background_color text-center border-0"> 
                        <!-- <span class="d-block text-center footer-popup-heading">Leader in Home Comfort Since 1931</span> -->
                        <span class="d-block text-center footer-popup-subheading pb-3 pt-1">Get Your Free Estimate</span>
                       <div class="px-4">
                           <?php echo do_shortcode('[gravityform id=6 ajax=true]')?>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <?php get_template_part('global-templates/nav/mobile/a'); ?>
        <!-- Mobile Header Ends -->



       