<div class="container-fluid  pt-lg-3   pb-lg-3 pb-4 my-2">
                    <div class="container pb-lg-5">
                        <div class="row pb-lg-5">
                            <div class="col-12 col-lg-8">
                                <h1><?php the_title(); ?></h1>
                                 <?php echo $args['page_templates']['contact_page']['content']; ?>
                                 <div class="pt-3 mt-lg-2 pt-lg-4">
                                  <?php
                                  $form_id = $args['page_templates']['contact_page']['gravity_form_id'];
                                  echo do_shortcode('[gravityforms id=' . $form_id . ' ajax=true]');
                                  ?>
                                  </div>
                            </div>  
                            
                                <div class="col-sm-12 col-lg-4 pt-lg-0 pt-3 ps-lg-5">

                                    <div class="mb-4 pb-1">
                                    <h6 class="mb-3  "><?php echo $args['page_templates']['contact_page']['hours_heading']; ?></h6> 
                                        <p class="mb-0"><?php echo $args['site_info']['week_days']; ?></p>
                                        <p class="mb-0"><?php echo $args['site_info']['weekday_hours']; ?></p>
                                        
                                        <p class="mb-0"><?php echo $args['site_info']['weekend_days']; ?></p>
                                        <p class="mb-0"><?php echo $args['site_info']['weekend_hours']; ?></p>
                                        
                                        
                                    </div>
                                    <div class="mb-4 pb-1">
                                        <h6 class="mb-3"><?php echo $args['page_templates']['contact_page']['address_heading']; ?></h6>
                                        <?php $address = $args['site_info']['address'];
                                        foreach ($address as $value) { ?>
                                        <p class=" pl-lg-0 pr-lg-0 mb-0"><?php echo $value['address']; ?><br><?php echo $value['city']; ?> <?php echo $value['state']; ?> <?php echo $value['zip']; ?>
                                    </p>
                                     <div class="d-flex mb-3">
                                        <?php if(!empty ($value['map_directions_link'])){ ?> 
                                        <a href="<?php echo $value['map_directions_link']; ?>" target="_blank"><i class="icon-location-dot1 "></i>&nbsp; Get Directions &nbsp;<i class="icon-chevron-right "></i></a>
                                    <?php } ?>
                                    </div>
                                    <?php } ?>
                                   
                                    </div>
                                    <div class="mb-5 contact-social mt-n3">
                                        <h6 class=" mb-3"><?php echo $args['site_info']['heading']; ?></h6>
                                        <div class="text-start">
                                            <?php
                                            $socialItems = $args['site_info']['social_media']['items'];
                                            foreach ($socialItems as $value) {
                                                echo '<a target="_blank" class="text_35   no_hover_underline  line_height_30 mx-2 ms-lg-0 me-lg-2 no_hover_underline social_icons_contact" title="' . $value['icon_class'] . '" href="' . $value['url'] . '">
                                                        <i class="' . $value['icon_class'] . ' "></i>
                                                    </a>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                           
                        </div>
                    </div>
                </div>