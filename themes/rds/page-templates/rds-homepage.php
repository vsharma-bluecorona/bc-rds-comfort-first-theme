<?php
/**
 * Template Name: HomePage Template
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

$get_rds_template_data_array = rds_template();
?>
<main>
    <!-- Hero start -->
    <?php
//    if ($get_rds_template_data_array['globals']['hero']['variation'] == 'a') {
//    get_template_part( 'global-templates/hero/a', null, $get_rds_template_data_array); 
//    }elseif ($get_rds_template_data_array['globals']['hero']['variation'] == 'b') {
//    get_template_part( 'global-templates/hero/b', null, $get_rds_template_data_array); 
//    }elseif ($get_rds_template_data_array['globals']['hero']['variation'] == 'c') {
//    get_template_part( 'global-templates/hero/c', null, $get_rds_template_data_array); 
//    }elseif ($get_rds_template_data_array['globals']['hero']['variation'] == 'd') {
//    get_template_part( 'global-templates/hero/d', null, $get_rds_template_data_array); 
//    }elseif ($get_rds_template_data_array['globals']['hero']['variation'] == 'e') {
//    get_template_part( 'global-templates/hero/e', null, $get_rds_template_data_array); 
//    }        
    echo do_shortcode('[elementor-template id="35888"]');
    ?>
    <!-- Hero ends -->
    <div class="w-100 d-block">
        <div class="d-flex flex-column">
            <?php
//                if ($get_rds_template_data_array['globals']['hero']['variation'] == 'a') {
//                get_template_part( 'global-templates/form/hero/a', null, $get_rds_template_data_array); 
//                }elseif ($get_rds_template_data_array['globals']['hero']['variation'] == 'b') {
//                get_template_part( 'global-templates/form/hero/b', null, $get_rds_template_data_array); 
//                }elseif ($get_rds_template_data_array['globals']['hero']['variation'] == 'c') {
//                get_template_part( 'global-templates/form/hero/c', null, $get_rds_template_data_array); 
//                }elseif ($get_rds_template_data_array['globals']['hero']['variation'] == 'e') {
//                get_template_part( 'global-templates/form/hero/e', null, $get_rds_template_data_array); 
//                }
//            echo $get_rds_template_data_array['globals']['services']['order'];
//            var_dump($get_rds_template_data_array['globals']['services']);exit;
            if ($get_rds_template_data_array['globals']['hero']['variation'] == 'a') {
                ?>
                <div class="d-none d-lg-none">
                    <div class="container-fluid mt-lg-n15-3 px-lg-3 px-0">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 px-0 px-lg-3">
                                    <div class="shadow-xl border-top-tertiary pt-lg-3 pt-4 pb-lg-4 hero_banner_form_background border_form home_form_a">
                                        <h5 class="d-block pt-lg-1 text-center"><?php echo $get_rds_template_data_array['globals']['hero']['form_heading']; ?></h5>
                                        <h3 class="d-block pb-lg-2 text-center"><?php echo $get_rds_template_data_array['globals']['hero']['form_subheading']; ?></h3>
                                        <?php
                                        $form_id = $get_rds_template_data_array['globals']['hero']['mobile_gravity_form_id'];
                                        echo do_shortcode('[gravityforms id=' . $form_id . ' ajax=true]');
                                        ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php } ?>
            <!-- Services start -->
            <div class="order-<?php echo $get_rds_template_data_array['globals']['services']['order'] ?>">
                <?php
//            if ($get_rds_template_data_array['globals']['services'] && $get_rds_template_data_array['globals']['services']['enable']) {
//                get_template_part('global-templates/services/a', null, $get_rds_template_data_array);
//            }
                echo do_shortcode('[elementor-template id="35952"]');
                ?>
            </div>
            <!-- Services ends -->

            <!-- Cta start -->
            <?php
            /* if ($get_rds_template_data_array['globals']['financing']['variation'] == 'a' && $get_rds_template_data_array['globals']['financing']['enable']) {
              get_template_part('global-templates/fullwidth-cta/a', null, $get_rds_template_data_array);
              } elseif ($get_rds_template_data_array['globals']['financing']['variation'] == 'b' && $get_rds_template_data_array['globals']['financing']['enable']) {
              get_template_part('global-templates/fullwidth-cta/b', null, $get_rds_template_data_array);
              } elseif ($get_rds_template_data_array['globals']['financing']['variation'] == 'c' && $get_rds_template_data_array['globals']['financing']['enable']) {
              get_template_part('global-templates/fullwidth-cta/c', null, $get_rds_template_data_array);
              } */
            ?>
            <div class="order-<?php echo $get_rds_template_data_array['globals']['financing']['order'] ?>">
                <?php
                echo do_shortcode('[elementor-template id="36087"]');
                ?>
            </div>
            <!-- Cta ends -->
            <!-- Coupon start -->
            <?php
            /* if ($get_rds_template_data_array['globals']['promotion']['variation'] == 'a' && $get_rds_template_data_array['globals']['promotion']['enable']) {
              get_template_part( 'global-templates/promotion/slider/a', null, $get_rds_template_data_array);
              }elseif ($get_rds_template_data_array['globals']['promotion']['variation'] == 'b' && $get_rds_template_data_array['globals']['promotion']['enable']) {
              get_template_part( 'global-templates/promotion/slider/b', null, $get_rds_template_data_array);
              }elseif ($get_rds_template_data_array['globals']['promotion']['variation'] == 'c' && $get_rds_template_data_array['globals']['promotion']['enable']) {
              get_template_part( 'global-templates/promotion/slider/c', null, $get_rds_template_data_array);
              } */
            ?>
            <div class="order-<?php echo $get_rds_template_data_array['globals']['promotion']['order'] ?>">
