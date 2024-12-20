<?php
add_shortcode('custom-bg-srcset', 'custom_bg_srcset_shortcode');

function custom_bg_srcset_shortcode($attr, $content = null) {
    if (!isset($attr['class']) || in_array($attr['class'], [null, false, ''])) {
        return;
    }
    $class = $attr['class'];

    if (!isset($attr['img1x']) || in_array($attr['img1x'], [null, false, ''])) {
        return;
    }
    $img1x = $attr['img1x'];
    $img1x = explode(',', $img1x);
    $desktop1x = $img1x[0];
    $tab1x = $img1x[1];
    $mobile1x = $img1x[2];

    $img2x = $img1x;
    if (isset($attr['img2x']) && !in_array($attr['img2x'], [null, false, ''])) {
        $img2x = $attr['img2x'];
        $img2x = explode(',', $img2x);
        $desktop2x = $img2x[0];
        $tab2x = $img2x[1];
        $mobile2x = $img2x[2];
    }

    $img3x = $img1x;
    if (isset($attr['img3x']) && !in_array($attr['img3x'], [null, false, ''])) {
        $img3x = $attr['img3x'];
        $img3x = explode(',', $img3x);
        $desktop3x = $img3x[0];
        $tab3x = $img3x[1];
        $mobile3x = $img3x[2];
    }

    $size1x = "100%";
    if (isset($attr['size1x']) && !in_array($attr['size1x'], [null, false, ''])) {
        $size1x = $attr['size1x'];
    }

    $size2x = "100%";
    if (isset($attr['size2x']) && !in_array($attr['size2x'], [null, false, ''])) {
        $size2x = $attr['size2x'];
    }

    $size3x = "100%";
    if (isset($attr['size3x']) && !in_array($attr['size3x'], [null, false, ''])) {
        $size3x = $attr['size3x'];
    }


    return'<style>  
        @media only screen and (max-width: 767px){
            .' . $class . '{  
                background-image: -webkit-image-set(
                    url(' . $mobile1x . ') 1x,
                    url(' . $mobile2x . ') 2x,
                    url(' . $mobile3x . ') 3x);
                  background-image: image-set(
                    url(' . $mobile1x . ') 1x,
                    url(' . $mobile2x . ') 2x,
                    url(' . $mobile3x . ') 3x);
                  
                  background-size: ' . $size3x . ';
                  background-repeat: no-repeat;
                  background-position: center center !important;
                  }
                  
        }
        @media only screen and (min-width: 768px) and (max-width: 1024px){
            .' . $class . '{  
                background-image: -webkit-image-set(
                    url(' . $tab1x . ') 1x,
                    url(' . $tab2x . ') 2x,
                    url(' . $tab3x . ') 3x);
                  background-image: image-set(
                    url(' . $tab1x . ') 1x,
                    url(' . $tab2x . ') 2x,
                    url(' . $tab3x . ') 3x);
                  
                  background-size: ' . $size2x . ';
                  background-repeat: no-repeat;
                  background-position: center center !important;
                  }
                  
        }
        @media only screen and (min-width: 1025px){
            .' . $class . '{  
                background-image: -webkit-image-set(
                    url(' . $desktop1x . ') 1x,
                    url(' . $desktop2x . ') 2x,
                    url(' . $desktop3x . ') 3x);
                  background-image: image-set(
                    url(' . $desktop1x . ') 1x,
                    url(' . $desktop2x . ') 2x,
                    url(' . $desktop3x . ') 3x);
                  
                  background-size: ' . $size1x . ';
                  background-repeat: no-repeat;
                  background-position: center center !important;
                  
            }
        }
    </style>';
}

// [cta_shortcode]

 $rdsTemplate = get_option('rds_template');
  $get_rds_template_data_array = json_decode($rdsTemplate, TRUE);
    
    if (!empty($get_rds_template_data_array['globals']['in_content_cta']['enable'])) {
add_shortcode('cta_shortcode', 'cta_shortcode_shortcode');
}

