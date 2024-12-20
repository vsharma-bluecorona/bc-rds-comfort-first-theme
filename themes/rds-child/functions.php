<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Enqueue our stylesheet and javascript file
 */


function remove_custom_script() {
    wp_dequeue_script('custom-script');
}
add_action('wp_enqueue_scripts', 'remove_custom_script', 999);


function theme_enqueue_styles() {
	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );


/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );
/**
 * enqueue rds font awesomw style for showing fontss.
 */
$filepath = locate_template('img/font-awesome/style.css');
if (file_exists($filepath)) {
add_action('init', 'rds_font_awesome_style');
	function rds_font_awesome_style(){
		wp_register_style('rds-font-awesome', '/wp-content/themes/rds-child/img/font-awesome/style.css', false);
		wp_enqueue_style('rds-font-awesome');
	}
} 



 $rdsTemplate = get_option('rds_template');
  $get_rds_template_data_array = json_decode($rdsTemplate, TRUE);
    
add_shortcode('cta_shortcode', 'cta_shortcode_shortcode_child');


function cta_shortcode_shortcode_child($attr) {
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
        echo '<div class="my-5">
        <div class="text-center text-md-start pe-md-5 pt-xl-4 pt-lg-4 pt-md-4 pt-5 pb-4 cta-bg mx-auto">
            <div class="row">
                <div class="col-sm-6 px-0">
                    <img  class="cta-spacing ps-xl-1 entered lazyloaded" src="'. get_stylesheet_directory_uri().'/img/in-content-cta/cta_mascot.webp"  srcset="'.get_stylesheet_directory_uri().'/img/in-content-cta/cta_mascot.webp 1x, '.get_stylesheet_directory_uri().'/img/in-content-cta/cta_mascot@2x.webp 2x" alt="cta_mascot" width="310" height="199">
                </div>
                <div class="col-sm-6 px-0 ">
                    <div class="cta-spacing">
                        <span class="mt-2 pt-1 d-block true_black default_font_family_c heading_title ' . $title_class . ' text_32 sm_text_30 line_height_45  text_bold px-4 px-md-0">' . $heading . '</span>
                        <div class="my-3 ' . $button_class . '">
                            <a class="btn ' . $id . ' btn-primary w-298 text-decoration-none" href="' . $href . '" target="' . $target . '">' . $buttonText . ' <i class="icon-chevron-right2 d-none ml-2 bc_text_18 align-middle"></i></a>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
    </div>';
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
add_action('wp_footer', 'accordion_method_child');

function accordion_method_child() {
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
            target.toggleClass('icon-minus2');
            target.toggleClass('icon-plus2');
        }
    </script>
    <?php
}

// Accordion Shortcode Start from here now
add_shortcode('bc_accordion', 'accordion_shortcode_child');

function accordion_shortcode_child($atts, $content = null) {
    $id = 'accordion' . rand(0, 100000);
    $content = str_replace('<br>', '', $content);
    $content = str_replace('[bc_card', '[bc_card accr_id = "' . $id . '"', $content);
    return '<div id="' . $id . '" class="accordion my-lg-5 my-4">' . do_shortcode($content) . '</div>';
}

add_shortcode('bc_card', 'card_shortcode_child');

function card_shortcode_child($atts, $content = null) {
    $accr_id = $atts['accr_id'];
    $title = '';
    if (isset($atts['title'])) {
        $title = $atts['title'];
    }
    $iconClass = 'icon-plus2';
    $expanded = '';
    if (isset($atts['expanded'])) {
        $expanded = 'show';
        $iconClass = 'icon-minus2';
    }
    $id = 'collapse' . rand(0, 100000);
    return '

<div class="accordion-item  rounded-0 border-0">
                <div  class="accordion-header py-1 cursor_pointer">
                       <h3 class="collapsed py-2 ps-0 pe-5 mb-0  position-relative d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#' . $id . '" aria-expanded="true" aria-controls="' . $id . '">' . $title . '<i class="' . $iconClass . ' text_20 line_height_20 position-absolute color_primary right-15 top-18" ></i></h3>
                </div>
                <div id="' . $id . '" class="accordion-collapse collapse" aria-labelledby="' . $id . '" data-bs-parent="#' . $accr_id . '">
                    <div class="accordion-body border-line pr-4 ps-0 pt-5 pb-4 border-line position-relative">' . do_shortcode($content) . '</div>
                </div>
            </div>';
}


function get_homepage_url_of_site($site_id) {
    return get_home_url($site_id);
}

//Site MAp shortcode [bc-sitemap] 
add_shortcode('bc-sitemap', 'bc_sitemap_shortcode');

