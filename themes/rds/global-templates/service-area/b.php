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
        <?php echo do_shortcode('[custom-bg-srcset class="proudly-serving-b" img1x="'.$img1x.'" img2x="'.$img2x.'" img3x="'.$img3x.'" size1x="cover" size2x="cover" size3x="cover"]'); ?>
    <div class="container-fluid proudly_serving_area px-md-3 px-0 pb-md-0 pb-5 " style=" background-size: cover;    background-repeat: no-repeat; background-position: 54% center !important;">
        <div class="container py-md-3 pt-4 pb-2 px-md-3 px-3 mb-md-0 mb-5 proudly-serving-mobile">
            <div class="row align-item-center py-xl-5 py-md-5 pb-5 mb-md-0 mb-5">
                <div class="col-lg-5 col-sm-7 text-center pb-md-0 pb-5 mb-md-0 mb-5">
                    <div class="d-block px-xl-4 px-4 py-4 py-lg-5 true_white_bg shadow-md mb-md-0 mb-5">
                        <h4 class="pt-lg-4 pb-3 mb-0"><?php echo $args['globals']['service_area']['heading']; ?> </h4>
                        <div class="text-center border-bottom-tertiary mw-100 mx-auto mb-4"></div>
                        <p class="mb-2 "><?php echo $args['globals']['service_area']['description_html_allowed']; ?>
                        </p>
                        <div class="pt-2 pb-3 pb-lg-4">
                            <a href="<?php echo get_home_url().$args['globals']['service_area']['button_link']; ?>" class="btn btn-primary mw-173"><?php echo $args['globals']['service_area']['button_text']; ?> <i class="icon-chevron-right ms-2 me-0 bc_text_18 bc_line_height_18 transform_lg position-relative top_n2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
