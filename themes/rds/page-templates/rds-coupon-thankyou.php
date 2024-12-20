<?php
/**
 * Template Name: Coupon Thank You Template
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$get_rds_template_data_array = rds_template();
?>
<main>
        <div class="w-100 d-block">
            <div class="d-flex flex-column">
                 <?php 
                    if ($get_rds_template_data_array['page_templates']['thankyou_page']['variation'] == 'a') {
                    get_template_part( 'global-templates/thank-you/a', null, $get_rds_template_data_array); 
                    }elseif ($get_rds_template_data_array['page_templates']['thankyou_page']['variation'] == 'b') {
                       get_template_part( 'global-templates/thank-you/b', null, $get_rds_template_data_array);
                    }
                ?>
            </div>
        </div>
 <script type="text/javascript">
    function scrollSmoothTo(elementId) {
        var element = document.getElementById(elementId);
        if (element !== null) {
            element.scrollIntoView({
                block: 'start',
                behavior: 'smooth'
            });
        }
    }
    // jQuery(document).ready(function(){
    // jQuery(".next-service").on('click', function(e) {     
    //     e.preventDefault();
     

    //         jQuery('html, body').animate({
    //             scrollTop: jQuery('#next-service').offset().top - 20
    //         }, 300);

    //  });
    // });
</script>
    </main>
<?php get_footer();?>