function cta_shortcode_shortcode($attr) {
    ob_start();
    $rdsTemplate = get_option('rds_template');
    $get_rds_template_data_array = json_decode($rdsTemplate, TRUE);
    $get_rds_template_data_array['globals']['in_content_cta'];
    if (isset($attr['icon_class'])) {
        $iconClass = $attr ['icon_class'];
    } else {
        $iconClass = $get_rds_template_data_array['globals']['in_content_cta']['icon_class'];
    }
    if (isset($attr['heading'])) {
        $heading = $attr ['heading'];
    } else {
        $heading = $get_rds_template_data_array['globals']['in_content_cta']['heading'];
    }
    if (isset($attr['title_class'])) {
        $title_class = $attr ['title_class'];
    } else {
        $title_class = $get_rds_template_data_array['globals']['in_content_cta']['title_class'];
    }
    if (isset($attr['button_class'])) {
        $button_class = $attr ['button_class'];
    } else {
        $button_class = $get_rds_template_data_array['globals']['in_content_cta']['button_class'];
    }
    if (isset($attr['button_text'])) {
        $buttonText = $attr ['button_text'];
    } else {
        $buttonText = $get_rds_template_data_array['globals']['in_content_cta']['button_text'];
    }
    $i = 0;
    if (isset($attr['button_link'])) {
        $buttonLink = $attr ['button_link'];
    } else {
        $buttonLink = $get_rds_template_data_array['globals']['in_content_cta']['button_link'];
        $i++;
    }
    if (isset($attr['phone'])) {
        $telLink = $get_rds_template_data_array['site_info']['country_code'].$attr ['phone'];
    } else {
        $telLink = $get_rds_template_data_array['site_info']['country_code'].$get_rds_template_data_array['globals']['in_content_cta']['phone'];
    }
    if (isset($attr['target'])) {
        $target = $attr ['target'] == "true" ? "_blank" : "_self";
    } else {
        $target = $get_rds_template_data_array['globals']['in_content_cta']['target'] == "true" ? "_blank" : "_self";
    }
    $schedule_id = "";
    if (isset($attr['id']) && !empty($attr['id']) && ($attr['id'] == "service_titan" || $attr['id'] == "schedule_engine")) {
        $href = "javascript:void(0)";
        $schedule_id = $attr['id'];
        if ($schedule_id == "schedule_engine") {
            $id = "schedule_cta_schedule_engine";
        } elseif ($schedule_id == "service_titan") {
            $id = "schedule_cta_service_titan";
        }
    } elseif (isset($attr['button_link']) && empty($attr['id']) ) {
        $id = "";
        $href = get_home_url() . $buttonLink;
    } else {
        if ($i > 0) {
           $id = "";
            $href = get_home_url() . $buttonLink;
        }else{
        $schedule_id = $get_rds_template_data_array['globals']['in_content_cta']['id'];
        if ($schedule_id == "service_titan" || $schedule_id == "schedule_engine") {
            $href = "javascript:void(0)";
            if ($schedule_id == "schedule_engine") {
                $id = "schedule_cta_schedule_engine";
            } elseif ($schedule_id == "service_titan") {
                $id = "schedule_cta_service_titan";
            }
        } else {
            $id = "";
            $href = get_home_url() . $buttonLink;
        }
    }
    }
    if ($schedule_id == "schedule_engine") {
        add_action("wp_footer", function () {
            ?>
            <script type="text/javascript">
                jQuery(".schedule_cta_schedule_engine").click(function () {
                    console.log("schedule_engine");
                    if (typeof ScheduleEngine !== "undefined" && ScheduleEngine) {
                        ScheduleEngine.show();
                    }
                });
            </script>
            <?php
        });
    } elseif ($schedule_id == "service_titan") {
        add_action("wp_footer", function () {
            ?>
            <script type="text/javascript">
                jQuery(".schedule_cta_service_titan").click(function () {
                    console.log("service_titan");
                    if (typeof STWidgetManager !== "undefined" && STWidgetManager) {
                        STWidgetManager("ws-open");
                    }
                });
            </script>
            <?php
        });
    } 
    if (isset($attr['telephone_class'])) {
        $telephone_class = $attr ['telephone_class'];
    } else {
        $telephone_class = $get_rds_template_data_array['globals']['in_content_cta']['telephone_class'];
    }
    $counteyCode = $get_rds_template_data_array['site_info']['country_code'];
    $backgroungImage = get_stylesheet_directory_uri() . '/img/in-content-cta/in-content-bg.webp';
    if ($get_rds_template_data_array['globals']['in_content_cta']['variation'] == 'a') {
        echo '<span  class="max_w_730 d-block no_hover_underline mb-4"><div class="got-an-emergency py-sm-2 py-3 px-sm-4 px-4 text-start rounded-10" >
            <div class="row align-items-center py-lg-4 px-lg-0 px-3 pb-4 pt-2">
                <div class="col-sm-12 col-lg-6 align-items-center py-lg-3 border-right-lg-2 pb-4 border-bottom-md-2 px-0 px-lg-3 mb-lg-0 mb-4 pe-lg-0">
                    <span class="heading_title ' . $title_class . ' d-block true_white mb-0 no_hover_underline text_25 line_height_25 font_default text_bold ps-lg-3 sm_text_24 sm_line_height_29">' . $heading . '</span> 
                        <a class="cta_call_link no_hover_underline ' . $telephone_class . ' " href="tel:' . $counteyCode . $telLink . '"><span class="a-alt d-block mb-0 no_hover_underline text_30 line_height_41 sm_text_36 sm_line_height_45 font_default ps-lg-3 pb-0">' . $telLink . '</span></a></div>
                <div class=" ' . $button_class . ' col-sm-12 col-lg-6 text-lg-center pl-0 py-lg-3 px-lg-0 px-0">
                    <a id="" class="' . $id . ' no_hover_underline cta_link d-lg-inline-block d-none" href="' . $href . '" target="' . $target . '"><div class="text_25 line_height_30 font_default  d-block text_bold no_hover_underline pe-lg-3  true_white sm_text_24 sm_line_height_29 text-capitalize">' . $buttonText . '<i class="icon-circle-arrow-right1 text_18 ms-2 line_height_18"></i></div></a>
                    <a id="" class=" ' . $id . ' cta_link no_hover_underline d-lg-none" href="' . $href . '" target="' . $target . '"><div class="text_25 line_height_30 font_default  d-block text_bold no_hover_underline pe-lg-3 sm_text_24 sm_line_height_29 true_white text-capitalize">' . $buttonText . '<i class="icon-circle-arrow-right1 text_18 ms-2 line_height_18"></i></div></a>
                </div>
            </div>
        </div>
    </span>';
    } elseif ($get_rds_template_data_array['globals']['in_content_cta']['variation'] == 'b') {
        echo '<span class="max_w_730 d-block no_hover_underline mb-4"><div class="got-an-emergency-b py-sm-2 py-3 px-sm-4 px-4 text-start rounded-10 color_tertiary_bg">
                <div class="row align-items-center py-lg-2 px-lg-0 px-3 pb-4 pt-2">
                    <div class="col-lg-10 mx-auto px-0">
                        <div class="d-lg-flex w-100 justify-content-lg-center">
                            <div class=" align-items-center py-lg-1 border-right-1 pb-4 border-bottom-md-2 px-0 ps-lg-0 mb-lg-0 mb-4 pe-lg-4">
                                <span class="' . $title_class . ' heading_title d-block mb-0 no_hover_underline text_25 line_height_36 font_default text_bold  sm_text_24 sm_line_height_29 text-uppercase">' . $heading . '</span> 
                            </div>
                            <div class="' . $button_class . ' text-lg-end pl-0 py-lg-0 ps-lg-4 pe-lg-0 px-0">
                                <a id="' . $id . '" class="cta_link no_hover_underline" href="' . $href . '" target="' . $target . '"><div class="cta_link text_25 line_height_42 font_default  d-block text_normal no_hover_underline sm_text_24 sm_line_height_29 text-uppercase">' . $buttonText . '</div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </span>';
    }

    return ob_get_clean();
}

