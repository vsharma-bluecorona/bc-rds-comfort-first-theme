<?php $get_alt_text = rds_alt_text();
$alt = "";   

foreach ($get_alt_text as $value) {

if (in_array("404-img-1.webp", $value))
   $alt =  'alt="'.$value[3].'"'; 

}
 ?>  
     <div class="container-fluid">
        <div class="container py-5 px-0 py-md-0 px-md-3">
            <div class="row mx-0">

                <div class="col-xl-4 col-lg-5 text-lg-start text-center pt-4 pt-lg-5 pe-lg-0 order-lg-1 order-2 pb-lg-5">  
                    <div class="pt-xl-5 pb-lg-5">
                        <h1 class="pt-lg-5 mt-xl-5 pt-4 text-uppercase display1 pagenotfound_display_1">Oops!</h1>
                        <span class="display2 pagenotfound_display_2 d-block pb-3">Page Not Found</span>
                        <div class="text-lg-start text-center pt-lg-4 pt-md-3 d-md-flex align-items-end justify-content-lg-start justify-content-center">
                            <a href="<?php echo get_home_url(); ?>" class="btn btn-primary mw-180 me-md-4" name="Return to Home">Return home</a><h6 class="d-md-inline d-block mb-1 pt-lg-0 pt-4 text-capitalize">Or Jump To...</h6>
                        </div>
                        <div class="pt-4 pb-lg-5 pb-4 mb-lg-5 text-lg-start text-center page_main_links"> 
                            <?php
                            $name = $args['globals']['404']['menu_name'];
                            $menu = get_term_by( 'name', $name , 'nav_menu' );
                            $menu_items = wp_get_nav_menu_items($menu);
                            if(isset($menu_items) && !empty($menu_items)):
                            ?>
                            <?php foreach ($menu_items as $key => $value) {?>
                                 <a href="<?php echo $value->url;?>" target="<?php echo $value->target;?>" class="mx-2 me-lg-4 pe-md-2 pe-lg-0 ms-md-0 text_16 line_height_21 my-lg-0 my-2 font_default text_normal no_hover_underline text-uppercase"> <?php echo $value->post_title; ?></a>
                            <?php } 
                            endif;
                            ?>
                        </div>  
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 text-start px-lg-0 order-lg-2 order-1">
                    <img src="<?php echo get_exist_image_url('404','404-img-2'); ?>" srcset="<?php echo get_exist_image_url('404','404-img-2'); ?> 1x, <?php echo get_exist_image_url('404','404-img-2@2x'); ?> 2x, <?php echo get_exist_image_url('404','404-img-2@3x'); ?> 3x" width="1135" height="953" class="img-fluid mx-auto h-100" <?php echo $alt;  ?>>
                </div>
            </div>
            
            </div>
        </div>
        