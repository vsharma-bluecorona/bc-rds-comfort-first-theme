<?php
$get_alt_text = rds_alt_text();
$footer_tem = json_decode(get_option('rds_template'), TRUE);
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
<footer class="color_tertiary_bg  overflow-hidden">

    <div class="container-fluid text-md-start pt-0 pt-lg-5 pb-5 pb-lg-5">
        <div class="container pt-lg-0 pt-3">
            <div class="row">
                <div class="col-sm-12 col-lg-6 pr-xl-2 pt-lg-2 text-lg-start text-center">
                    <a class="mt-1 d-inline-block pb-1" href="<?php echo get_home_url(); ?>/">
                    <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/logo.svg'; ?>"  class="d-lg-block d-none img-fluid" style="max-width: 327px" <?php echo $footer_logo_alt; ?> width="327" height="144">

                    <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/logo.svg'; ?>" class="d-lg-none d-block img-fluid " style="max-width: 329px" <?php echo $footer_mobile_logo_alt; ?> width="329" height="145">
                    </a>
                    <div class="text_24 mt-4 d-lg-flex  pb-lg-0 pb-2">
                      <?php $site_id = get_current_blog_id();
                            $class = "";
                          if($site_id==1) {

                                $class = "openModalBtn"; 
                                $href="javascript:void(0)";
                                    
                                } else {
                                  $href=get_home_url() . $args['globals']['desktop_schedule_online_button']['url'];
                                }

                                ?>
                        <div class="d-block w-100">                           
                            <div class="mb-3 pb-4">
                                 <?php 
                                    // $phoneNum = $args['site_info']['phone'];
                                    // $phoneNumber = preg_replace('/\D/', '', $phoneNum);
                                    // $formatedPhone = substr($phoneNumber, 0, 6) . '-' . substr($phoneNumber, 6); 
                                    ?>
                                <span class="pt-1 pt-lg-0 ps-lg-2 d-inline-block call-us-footer">Call Us Today!</span><br class="d-block d-lg-none"> <a href="tel: <?php echo $args['site_info']['country_code'] . $args['site_info']['phone']; ?>" class="no_hover_underline footer_phone_number position-relative "><?php echo $args['site_info']['country_code'] . $args['site_info']['phone']; ?></a>
                            </div>
                            <div class="d-flex">
                            <?php if ($args['globals']['desktop_schedule_online_button']['enabled']) { if ($args['globals']['desktop_schedule_online_button']['type'] != 'url') { ?>
                                <span id="schedule_online_button_desktop" class="btn btn-primary d-none d-lg-flex h-52  py-0 mw-206 mh-43 no_hover_underline" ><i class="<?php echo $args['globals']['desktop_schedule_online_button']['icon_class']; ?> d-none"></i><?php echo $args['globals']['desktop_schedule_online_button']['label']; ?></span>
                            <?php } else { ?>
                                <a  class="<?php echo $class;?> btn btn-primary mw-206 mh-43 d-none d-lg-flex h-52  py-0 no_hover_underline"  href="<?php echo $href; ?>"><i class="<?php echo $args['globals']['desktop_schedule_online_button']['icon_class']; ?> d-none"></i><?php echo $args['globals']['desktop_schedule_online_button']['label']; ?></a>
                            <?php } } ?> 
                            <div class="silo-dropdown bc_color_tertiary_bg mx-auto ms-lg-0 px-3 ">
                                <div class="dropdown">
                                     <?php 
                                    
                                $blogid =get_current_blog_id();

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
                                  <button class="btn btn-secondary w-100 dropdown-toggle py-0 justify-content-arround  px-lg-3 px-4 silo-dropdown-btn  d-flex align-items-center mw-251 " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $selected;?> <i class="icon-map-location-dot1 ms-3 bc_text_18"></i>
                                  </button>
                                  <ul class="dropdown-menu w-100 py-0" aria-labelledby="dropdownMenuButton1">
                                    <div><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(3)); ?>/">NC Triangle</a></div>
                                    <div><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(4)); ?>/">NC Triad</a></div>
                                    <div><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(5)); ?>/">Charlotte</a></div>
                                    <div><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(6)); ?>/">Jacksonville</a></div>
                                    <div><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(7)); ?>/">Outer Banks</a></div>
                                  </ul>
                                </div>
                            </div>
                        </div>
                        
                            <div class="order-lg-3 order-2 pt-4">
                            <div class="text-center text-lg-start d-flex justify-content-lg-start justify-content-center">
                                <span class="d-block mb-3 h8 mb-lg-0 mt-lg-1 me-3 text-lg-start text-center mt-lg-1 mb-lg-0 mt-1"><?php echo $args['site_info']['heading']; ?></span>
                                <?php
                                $socialItems = $args['site_info']['social_media']['items'];
                                foreach ($socialItems as $value) {
                                    echo '<a target="_blank" class=" social_media_icons bc_text_20 no_hover_underline   mx-2 ms-lg-0 me-lg-3 sm_text_20 sm_line_height_25 no_hover_underline " title="' . $value['icon_class'] . '" href="' . $value['url'] . '">
                                      <i class="' . $value['icon_class'] . '"></i>
                                       </a>';
                                }
                                ?>
                            </div></div>

                        </div>
                    </div>
                    <?php if (!empty($args['site_info']['license_number'][0])) { 
                        ?>


                        <div class="text_16 mt-3 mt-lg-4 d-lg-flex">
                            <div class="position-relative">
                                <small class=" d-flex align-items-center justify-content-center justify-content-lg-start h8">
                                    <i class="footer_license_icon_color icon-id-card2 text_24 line_height_25 float-lg-start me-2  d-inline-block"></i> 
                                    <?php
                                    if (count($args['site_info']['license_number']) > 1) {
                                        echo 'Licenses: ';
                                    } else {
                                        echo 'License: ';
                                    }
                                    ?>
                                </small>
                                <div class="ps-lg-1"><span class="d-inline-block footer_add  text_normal text_14 line_height_20 sm_line_height_30 line_height_20 sm_text_16 pt-lg-0 pt-2 font_default ms-lg-4 ps-lg-2">
                                        <?php
                                        foreach ($args['site_info']['license_number'] as $value) {
                                            echo '' . $value . '<br>';
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-sm-12 col-lg-3 pt-lg-0 pt-3 d-lg-block d-none ">
                    <div class="ps-lg-4 pt-lg-5 mt-lg-3">
                        <h3 class="d-block mb-4 color_secondary">
                            <?php echo $args['globals']['footer']['data']['footer_menu_1_heading']; ?>
                        </h3>	
                        <?php
                        $name = $args['globals']['footer']['data']['footer_menu_1_name'];
                        $menu = get_term_by('name', $name, 'nav_menu');
                        $menu_items = wp_get_nav_menu_items($menu);
                        if (isset($menu_items) && !empty($menu_items)):
                            ?>
                            <ul class="list-unstyled text_14">
                                <?php foreach ($menu_items as $key => $value) { ?>
                                    <li class="footer_links  no_hover_underline <?php echo $value->classes[0]; ?>">
                                        <?php
                                        if ($value->classes[0] == 'openModalBtn') {
                                            $href = "javascript:void(0)";
                                        } else {
                                            $href = $value->url;
                                        }
                                        ?>
                                        <a class="footer_links no_hover_underline" target="<?php echo $value->target; ?>" href="<?php echo $href; ?>">
                                            <?php echo $value->post_title; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 pt-lg-0 pt-3 d-lg-block d-none">
                    <div class="ps-lg-4 pt-lg-5 mt-lg-3">
                        <h3 class="d-block mb-4 color_secondary">
                            <?php echo $args['globals']['footer']['data']['footer_menu_2_heading']; ?>
                        </h3>
                        <?php
                        $name = $args['globals']['footer']['data']['footer_menu_2_name'];
                        $menu = get_term_by('name', $name, 'nav_menu');
                        $menu_items = wp_get_nav_menu_items($menu);
                        //print_r($menu_items);
                        if (isset($menu_items) && !empty($menu_items)):
                            ?>
                            <ul class="list-unstyled text_14">
                                <?php foreach ($menu_items as $key => $value) { ?>
                                    <li class="footer_links  no_hover_underline">
                                        <a class="footer_links no_hover_underline" target="<?php echo $value->target; ?>" href="<?php echo $value->url; ?>">
                                            <?php echo $value->post_title; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
                <!-- <div class="col-sm-12 col-lg-3 pt-lg-0 pt-3">
                    <div class="d-flex flex-column"> -->
                        <!-- <div class="order-lg-1 order-1"><h6 class="d-block mb-lg-4 mb-2 h6-alt  font_default    pb-1  sm_text_16  sm_line_height_21 text-center text-lg-start">
                                </?php
                                // if (count($args['site_info']['address']) > 1) {
                                //     echo 'Office Locations';
                                // } else {
                                //     echo 'Office Location';
                                // }
                                echo $args['site_info']['address_heading']; 
                                ?>
                            </h6>
                            </?php
                            $address = $args['site_info']['address'];
                            foreach ($address as $value) {
                                ?>
                                <p class="footer_add  text_14 line_height_28 sm_line_height_30  font_default mb-0  sm_text_16 text-center text-lg-start pe-xxl-5"> </?php echo $value['address']; ?><br> </?php echo $value['city']; ?> </?php echo $value['state']; ?> </?php echo $value['zip']; ?></span></p>
                            </?php } ?>
                        </div> -->

                        

<!-- 
                        <div class="order-lg-2 order-3">
                            <span class="d-block mb-2 h8 pt-4 text-lg-start text-center mb-2"></?php echo $args['site_info']['hours_heading']; ?></span>
                            <div class="mw-266 mx-auto">
                                <div class="row">
                                    <div class="col-7 px-lg-3 px-0">
                                        <p class="footer_add text-lg-start text_14 line_height_28 sm_text_16 sm_line_height_30 mb-0 text-center"></?php echo $args['site_info']['week_days']; ?></p>     
                                    </div>
                                    <div class="col-5 px-lg-3 px-0">
                                        <p class="footer_add text-lg-start text_14 line_height_28 sm_text_16 sm_line_height_30 mb-0 text-center"></?php echo $args['site_info']['weekday_hours']; ?></p>


                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-7 px-lg-3 px-0">
                                        <p class="footer_add text-lg-start text_14 line_height_28 sm_text_16 sm_line_height_30 mb-0 text-center"></?php echo $args['site_info']['weekend_days']; ?></p>   
                                    </div>
                                    <div class="col-5 px-lg-3 px-0">
                                        <p class="footer_add text-lg-start text_14 line_height_28 sm_text_16 sm_line_height_30 mb-0  text-center"></?php echo $args['site_info']['weekend_hours']; ?></p>   

                                    </div>

                                </div>
                            </div>
                        </div> -->
                    <!-- </div>

                </div> -->
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
        $page_ids_to_show_service_areas = array_merge($page_ids_to_show_service_areas, $get_pageids);
    }
    if ($enable_service_areas['enable'] == true && is_page($page_ids_to_show_service_areas)) {
        get_template_part('page-templates/common/servicearea');
    }
    ?>
    <div class="footer_copyright_bar <?php echo isset($classcopyright) ? $classcopyright : ''; ?> text-center text-lg-start font_alt_1 mb-lg-0 mb-5 pt-1 pb-3 pt-lg-4 pb-lg-4">

        <div class="container py-lg-1 pb-3  line_height_60 sm_line_height_20 sm_text_14   font_alt_1  text_normal  text_16 px-0 a-alt-footer   ">
            <i class="a-alt-footer icon-copyright4   text_16  line_height_28  "></i> <?php echo date("Y"); ?> <?php echo $args['site_info']['copyright_title']; ?><?php if ($args['site_info']['bluecorona_branding']) { ?><span class="d-none line_height_60 sm_line_height_20 sm_text_14  font_alt_1  text_normal  text_16 d-md-inline-block">&nbsp; | &nbsp;</span><span class="d-block d-sm-inline-block d-lg-inline-block p-alt">Web Design by&nbsp;&nbsp;<a class=" footer_copyright_links no_hover_underline  line_height_60 sm_line_height_20 sm_text_14  font_alt_1  text_normal  text_16  a-alt-footer  copyright_hover" target="_blank" href="<?php echo $args['site_info']['bluecorona_link']; ?>"><img src="<?php echo get_exist_image_url('footer','bc-logo.svg'); ?>" width="19" height="20" <?php echo $copyright_svg_alt; ?>>&nbsp;&nbsp;Blue Corona</a></span><?php } ?>
            <span class="d-lg-inline-block d-none">&nbsp; | &nbsp;</span><span class="d-lg-inline-block d-block"><a class=" footer_copyright_links no_hover_underline  line_height_60 sm_line_height_20 sm_text_14  font_alt_1  text_normal  text_16 a-alt-footer   copyright_hover"  href="#" data-bs-toggle="modal" data-bs-target="#disclaimer">Disclaimer</a><span class="d-inline-block">&nbsp; | &nbsp;</span><a class=" text_16 a-alt-footer  line_height_60 sm_line_height_20 sm_text_14  font_alt_1  text_normal  text_16  footer_copyright_links no_hover_underline  copyright_hover  " href="<?php echo get_home_url() . $args['site_info']['privacy_policy_link']; ?>/">Privacy Policy</a><span class="d-inline-block">&nbsp; | &nbsp;</span><a class=" text_16 a-alt-footer  line_height_60 sm_line_height_20 sm_text_14  font_alt_1  text_normal  text_16  footer_copyright_links no_hover_underline  copyright_hover  " href="<?php echo esc_url(get_homepage_url_of_site(1)); ?>/Sitemap/">Sitemap</a><span class="d-none d-sm-inline-block">&nbsp; | &nbsp;</span><br class="d-inline-block d-sm-none"><a target="_blank" class=" text_16 a-alt-footer  line_height_60 sm_line_height_20 sm_text_14  font_alt_1  text_normal  text_16  footer_copyright_links no_hover_underline  copyright_hover  " href="https://www.yourcomfortcorner.com/">Employee Website</a></span>
        </div> 
    </div>
      <?php
    global $wp;
    $url = home_url( $wp->request );
    $display = ""; 
    $classcopyright="";

    if (strpos($url, "thankyou")) {
        $display = "d-none";
        $classcopyright="mobile-spacing-sticky";
    }else {
     $display = " "; 
     $classcopyright=" ";
    
    }
    
?>
    <div class="<?php echo $display;?> container-fluid m-0 p-0 d-lg-none fixed-bottom btn color_primary_bg" style="position:fixed;">
        <div class="container p-0 color_primary_bg">
            <div class="row no-gutters">
                <div class="col-12 schedule_service text-center">
                    <a data-bs-toggle="modal" href="#" data-bs-target="#cta-a-footer" class="py-3 d-flex align-items-center justify-content-center btn no_hover_underline mh-65 sticky-footer-btn">SCHEDULE NOW</a>
                </div>
            </div>
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
    <div class="modal fade p-0 mobile_cta" id="mobile-cta" tabindex="-1" role="dialog" aria-labelledby="mobilectaLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl m-0 border_form bg_form pt-lg-3 pb-lg-4  true_white_bg order-lg-1 order-1 h-100" role="document">
            <div class="modal-content rounded-0 border-0 true_white_bg">
                <div class="modal-header border-0 text-end ms-auto pb-0">
                    <button type="button" class="close border-0 bg-transparent ms-auto" data-bs-dismiss="modal" aria-label="Close" style="opacity: 1;">
                        <span aria-hidden="true"><i class="icon-xmark1 true_black line_height_24 text_24 color_quaternary"></i></span>
                    </button>
                </div>
                <div class="modal-body px-md-5 px-4 pb-5 col-md-10 offset-md-1 text-lg-start text-center">
                    <span class="d-block pt-lg-1 text-center font_default text_normal text_27 line_height_32"><?php echo $args['globals']['request_service']['heading']; ?></span>
                    <span class="d-block pb-lg-4 text-center font_default text_semibold text_28 line_height_33">
                        <?php echo isset($args['globals']['request_service']['subheading']) ? $args['globals']['request_service']['subheading'] : ''; ?>
                    </span>

                    <?php echo do_shortcode('[gravityforms id=6 ajax=true]'); ?> 

                </div>
            </div>
        </div>
    </div>
<!-- Services Pop Start -->
    <div class="modal fade indexing-location-popup" id="servicespopup" data-bs-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="servicespopupLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl max-w-lg-965" role="document">
                <div class="modal-content color_tertiary_bg pb-2">
                    
                    <div class="modal-header disclimer-modal-header border-0 disclaimer-modal-header">
                        <button type="button"  data-bs-dismiss="modal" class="close opacity-1 border-0 position-absolute color_tertiary_bg right-15 top-15"  aria-label="Close">
                      <span aria-hidden="true"><i class="icon-xmark1 true_black text_40 line_height_25"></i></span>
                        </button>
                    </div>
                    <div class="modal-body mt-4 mt-lg-0 px-0 text-center">
                        <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/logo.svg'; ?>"  class="img-fluid mb-4 pb-3" style="max-width: 269px" <?php echo $footer_logo_alt; ?> width="269" height="119">
                        <div id="servicespopupLabel" class="d-block text-shadow-60 font_default text_bold bc_text_40 bc_line_height_50 true_black text-capitalize pb-4 text-center">People You Can Count On</span></div>
                        <div class="container pt-4 pb-4 px-0 px-lg-3 banner-location-list mw-350">
                            <div class="silo-dropdown bc_color_tertiary_bg mx-auto ms-lg-0 px-3 ">
                                <div class="dropdown  max-w-365 w-100 mx-auto">
                                  <button class="btn btn-secondary  max-w-365 w-100 mx-auto dropdown-toggle py-0 justify-content-center   px-lg-3 px-4 silo-dropdown-btn  d-flex align-items-center  " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Select A Location <i class="icon-map-location-dot1 ms-3 bc_text_18"></i>
                                  </button>
                                      <ul class="dropdown-menu w-100 py-0" aria-labelledby="dropdownMenuButton1">
                                         <div><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(3)); ?>/">NC Triangle</a></div>
                                    <div><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(4)); ?>/">NC Triad</a></div>
                                    <div><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(5)); ?>/">Charlotte</a></div>
                                    <div><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(6)); ?>/">Jacksonville</a></div>
                                    <div><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(7)); ?>/">Outer Banks</a></div>
                                      </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

