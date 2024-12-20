 <div class="d-lg-none pt-lg-5 pb-0 pt-5 mt-5 mt-lg-0">
    <div class="container-fluid pb-lg-5 pb-4 px-0">
        <div class="container abc">
            <div class="row px-3 px-lg-0">
                   <?php
                    $blogid = get_current_blog_id();

                    ?>

                <?php
                $j=1;
                $servicesItems = $args['globals']['services']['items'];
                
                $titleLengths = array();
                    foreach ($servicesItems as $item) {
                        // Check if the 'title' key exists in the current array element
                        if (isset($item['title'])) {
                            $title = $item['title'];
                            $titleLengths[] = strlen($title);
                        }
                    }
                     $maxValue = max($titleLengths);
                     $class  = "h-lg-250";
                     if ($maxValue <21){
                        $class = 'h-lg-250';
                     }elseif ($maxValue >=21 && $maxValue <42){
                        $class = 'h-lg-284';
                     }elseif ($maxValue >=42){
                        $class = 'h-lg-309';
                     }
                     $class_pop =" ";
                foreach ($servicesItems as $value) {
                    $service_mobile_main = get_stylesheet_directory_uri().'/img/svgs/service_main' . $j . '.svg';
                    if ($value['title'] == "Heat Pumps") {
                        $service_mobile_main = get_stylesheet_directory_uri().'/img/svgs/service_main5.svg';
                    }
                    if ($blogid == 1) {
                        $class_pop = "openModalBtn";
                        $href = "javascript:void(0);"; // Assigning a JavaScript void function for blog ID 2
                    } else {
                        $href = get_home_url() . $value['link']; // Assuming $value['link'] holds the link you want to append to home URL
                    }

                    echo '<div class="col-lg h-lg-250  mb-4  px-0 '.$class.'">

                    <a href="' . $href  . '" class="'. $class_pop.' d-block  service-border-top-0' . $args['globals']['services']['top_border_class'] . ' no_hover_underline px-lg-3 h-100 service_block box-shadow-service  pt-lg-0">
                    <div class="d-flex mb-0 d-lg-block align-items-center text-lg-center py-lg-2 px-lg-0 ps-4 py-3">
                    <div class="w-100 d-lg-block d-flex py-2  py-lg-5">
                    <div class="col-lg-12 col-2">
                    <img src="'.$service_mobile_main.'"  alt="Orange animation of thermostat with downward pointing arrow next to it" class=" img-fluid w-auto" style="max-width: 100%; max-height:50px;" width="60" height="54">
                    </div>
                    <div class="col-lg-12 col-8 ps-4 py-0">
                    <h4 class="h4 mb-lg-2 mb-0 mt-lg-4 pt-lg-1">' . $value['title'] . '</h4>
                    </div>
                    <div class="col-lg-12 col-2 text-end services">
                        <div class="triangle-bottomright ">
                            <span class="services-icon-link float-end position-relative">
                                <i class="icon-arrow-right1 text_20 line_height_28 true_white"></i>
                            </span>
                        </div>
                    </div>
                    </div>
                    </div>
                    </a>
                    </div>';
                     $j++;
                }
               
                ?>  
            </div>
        </div>
    </div>
