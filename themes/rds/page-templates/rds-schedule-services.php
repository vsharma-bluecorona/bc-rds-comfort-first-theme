<?php
/**
 * Template Name: Schedule Services Template
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
global $post;
$title = $post->post_title;
$content = $post->post_content;
get_header();
$get_rds_template_data_array = rds_template();
?>
<main>
    <!-- Subpage banner starts -->
    <?php get_template_part('global-templates/subpage-hero/subpage-banner-section'); ?>
    <!-- subpage banner ends -->
    <div class="d-flex flex-column w-100">
        <div class="d-block order-1 order-lg-1">
            <div class="container-fluid pt-4 pb-lg-5 pb-4 my-2 px-lg-3 px-0">
                <div class="container pb-lg-5">
                    <div class="row pb-lg-5">
                        <div class="col-12 pt-lg-4 schedule_service_form">

                            <h1 class="pb-4 pb-lg-0"><?php echo $title; ?></h1>


                            <?php
                            echo do_shortcode('[elementor-template id="37659"]');
                            echo do_shortcode($content);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
<script>
    jQuery(document).ready(function () {
        jQuery(".accordion-header").on("click", function () {
            jQuery(this).find(".accrdion_icon i").toggleClass("icon-plus icon-minus1");
            jQuery(this).closest(".accordion-item").siblings().each(function (k, d) {
                var icon_class = jQuery(this).closest(".accordion-item").find(".accrdion_icon i").hasClass("icon-minus1");
                if (icon_class) {
                    jQuery(this).closest(".accordion-item").find(".accrdion_icon i").removeClass("icon-minus1");
                    jQuery(this).closest(".accordion-item").find(".accrdion_icon i").addClass("icon-plus");
                }
            });
        });
    });
    jQuery(function () {
        jQuery(".schedule_service_accord").each(function (index) {
            jQuery(this).children(".accordion-item").children(".accordion-collapse:first").addClass("show");
            jQuery(this).children(".accordion-item:first").find('.accrdion_icon i').toggleClass("icon-plus icon-minus1");
            jQuery(this).children(".accordion-item:first").children("accordion-header").attr('aria-expanded', 'false');
        });
    });
</script>

<?php get_footer(); ?>