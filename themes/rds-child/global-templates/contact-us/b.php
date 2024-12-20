<div class="container-fluid  pt-lg-3 pb-lg-5 pb-4 my-2">
               <div class="container pb-lg-5">
               <div class="pb-3 pb-lg-4 mb-lg-2 ">
                    <h1><?php the_title(); ?></h1>
                    <?php echo $args['page_templates']['contact_page']['content']; ?>                               
                </div>
                <div class="row pb-lg-5">                     
                            <div class="col-12 col-lg-12 pt-lg-0 pt-3 ps-lg-3">  
                            <?php
                                  $form_id = $args['page_templates']['contact_page']['gravity_form_id'];
                                  echo do_shortcode('[gravityforms id=' . $form_id . ' ajax=true]');
                                  ?>  
                            </div>                      
                            <div class="col-sm-12 col-lg-4 pt-lg-0 pt-3 ps-lg-4 d-none">
                                  <div class="color_secondary_bg pt-5 pb-1 mxw-350 mx-auto ms-auto ">
                                    <div class="mb-4 pb-1">
                                         <h3 class="mb-3 h3-alt true_white text-center"><?php echo $args['page_templates']['contact_page']['hours_heading']; ?></h3> 
                                        
                                        
                                        <p class="mb-1 true_white text-center text_16 line_height_30"><?php echo $args['site_info']['week_days']; ?></p>
                                        <p class="mb-1 true_white text-center text_16 line_height_30"><?php echo $args['site_info']['weekday_hours']; ?></p>
                                        <p class="mb-1 true_white text-center text_16 line_height_30"><?php echo $args['site_info']['weekend_days']; ?></p>
                                        <p class="mb-1 true_white text-center text_16 line_height_30"><?php echo $args['site_info']['weekend_hours']; ?></p>  
                                                  
                                    </div>                            
                                    <div class="mb-5 contact-social mt-n3">
                                    <div class="social-border"></div>
                                        <h3 class="mt-3 true_white  text-center"><?php echo isset($args['globals']['footer']['heading']) ? $args['globals']['footer']['heading'] : ''; ?></h3>
                                      
                                        <div class="text-center">
                                            <?php
                                            $socialItems = $args['globals']['footer']['data']['social_media']['items'] ?? null;
                                            if (is_array($socialItems)) {
                                                foreach ($socialItems as $value) {
                                                    echo '<a target="_blank" class="text_35 no_hover_underline line_height_30 mx-2 ms-lg-0 me-lg-2 no_hover_underline social_icons_contact_b true_white_hover" title="' . esc_attr($value['icon_class']) . '" href="' . esc_url($value['url']) . '">
                                                            <i class="' . esc_attr($value['icon_class']) . '"></i>
                                                        </a>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                        </div>
                                </div> 
                        </div>
                    </div>
                </div>                