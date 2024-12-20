<?php
/**
 * Template Name: History Template
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$get_rds_template_data_array = rds_template();

?>
<main class="pb-5 page-template-history">
        <!-- Subpage banner starts -->
        <?php get_template_part( 'global-templates/subpage-hero/subpage-banner-section' );?>
        <!-- subpage banner ends -->

        
        <div class="d-flex flex-column w-100">
            <div class="d-block order-1 order-lg-1">
                <div class="container-fluid history_page pt-5 pt-lg-5">
                    <div class="container">
                        <div class="row align-items-center bc_homepage">
                           <?php 
       
                                // if ($get_rds_template_data_array['page_templates']['history_page']['variation'] == 'a' ) {
                                // get_template_part( 'global-templates/history/a', null, $get_rds_template_data_array); 
                                // }elseif ($get_rds_template_data_array['page_templates']['history_page']['variation'] == 'b' ) {
                                //    get_template_part( 'global-templates/history/b', null, $get_rds_template_data_array);
                                // }elseif ($get_rds_template_data_array['page_templates']['history_page']['variation'] == 'c' ) {
                                //      get_template_part( 'global-templates/history/c', null, $get_rds_template_data_array); 
                                // }elseif ($get_rds_template_data_array['page_templates']['history_page']['variation'] == 'd' ) {
                                //      get_template_part( 'global-templates/history/d', null, $get_rds_template_data_array); 
                                // }
                                echo do_shortcode('[elementor-template id="37665"]');
                                ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-block order-2 order-lg-2">
                <div class="container-fluid history_page pt-5 pt-lg-5 pb-3 pb-lg-5 mb-4">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-12 ">
                                <div class=" history_tabs">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <?php $tabItems = $get_rds_template_data_array['page_templates']['history_page']['tab_section']['items']; 
                                    $i = 1;
                                    foreach ($tabItems as $value) {
                                        if ($i == 1) {
                                            $active_class = 'active';
                                        }
                                      echo'<li class="nav-item" role="presentation">
                                        <button class="nav-link '.$active_class.' h6" id="y'.$i.'-tab" data-bs-toggle="tab" data-bs-target="#y'.$i.'" type="button" role="tab" aria-controls="'.$i.'" aria-selected="true">'.$value['title'].'</button>
                                      </li>';
                                      $active_class ='';
                                      $i++;
                                    }
                                      ?>
                                      
                              
                                    </ul>
                                    <div class="tab-content p-lg-5 p-3 shadow" id="myTabContent">

                                    <?php  $j = 1;
                                    foreach ($tabItems as $value) {
                                        if ($j == 1) {
                                            $active_class = 'active show';
                                        }
                                    
                                      echo'<div class="tab-pane fade  '.$active_class.'" id="y'.$j.'" role="tabpanel" aria-labelledby="y'.$j.'-tab">
                                          <div class="row align-items-center">
                                              <div class="col-md-8 order-md-1 order-1">
                                                  <h3 class="pb-2">'.$value['heading'].'</h3>
                                                  <p class="mb-0 pb-4">'.$value['content'].'</p>
                                              </div>
                                              <div class="col-md-4 pb-md-0 pb-3 order-md-2 order-2">
                                                  <img src="'.get_stylesheet_directory_uri().'/img/undraw_segment.png" srcset="'.get_stylesheet_directory_uri().'/img/undraw_segment.png 1x, '.get_stylesheet_directory_uri().'/img/undraw_segment@2x.png 2x, '.get_stylesheet_directory_uri().'/img/undraw_segment@3x.png 3x" class="img-fluid" alt="History Logo" width="320" height="157">
                                              </div>
                                          </div>
                                      </div>';
                                      $j++;
                                      $active_class ='';
                                  }?>

                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-block order-2 order-lg-2">
                <!-- Subpage content area starts -->
                <div class="container-fluid px-lg-3 px-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                
                                <span class="d-block no_hover_underline mb-4"><div class="got-an-emergency py-sm-2 py-3 px-sm-4 px-4 text-start rounded-10" style=" background-size:cover; background-position:center; background-repeat: no-repeat;">
                                            <div class="row align-items-center py-lg-4 px-lg-0 px-3 pb-4 pt-2">
                                                <div class="col-sm-12 col-lg-7 align-items-center py-lg-4 border-right-lg-2 pb-4 border-bottom-md-2 px-0 px-lg-3 mb-lg-0 mb-4 pe-lg-0">
                                                    <span class="d-inline-block mb-0 no_hover_underline text_36 line_height_41 font_default text_bold ps-lg-3 sm_text_24 sm_line_height_29"><?php echo $get_rds_template_data_array['page_templates']['history_page']['in_content_cta']['heading']; ?></span> 
                                                        <a class="no_hover_underline d-inline-block" href="tel:<?php echo $get_rds_template_data_array['site_info']['country_code'].$get_rds_template_data_array['site_info']['phone']; ?>"><span class="d-block mb-0 no_hover_underline text_30 line_height_41 sm_text_36 sm_line_height_45  font_default ps-lg-3 pb-0"><?php echo $get_rds_template_data_array['site_info']['country_code'].$get_rds_template_data_array['site_info']['phone']; ?></span></a></div>
                                                <div class="col-sm-12 col-lg-5 text-lg-end pl-0 py-lg-3 px-lg-3 px-0">
                                                    <a class="no_hover_underline a-alt" href="<?php echo get_home_url().$get_rds_template_data_array['page_templates']['history_page']['in_content_cta']['button_link']; ?>"><div class="text_30 line_height_38 font_alt_2   d-flex align-items-center justify-content-lg-end text_semibold no_hover_underline pe-lg-4 sm_text_24 sm_line_height_29 text-uppercase "><?php echo $get_rds_template_data_array['page_templates']['history_page']['in_content_cta']['button_text']; ?><i class="icon-circle-arrow-right1 text_18 ms-lg-4 ms-2 line_height_18"></i></div></a>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Subpage content area ends -->
            </div>

            <div class="d-block order-3 order-lg-3">
                <div class="container-fluid px-lg-3 px-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="mb-2 pb-lg-4"><?php echo $get_rds_template_data_array['page_templates']['history_page']['middle_content']['heading']; ?></h3>
                                <ul>
                                    <?php $companyItems = $get_rds_template_data_array['page_templates']['history_page']['middle_content']['items']; 
                                        foreach ($companyItems as $value) {
                                        echo'<li class="pb-lg-4">'.$value['content'].'</li>';     
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-block order-4 order-lg-4">
                <div class="container-fluid px-lg-3 px-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                            <?php
                                $accordionData = $get_rds_template_data_array['page_templates']['history_page']['accordion']; 
                                $accordion = '';
                                foreach ($accordionData as $value) {
                                $accordion .= '[bc_card title="'.$value['question'].'"] '.$value['content'].'[/bc_card]';
                                }
                            ?>
                            <?php echo do_shortcode('[bc_accordion]'.$accordion.'[/bc_accordion]'); ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </main>

<?php get_footer(); ?>
