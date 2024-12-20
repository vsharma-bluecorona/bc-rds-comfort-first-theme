<div class="row py-lg-2">
    <?php
    $image_placeholder_image = get_stylesheet_directory_uri() . '/img/about-page/about-img.webp';
    $image_placeholder_image2x = get_stylesheet_directory_uri() . "/img/about-page/about-img@2x.webp";
    $image_placeholder_image3x = get_stylesheet_directory_uri() . "/img/about-page/about-img@3x.webp";
    if (@getimagesize($image_placeholder_image) === false) {
        $image_placeholder_image = get_stylesheet_directory_uri() . "/img/seo-section/seo-img.webp";
        $image_placeholder_image2x = get_stylesheet_directory_uri() . "/img/seo-section/seo-img@2x.webp";
        $image_placeholder_image3x = get_stylesheet_directory_uri() . "/img/seo-section/seo-img@3x.webp";
    }
    $m_image_placeholder_image = get_stylesheet_directory_uri() . '/img/about-page/m-about-img.webp';
    $m_image_placeholder_image2x = get_stylesheet_directory_uri() . "/img/about-page/m-about-img@2x.webp";
    $m_image_placeholder_image3x = get_stylesheet_directory_uri() . "/img/about-page/m-about-img@3x.webp";
    if (@getimagesize($m_image_placeholder_image) === false) {
        $m_image_placeholder_image = get_stylesheet_directory_uri() . "/img/seo-section/seo-img.webp";
        $m_image_placeholder_image2x = get_stylesheet_directory_uri() . "/img/seo-section/seo-img@2x.webp";
        $m_image_placeholder_image3x = get_stylesheet_directory_uri() . "/img/seo-section/seo-img@3x.webp";
    }
    ?>
    <div class="col-lg-12 px-0">
        <img src="<?php echo $image_placeholder_image; ?>" srcset="<?php echo $image_placeholder_image; ?> 1x, <?php echo $image_placeholder_image2x; ?> 2x, <?php echo $image_placeholder_image3x; ?> 3x" class="img-fluid float-lg-end ms-lg-5 pb-lg-0 pb-4 d-lg-inline-block d-none" width="540" height="534" alt="About Page Image">
        <img src="<?php echo $m_image_placeholder_image; ?>" srcset="<?php echo $m_image_placeholder_image; ?> 1x, <?php echo $m_image_placeholder_image2x; ?> 2x, <?php echo $m_image_placeholder_image3x; ?> 3x" class="img-fluid float-lg-end ms-lg-5 pb-lg-0 pb-4 d-inline-block d-lg-none "  alt="About Page Image">
        <h1 class=""><?php echo $args['page_templates']['about_us_page']['seo_section']['heading']; ?></h1>
        <h2 class="pb-lg-5"><?php echo $args['page_templates']['about_us_page']['seo_section']['subheading']; ?></h2>
        <p><?php echo $args['page_templates']['about_us_page']['seo_section']['before_read_more_content']; ?></p>
        <div class="collapse bg-transparent border-0" id="read_more">
            <div class=" bg-transparent border-0">
                <p><?php echo $args['page_templates']['about_us_page']['seo_section']['after_read_more_content']; ?></p>
            </div>
        </div>
        <?php 
        if (!empty($args['page_templates']['about_us_page']['seo_section']['after_read_more_content'])) {
            echo do_shortcode('[bc-read-more id="read_more" background-color="" data-close-icon="icon-minus1" data-open-icon="icon-plus1"]'); } ?>

    </div>

</div>