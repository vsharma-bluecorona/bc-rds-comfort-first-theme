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
                        <a href="<?php echo get_home_url(); ?>" class="d-inline-block">
                        <img src="<?php echo get_exist_image_url('header','header-logo'); ?>" srcset="<?php echo get_exist_image_url('header','header-logo'); ?> 1x, <?php echo get_exist_image_url('header','header-logo@2x'); ?> 2x, <?php echo get_exist_image_url('header','header-logo@3x'); ?> 3x" alt="Header Logo" class="branding_logo img-fluid w-auto" style="max-width: 294px;" width="294" height="59">
                        </a>
                    </div>
                    <div class="col-lg-9 ps-0 text-end pt-3">
                        <div class="d-lg-flex align-items-center justify-content-end font_default mt-2 pt-2">
                            <span class="px-2 py-2 me-2 mb-0 call_today">
                            <?php echo $args['globals']['header']['call_text'] ?> <a href="tel: <?php echo $args['site_info']['country_code']; ?><?php echo $args['site_info']['phone']; ?>" class=" phone_number">
                                    <?php echo $args['site_info']['country_code']; ?><?php echo $args['site_info']['phone']; ?></a> 
                            </span>
                                                        <?php if ($args['globals']['desktop_schedule_online_button']['enabled']) { if ($args['globals']['desktop_schedule_online_button']['type'] != 'url') { ?>
                                <span id="schedule_online_button_desktop" class="btn btn-primary mw-242 mh-43 " ><i class="<?php echo $args['globals']['desktop_schedule_online_button']['icon_class']; ?>"></i><?php echo $args['globals']['desktop_schedule_online_button']['label']; ?></span>
                            <?php } else { ?>
                                <a  class="btn btn-primary mw-242 mh-43 "  href="<?php echo get_home_url() . $args['globals']['desktop_schedule_online_button']['url'] ?>"><i class="<?php echo $args['globals']['desktop_schedule_online_button']['icon_class']; ?>"></i><?php echo $args['globals']['desktop_schedule_online_button']['label']; ?></a>
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
            <div class="container-fluid">
                <div class="row row-eq-height no-gutters align-items-center">
                    <div class="col-2 ps-0 text-center  align-self-center">
                        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler d-inline-flex align-items-center <?= $announcement_class; ?>" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
                            <i class="icon-bars2 color_primary navbar-toggler-icon icon-bars2 text_24 line_height_24"></i>
                        </button>
                    </div>
                    <div class="col-7 text-center px-0">
                        <a href="<?php echo get_home_url(); ?>" class="d-block">
                        <img src="<?php echo get_exist_image_url('header','m-header-logo'); ?>" srcset="<?php echo get_exist_image_url('header','m-header-logo'); ?> 1x, <?php echo get_exist_image_url('header','m-header-logo@2x'); ?> 2x, <?php echo get_exist_image_url('header','m-header-logo@3x'); ?> 3x"  width="200" height="40" style="max-width: 200px" class="img-fluid w-atuo" alt="site-mobile-logo">
                        </a>
                    </div>
                    <div class="col-3 text-center pe-0">
                        <div class="d-flex h-100 phone-icon no_hover_underline ">
                            <a data-bs-toggle="modal" href="#" data-bs-target="#cta-a"  class="d-flex align-items-center justify-content-center w-100 no_hover_underline color_primary_bg">
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
                        <i class="apply-conditional-color icon-xmark  close_icon text_24 line_height_24  " data-dark-color="true_black" data-light-color="true_white"></i>
                    </button>
                    <div class="modal-body px-2 mobile_popup_form_background_color text-center border-0">
                    <img src="<?php echo get_exist_image_url('header','m-menu-cta-logo@3x'); ?>" srcset="<?php echo get_exist_image_url('header','m-menu-cta-logo'); ?> 1x, <?php echo get_exist_image_url('header','m-menu-cta-logo@2x'); ?> 2x, <?php echo get_exist_image_url('header','m-menu-cta-logo@3x'); ?> 3x"  class="mb-4 w-auto h-auto" alt="Cta Logo" width="191" height="39"> 
                        <div class="text-center">
                            <a href="tel:<?php echo $args['site_info']['country_code']; ?><?php echo $args['site_info']['phone']; ?>" class=" btn-quaternary">
                                <i class="icon-phone"></i> call | <?php echo $args['site_info']['country_code']; ?><?php echo $args['site_info']['phone']; ?> <i class="icon-chevron-right2"></i>
                            </a>
                            <?php
                            $footerItems = $args['globals']['ctas'];
                            $i = 0;
                            foreach ($footerItems as $key => $value) {
                                if ($value['enabled'] == true) {
                                    if ($value['type'] == 'url' || $value['type'] == 'sms') {
                                        echo'<a href="' . get_home_url() . $value['type'] . '" class=" btn-quaternary" id="rds_footer_element_' . $i . '">
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
        <?php get_template_part('global-templates/nav/mobile/a'); ?>
        <!-- Mobile Header Ends --> 