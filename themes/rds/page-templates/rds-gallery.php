<?php
/**
 * Template Name: Gallery Template
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
global $post;
$get_rds_template_data_array = rds_template();
$cat = isset($_GET['cat']) ? $_GET['cat'] : '';
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$total_posts = 0;
$args = array(
    'paged' => $paged,
    'posts_per_page' => 9,
'post_type' => 'bc_galleries', 
);
if ($cat) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'bc_gallery_category',
            'field' => 'slug',
            'terms' => $cat,
        ),
    );
}
query_posts($args);
?>

<style type="text/css">
    .mySwiper-lightbox{
        visibility: hidden;
    }
    html {
        -webkit-user-select: none; /* Safari */
        -ms-user-select: none; /* IE 10 and IE 11 */
        user-select: none; /* Standard syntax */
    }
</style>
<main>
    <div class="w-100 d-block">
        <div class="d-flex flex-column">
            <div class="d-block order-1 order-lg-1">
                <div class="container-fluid pt-4 pt-lg-5 order-1 order-lg-1  mt-2  px-lg-3 px-0">
                    <div class="container px-lg-3 px-0">
                        <div class="row pb-lg-2 mx-0">
                            <div class="col-12 col-lg-12 order-lg-1 order-1 ">
                                <h1 class="mb-0 pb-4"><?php the_title(); ?></h1>
                                <p class=""><?php
                                    $content = get_post_field('post_content', $post->ID);
                                    if ($content) {
                                        echo do_shortcode($content);
                                    } else {
                                        echo $get_rds_template_data_array['page_templates']['gallery_page']['content'];
                                    }
                                    ?>
                                </p>
                                <?php get_template_part('sidebar-templates/search', 'gallerytopbar'); ?>

                                <div class="row mt-3">
                                    <?php
                                    if (have_posts()) :
                                        while (have_posts()) :
                                            the_post();
                                            get_template_part('loop-templates/content-gallery');
                                            $total_posts++;
                                        endwhile;
                                    else :
                                        get_template_part('loop-templates/content', 'none');
                                    endif;
                                    ?> 
                                </div>
                                <div class="d-flex align-items-center justify-content-center my-5"><?php
                                    understrap_pagination(['prev_text' => '<i class="icon-angles-left4"></i>',
                                        'next_text' => '<i class="icon-angles-right4"></i>']);
                                    ?>
                                </div>
                                <?php get_template_part('page-templates/common/bc-gallery-popup');
                                ?>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <!-- Request service  starts -->
            <?php
            /*if ($get_rds_template_data_array['globals']['request_service']['variation'] == 'a' && $get_rds_template_data_array['globals']['request_service']['enable']) {
                get_template_part('global-templates/request-service/a', null, $get_rds_template_data_array);
            } elseif ($get_rds_template_data_array['globals']['service_area']['variation'] == 'b' && $get_rds_template_data_array['globals']['request_service']['enable']) {
                get_template_part('global-templates/request-service/b', null, $get_rds_template_data_array);
            } elseif ($get_rds_template_data_array['globals']['service_area']['variation'] == 'c' && $get_rds_template_data_array['globals']['request_service']['enable']) {
                get_template_part('global-templates/request-service/c', null, $get_rds_template_data_array);
            } */
            ?>
            <div class="order-<?php echo $get_rds_template_data_array['globals']['request_service']['order'] ?>">
            <?php echo do_shortcode('[elementor-template id="32406"]'); ?>
            </div>
            <!-- Request service area ends -->
            <!-- Affiliation Start-->
            <?php
            if ($get_rds_template_data_array['globals']['affiliation']['variation'] && $get_rds_template_data_array['globals']['affiliation']['enable']) {
                get_template_part('global-templates/affiliation/a', null, $get_rds_template_data_array);
            }
            ?>
            <!-- Affiliation End -->
        </div>
    </div>
</main>
<?php get_footer(); ?>
<script>
    var dataIndex;
    var gallerySwiper;
    var url = jQuery(location).attr('href'),
            pageNumber = url.split("/"),
            lastNumber = pageNumber[pageNumber.length - 2];
    if (Math.floor(lastNumber) == lastNumber && jQuery.isNumeric(lastNumber))
    {
        lastNumber = lastNumber;
    } else {
        lastNumber = 1;
    }

    jQuery(document).ready(function () {

        jQuery(".lightbox").click(function () {
            dataIndex = jQuery(this).index();
            dataIndex = dataIndex + (lastNumber - 1) * <?= $total_posts; ?>;
            gallerySwiper = new Swiper('.mySwiper-lightbox', {
                grabCursor: true,
                observer: true,
                observeParents: true,
                navigation: {
                    nextEl: ".swiper-button-next-lightbox-gallery",
                    prevEl: ".swiper-button-prev-lightbox-gallery",
                },

                autoHeight: true,
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                initialSlide: dataIndex,
                slideToClickedSlide: false,
                on: {
                    init: function () {
                        jQuery(".mySwiper-lightbox").css("visibility", "visible");
                    },
                    beforeDestroy: function () {
                        jQuery(".mySwiper-lightbox").css("visibility", "hidden");
                    }
                }

            });
        });
        jQuery("#Gallery-lightBox").on('hide.bs.modal', function () {
            gallerySwiper.destroy();
        });
    });

</script>