//Accordion Shortcode
add_action('wp_footer', 'accordion_method');

function accordion_method() {
    ?>
    <script>
        jQuery(document).ready(function () {
            jQuery('.accordion').on('show.bs.collapse', function (e) {
                toggleIcon(e.target);
            });
            jQuery('.accordion').on('hidden.bs.collapse', function (e) {
                toggleIcon(e.target);
            });
        });
        function toggleIcon(target) {
            var target = jQuery(target).parent('.accordion-item').find('i');
            target.toggleClass('icon-chevron-up4');
            target.toggleClass('icon-chevron-down4');
        }
    </script>
    <?php
}

// Accordion Shortcode Start
add_shortcode('bc_accordion', 'accordion_shortcode');

function accordion_shortcode($atts, $content = null) {
    $id = 'accordion' . rand(0, 100000);
    $content = str_replace('<br>', '', $content);
    $content = str_replace('[bc_card', '[bc_card accr_id = "' . $id . '"', $content);
    return '<div id="' . $id . '" class="accordion ">' . do_shortcode($content) . '</div>';
}

add_shortcode('bc_card', 'card_shortcode');

function card_shortcode($atts, $content = null) {
    $accr_id = $atts['accr_id'];
    $title = '';
    if (isset($atts['title'])) {
        $title = $atts['title'];
    }
    $iconClass = 'icon-chevron-down4';
    $expanded = '';
    if (isset($atts['expanded'])) {
        $expanded = 'show';
        $iconClass = 'icon-chevron-up4';
    }
    $id = 'collapse' . rand(0, 100000);
    return '

<div class="accordion-item  rounded-0 border-1">
                <div  class="accordion-header">
                       <h3 class="collapsed py-3 ps-3 pe-5 mb-0 position-relative d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#' . $id . '" aria-expanded="true" aria-controls="' . $id . '">' . $title . '<i class="' . $iconClass . ' text_20 line_height_28 position-absolute right-15 top-18" ></i></h3>
                </div>
                <div id="' . $id . '" class="accordion-collapse collapse" aria-labelledby="' . $id . '" data-bs-parent="#' . $accr_id . '">
                    <div class="accordion-body">' . do_shortcode($content) . '</div>
                </div>
            </div>';
}



