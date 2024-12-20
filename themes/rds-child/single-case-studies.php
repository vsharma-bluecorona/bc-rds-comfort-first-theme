<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$get_rds_template_data_array = rds_template();

?>
<main>
    <!-- Subpage banner starts -->
    <?php get_template_part('global-templates/subpage-hero/subpage-sidebar/b'); ?>
    <!-- subpage banner ends -->
    <div class="w-100 d-block">
        <div class="d-flex flex-column">
            <div class="d-block order-1 order-lg-1">
                <!-- Subpage content area starts -->
                <div class="container-fluid pt-4  order-1 order-lg-1 pb-lg-5 pb-4 my-2  px-lg-3 px-0">
                    <div class="container pt-lg-3 subpage_full_content pb-lg-5 px-lg-3 px-0">
                        <div class="row pb-lg-5 ">
                            <div class="col-lg-12 ">
                               
                                <a name="Back to Case Study" href="<?php echo get_home_url() ; ?>/case-studies/" class="no_hover_underline d-inline-flex align-items-center  button  mb-3 back_to_career">
                                    <i class=" bc_line_height_18 icon-chevron-left2 me-1 position-relative "></i> 
                                    BACK TO CASE STUDIES
                                </a>
                            </div>
                            <?php
                            if (have_posts()) :
                                while (have_posts()) : the_post();
                                    get_template_part('loop-templates/content', 'single');
                                endwhile;
                            endif;
                            ?>
                            <div class="col-lg-4 px-0">
                                <?php echo do_shortcode('[elementor-template id="40126"]'); ?>
                                 <?php echo get_template_part('global-templates/why-choose-us/subpage-sidebar/a');  ?>
                             <?php echo do_shortcode('[elementor-template id="40144"]'); ?>
                            </div>   
                           </div>
                    </div>
                </div>
                <!-- Subpage content area ends -->
            </div>
          
            <div class="order-3 ">
                <div class="container">
                    <div class="py-4">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
             <div class="order-5">
           <?php echo do_shortcode('[elementor-template id="13225"]'); ?>
            </div>
            
        </div>
    </div>
    <?php
           
            if ($get_rds_template_data_array['globals']['company_services']) {
                get_template_part('global-templates/affiliation/c', null, $get_rds_template_data_array);
            }
            ?>
</main>
<?php
get_footer();
