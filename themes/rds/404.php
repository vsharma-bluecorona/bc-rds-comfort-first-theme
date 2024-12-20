<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
$get_rds_template_data_array = rds_template();
?>
<main>

  <?php 
    if ($get_rds_template_data_array['globals']['404']['variation'] == 'a') {
    get_template_part( 'global-templates/404/a', null, $get_rds_template_data_array); 
    }elseif ($get_rds_template_data_array['globals']['404']['variation'] == 'b') {
       get_template_part( 'global-templates/404/b', null, $get_rds_template_data_array);
    }
   ?>
</main>
<?php
get_footer(); ?>