add_filter('gform_field_validation', function ($result, $value, $form, $field) {
    if ($field->get_input_type() === 'email' && !$result['is_valid'] && !in_array($value, [false, "", null])) {
        $result['message'] = "Please enter a valid email address";
    }

    return $result;
}, 10, 4);
add_filter('gform_submit_button', '__return_false');

// [bc-read-more id="read_more" background-color="bc_color" data-close-icon="minus" data-open-icon="plus"]
add_shortcode('bc-read-more', 'bc_read_more_shortcode');

function bc_read_more_shortcode($attr) {
    ob_start();
    $toggle_id = $attr['id'] ?? '';
    $background_color = ($attr['background-color'] == '') ? $attr['background-color'] : '';
    $icon_open = "";
    $icon_close = "";
    $default_open_icon = "icon-plus1";
    if (isset($attr['data-open-icon']) && isset($attr['data-close-icon'])) {
        $default_open_icon = $attr['data-open-icon'];
        $icon_open = 'data-open-icon = ' . $attr['data-open-icon'];
        $icon_close = 'data-close-icon = ' . $attr['data-close-icon'];
    }

    echo '<a class="' . $background_color . ' bc_toggle_btn bc_toggle_btn_closed bc_toggle_content mw-132   mb-4 btn-transparent text-uppercase  d-inline-flex align-items-center no_hover_underline  read-more-btn button" ' . $icon_open . ' ' . $icon_close . ' href="#' . $toggle_id . '" data-bs-toggle="collapse" > <span>read more&nbsp;</span> <i class="icon ' . $default_open_icon . ' bc_text_12 position-relative top-0-1 top-sm-0-1" aria-hidden="true"></i></a>';
    $output = ob_get_clean();
    return $output;
}

function post_content_first_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();

    $first_img = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail');

    if (empty($first_img)) {
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
        $first_img = $matches [1] [0];
    }

    if (empty($first_img)) { //Defines a default image
        $first_img = get_exist_image_url('blog','blog-placeholder');
    }
    return $first_img;
}

// Fully Disable Gutenberg editor.
add_filter('use_block_editor_for_post_type', '__return_false', 10);
// Don't load Gutenberg-related stylesheets.
add_action('wp_enqueue_scripts', 'remove_block_css', 100);
add_filter('gform_confirmation_anchor', '__return_false');

function remove_block_css() {
    wp_dequeue_style('wp-block-library'); // WordPress core
    wp_dequeue_style('wp-block-library-theme'); // WordPress core
    wp_dequeue_style('wc-block-style'); // WooCommerce
    wp_dequeue_style('storefront-gutenberg-blocks'); // Storefront theme
}

add_shortcode('bc-location', 'custom_location_shortcode');