<?php echo do_shortcode('[elementor-template id="34464"]'); ?>
            </div>
            <!-- Coupon ends -->

            <!-- what to expect starts -->

            <?php
//            if ($get_rds_template_data_array['globals']['discover_the_difference']['variation'] == 'a' && $get_rds_template_data_array['globals']['discover_the_difference']['enable']) {
//            get_template_part( 'global-templates/discover-the-difference/a', null, $get_rds_template_data_array); 
//            }elseif ($get_rds_template_data_array['globals']['discover_the_difference']['variation'] == 'b' && $get_rds_template_data_array['globals']['discover_the_difference']['enable']) {
//               get_template_part( 'global-templates/discover-the-difference/b', null, $get_rds_template_data_array);
//            }elseif ($get_rds_template_data_array['globals']['discover_the_difference']['variation'] == 'c' && $get_rds_template_data_array['globals']['discover_the_difference']['enable']) {
//                 get_template_part( 'global-templates/discover-the-difference/c', null, $get_rds_template_data_array); 
//            }
            ?>
            <div class="order-<?php echo $get_rds_template_data_array['globals']['discover_the_difference']['order'] ?>">
<?php echo do_shortcode('[elementor-template id="35868"]'); ?>
            </div>
            <!-- what to expect ends -->
            <?php
            /* if ($get_rds_template_data_array['globals']['testimonial']['variation'] == 'd' && $get_rds_template_data_array['globals']['testimonial']['enable']){
              get_template_part( 'global-templates/testimonial/slider/d', null, $get_rds_template_data_array);
              } */
            ?>
            <!-- seo section start -->
            <?php
            if ($get_rds_template_data_array['page_templates']['homepage']['seo_section']['variation'] == 'a') {
                get_template_part('global-templates/seo-section/a', null, $get_rds_template_data_array);
            } elseif ($get_rds_template_data_array['page_templates']['homepage']['seo_section']['variation'] == 'b') {
                get_template_part('global-templates/seo-section/b', null, $get_rds_template_data_array);
            } elseif ($get_rds_template_data_array['page_templates']['homepage']['seo_section']['variation'] == 'c') {
                get_template_part('global-templates/seo-section/c', null, $get_rds_template_data_array);
            } elseif ($get_rds_template_data_array['page_templates']['homepage']['seo_section']['variation'] == 'd') {
                get_template_part('global-templates/seo-section/d', null, $get_rds_template_data_array);
            }
            ?>
            <!-- seo section end -->
            <!-- Review start -->
            <?php
            /* if ($get_rds_template_data_array['globals']['testimonial']['variation'] == 'a' && $get_rds_template_data_array['globals']['testimonial']['enable']) {
              get_template_part( 'global-templates/testimonial/slider/a', null, $get_rds_template_data_array);
              }elseif ($get_rds_template_data_array['globals']['testimonial']['variation'] == 'b' && $get_rds_template_data_array['globals']['testimonial']['enable']) {
              get_template_part( 'global-templates/testimonial/slider/b', null, $get_rds_template_data_array);
              }elseif ($get_rds_template_data_array['globals']['testimonial']['variation'] == 'c' && $get_rds_template_data_array['globals']['testimonial']['enable']) {
              get_template_part( 'global-templates/testimonial/slider/c', null, $get_rds_template_data_array);
              }
             */
            ?>
            <div class="order-<?php echo $get_rds_template_data_array['globals']['testimonial']['order'] ?>">
