<?php
/**
 * Template Name: About Us Template
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$get_rds_template_data_array = rds_template();
?>
<main>
 <!-- Subpage banner starts -->
 <?php get_template_part('global-templates/subpage-hero/subpage-banner-section'); ?>
 <!-- subpage banner ends -->
 <div class="d-flex flex-column w-100 pb-lg-5 mb-lg-5">
    <div class="d-block order-6 order-lg-6">
        <div class="container-fluid pt-5 pt-lg-5 ">
            <div class="container pt-lg-5 py-2 bc_homepage">
                <!-- seo section start -->
                <?php 

           //      if ($get_rds_template_data_array['page_templates']['about_us_page']['variation'] == 'a') {
           //          get_template_part( 'global-templates/about-us/a', null, $get_rds_template_data_array); 
           //      }elseif ($get_rds_template_data_array['page_templates']['about_us_page']['variation'] == 'b') {
           //       get_template_part( 'global-templates/about-us/b', null, $get_rds_template_data_array);
           //   }elseif ($get_rds_template_data_array['page_templates']['about_us_page']['variation'] == 'c') {
           //     get_template_part( 'global-templates/about-us/c', null, $get_rds_template_data_array); 
           // }elseif ($get_rds_template_data_array['page_templates']['about_us_page']['variation'] == 'd') {
           //     get_template_part( 'global-templates/about-us/d', null, $get_rds_template_data_array); 
           // }
                echo do_shortcode('[elementor-template id="37668"]');

           ?>
           <!-- seo section end -->
       </div>
   </div>
</div>


<!-- Affiliation Start-->
<?php 
if ($get_rds_template_data_array['globals']['affiliation']['variation'] && $get_rds_template_data_array['globals']['affiliation']['enable']) {
    get_template_part( 'global-templates/affiliation/a', null, $get_rds_template_data_array); 
} ?>
<!-- Affiliation End -->
<?php if ($get_rds_template_data_array['page_templates']['team_page']['enable']) { ?>
<div class="d-block order-13 order-lg-13 py-lg-5 my-lg-5">
    <div class="container-fluid py-5 py-lg-4 text-center ">
        <div class="container">
            <h3 class="text-center pb-5">Meet the team</h3>
            <div class="row">
              <?php $team_args  = array( 'post_type' => 'bc_teams', 'posts_per_page' => 3, 'order'=> 'DESC','post_status'  => 'publish');
              $query = new WP_Query( $team_args );
              if ( $query->have_posts() ) :
                while($query->have_posts()) : $query->the_post();
                  ?>
                  <div class="col-lg-4 team_card [ is-collapsed ] border-0 mb-4">
                    <div class="card__inner [ js-expander ]">
                        <div class="team_img"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" class="img-fluid w-100" alt="team image" width="350" height="220"></div>
                        <div class="row pt-3 text-start">
                            <div class="col-12">
                                <h3 class=""><?php the_title() ?></h3>
                                <span class="h7"><?php echo get_post_meta(get_the_ID(), 'team_position', true);  ?></span>
                            </div>

                        </div>
                    </div>
                </div>
                <?php 
            endwhile; 
            wp_reset_query();  
        endif;   
        ?> 
    </div>
</div>
</div>
</div>

<?php } ?>
<div class="d-block order-14 order-lg-14">
   <div class="container-fluid">
       <div class="container">
        <div class="row">
            <div class="col-lg-12 about_content pb-lg-4">
                <?php echo $get_rds_template_data_array['page_templates']['about_us_page']['middle_content']; ?>
            </div>
        </div>
    </div>
       
</div>
</div>
</div>
</main>
<?php get_footer(); ?>