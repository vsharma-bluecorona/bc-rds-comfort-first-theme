<?php
$get_alt_text = rds_alt_text();
$alt1 = "";
$alt2 = "";
$alt3 = "";
$alt4 = "";
$alt5 = "";
$alt6 = "";
$alt7 = "";
$alt8 = "";


foreach ($get_alt_text as $value) {

    if (in_array("affiliate-logo-1-gray.webp", $value))
         $alt1 = 'alt="' . $value[3] . '"';

    if (in_array("affiliate-logo-2-gray.webp", $value))
        $alt2 = 'alt="' . $value[3] . '"';

    if (in_array("affiliate-logo-3-gray.webp", $value))
        $alt3 = 'alt="' . $value[3] . '"';

    if (in_array("affiliate-logo-4-gray.webp", $value))
        $alt4 = 'alt="' . $value[3] . '"';

    if (in_array("affiliate-logo-5-gray.webp", $value))
        $alt5 = 'alt="' . $value[3] . '"';

    if (in_array("affiliate-logo-6-gray.webp", $value))
         $alt6 = 'alt="' . $value[3] . '"';

    if (in_array("affiliate-logo-7-gray.webp", $value))
         $alt7 = 'alt="' . $value[3] . '"';
 
    if (in_array("affiliate-logo-8-gray.webp", $value))
         $alt8 = 'alt="' . $value[3] . '"';
 
        
}
?>
<div class="d-block pb-4 pb-lg-5 ">
    <h1 class="text-center mb-5 mb-lg-0 pb-lg-3">Affiliations & Awards</h1>
    <div class="container-fluid py-lg-5 py-lg-2 text-center ">
        <div class="container pb-lg-3 pt-lg-1 py-2">
            <div class="row align-items-center justify-content-center position-relative">
                <div class="col-sm-12 col-lg-12 px-lg-5 px-4 mx-atuo ">
                    <div class="swiper affiliation-swiper-a">
                        <div class="swiper-wrapper align-items-center ">
                            <?php  $Count = $args['globals']['affiliation']['count'];
                            $i = 1;
                            $class = "w-150";
                                if($Count < 6){
                                $class ='w-150';
                            }elseif ($Count > 5 &&  $Count < 7 ) {
                                $class ='w-130';
                            }else {
                                $class ='w-auto';
                            }

                            $media_dir = get_exist_image_url('affiliation','affiliate-logo');
                            while ($Count >= $i  ) {
                                  $alt = "alt".$i;
                                  $logo = get_exist_image_url('affiliation', 'affiliate-logo-' . $i . '-gray');
                                  $logo2x = get_exist_image_url('affiliation', 'affiliate-logo-' . $i . '-gray@2x');
                                  $logo3x = get_exist_image_url('affiliation', 'affiliate-logo-' . $i . '-gray@3x');
                                $fileContents = @file_get_contents($logo);
                                if ($fileContents != false) {
                                 $alt = $$alt;
                                ?>
                                <div class="swiper-slide">
                                    <div class="text-center">
                                        <img src="<?php echo $logo; ?>" class="img-fluid <?php echo $class; ?>" width="254"  height="193" <?php echo $alt; ?> srcset="<?php echo $logo; ?> 1x, <?php echo $logo2x; ?> 2x, <?php echo $logo3x; ?> 3x," />
                                    </div>
                                </div>
                                <?php
                              
                            }
                              $i++;
                            }
                            ?>
                         
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next affiliation_next_a ms-lg-n3 color_primary d-none d-lg-block">
                    <i class="icon-chevron-right1 text_25 line_height_25 transform_lg alt_color_3_c"></i>
                </div>
                <div class="swiper-button-prev affiliation_prev_a color_primary d-none d-lg-block">
                    <i class="icon-chevron-left1 text_25 line_height_25 transform_lg alt_color_3_c"></i>
                </div> 
                <div class="swiper-pagination affiliation-pagination pagination-variation-a d-lg-none  position-relative pb-3"></div>
            </div>

        </div>
    </div>
</div>


<script type="text/javascript">

       jQuery(document).ready(function () {
        var variation = "<?php echo $args['globals']['affiliation']['variation'] ?>";
          var count = "<?php echo $args['globals']['affiliation']['count'] ?>";
        var slidesPerView = {a: 4, b: 5, c: 4};
        if(count <= slidesPerView[variation]){
             var affiliactionSlider = new Swiper(".affiliation-swiper-a", {
            spaceBetween: 30,
            slidesPerView: 1,
            loop: false,
           navigation: {
                nextEl: ".affiliation_next_a",
                prevEl: ".affiliation_prev_a",
            },
            
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
                992: {
                    slidesPerView: count,
                    spaceBetween: 30,
                    noSwiping: true,
                    allowSlidePrev: false,
                    allowSlideNext: false,
                },
            },
        });

        }else{
           var affiliactionSlider = new Swiper(".affiliation-swiper-a", {
            spaceBetween: 0,
            slidesPerView: 1,
            loop: true,
             autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                 nextEl: ".affiliation_next_a",
                prevEl: ".affiliation_prev_a",
            },
            pagination: {
                    el: ".affiliation-pagination",
                    clickable: true,
                },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
                992: {
                    slidesPerView: slidesPerView[variation],
                    spaceBetween: 0,
                    noSwiping: false,
                    allowSlidePrev: true,
                    allowSlideNext: true,
                },
            },
        });

        }
        
    });
</script>
<style type="text/css">.affiliation_next_a.swiper-button-disabled.swiper-button-lock, .affiliation_prev_a.swiper-button-disabled.swiper-button-lock {
    display: none;
}</style>