<!-- Services Pop End -->
<!-- popuponload -->
 

    <div class="modal fade indexing-location-popup" id="servicespopuponload" data-bs-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="servicespopupLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl max-w-lg-965" role="document">
    <div class="modal-content color_tertiary_bg pb-2">       
        <div class="modal-header disclimer-modal-header border-0 disclaimer-modal-header">
            <button type="button"  data-bs-dismiss="modal" class="close opacity-1 border-0 position-absolute color_tertiary_bg right-15 top-15"  aria-label="Close">
                <span aria-hidden="true"><i class="icon-xmark1 true_black text_40 line_height_25"></i></span>
            </button>
        </div>
      <div class="modal-body mt-4 mt-lg-0 px-0 text-center">
        <img src="<?php echo get_stylesheet_directory_uri().'/img/svgs/logo.svg'; ?>"  class="img-fluid mb-4 pb-3" style="max-width: 269px" <?php echo $footer_logo_alt; ?> width="269" height="119">
        <div id="servicespopupLabel" class="d-block pt-5 text-shadow-60 font_default text_bold bc_text_40 bc_line_height_50 true_black text-capitalize pb-4 text-center">People & Comfort <span class="d-lg-inline d-block">You Can Count On</span></div>
            <div class="container pt-4 pb-4 px-0 px-lg-3 banner-location-list mw-350">
                        <div class="silo-dropdown bc_color_tertiary_bg mx-auto ms-lg-0 px-3 ">
                            <div class="dropdown  max-w-365 w-100 mx-auto">
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
                                  <button class="btn btn-secondary  max-w-365 w-100 mx-auto dropdown-toggle py-0 justify-content-center    px-lg-3 px-4 silo-dropdown-btn  d-flex align-items-center " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $selected;?> <i class="icon-map-location-dot1 ms-3 bc_text_18"></i>
                                  </button>
                                  <ul class="dropdown-menu dropdown-menu-footer-location w-100 py-0" aria-labelledby="dropdownMenuButton1">
                                    <div><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(3)); ?>/">NC Triangle</a></div>
                                    <div><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(4)); ?>/">NC Triad</a></div>
                                    <div><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(5)); ?>/">Charlotte</a></div>
                                    <div><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(6)); ?>/">Jacksonville</a></div>
                                    <div><a class="dropdown-item" href="<?php echo esc_url(get_homepage_url_of_site(7)); ?>/">Outer Banks</a></div>
                                  </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- JavaScript Code -->