<?php echo do_shortcode('[elementor-template id="13225"]'); ?>
            </div>
            <!-- Review ends -->


            <!-- Request service  starts -->
            <?php
            /*  if ($get_rds_template_data_array['globals']['request_service']['variation'] == 'a' && $get_rds_template_data_array['globals']['request_service']['enable']) {
              get_template_part( 'global-templates/request-service/a', null, $get_rds_template_data_array);
              }elseif ($get_rds_template_data_array['globals']['request_service']['variation'] == 'b' && $get_rds_template_data_array['globals']['request_service']['enable']) {
              get_template_part( 'global-templates/request-service/b', null, $get_rds_template_data_array);
              }elseif ($get_rds_template_data_array['globals']['request_service']['variation'] == 'c' && $get_rds_template_data_array['globals']['request_service']['enable']) {
              get_template_part( 'global-templates/request-service/c', null, $get_rds_template_data_array);
              } */
            ?>
            <div class="order-<?php echo $get_rds_template_data_array['globals']['request_service']['order'] ?>">
<?php echo do_shortcode('[elementor-template id="32406"]'); ?>
            </div>
            <!-- Request service area ends -->


            <!-- company services starts -->
            <?php
            if ($get_rds_template_data_array['globals']['company_services'] && $get_rds_template_data_array['globals']['company_services']['enable']) {
                get_template_part('global-templates/company-services/a', null, $get_rds_template_data_array);
            }
            ?>
            <!-- company services  ends -->


            <!-- proudly serving  starts -->
            <?php
            /* if ($get_rds_template_data_array['globals']['service_area']['variation'] == 'a' && $get_rds_template_data_array['globals']['service_area']['enable']) {
              get_template_part('global-templates/service-area/a', null, $get_rds_template_data_array);
              } elseif ($get_rds_template_data_array['globals']['service_area']['variation'] == 'b' && $get_rds_template_data_array['globals']['service_area']['enable']) {
              get_template_part('global-templates/service-area/b', null, $get_rds_template_data_array);
              } elseif ($get_rds_template_data_array['globals']['service_area']['variation'] == 'c' && $get_rds_template_data_array['globals']['service_area']['enable']) {
              get_template_part('global-templates/service-area/c', null, $get_rds_template_data_array);
              } */
            ?>
            <div class="order-<?php echo $get_rds_template_data_array['globals']['service_area']['order'] ?>">
<?php echo do_shortcode('[elementor-template id="36161"]'); ?>
            </div>
            <!-- proudly serving area ends -->

            <!-- We are hiring Start-->
