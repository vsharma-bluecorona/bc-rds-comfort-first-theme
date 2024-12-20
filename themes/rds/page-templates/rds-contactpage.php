<?php
/**
 * Template Name: ContactPage Template
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
global $post;
$title = $post->post_title;
get_header();
$flag = false;
$get_rds_template_data_array = rds_template();
if ($get_rds_template_data_array['page_templates']['contact_page']['variation'] == 'a') {
    $div_class = "col-12 col-lg-12";
} else {
    $div_class = "col-12 col-lg-8";
    $flag = true;
}
?>
<main >

    <!-- Subpage banner starts -->
    <?php get_template_part('global-templates/subpage-hero/subpage-banner-section'); ?>
    <!-- subpage banner ends -->


    <div class="w-100 d-block">
        <div class="d-flex flex-column">
            <!-- Contact content area starts -->
            <div class="d-block order-1 order-lg-1">
                <!-- Contact content area starts -->
                <div class="container-fluid pt-4 pt-lg-5 pb-lg-5 pb-4 my-2">
                    <div class="container pb-lg-5">
                        <div class="row pb-lg-5">
                            <div class="<?php echo $div_class; ?>">
                                <h1><?php echo $title; ?></h1>
                                <?php
                                if (have_posts()) :
                                    while (have_posts()) : the_post();
                                        the_content();
                                    endwhile;
                                endif;
                                ?>   
                            </div>
                            <?php if ($flag == true) { ?>
                                <div class="col-sm-12 col-lg-4 pt-lg-0 pt-3 ps-lg-5">
                                    <div class="mb-4 pb-1">
                                        <h6 class="mb-3">Hours of Operation</h6>
                                        
                                        <p class="mb-0"><?php echo $get_rds_template_data_array['site_info']['week_days']; ?></p>
                                        <p class="mb-0"><?php echo $get_rds_template_data_array['site_info']['weekday_hours']; ?></p>
                                        
                                        <p class="mb-0"><?php echo $get_rds_template_data_array['site_info']['weekend_days']; ?></p>
                                        <p class="mb-0"><?php echo $get_rds_template_data_array['site_info']['weekend_hours']; ?></p>
                                        
                                        
                                    </div>
                                    <div class="mb-4 pb-1">
                                        <h6 class="mb-3">Address</h6>
                                        <?php $address = $get_rds_template_data_array['site_info']['address'];
                                        foreach ($address as $value) { ?>
                                        <p class=" pl-lg-0 pr-lg-0 mb-0"><?php echo $value['address']; ?><br><?php echo $value['city']; ?> <?php echo $value['state']; ?> <?php echo $value['zip']; ?>
                                    </p>
                                     <div class="d-flex mb-3">
                                        <a href="<?php echo $value['map_directions_link']; ?>" target="_blank"><i class="icon-location-dot1 "></i>&nbsp; Get Directions &nbsp;<i class="icon-chevron-right "></i></a>
                                    </div>
                                    <?php } ?>
                                    </div>
                                    <div class="mb-5 contact-social mt-n3">
                                        <h6 class=" mb-3">Follow Us</h6>
                                        <div class="text-start">
                                            <?php
                                            $socialItems = $get_rds_template_data_array['globals']['footer']['data']['social_media']['items'];
                                            foreach ($socialItems as $value) {
                                                echo '<a target="_blank" class="text_35   no_hover_underline  line_height_30 mx-2 ms-lg-0 me-lg-2 no_hover_underline social_icons_contact  order-' . $value['order'] . '" title="' . $value['icon_class'] . '" href="' . $value['url'] . '">
											            <i class="' . $value['icon_class'] . ' "></i>
											        </a>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- Contact content area ends -->
            </div>
            <!-- proudly serving area starts -->

            <?php 
       
               /* if ($get_rds_template_data_array['globals']['service_area']['variation'] == 'a' && $get_rds_template_data_array['globals']['service_area']['enable']) {
                get_template_part( 'global-templates/service-area/a', null, $get_rds_template_data_array); 
                }elseif ($get_rds_template_data_array['globals']['service_area']['variation'] == 'b' && $get_rds_template_data_array['globals']['service_area']['enable']) {
                   get_template_part( 'global-templates/service-area/b', null, $get_rds_template_data_array);
                }elseif ($get_rds_template_data_array['globals']['service_area']['variation'] == 'c' && $get_rds_template_data_array['globals']['service_area']['enable']) {
                     get_template_part( 'global-templates/service-area/c', null, $get_rds_template_data_array); 
                } */
            ?>
            <div class="order-<?php echo $get_rds_template_data_array['globals']['service_area']['order'] ?>">
            <?php echo do_shortcode('[elementor-template id="36161"]'); ?>
            </div>

            <!-- proudly serving area ends -->
        </div>
    </div>
</main>
<?php get_footer(); ?>
