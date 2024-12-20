<?php
/**
 * Template Name: SubPage Template
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $post;
$title = $post->post_title;
get_header();
$get_rds_template_data_array = rds_template();
?>

<main>
           <?php 
                if ($get_rds_template_data_array['page_templates']['subpage']['banner']['variation'] == 'a' && $get_rds_template_data_array['page_templates']['subpage']['banner']['enable']) {
                get_template_part( 'global-templates/subpage-hero/subpage/a', null, $get_rds_template_data_array); 
                }elseif ($get_rds_template_data_array['page_templates']['subpage']['banner']['variation'] == 'b' && $get_rds_template_data_array['page_templates']['subpage']['banner']['enable']) {
                   get_template_part( 'global-templates/subpage-hero/subpage/b', null, $get_rds_template_data_array);
                }elseif ($get_rds_template_data_array['page_templates']['subpage']['banner']['variation'] == 'c' && $get_rds_template_data_array['page_templates']['subpage']['banner']['enable']) {
                   get_template_part( 'global-templates/subpage-hero/subpage/c', null, $get_rds_template_data_array);
                }elseif ($get_rds_template_data_array['page_templates']['subpage']['banner']['variation'] == 'd' && $get_rds_template_data_array['page_templates']['subpage']['banner']['enable']) {
                   get_template_part( 'global-templates/subpage-hero/subpage/d', null, $get_rds_template_data_array);
                }
            ?>
    <div class="d-flex flex-column w-100">
        <div class="d-block order-1 order-lg-1">
            <!-- Subpage content area starts -->
            <div class="container-fluid pt-4 pb-lg-5 pb-4 my-2 px-lg-3 px-0">
                <div class="container subpage_full_content pb-lg-5">
                    <div class="row pb-lg-5">
                        <div class="col-12">
                            <h1><?php echo $title; ?></h1>
                            <?php 
                            if ( have_posts() ) : 
                                while ( have_posts() ) : the_post();
                                    the_content();
                                endwhile;
                            endif;
                            ?>
                                   
                        </div>
                    </div>
                </div>
            </div>
            <!-- Subpage content area ends -->
        </div>

           

        </div>
    </div>


    </main>
<?php get_footer();?>