function custom_location_shortcode($atts, $content = null) {
    add_action('wp_footer', function () {
        ?>
        <script>
            jQuery(document).ready(function () {
                jQuery(".location").hide();
                jQuery(".locations_footer").click(function () {
                    jQuery("#plus").toggleClass('icon-plus1 icon-minus1');
                    jQuery(".location").toggle(500);
                });
            });
        </script>
        <?php
    });
    $postIds = null;
    if (isset($atts['page_id'])) {
        $Ids = explode(',', $atts['page_id']);
        $postIds = $Ids;
        $args = array(
            'posts_per_page' => -1,
            'exclude' => '',
            'include' => '',
            'post__in' => $postIds,
            'post_type' => 'page',
            'post_status' => 'publish',
            'orderby' => 'meta_value',
            'meta_key' => 'location',
            'order' => 'ASC');

        $query = new WP_Query($args);
        if ($query->have_posts()) :

            while ($query->have_posts()) : $query->the_post();
                ?>
                <?php
                $newCity = ( $query->post->location ? $query->post->location : the_title() );
                $ret = explode(',', $newCity);
                ?>
                <div class="col-lg-3 text-lg-start text-center">
                    <a class="no_hover_underline d-block text-lg-start text-center" href="<?php the_permalink(); ?>"><?php echo $ret[0]; ?></a> 
                </div>
                <?php
            endwhile;

            wp_reset_query();
        endif;
    }
}

//shortcode for phone number
add_shortcode('site_info_phone_number', 'bc_site_info_phone_number');

function bc_site_info_phone_number($atts) {
    $anchor = true;
    $rdsTemplate = get_option('rds_template');
    $get_rds_template_data_array = json_decode($rdsTemplate, TRUE);
    $telLink = $get_rds_template_data_array['site_info']['country_code'].$get_rds_template_data_array['site_info']['phone'];
    if (isset($atts['anchor'])) {
        $anchor = $atts['anchor'];
    }
    ob_start();
    if ($anchor) {
        echo "<a href='tel:$telLink'>$telLink</a>";
    } else {
        echo $tel;
    }
    return ob_get_clean();
}

// add_filter("wpjb_cpt_init", function ($args, $type = null) {
//     if ($type == "job") {
//         $args["rewrite"]["with_front"] = false;
//         $args["rewrite"]["slug"] = "careers";
//     }
//     return $args;
// }, 10, 2);

add_action('wp_enqueue_scripts', 'rds_parent_font_awesome_style');

function rds_parent_font_awesome_style($hook) {
    wp_register_style('rds-parent-font-awesome-style', '/wp-content/themes/rds/css/bc-icons.css', false);
    wp_enqueue_style('rds-parent-font-awesome-style');
    if (wp_style_is('rds-font-awesome')) {
        wp_dequeue_style('rds-parent-font-awesome-style');
    }
}

// Grid Shortcode Start
add_shortcode('rds_container', 'rds_container_shortcode');
function rds_container_shortcode($atts, $content = null) {
    $container_class = !empty($atts['class'])?(" ".$atts['class']):"";
    $container_id = !empty($atts['id'])?"id=".$atts['id']:"";
    $content = str_replace('<br>', '', $content);
    $content = str_replace('[rds_row', '[rds_row', $content);
    return '<div class="container'.$container_class.'" '.$container_id.'>' . do_shortcode($content) . '</div>';
}
add_shortcode('rds_row', 'rds_row_shortcode');

function rds_row_shortcode($atts, $content = null) {
    $row_class = !empty($atts['class'])?(" ".$atts['class']):"";
    $content = str_replace('<br>', '', $content);
    $content = str_replace('[rds_col', '[rds_col', $content);
    return '<div class="row'.$row_class.'" >' . do_shortcode($content) . '</div>';
}

add_shortcode('rds_col', 'rds_col_shortcode');
function rds_col_shortcode($atts, $content = null) {
    $col_class = !empty($atts['class'])?$atts['class']:"";
    $col_id = !empty($atts['id'])?"id=".$atts['id']:"";
    return '<div class="'.$col_class.'"  '.$col_id.'>' . do_shortcode($content) . '</div>';
}

// function get_exist_image_url($image_folder, $image_name) {
//     $child_path = get_stylesheet_directory_uri() . '/img/' . $image_folder . '/' . $image_name;
//     $parent_path = get_template_directory_uri() . '/img/' . $image_folder . '/' . $image_name;

//     if (is_multisite()) {
//         $site_id = get_current_blog_id();
//         $site_folder_path = get_stylesheet_directory() . '/img/' . $site_id;
//         $specific_site_folder_path = $site_folder_path . '/' . $image_folder;
//         $child_folder_path = get_stylesheet_directory() . '/img/';
//         $child_site_folder_path = $child_folder_path . '/' . $image_folder;

