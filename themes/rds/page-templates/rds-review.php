<?php
/**
 * Template Name: Review Template
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $post;
$title = $post->post_title;
$content = $post->post_content;
get_header();
$get_rds_template_data_array = rds_template();
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : -1;
query_posts( array('post_type' => 'bc_testimonials','posts_per_page' => 5,'paged'=>$paged,'order'=> 'DESC','post_status'  => 'publish'));
?>
<main class="review_page">

	<!-- Subpage banner starts -->
        <?php get_template_part( 'global-templates/subpage-hero/subpage-banner-section' );?>
    <!-- subpage banner ends -->


         <div class="w-100 d-block">
            <div class="d-flex flex-column">
                <div class="d-block order-1 order-lg-1">
                    <!-- Subpage content area starts -->
                    <div class="container-fluid pt-4 pt-lg-5 pb-lg-5 pb-4 my-2  px-lg-3 px-0">
                        <div class="container subpage_full_content review_page_content pb-lg-5">
                            <div class="row pb-lg-5">
                                <div class="col-12">
                                    <h1><?php echo $title; ?></h1>
                                    <?php            
                                    
                                    echo do_shortcode($content);
                                    if ( have_posts() ) :
                                    while ( have_posts() ) : the_post();
                                         if ($get_rds_template_data_array['page_templates']['testimonial_page']['variation'] == 'a') {
                                    get_template_part( 'global-templates/testimonial/a', get_post_format() ); 
                                    }elseif ($get_rds_template_data_array['page_templates']['testimonial_page']['variation'] == 'b') {
                                       get_template_part( 'global-templates/testimonial/b', get_post_format() );
                                    }elseif ($get_rds_template_data_array['page_templates']['testimonial_page']['variation'] == 'c') {
                                         get_template_part( 'global-templates/testimonial/c', get_post_format() ); 
                                    }
                                    endwhile; else :
                                    get_template_part( 'loop-templates/content', 'none' );
                                    endif;
                                    ?>
                                    <div class="row pt-lg-5 pb-lg-0 pb-3 mt-5">
                                        <div class="col-md-12 d-flex align-items-center pt-lg-5 justify-content-center">
                                             <?php understrap_pagination(['prev_text' => '<i class="icon-angles-left4"></i>',
                            'next_text' => '<i class="icon-angles-right4"></i>']); ?>
                                        </div>
                                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Subpage content area ends -->
                </div>

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
            get_template_part( 'global-templates/company-services/a', null, $get_rds_template_data_array); 
            }
            ?>
            <!-- company services  ends -->

                
            </div>
        </div>   
                
</main>
<?php get_footer();?>