function bc_sitemap_shortcode() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            var firstBListItem = $(".page_item");
            $(".page_item").parent("ul").addClass("mt-3");
            page_item_id = firstBListItem.filter(function (i, d) {
                if (!$(this).closest("ul").hasClass("children")) {
                    return $(this).text().trim().charAt(0).toLowerCase() >= 'b';
                }
            });
            $($("#bc_oursitemap_blog").html()).insertBefore($(page_item_id[0]));
            $("#sitemap_blog_html").html("");
            var sitemap_html = jQuery("li.pagenav").html();
            jQuery(".pagenav-custom").html(sitemap_html);
            jQuery("li.pagenav").remove();
            jQuery(".pagenav-custom h6").remove();
        });
    </script>
    <?php
    ob_start();
    $output = '';
    $parg = bc_page_arguments();
    $output .= wp_list_pages($parg);
    $output .= bc_call_blog_posts($output);
    $output .= "<div class='pagenav-custom'></div>";
    $output .= ob_get_clean();
    return $output;
}

function bc_page_arguments() {
    $exclude = array();
    $exclude[] = get_option('page_on_front');
    foreach (get_pages() as $page) {
        $permalink = get_the_permalink($page->ID);
        if (strpos($permalink, 'thankyou') || strpos($permalink, 'blog') || strpos($permalink, 'thank-you') || str_contains($permalink, 'styleguide') || $page->post_title == '') {
            $exclude[] = $page->ID;
        }
    }
    $args = array(
        'exclude' => implode(",", $exclude),
        'title_li' => '<h6 class="bc_color_tertiary "></h6>',
        'sort_column' => 'post_title',
        'post_type' => 'page',
        'post_status' => 'publish'
    );
    return $args;
}

function bc_call_blog_posts($output) {
    global $post;
    $posts = get_posts(array(
        'post_type' => 'post',
        'nopaging' => true,
        'orderby' => 'date',
        'order' => 'ASC',
    ));
    $_year_mon = '';   // previous year-month value
    $_has_grp = false; // TRUE if a group was opened
    $output .= '<div id="sitemap_blog_html"><ul class="blog mt-3" id="bc_oursitemap_blog"><li><a href="' . get_site_url() . '/blog/">blog</a>';
    $i = 0;
    $last_year = '';
    foreach ($posts as $post) {
        setup_postdata($post);
        $time = strtotime($post->post_date);
        $year = date('Y', $time);
        $mon = date('F', $time);
        $year_mon = "$year-$mon";
        // Open a new group.
        if ($year_mon !== $_year_mon) {
            // Close previous group, if any.
            if ($_has_grp) {
                $output .= '</ul><!-- .month -->';
                $output .= '</ul><!-- .year -->';
            }
            $_has_grp = true;
            if ($last_year != $year) {
                $output .= '<ul class="year mt-3">';
                $output .= "<li>$year";
            } else {
                $output .= '<ul class="year mt-3">';
                $output .= "<li class='no_back'>";
            }
            $output .= '<ul class="month mt-3">';
            $output .= "<li>$mon";
        }
        // Display post title.
        if ($title = get_the_title()) {
            $output .= "<ul class=' mt-3'><li><a href='" . get_the_permalink() . "'>$title</a></li></ul>";
        }
        $_year_mon = $year_mon;
        $last_year = $year;
        $i++;
    }
    $output .= '</li></li></ul></div>';
    // Close the last group, if any.
    if ($_has_grp) {
        $output .= '</ul><!-- .month -->';
        $output .= '</ul><!-- .year -->';
    }
    wp_reset_postdata();
    return $output;
}
/*
function custom_blog_post_permalink($permalink, $post, $leavename) {
    // Check if we are not in the admin panel
    if (!is_admin() && $post->post_type == 'post') {
        $permalink = trailingslashit(home_url('/blog/' . $post->post_name));
    }
    return $permalink;
}
add_filter('post_link', 'custom_blog_post_permalink', 10, 3);
add_filter('post_type_link', 'custom_blog_post_permalink', 10, 3);
*/
function custom_rewrite_rules($rules) {
    $new_rules = array(
        'blog/([^/]+)/?$' => 'index.php?name=$matches[1]',
    );
    return $new_rules + $rules;
}
add_filter('rewrite_rules_array', 'custom_rewrite_rules');

// remove <br> and <p> tag
remove_filter('the_content', 'wpautop');


function include_post_page_in_search_results( $query ) {
    if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
        $query->set( 'post_type', array( 'post', 'page' ) );
    }
}
add_action( 'pre_get_posts', 'include_post_page_in_search_results' );


add_action( 'template_redirect', 'promotions_single_page_disable' );

function promotions_single_page_disable() {
  if ( is_singular( 'bc_promotions' ) ) :
    wp_redirect( home_url(), 301 );
    exit;
  endif;
}


function redirect_category_to_homepage() {
    if (is_category()) {
        wp_redirect(home_url());
        exit;
    }
}
add_action('template_redirect', 'redirect_category_to_homepage');

wp_using_ext_object_cache(false);
wp_cache_flush();
wp_cache_init();

add_action('wp_head', 'rds_custom_font_family_script');

function rds_custom_font_family_script() {
    ?>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow:wght@100&display=swap">
    <?php
}
