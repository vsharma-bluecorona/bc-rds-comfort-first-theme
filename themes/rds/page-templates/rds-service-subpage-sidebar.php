<?php
/**
 * Template Name: Service SubPage Sidebar Template
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $post;
$title = $post->post_title;
get_header();
$get_rds_template_data_array = rds_template();
?>

<main>
        <!-- Subpage banner starts -->
          <?php 
                if ($get_rds_template_data_array['page_templates']['service_subpage']['banner']['variation'] == 'a' && $get_rds_template_data_array['page_templates']['service_subpage']['banner']['enable']) {
                get_template_part( 'global-templates/subpage-hero/service-subpage/a', null, $get_rds_template_data_array); 
                }elseif ($get_rds_template_data_array['page_templates']['service_subpage']['banner']['variation'] == 'b'  && $get_rds_template_data_array['page_templates']['service_subpage']['banner']['enable']) {
                   get_template_part( 'global-templates/subpage-hero/service-subpage/b', null, $get_rds_template_data_array);
                }
            ?>
        <!-- subpage banner ends -->

        <!-- Subpage content area starts --> 
        <div class="d-flex flex-column w-100">
            <div class="d-block order-1 order-lg-1">
                <!-- Subpage content area starts -->
                <div class="container-fluid pt-4  pb-lg-5 pb-4 my-2  px-lg-3 px-0">
                    <div class="container pt-lg-3 subpage_full_content pb-lg-5">
                        <div class="row pb-lg-5">
                            <div class="col-12 col-lg-8">
                                <h1><?php echo $title; ?></h1>
                                <?php 
                                if ( have_posts() ) : 
                                    while ( have_posts() ) : the_post();
                                        the_content();
                                    endwhile;
                                endif;
                                ?>         
                            </div>
                            <!-- right sidebar starts -->
                                <?php get_template_part( 'sidebar-templates/sidebar', 'subpagerightsidebar' ); ?>
                            <!-- right sidebar ends -->
                        </div>
                    </div>
                </div>
                <!-- Subpage content area ends -->
            </div>
            <!-- Services start -->
              <?php 
            
            if ($get_rds_template_data_array['globals']['services'] && $get_rds_template_data_array['globals']['services']['enable']) {
            get_template_part( 'global-templates/services/sidebar/services-sidebar/a', null, $get_rds_template_data_array); 
            }
            ?>
            <!-- Services ends -->
            
            <!-- Cta start -->
            <?php 
                if ($get_rds_template_data_array['page_templates']['service_subpage']['financing']['variation'] == 'a' && $get_rds_template_data_array['page_templates']['service_subpage']['financing']['enable']) {
                get_template_part( 'global-templates/fullwidth-cta/service-subpage/a', null, $get_rds_template_data_array); 
                }elseif ($get_rds_template_data_array['page_templates']['service_subpage']['financing']['variation'] == 'b' && $get_rds_template_data_array['page_templates']['service_subpage']['financing']['enable']) {
                   get_template_part( 'global-templates/fullwidth-cta/service-subpage/b', null, $get_rds_template_data_array);
                }elseif ($get_rds_template_data_array['page_templates']['service_subpage']['financing']['variation'] == 'c' && $get_rds_template_data_array['page_templates']['service_subpage']['financing']['enable']) {
                     get_template_part( 'global-templates/fullwidth-cta/service-subpage/c', null, $get_rds_template_data_array); 
                }
            ?>
            <!-- Cta ends -->

            

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
            <!-- Review ends -->
            
        </div>
</main>
<?php get_footer();?>