</div>
<div class="d-none position-relative d-lg-block pt-lg-5 pb-0 pt-4">
    <div class="container-fluid pb-lg-5 pb-4 px-0">
        <div class="container">
            <div id="rds_services_swiper-<?= $args['globals']['services']['widget_id']; ?>" class="swiper  p-3 pb-lg-4 overflow-inherit">
                <div class="abc swiper-wrapper "> 
                    <?php
                    $i=1;
                    
                    $servicesItems = $args['globals']['services']['items'];
                    $count = count($servicesItems);
                    $titleLengths = array();
                    foreach ($servicesItems as $item) {
                        // Check if the 'title' key exists in the current array element
                        if (isset($item['title'])) {
                            $title = $item['title'];
                            $titleLengths[] = strlen($title);
                        }
                    }
                     $maxValue = max($titleLengths);
                     $class  = "h-lg-364";
                     if ($maxValue <21){
                        $class = 'h-lg-364';
                     }elseif ($maxValue >=21 && $maxValue <42){
                        $class = 'h-lg-364';
                     }elseif ($maxValue >=42){
                        $class = 'h-lg-364';
                     }
                     $class_pop=" ";
                    foreach ($servicesItems as $value) {
                         $service_main = get_stylesheet_directory_uri().'/img/svgs/service_main' . $i . '.svg';
                          $service_hover = get_stylesheet_directory_uri().'/img/svgs/service_hover' . $i . '.svg';
                          if ($value['title'] == "Heat Pumps") {
                        $service_main = get_stylesheet_directory_uri().'/img/svgs/service_main5.svg';
                        $service_hover= get_stylesheet_directory_uri().'/img/svgs/service_hover5.svg';
                    }

                    if ($blogid == 1) {
                        $class_pop = "openModalBtn";
                        $href = "javascript:void(0);"; // Assigning a JavaScript void function for blog ID 2
                    } else {
                        $href = get_home_url() . $value['link']; // Assuming $value['link'] holds the link you want to append to home URL
                    }
                        echo '<div class="swiper-slide box-shadow-service max-lg-255 services '.$class.'">
                    <a href="' .$href . '" class="'. $class_pop.' d-block service-border-top-0 ' . $args['globals']['services']['top_border_class'] . ' no_hover_underline px-lg-2 h-100 service_block">
                    <div class="d-flex d-lg-block align-items-center text-lg-center  px-lg-0 px-4">
                    <div class="w-100 d-lg-block d-flex align-items-center  py-lg-5">
                    <div class="col-lg-12 col-2">
                    <!--<i class="' . $value['icon'] . ' color_primary text_70 line_height_70 sm_text_30 sm_line_height_60 service_block_icon"></i>-->
                    <img src="'.$service_main.'"  alt="Blue animation of a thermostat with an arrow next to it pointing down" class="default-icon"  width="82" height="73">
                    <img src="'. $service_hover.'"  alt="Blue animation of a thermostat with an arrow next to it pointing down" class="hover-icon d-none mx-auto"  width="82" height="73">
                    </div>
                    <div class="col-lg-12 col-8">
                    <h4 class="h4 mb-lg-4 pb-1 mb-0 mt-lg-4 pt-lg-2 min-h-68">' . $value['title'] . '</h4>
                    <p class="pb-1 service-description alt_color_3_c">' . $value['description'] . '</p>
                    <div class="triangle-bottomright ">
                            <span class="services-icon-link float-end position-relative">
                                <i class="icon-arrow-right1 text_20 line_height_28 true_white"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-12 col-2 text-end">
                    <i class="true_black icon-chevron-right1 sm_text_20 sm_line_height_60 d-lg-none d-inline-block"></i>
                    </div>
                    </div>
                    </div>
                    </a>
                    </div>';
                    $i++;
                    }
                    ?> 
                </div>
            </div>
        </div>
    </div>
    <?php if ($count > 4) { ?>
        <div class="swiper-pagination swiper-pagination-service swiper-pagination-service-<?= $args['globals']['services']['widget_id']; ?> d-none d-lg-block "></div>
    <?php } ?>
</div>