//         if (file_exists($specific_site_folder_path)) {
//             return get_stylesheet_directory_uri() . '/img/' . $site_id . '/' . $image_folder . '/' . $image_name;
//         } elseif (file_exists($child_site_folder_path)) {
//             return $child_path;
//         } else {
//             return $parent_path;
//         }
//     } else {
//         return $child_path;
//     }
// }


function get_exist_image_url($image_folder, $image_name) {
    $child_path_webp = get_stylesheet_directory_uri() . '/img/' . $image_folder . '/' . $image_name . '.webp';
    $parent_path_webp = get_template_directory_uri() . '/img/' . $image_folder . '/' . $image_name . '.webp';
    $child_path_fallback = get_stylesheet_directory_uri() . '/img/' . $image_folder . '/' . $image_name . '.jpg';
    $parent_path_fallback = get_template_directory_uri() . '/img/' . $image_folder . '/' . $image_name . '.jpg';
    $child_path_png = get_stylesheet_directory_uri() . '/img/' . $image_folder . '/' . $image_name . '.png';
    $parent_path_png = get_template_directory_uri() . '/img/' . $image_folder . '/' . $image_name . '.png';
    $child_path_svg = get_stylesheet_directory_uri() . '/img/' . $image_folder . '/' . $image_name . '.svg';
    $parent_path_svg = get_template_directory_uri() . '/img/' . $image_folder . '/' . $image_name . '.svg';

    $webp_supported = isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false;

    if (is_multisite()) {
        $site_id = get_current_blog_id();
        $site_folder_path = get_stylesheet_directory() . '/img/' . $site_id;
        $specific_site_folder_path = $site_folder_path . '/' . $image_folder;
        $child_folder_path = get_stylesheet_directory() . '/img/';
        $child_site_folder_path = $child_folder_path . '/' . $image_folder;

        if ($webp_supported) {
            if (file_exists($specific_site_folder_path . '/' . $image_name . '.webp')) {
                return get_stylesheet_directory_uri() . '/img/' . $site_id . '/' . $image_folder . '/' . $image_name . '.webp';
            } elseif (file_exists($child_site_folder_path . '/' . $image_name . '.webp')) {
                return $child_path_webp;
            } else {
                return $parent_path_webp;
            }
        } else {
            if (file_exists($specific_site_folder_path . '/' . $image_name . '.jpg')) {
                return get_stylesheet_directory_uri() . '/img/' . $site_id . '/' . $image_folder . '/' . $image_name . '.jpg';
            } elseif (file_exists($child_site_folder_path . '/' . $image_name . '.jpg')) {
                return $child_path_fallback;
            } else {
                return $parent_path_fallback;
            }
        }
    } else {
        $child_path_exist_webp = file_exists(str_replace(site_url(), ABSPATH, $child_path_webp));
        $child_path_exist_fallback = file_exists(str_replace(site_url(), ABSPATH, $child_path_fallback));
        $child_path_exist_png = file_exists(str_replace(site_url(), ABSPATH, $child_path_png));
        $child_path_exist_svg = file_exists(str_replace(site_url(), ABSPATH, $child_path_svg));

        if ($webp_supported) {
            if (!$child_path_exist_webp && !$child_path_exist_png && !$child_path_exist_svg) {
                return $child_path_fallback;
            } elseif (!$child_path_exist_webp && !$child_path_exist_fallback && !$child_path_exist_svg) {
                return $child_path_png;
            } elseif (!$child_path_exist_webp && !$child_path_exist_fallback && !$child_path_exist_png) {
                return $child_path_svg;
            } else {
                return $child_path_webp;
            }
        } else {
            if (!$child_path_exist_png && !$child_path_exist_svg) {
                return $child_path_fallback;
            } elseif (!$child_path_exist_png && !$child_path_exist_fallback) {
                return $child_path_svg;
            } else {
                return $child_path_png;
            }
        }
    }
}


function get_multisite_site_titles() {
    if (is_multisite()) {

        $site_ids = get_sites(array('fields' => 'ids'));

        $site_titles = array();

        foreach ($site_ids as $site_id) {
            $site_info = get_blog_details($site_id);
            $site_titles[$site_id] = $site_info->blogname;
        }

        return $site_titles;

    } else {
        return get_bloginfo('name');
    }
}


function filter_search($query) {
    if (!is_admin() && $query->is_search) { 
        $query->set('post_type', array('post', 'page'));
    }
    return $query;
}
add_filter('pre_get_posts', 'filter_search');