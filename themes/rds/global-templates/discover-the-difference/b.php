<!--order-5 order-lg-5-->
<?php
$get_alt_text = rds_alt_text();
$alt = "";
foreach ($get_alt_text as $value) {

    if (in_array("value-prop-img.webp", $value))
        $alt = 'alt="' . $value[3] . '"';
}
$heading_tag = isset($args['globals']['discover_the_difference']['heading_tag']) ? $args['globals']['discover_the_difference']['heading_tag'] : "h5";
$subheading_tag = isset($args['globals']['discover_the_difference']['subheading_tag']) ? $args['globals']['discover_the_difference']['subheading_tag'] : "h4";
?> 
<div class="d-block">
    <div class="container-fluid  py-lg-5 pt-4">
        <div class="container pt-lg-2 pb-lg-2 pt-2">
            <div class="row">
                <div class="col-lg-6">
                    <<?= $heading_tag ?> data-dark-color="color_primary" data-light-color="true_white" class="true_white apply-conditional-color text-center text-lg-start mb-0 sm_text_22 sm_line_height_27"><?php echo $args['globals']['discover_the_difference']['heading']; ?></<?= $heading_tag ?>>
                    <<?= $subheading_tag ?> class="true_white apply-conditional-color text-center text-lg-start <?= $subheading_tag ?>-alt pb-lg-5 pb-4"><?php echo $args['globals']['discover_the_difference']['subheading']; ?></<?= $subheading_tag ?>>
                    <div class="row ">
                        <div data-dark-color="color_primary" data-light-color="true_white"  class="apply-conditional-color col-lg-12 swiper expect-swiper-b expect-swiper-b-<?= $args['globals']['discover_the_difference']['widget_id']; ?> mw-md-292 mx-lg-0 mx-auto ps-lg-5 swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                            <div class="swiper-wrapper flex-lg-wrap transform-lg-none" id="swiper-wrapper-bf667319aeb6b398" aria-live="polite">
                                <?php
                                $discoverItems = $args['globals']['discover_the_difference']['items'];
                                $discoverItemsCount = count($discoverItems);
                                $i = 1;
                                foreach ($discoverItems as $value) {
                                    echo'<div class="swiper-slide col-lg-12 h-lg-auto mb-lg-4 swiper-slide-active" role="group" aria-label="1 / 5" style="width: 87px;">
                                    <div class="row align-items-center">
                                        <div class="col-5 col-lg-2 pe-lg-0 pe-4 align-items-center d-flex mh-md-75">
                                            <div class="w-75 h-75 color_tertiary_bg rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="color_primary ' . $value['icon'] . '  text_35 line_height_35"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-lg-10 ps-lg-3 ps-4 border-lg-left">
                                            <h6 class="h6-alt px-lg-1 mb-0">' . $value['title'] . '</h6>
                                        </div>
                                    </div>
                                    
                                </div>';
                                }
                                ?>
                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                        <div data-dark-color="color_primary" data-light-color="true_white" class="apply-conditional-color col-12 swiper-pagination position-relative d-lg-none what-pagination-b what-pagination-b-<?= $args['globals']['discover_the_difference']['widget_id']; ?> pagination-variation-a"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span></div>
                        <div class="col-12 text-center text-lg-start pb-lg-0 pb-5 pt-lg-4 pt-4">
                            <a href="<?php echo get_home_url() . $args['globals']['discover_the_difference']['button_link']; ?>" class="btn btn-primary"><?php echo $args['globals']['discover_the_difference']['button_text']; ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-lg-block d-none">
                  

                    <img src="<?php echo get_exist_image_url('value-prop','value-prop-img'); ?>" srcset="<?php echo get_exist_image_url('value-prop','value-prop-img'); ?> 1x, <?php echo get_exist_image_url('value-prop','value-prop-img@2x'); ?> 2x, <?php echo get_exist_image_url('value-prop','value-prop-img@3x'); ?> 3x" class="img-fluid w-100" <?php echo $alt; ?>  width="546" height="714">

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function () {
        var swiperExpectB = new Swiper(".expect-swiper-b-<?= $args['globals']['discover_the_difference']['widget_id']; ?>", {
            spaceBetween: 10,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".what-pagination-b-<?= $args['globals']['discover_the_difference']['widget_id']; ?>",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 40,
                    noSwiping: false,
                    allowSlidePrev: true,
                    allowSlideNext: true,
                    autoHeight: true,
                },
                992: {
                    slidesPerView: 1,
                    spaceBetween: 40,
                    noSwiping: false,
                    allowSlidePrev: true,
                    allowSlideNext: true,
                },
                993: {
                    slidesPerView: 6,
                    spaceBetween: 0,
                    noSwiping: true,
                    allowSlidePrev: false,
                    allowSlideNext: false,
                },
            },
        });
    });
</script>