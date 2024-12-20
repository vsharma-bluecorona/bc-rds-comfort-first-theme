<?php
$get_alt_text = rds_alt_text();
$financing_svg_alt = "";
foreach ($get_alt_text as $value) {
    if (in_array("financing-c-mascot.svg", $value))
        $financing_svg_alt = 'alt="' . $value[3] . '"';
}
?>
<div class="d-block py-lg-5 pt-0">
    <div class="container-fluid py-lg-4 text-center px-lg-3 px-0">
        <div class="container financing-bg">
            <div class="row align-items-center">
                <div class="col-lg-11 mw-lg-1073 text-center ms-lg-auto d-lg-flex align-items-center px-lg-3 px-0 ">
                    <?php
                                    $img1x = [
                                        get_exist_image_url('fullwidth-cta', 'financing-c-bg'),
                                        get_exist_image_url('fullwidth-cta', 'financing-c-bg@2x'),
                                        get_exist_image_url('fullwidth-cta', 'financing-c-bg@3x')
                                    ];
                                    
                                    $img2x = [
                                        get_exist_image_url('fullwidth-cta', 'financing-c-bg'),
                                        get_exist_image_url('fullwidth-cta', 'financing-c-bg@2x'),
                                        get_exist_image_url('fullwidth-cta', 'financing-c-bg@3x')
                                    ];
                                    
                                    $img3x = [
                                        get_exist_image_url('fullwidth-cta', 'financing-c-bg'),
                                        get_exist_image_url('fullwidth-cta', 'financing-c-bg@2x'),
                                        get_exist_image_url('fullwidth-cta', 'financing-c-bg@3x')
                                    ];
                    $img1x = Implode(',', $img1x);
                    $img2x = Implode(',', $img2x);
                    $img3x = Implode(',', $img3x);
                    ?>
                    <?php echo do_shortcode('[custom-bg-srcset class="financing-bg-c" img1x="' . $img1x . '" img2x="' . $img2x . '" img3x="' . $img3x . '" size1x="cover" size2x="cover" size3x="cover"]'); ?>
                    <div class="d-lg-flex w-100 mw-lg-1073 py-lg-0 py-5  align-items-center financing-bg-c" >
                        <img src="<?php echo get_exist_image_url('fullwidth-cta','financing-c-mascot.svg'); ?>" <?php echo $financing_svg_alt; ?>  class="img-fluid position-relative left-lg-n120" width="306" height="230">
                        <div class="d-block ps-lg-4 pt-lg-0 pt-3  position-relative">
                            <h4 class=""><?php echo $args['globals']['financing']['heading']; ?></h4>
                            <h5 class="mt-2 mb-0 pb-1"><?php echo $args['globals']['financing']['subheading']; ?></h5>
                            <a href="<?php echo get_home_url() . $args['globals']['financing']['button_link']; ?>" class="no_hover_underline text_18 text-uppercase line_height_23  d-inline-flex align-items-center justify-content-center font_alt_2"><?php echo $args['globals']['financing']['button_text']; ?><i class="icon-chevron-right2 text_18 line_height_18 ms-1  position-relative"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 