<?php
/**
 * Template Name: Landing Template
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$get_rds_template_data_array = rds_template();

?>

 <main class="landing_page">
        <?php 
                if ($get_rds_template_data_array['page_templates']['landing_page']['banner']['variation'] == 'a' && $get_rds_template_data_array['page_templates']['landing_page']['banner']['enable']) {
                     get_template_part( 'global-templates/subpage-hero/landing/a', null, $get_rds_template_data_array);
                }elseif ($get_rds_template_data_array['page_templates']['landing_page']['banner']['variation'] == 'b' && $get_rds_template_data_array['page_templates']['subpage']['banner']['enable']) {
                   get_template_part( 'global-templates/subpage-hero/landing/b', null, $get_rds_template_data_array);
                }elseif ($get_rds_template_data_array['page_templates']['landing_page']['banner']['variation'] == 'c' && $get_rds_template_data_array['page_templates']['subpage']['banner']['enable']) {
                   get_template_part( 'global-templates/subpage-hero/landing/c', null, $get_rds_template_data_array);
                }elseif ($get_rds_template_data_array['page_templates']['landing_page']['banner']['variation'] == 'd' && $get_rds_template_data_array['page_templates']['landing_page']['banner']['enable']) {
                   get_template_part( 'global-templates/subpage-hero/landing/d', null, $get_rds_template_data_array);
                }elseif ($get_rds_template_data_array['page_templates']['landing_page']['banner']['variation'] == 'e' && $get_rds_template_data_array['page_templates']['landing_page']['banner']['enable']) {

                   get_template_part( 'global-templates/subpage-hero/landing/e', null, $get_rds_template_data_array);
                }
            ?>

        
        <div class="d-flex flex-column w-100">
            <div class="d-block order-1 order-lg-1 py-lg-5 py-4">
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
            
                <?php echo do_shortcode('[elementor-template id="34464"]'); ?>
          
        <!-- Coupon ends -->
                
            </div>


            <div class="order-2 order-lg-2 d-lg-block d-none" id="request_service">
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
        ?>
        <!-- Request service area ends -->
            </div>

            <div class="d-block order-3 order-lg-3">
                <div class="container-fluid py-5 pt-lg-5 ">
                    <div class="container pt-lg-5 py-2 bc_homepage">
                         <?php 

            if ($get_rds_template_data_array['page_templates']['landing_page']['variation'] == 'a') {
            get_template_part( 'global-templates/landing/a', null, $get_rds_template_data_array); 
            }elseif ($get_rds_template_data_array['page_templates']['landing_page']['variation'] == 'b') {
               get_template_part( 'global-templates/landing/b', null, $get_rds_template_data_array);
            }elseif ($get_rds_template_data_array['page_templates']['landing_page']['variation'] == 'c') {
                 get_template_part( 'global-templates/landing/c', null, $get_rds_template_data_array); 
            }elseif ($get_rds_template_data_array['page_templates']['landing_page']['variation'] == 'd') {
                 get_template_part( 'global-templates/landing/d', null, $get_rds_template_data_array); 
            }elseif ($get_rds_template_data_array['page_templates']['landing_page']['variation'] == 'e') {
                 get_template_part( 'global-templates/landing/e', null, $get_rds_template_data_array); 
            }
        
        ?>
                       
                    </div>
                </div>
            </div>

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
        
            ?>
        <!-- Review ends -->

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
        </div>
    </main>
<script type="text/javascript">
    jQuery(document).ready(function(){
    var swiperSliderA = new Swiper(".home-coupon-swiper", {
    spaceBetween: 30,
    slidesPerView: 1,
        loop:true,
    pagination: {
      el: ".home-coupon-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".home_coupon_next_a",
      prevEl: ".home_coupon_prev_a",
    },
    breakpoints: {
      640: {
        slidesPerView: 1,
        spaceBetween: 30,
        
      },
      768: {
        slidesPerView: 1,
        spaceBetween: 30,
        
      },
      992: {
        slidesPerView: 2,
        spaceBetween: 30,
        
      },
    },
    
});

//variation b

var swiperSliderB =  new Swiper(".home-coupon-swiper-b", {
    spaceBetween: 30,
    slidesPerView: 1,
    loop:true,
    pagination: {
      el: ".home-coupon-pagination-b",
      clickable: true,
    },
    navigation: {
      nextEl: ".home_coupon_next_b",
      prevEl: ".home_coupon_prev_b",
    },
    breakpoints: {
      640: {
        slidesPerView: 1,
        spaceBetween: 30,
        
      },
      768: {
        slidesPerView: 1,
        spaceBetween: 30,
        
      },
      992: {
        slidesPerView: 2,
        spaceBetween: 30,
        
      },
    },
    
});

//variation c

var swiperSliderC = new Swiper(".home-coupon-swiper-c", {
          spaceBetween: 30,
          slidesPerView: 1,
          pagination: {
            el: ".home-coupon-pagination-c",
            clickable: true,
          },
          navigation: {
                  nextEl: ".home_coupon_next_c",
                  prevEl: ".home_coupon_prev_c",
                },
          breakpoints: {
            640: {
              slidesPerView: 1,
              spaceBetween: 30,
              
            },
            768: {
              slidesPerView: 1,
              spaceBetween: 30,
              
            },
            992: {
              slidesPerView: 2,
              spaceBetween: 30,
              
            },
          },
          
      });

});
    function scrollSmoothTo(elementId) {
                    var element = document.getElementById(elementId);
                    if (element !== null) {
                        element.scrollIntoView({
                            block: 'start',
                            behavior: 'smooth'
                        });
                    }
                }

</script>

<?php get_footer(); ?>
