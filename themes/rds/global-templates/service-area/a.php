  <div class="d-block">
                <?php
            //exaple how to set image sizewise
            // ['dektop', 'ipad', 'mobile']
        

            $img1x = [
                get_exist_image_url('service-area', 'service-map'),
                get_exist_image_url('service-area', 'service-map'),
                get_exist_image_url('service-area', 'm-service-map')
            ];
            
            $img2x = [
                get_exist_image_url('service-area', 'service-map@2x'),
                get_exist_image_url('service-area', 'service-map@2x'),
                get_exist_image_url('service-area', 'm-service-map@2x')
            ];
            
            $img3x = [
                get_exist_image_url('service-area', 'service-map@3x'),
                get_exist_image_url('service-area', 'service-map@3x'),
                get_exist_image_url('service-area', 'm-service-map@3x')
            ];
            
            $img1x = Implode(',', $img1x);
            $img2x = Implode(',', $img2x);
            $img3x = Implode(',', $img3x);

        ?> 
                    <?php echo do_shortcode('[custom-bg-srcset class="proudly-serving-a" img1x="'.$img1x.'" img2x="'.$img2x.'" img3x="'.$img3x.'" size1x="cover" size2x="cover" size3x="cover"]'); ?>
                    <div class="container-fluid proudly_serving_area py-sm-5 pt-5 pb-3 mh-sm-680">
                    <div class="container py-lg-5 py-md-3 pt-5 py-sm-0 mt-sm-0 mt-5">
                        <div class="row align-item-center py-xl-5 py-sm-0 pt-5 mt-sm-0 mt-5">
                            <div class="col-lg-6 col-sm-7 text-center text-sm-start pe-sm-0 pt-sm-0 pt-5 mt-sm-0 mt-5">
                                <div class="d-block pe-xl-4 pt-sm-0 pt-5 mw-sm-320 mx-sm-0 mx-auto">
                                    <h5 class="h5-alt  pt-sm-0 pt-4 mb-sm-2 mb-0"><?php echo $args['globals']['service_area']['heading']; ?> </h5>
                                    <h4 class="border-bottom-tertiary h4-alt pb-2"><?php echo $args['globals']['service_area']['subheading']; ?></h4>
                                    <p class="p-alt  mb-0 mb-lg-2 pe-lg-4 pe-xl-5"><?php echo $args['globals']['service_area']['description_html_allowed']; ?>
                                    </p>
                                    <div class="pt-1 pt-lg-2 pb-0 pb-lg-0">
                                        <a href="<?php echo get_home_url().$args['globals']['service_area']['button_link']; ?>" class="a-alt no_hover_underline text-uppercase   font_default text_semibold d-inline-flex align-items-center text_18 line_height_23"><?php echo $args['globals']['service_area']['button_text']; ?> <i class="icon-chevron-right ms-2 bc_text_18 bc_line_height_18 position-relative top_n2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div> 