<div class="container">
<div class="row pt-2 mt-3 pb-2 justify-content-center d-none d-lg-block">
            <div class="col-lg-12 services-secondary text-center pt-2">
                <ul class="list-group list-group-horizontal list-unstyled d-flex justify-content-center ms-0 rounded-0 border-0">
                    <li class="list-group-item rounded-0 border-0 p-0">
                        <h4 class="ps-xl-3">
                        <a href="<?php echo ($blogid == 1) ? 'javascript:void(0);' : (($blogid == 3) ? get_home_url() . '/air-conditioning/maintenance/' : get_home_url() . '/contact-us/'); ?>" class="<?php echo $class_pop; ?> true_black true_black_hover h4 text_23 text_medium line_height_28 service-hover-icon-bg default_font_family_c">
                            Ductwork 
                            <i class="icon-arrow-right2 rounded-circle text-center bc_text_20 true_white d-inline-block services-secondary-links ms-2 color_primary_bg align-middle position-relative"></i>
                        </a>

                        </h4>
                    </li>
                    <li class="list-group-item rounded-0 border-0 p-0">
                        <h4 class="ps-lg-5">
                        <a href="<?php echo ($blogid == 1) ? 'javascript:void(0);' : (($blogid == 3) ? get_home_url() . '/indoor-air-quality/' : (($blogid == 4) ? get_home_url() . '/indoor-air-quality/' : (($blogid == 5) ? get_home_url() . '/indoor-air-quality/' : (($blogid == 7) ? get_home_url() . '/indoor-air-quality/' : (($blogid == 6) ? get_home_url() . '/indoor-air-quality/' : get_home_url() . '/contact-us/'))))); ?>" class="<?php echo $class_pop; ?> true_black true_black_hover h4 text_medium line_height_28 service-hover-icon-bg default_font_family_c">
                                Indoor Air Quality <i class="icon-arrow-right2 rounded-circle text-center bc_text_20 true_white d-inline-block services-secondary-links ms-2 color_primary_bg align-middle position-relative"></i>
                            </a>
                        </h4>
                    </li>
                    <li class="list-group-item rounded-0 border-0 p-0">
                        <h4 class="ps-lg-5">

                            <a  href="<?php echo ($blogid == 1) ? 'javascript:void(0);' : (($blogid == 3) ? get_home_url() . '/ductless/' : get_home_url() . '/hvac/ductless/'); ?>" class="<?php echo $class_pop; ?> true_black true_black_hover h4  text_medium line_height_28 service-hover-icon-bg default_font_family_c">
                                Ductless Mini-Splits <i class="icon-arrow-right2 rounded-circle text-center bc_text_20 true_white d-inline-block services-secondary-links ms-2 color_primary_bg align-middle position-relative"></i>
                            </a>
                        </h4>
                    </li>
                    <li class="list-group-item rounded-0 border-0 p-0">
                    <?php                                    
                        $blogid =get_current_blog_id();;
                        if ($blogid != 7 && $blogid != 4 && $blogid != 6 && $blogid != 5 && $blogid != 3 && $blogid != 1) { ?>  
                        <h4 class="ps-lg-5">

                            <a  href="<?php echo ($blogid == 1) ? 'javascript:void(0);' : (($blogid == 3) ? get_home_url() . '/hvac/' : get_home_url() . '/contact-us/'); ?>" class="<?php echo $class_pop; ?> true_black true_black_hover h4  text_medium line_height_28 service-hover-icon-bg default_font_family_c">
                                Full List of Services <i class="icon-arrow-right2 rounded-circle text-center bc_text_20 true_white d-inline-block services-secondary-links ms-2 color_primary_bg align-middle position-relative"></i>
                            </a>
                        </h4>
                    <?php } ?>
                    </li>          
                </ul>
            </div>
        </div>
    </div>