<script>
    jQuery(document).ready(function(){
        // Function to show the modal
        function showModal(modalId) {
            console.log(jQuery(modalId).modal('show'));
        }

        // Function to close the modal
        function closeModal(modalId) {
            console.log(jQuery(modalId).modal('hide'));
        }

        // Show the modal on button click
        jQuery(".openModalBtn").click(function(){
            showModal("#servicespopup");
        });

        // Close the modal on clicking the close icon
        jQuery(".icon-xmark1").click(function(){
            closeModal("#servicespopup");
            //closeModal("#servicespopuponload"); // Close the onload modal as well
        });
        
       
    });
</script>
    <script type="text/javascript">
        function couponBannerButtonClick(attr) {
            var CouponTitle = jQuery(attr).siblings('.coupon_title').text();
            var CouponsubTitle = jQuery(attr).siblings('.coupon_subtitle').text();
            var Couponsubheading = jQuery(attr).siblings('.coupon_subtitle2 ').text();
            console.log(CouponTitle + " " + CouponsubTitle + " " + Couponsubheading)
            jQuery(".coupon-name").find('input:text').val(CouponTitle + " " + CouponsubTitle + " " + Couponsubheading);
            jQuery(".bc-promotion-title").text(CouponTitle + " " + CouponsubTitle);
        }
    </script>
</footer>