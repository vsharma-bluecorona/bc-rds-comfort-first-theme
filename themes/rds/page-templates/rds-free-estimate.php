<?php
/**
 * Template Name: FreeEstimate Template
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
            <?php echo do_shortcode('[elementor-template id="39720"]'); ?>
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
        jQuery(".free_estimate_accord").each(function (index) {
            jQuery(this).children(".accordion-item").children(".accordion-collapse:first").addClass("show");
            jQuery(this).children(".accordion-item:first").find('.accrdion_icon i').toggleClass("icon-plus icon-minus1");
            jQuery(this).children(".accordion-item:first").children("accordion-header").attr('aria-expanded', 'false');
        });
    });
</script>
<?php get_footer(); ?>