<div class="container custom-padding pt-3 d-block d-lg-none pb-5">
            <div class="row services-secondary">
                <div class="col-6 text-center pb-5 mb-2 px-0">
                    <h4>
                        <a href="<?php echo ($blogid == 1) ? 'javascript:void(0);' : (($blogid == 3) ? get_home_url() . '/air-conditioning/maintenance/' : get_home_url() . '/contact-us/'); ?>" class="<?php echo $class_pop; ?> true_black color_primary_hover text_20 line_height_25 text_medium default_font_family_c">
                            Ductwork
                            <i class="icon-arrow-right2 rounded-circle text-center bc_text_20 true_white m-auto d-block services-secondary-links color_primary_bg align-middle position-relative"></i>
                        </a>
                    </h4>
                </div>
                <div class="col-6 text-center pb-5 mb-2 px-0">
                    <h4>
                    <a href="<?php echo ($blogid == 1) ? 'javascript:void(0);' : (($blogid == 3) ? get_home_url() . '/indoor-air-quality/' : (($blogid == 4) ? get_home_url() . '/indoor-air-quality/' : (($blogid == 5) ? get_home_url() . '/indoor-air-quality/' : (($blogid == 7) ? get_home_url() . '/indoor-air-quality/' : (($blogid == 6) ? get_home_url() . '/indoor-air-quality/' : get_home_url() . '/contact-us/'))))); ?>" class="<?php echo $class_pop; ?> true_black color_primary_hover text_20 line_height_25 text_medium default_font_family_c">
                            Indoor Air Quality
                            <i class="icon-arrow-right2 rounded-circle text-center bc_text_20 true_white m-auto d-block services-secondary-links color_primary_bg align-middle position-relative"></i>
                        </a>
                    </h4>
                </div>
                <div class="col-6 text-center">
                    <h4>
                        <a href="<?php echo ($blogid == 1) ? 'javascript:void(0);' : (($blogid == 3) ? get_home_url() . '/ductless/' : get_home_url() . '/contact-us/'); ?>" class="<?php echo $class_pop; ?> true_black color_primary_hover text_20 line_height_25 text_medium default_font_family_c">
                            Ductless Mini Splits
                            <i class="icon-arrow-right2 rounded-circle text-center bc_text_20 true_white m-auto d-block services-secondary-links color_primary_bg align-middle position-relative"></i>
                        </a>
                    </h4>
                </div>
                <div class="col-6 text-center">
                    <?php if ($blogid != 7 && $blogid != 4 && $blogid != 6) { ?>  
                    <h4>
                        <a href="<?php echo ($blogid == 1) ? 'javascript:void(0);' : (($blogid == 3) ? get_home_url() . '/hvac/' : get_home_url() . '/contact-us/'); ?>" class="<?php echo $class_pop; ?> true_black color_primary_hover text_20 line_height_25 text_medium default_font_family_c">
                        Full List of Services
                            <i class="icon-arrow-right2 rounded-circle text-center bc_text_20 true_white m-auto d-block services-secondary-links color_primary_bg align-middle position-relative"></i>
                        </a>
                    </h4>
                <?php }?>
                </div>
            </div>
        </div>



<script>
    var numImage1 = jQuery('.abc .col-lg').length;
    if (numImage1 <= 3) {
        jQuery('.abc .row').addClass('justify-content-center');
    }
    jQuery(document).ready(function () {
        var CountSlider = "<?php echo $count ?>";
        var loop = false;
        if (CountSlider > 4) {
            loop = true;
        }
        if (CountSlider < 4) {
            jQuery(".abc.swiper-wrapper").addClass("justify-content-center");
        }
        var swiper = new Swiper('#rds_services_swiper-<?= $args['globals']['services']['widget_id']; ?>', {
            loop: loop,
            slidesPerView: 4,
            spaceBetween: 0,
            noSwiping: true,
            allowSlidePrev: true,
            allowSlideNext: true,
            autoplay: {enabled: true},
            navigation: {
                nextEl: ".swiper-button-next-services-<?= $args['globals']['services']['widget_id']; ?>",
                prevEl: ".swiper-button-prev-services-<?= $args['globals']['services']['widget_id']; ?>",
            },
            pagination: {
                el: ".swiper-pagination-service-<?= $args['globals']['services']['widget_id']; ?>",
                clickable: true,

            },
            breakpoints: {
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 21.31,
                    noSwiping: true,
                    allowSlidePrev: true,
                    allowSlideNext: true,
                    autoplay: {
                        enabled: true,
                        delay: 5000
                    },
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 21,
                    noSwiping: true,
                    allowSlidePrev: true,
                    allowSlideNext: true,
                    autoplay: {
                        enabled: true,
                        delay: 5000
                    },
                },
                640: {
                    slidesPerView: 4,
                    spaceBetween: 21,
                    noSwiping: true,
                    allowSlidePrev: true,
                    allowSlideNext: true,
                    autoplay: {
                        enabled: true,
                        delay: 5000
                    },
                }
            },
        });
       
  

    });
</script>
