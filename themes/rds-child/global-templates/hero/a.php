<?php
            //exaple how to set image sizewise
            // ['dektop', 'ipad', 'mobile']

            $img1x = [
                get_exist_image_url('hero', 'home-banner'),
                get_exist_image_url('hero', 'home-banner'),
                get_exist_image_url('hero', 'm-home-banner')
            ];
            $img2x = [
                get_exist_image_url('hero', 'home-banner@2x'),
                get_exist_image_url('hero', 'home-banner@2x'),
                get_exist_image_url('hero', 'm-home-banner@2x')
            ];
            $img3x = [
                get_exist_image_url('hero', 'home-banner@3x'),
                get_exist_image_url('hero', 'home-banner@3x'),
                get_exist_image_url('hero', 'm-home-banner@3x')
            ];
			$img1x = Implode(',', $img1x);
			$img2x = Implode(',', $img2x);
			$img3x = Implode(',', $img3x);

$heading_tag = isset($args['globals']['hero']['heading_tag']) ? $args['globals']['hero']['heading_tag'] : "span";
$subheading_tag = isset($args['globals']['hero']['subheading_tag']) ? $args['globals']['hero']['subheading_tag'] : "span";
?>
<?php  $siteid = get_current_blog_id();?> 
<?php echo do_shortcode('[custom-bg-srcset class="home_banner" img1x="' . $img1x . '" img2x="' . $img2x . '" img3x="' . $img3x . '" size1x="cover" size2x="cover" size3x="cover"]'); ?>
<div class="container-fluid py-lg-0 home_banner home_banner_c px-lg-3 px-0 ">
    <div class="position-relative py-lg-5">
        <div class="container pb-0 pt-lg-5 mt-lg-4 mt-xl-0">
            <div class="row pb-lg-0 pb-lg-2 align-items-lg-bottom pt-lg-5 pt-xl-4 mt-lg-5 mt-xl-1">
                <div class="col-md-12 col-xs-12 col-lg-6 col-sm-12 mt-auto pb-lg-0 mb-lg-4 ps-0 ps-lg-3">
                    <a <?php if($siteid==1){?> href="javascript:void(0)" class="openModalBtn" <?php }else{ ?> href="<?php echo get_home_url();?>/toys-for-tots" <?php } ?>><div class="banner-tweet banner-tweet_c"></div></a>
                    <div class="pt-4 pl-lg-4 px-lg-3 px-2 mt-lg-7 ml-md-0 position-md-absolute cy_bg">
                       <span class="display1 pe-lg-5"><?php echo $args['globals']['hero']['heading']; ?></<?= $heading_tag; ?>></span>
                        <span class="display2 pb-1"><?php echo $args['globals']['hero']['subheading']; ?></<?= $subheading_tag; ?>></span>
                       <div class="true_white_bg position-md-absolute mt-3 d-flex justify-content-center align-items-center  py-4 greviews mx-n16">
                            <!-- <a class="d-flex justify-content-center align-items-center no_hover_underline" target="_blank" href="</?php echo $args['globals']['hero']['button_link']; ?>"> -->
                                <img width="65" height="65" src="<?php echo get_exist_image_url('hero','google-icon'); ?>">
                                <div class="col-sm-8 col-lg-8 text-center ps-3 pe-3 text-lg-start review-content true_black">
                                    <i class="icon-star1 stars_color text_24 line_height_24"></i>
                                    <i class="icon-star1 stars_color text_24 line_height_24"></i>
                                    <i class="icon-star1 stars_color text_24 line_height_24"></i>
                                    <i class="icon-star1 stars_color text_24 line_height_24"></i>
                                    <i class="icon-star1 stars_color text_24 line_height_24"></i>
                                    <br><span class="p text_bold">GOOGLE 4.6 | 4,500 + REVIEWS<!-- </?php //echo $args['globals']['hero']['button_text']; ?> --></span>
                                </div>
                                 <!-- <div class="col-12 text-center text-lg-left">Google 4.5 | 1,130 + reviews</div> -->
                             <!-- </a> -->
                        </div>
                   </div>

                </div>
                <div class="col-md-6 col-xs-12 col-lg-6 col-sm-12 pb-4 pt-2 d-none d-lg-block pr-0">
                    <div class=" col-md-12 col-lg-9 col-sm-12 col-xs-12 offset-lg-3 px-0">
                        <img src="<?php echo get_exist_image_url('subpage-sidebar','ribbon'); ?>"  alt="50+ years of experience ribbon with stars" class="mt-4 mb-n20" style="max-width: 333px;" width="333" height="89">
                        <div class="shadow-xl d-lg-block d-none  pt-lg-3 pt-4 pb-lg-1 hero_banner_form_background border_form home_form_a">
                            
                            <h3 class="d-block pb-lg-2 text-center pt-3 text_medium"><?php echo $args['globals']['hero']['form_heading']; ?></h3>
                            <h5 class="d-block pt-lg-1 text-center"><?php echo $args['globals']['hero']['form_subheading']; ?></h5>   
                            <?php
                            $form_id = $args['globals']['hero']['desktop_gravity_form_id']
                            ;
                            echo do_shortcode('[gravityforms id=' . $form_id . ' ajax=true]');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $site_id = get_current_blog_id();
 if($site_id==1) { ?>
<style type="text/css">
    .banner-tweet {
    max-width: 530px;
    width: 100%;
    height: 405px;
    margin-left: -143px;
    top: 47px !important;
    display: block;
    position: absolute;
} 
@media only screen and (min-width:1366px) and (max-width:1440px){
 .banner-tweet {
    width: 356px;
    height: 322px;
    margin-left: 28px;
    top: 115px !important;
}
}
@media only screen and (min-width:992px) and (max-width:1199px){
   .banner-tweet {
    width: 356px;
    height: 322px;
    margin-left: -32px;
    top: 115px !important;
}
}
@media only screen and (min-width:768px) and (max-width:991px){
    .banner-tweet {
        width: 216px;
        height: 207px;
        margin-left: 73px;
        top: 0px !important;
    }
}

@media screen and (mAX-width: 767px) {
    .banner-tweet {
        margin-left: 0;
    }
}
</style>
<?php }