<?php if ($get_rds_template_data_array['page_templates']['homepage']['we_are_hiring'] && $get_rds_template_data_array['page_templates']['homepage']['we_are_hiring']['enable']) { ?>
                <div class="d-block <?php echo ($get_rds_template_data_array['page_templates']['homepage']['we_are_hiring']['order'] ? "order-" . $get_rds_template_data_array['page_templates']['homepage']['we_are_hiring']['order'] : "order-6"); ?> <?php echo ($get_rds_template_data_array['page_templates']['homepage']['we_are_hiring']['order'] ? "order-lg-" . $get_rds_template_data_array['page_templates']['homepage']['we_are_hiring']['order'] : "order-lg-6"); ?>">
                    <div class="container-fluid py-5 py-lg-4 text-center color_quaternary_bg">
                        <div class="container py-lg-3 py-5">
                            <div class="row align-items-center py-lg-0 py-2">
                                <div class="col-sm-12 col-lg-3  text-center text-lg-end pe-xl-3 pe-lg-5">

                                    <?php
                                    $careers_cta_image = get_stylesheet_directory_uri() . '/img/careers-cta/careers-icon.webp';
                                    $careers_cta_image2x = get_stylesheet_directory_uri() . "/img/careers-cta/careers-icon@2x.webp";
                                    $careers_cta_image3x = get_stylesheet_directory_uri() . "/img/careers-cta/careers-icon@3x.webp";
                                    if (@getimagesize($careers_cta_image) == false) {
                                        echo '<div class="hiring_icon"><i class="icon-people-group4 text_125 sm_text_100 line_height_23"></i></div>';
                                    } else {
                                        ?>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/careers-cta/careers-icon.webp" class="img-fluid" width="125" height="125" alt="affiliate-logo-1" srcset="<?php echo get_stylesheet_directory_uri(); ?>/img/careers-cta/careers-icon.webp 1x, <?php echo get_stylesheet_directory_uri(); ?>/img/careers-cta/careers-icon@2x.webp 2x, <?php echo get_stylesheet_directory_uri(); ?>/img/careers-cta/careers-icon@3x.webp 3x">
                                    <?php }
                                    ?>

                                </div>
                                <div class="col-sm-12 col-lg-6  text-center text-lg-start py-lg-0 py-4 ">
                                    <h6 class=""><?php echo $get_rds_template_data_array['page_templates']['homepage']['we_are_hiring']['heading']; ?></h6>
                                    <h4 class="mt-2 mb-0 d-block "><?php echo $get_rds_template_data_array['page_templates']['homepage']['we_are_hiring']['subheading']; ?></h4>
                                </div>
                                <div class="col-sm-12 col-lg-3 text-center text-lg-end">

                                    <a href="<?php echo get_home_url() . $get_rds_template_data_array['page_templates']['homepage']['we_are_hiring']['button_link']; ?>" class="btn btn-primary mw-165">
    <?php echo $get_rds_template_data_array['page_templates']['homepage']['we_are_hiring']['button_text']; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php } ?>
            <!-- We are hiring End -->

            <!-- Affiliation Start-->
            <?php
          /*  if ($get_rds_template_data_array['globals']['affiliation']['variation'] && $get_rds_template_data_array['globals']['affiliation']['enable']) {
                get_template_part('global-templates/affiliation/a', null, $get_rds_template_data_array);
            } */

            ?>
            <div class="order-<?php echo $get_rds_template_data_array['globals']['affiliation']['order'] ?>">
<?php echo do_shortcode('[elementor-template id="38959"]'); ?>
            </div>
            
            <!-- Affiliation End -->

        </div>
    </div>
</main>


<?php get_footer(); ?>
<script>
    jQuery(document).ready(function () {

        var swiper = new Swiper(".icon_swiper", {
            spaceBetween: 10,
            pagination: {
                el: ".icon_swiper_pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 40,
                    noSwiping: false,
                    allowSlidePrev: false,
                    allowSlideNext: false,
                    autoHeight: true,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 40,
                    noSwiping: false,
                    allowSlidePrev: false,
                    allowSlideNext: false,
                },
                992: {
                    slidesPerView: 4,
                    spaceBetween: 0,
                    noSwiping: true,
                    allowSlidePrev: false,
                    allowSlideNext: false,
                },
            },
        });


    });
</script>