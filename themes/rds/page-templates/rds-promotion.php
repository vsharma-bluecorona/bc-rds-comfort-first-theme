<?php
/**
 * Template Name: Promotion Template
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$get_rds_template_data_array = rds_template();
$promotion_pagination = ( $get_rds_template_data_array['page_templates']['promotions']['subpage_sidebar'] == true ) ? 6 : 9;
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : -1;
query_posts( array('post_type' => 'bc_promotions','posts_per_page' => $promotion_pagination,'paged'=>$paged,'order'=> 'DESC','post_status'  => 'publish'));
?>
<main>
        <!-- Subpage banner starts -->
        <?php 
            if ($get_rds_template_data_array['page_templates']['promotions']['subpage_sidebar'] == true) {
                get_template_part( 'global-templates/subpage-hero/subpage-banner-section' );
                $class_container = "col-12 col-lg-8";
            }else{
                $class_container = "col-12 col-lg-12";
            }
        ?>
        <!-- subpage banner ends -->


        <!-- Subpage content area starts -->
          <div class="w-100 d-block">
            <div class="d-flex flex-column">
                <div class="d-block order-1 order-lg-1">
                    <!-- Subpage content area starts -->
                    <div class="container-fluid pt-4  order-1 order-lg-1 pb-lg-5 pb-4 page_content my-2  px-lg-3 px-0">
                        <div class="container  subpage_full_content pb-lg-5 px-lg-3 px-0">
                            <div class="row pb-lg-5 mx-0">
                                <div class="<?php echo $class_container; ?> order-lg-1 order-1">
                                    <h1 class="pb-lg-5 pb-4"><?php the_title() ?></h1>  
                                    <div class="row">

                                         <?php            
                                    $content = get_post_field('post_content', $post->ID);
                                    echo do_shortcode($content);
                                    if ( have_posts() ) :
                                    while ( have_posts() ) : the_post();
                                         if ($get_rds_template_data_array['globals']['promotion']['variation'] == 'a') {
                                    get_template_part( 'global-templates/promotion/a', get_post_format() ); 
                                    }elseif ($get_rds_template_data_array['globals']['promotion']['variation'] == 'b') {
                                       get_template_part( 'global-templates/promotion/b', get_post_format() );
                                    }elseif ($get_rds_template_data_array['globals']['promotion']['variation'] == 'c') {
                                         get_template_part( 'global-templates/promotion/c', get_post_format() ); 
                                    }
                                    endwhile; else :
                                    get_template_part( 'loop-templates/content', 'none' );
                                    endif;
                                    ?>
                                    </div>   
                                   
                                    <div class="row mb-5">
                                        <div class="col-md-12 d-flex align-items-center justify-content-center">
                                           <?php understrap_pagination(['prev_text' => '<i class="icon-angles-left4"></i>',
                            'next_text' => '<i class="icon-angles-right4"></i>']); ?>
                                        </div>
                                                
                                    </div>
                                </div>
                                <!-- right sidebar starts -->

                        <?php   if ($get_rds_template_data_array['page_templates']['promotions']['subpage_sidebar'] == true) { get_template_part( 'sidebar-templates/sidebar', 'subpagerightsidebar' ); } ?>
                <!-- right sidebar ends -->
                            </div>
                        </div>
                    </div>
                    <!-- Subpage content area ends -->
                </div>
            </div>
        </div>
    </main>
<?php get_footer();?>