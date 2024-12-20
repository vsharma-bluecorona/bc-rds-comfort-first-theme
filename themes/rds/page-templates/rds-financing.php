<?php
/**
 * Template Name: Financing Template
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$get_rds_template_data_array = rds_template();
?>
<main class="page-template-financing">
    <!-- Subpage banner starts -->
    <?php get_template_part( 'global-templates/subpage-hero/subpage-banner-section' );?>
      <?php
//                            if ( have_posts() ) :
//                                    while ( have_posts() ) : the_post();
//                                    the_content();
//                                    endwhile; 
//                                endif;
                                    ?>
    <!-- subpage banner ends -->
  <div class="d-flex flex-column w-100">
        <div class="d-block order-1 order-lg-1">
            <div class="container-fluid finance_page pt-5 pt-lg-5 text-start ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <h1 class=""><?php echo $get_rds_template_data_array['page_templates']['finance_page']['heading']; ?></h1>
                            <h2 class="pb-4"><?php echo $get_rds_template_data_array['page_templates']['finance_page']['subheading']; ?></h2>
                            <?php if (strpos($get_rds_template_data_array['page_templates']['finance_page']['button_link'], 'https') !== false && $get_rds_template_data_array['page_templates']['finance_page']['button_link']) { ?>
                                <a target="_blank" href="<?php echo $get_rds_template_data_array['page_templates']['finance_page']['button_link']; ?>" class="btn btn-primary"><?php echo $get_rds_template_data_array['page_templates']['finance_page']['button_text']; ?> <i class="icon-chevron-right1 ms-1"></i></a>
                            <?php } elseif($get_rds_template_data_array['page_templates']['finance_page']['button_link']) { ?>
                                <a href="<?php echo get_home_url() . $get_rds_template_data_array['page_templates']['finance_page']['button_link']; ?>" class="btn btn-primary"><?php echo $get_rds_template_data_array['page_templates']['finance_page']['button_text']; ?> <i class="icon-chevron-right1 ms-1"></i></a>
                            <?php } ?>

                        </div>
                        <div class="col-lg-7 pt-lg-0 pt-4">
                            <p><?php echo $get_rds_template_data_array['page_templates']['finance_page']['content']; ?></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Affiliation Start-->
        <?php
        if ($get_rds_template_data_array['page_templates']['finance_page']['affiliation']['enable']) {
            get_template_part('global-templates/affiliation/finance/a', null, $get_rds_template_data_array);
        }
        ?>
        <!-- Affiliation End -->

        <div class="d-block order-3 order-lg-3">
            <div class="container-fluid pt-lg-5 pt-4 color_quaternary_bg finance_page_form pb-lg-5 pb-3">
                <div class="container pt-lg-5 pt-3">
                    <div class="row">
                        <div class="col-lg-12 free_estimate_form">
                            <h4 class="pb-4 mb-0 text-center"><?php echo $get_rds_template_data_array['page_templates']['finance_page']['gravity_form_heading']; ?></h4> 
                            <?php
                            $form_id = $get_rds_template_data_array['page_templates']['finance_page']['gravity_form_id'];
                            echo do_shortcode('[gravityforms id=' . $form_id . ' ajax=true]');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-block order-4 order-lg-4">
            <div class="container-fluid bg-white px-0 px-lg-3 pb-3 pb-lg-5 pt-lg-5 mb-4 mt-4 mt-lg-5">
                <div class="container pt-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="img_section pb-lg-0 pb-4 text-center">
                                <?php
                                $financing_placeholder_image = get_stylesheet_directory_uri() . '/img/financing-page/financing-img.jpg';
                                $financing_placeholder_image2x = get_stylesheet_directory_uri() . "/img/financing-page/financing-img@2x.jpg";
                                $financing_placeholder_image3x = get_stylesheet_directory_uri() . "/img/financing-page/financing-img@3x.jpg";
                                if (@getimagesize($financing_placeholder_image) == false) {
                                    $financing_placeholder_image = get_stylesheet_directory_uri() . "/img/finance-placeholder.jpg";
                                    $financing_placeholder_image2x = get_stylesheet_directory_uri() . "/img/finance-placeholder@2x.jpg";
                                    $financing_placeholder_image3x = get_stylesheet_directory_uri() . "/img/finance-placeholder@3x.jpg";
                                }
                                ?>
                                <img src="<?php echo $financing_placeholder_image; ?>" srcset="<?php echo $financing_placeholder_image; ?> 1x, <?php echo $financing_placeholder_image2x; ?> 2x, <?php echo $financing_placeholder_image3x; ?> 3x" alt="placeholder Image" class="img-fluid" width="540" height="390" >

                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="finance_custom_content mw-md-330 mx-lg-0 mx-auto ">
                                <h4 class="text-start"><?php echo $get_rds_template_data_array['page_templates']['finance_page']['company_services']['heading']; ?></h4>
                                <h2 class="mb-lg-0 pb-lg-5 text-start"><?php echo $get_rds_template_data_array['page_templates']['finance_page']['company_services']['subheading']; ?></h2>

                                <ul class="mb-5">
                                    <?php
                                    $companyItems = $get_rds_template_data_array['page_templates']['finance_page']['company_services']['items'];

                                    foreach ($companyItems as $value) {
                                        echo'<li class="">' . $value['content'] . '</li>';
                                    }
                                    ?>   
                                </ul>
                                <div class="text-lg-start text-center pt-lg-2">
                                    <?php if (strpos($get_rds_template_data_array['page_templates']['finance_page']['company_services']['button_link'], 'https') !== false && $get_rds_template_data_array['page_templates']['finance_page']['company_services']['button_link']) { ?>
                                        <a target="_blank" href="<?php echo $get_rds_template_data_array['page_templates']['finance_page']['company_services']['button_link']; ?>" class="btn btn-primary mw-165 mx-lg-0 mx-auto"><?php echo $get_rds_template_data_array['page_templates']['finance_page']['company_services']['button_text']; ?></a>
                                    <?php } elseif($get_rds_template_data_array['page_templates']['finance_page']['company_services']['button_link']) { ?>
                                        <a href="<?php echo get_home_url() . $get_rds_template_data_array['page_templates']['finance_page']['company_services']['button_link']; ?>" class="btn btn-primary mw-165 mx-lg-0 mx-auto"><?php echo $get_rds_template_data_array['page_templates']['finance_page']['company_services']['button_text']; ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-block order-5 order-lg-5 pb-lg-5 pb-4 mb-lg-4">
            <div class="container-fluid px-lg-3 px-0">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <p class="pb-lg-4"><?php echo $get_rds_template_data_array['page_templates']['finance_page']['middle_content']; ?></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-block order-6 order-lg-6 pb-5 mb-lg-5">
            <div class="container-fluid px-lg-3 px-0">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <?php
                            $accordionData = $get_rds_template_data_array['page_templates']['finance_page']['accordion'];
                            $accordion = '';
                            foreach ($accordionData as $value) {
                                $accordion .= '[bc_card title="' . $value['question'] . '"] ' . $value['content'] . '[/bc_card]';
                            }
                            ?>
                            <?php echo do_shortcode('[bc_accordion]' . $accordion . '[/bc_accordion]'); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- proudly serving area starts -->
        <?php
        /*if ($get_rds_template_data_array['globals']['service_area']['variation'] == 'a' && $get_rds_template_data_array['globals']['service_area']['enable']) {
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
<?php get_footer(); ?>