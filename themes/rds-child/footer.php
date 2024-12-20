<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
global $template;
?>
<?php do_action('rds_footer_top'); ?>
<?php
$get_rds_template_data_array = rds_template();
if (basename($template) == 'rds-landing.php') {
    if ($get_rds_template_data_array['page_templates']['landing_page']['footer']['variation'] == 'a') {
        get_template_part('global-templates/footer/a', null, $get_rds_template_data_array);
    } elseif ($get_rds_template_data_array['page_templates']['landing_page']['footer']['variation'] == 'b') {
        get_template_part('global-templates/footer/b', null, $get_rds_template_data_array);
    }
} else {
    if (basename($template) != 'rds-elementor.php')  {

//   echo do_shortcode('[elementor-template id="39015"]');
  }
}


$footerItems = $get_rds_template_data_array['globals']['ctas'];
$desktopItems = $get_rds_template_data_array['globals']['desktop_schedule_online_button'];
$heroItems = $get_rds_template_data_array['globals']['hero']['schedule_online'];
if ($heroItems['type'] == 'schedule_engine') {
    ?>
    <script type="text/javascript">
        jQuery("#schedule_online_button_hero").click(function () {
            if (typeof ScheduleEngine !== "undefined" && ScheduleEngine) {
                ScheduleEngine.show();
            }
        });
    </script>
<?php } elseif ($heroItems['type'] == 'service_titan') {
    ?>
    <script type="text/javascript">
        jQuery("#schedule_online_button_hero").click(function () {
            if (typeof STWidgetManager !== "undefined" && STWidgetManager) {
                STWidgetManager("ws-open");
            }
        });
    </script>
    <?php
}

if ($desktopItems['type'] == 'schedule_engine') {
    ?>
    <script type="text/javascript">
        jQuery("#schedule_online_button_desktop").click(function () {
            if (typeof ScheduleEngine !== "undefined" && ScheduleEngine) {
                ScheduleEngine.show();
            }
        });
    </script>
<?php } elseif ($desktopItems['type'] == 'service_titan') {
    ?>
    <script type="text/javascript">
        jQuery("#schedule_online_button_desktop").click(function () {
            if (typeof STWidgetManager !== "undefined" && STWidgetManager) {
                STWidgetManager("ws-open");
            }
        });
    </script>
    <?php
}

$i = 0;
foreach ($footerItems as $key => $value) {
    if ($value['enabled'] == true) {
        if ($value['type'] == 'service_titan') {
            ?>
            <script type="text/javascript">
                jQuery("#schedule_online_button, #rds_footer_element_<?php echo $i; ?>").click(function () {
                    if (typeof STWidgetManager !== "undefined" && STWidgetManager) {
                        STWidgetManager("ws-open");
                    }
                });
            </script>
            <?php
        } elseif ($value['type'] == 'schedule_engine') {
            ?>
            <script type="text/javascript">
                jQuery("#schedule_online_button, #rds_footer_element_<?php echo $i; ?>").click(function () {
                    if (typeof ScheduleEngine !== "undefined" && ScheduleEngine) {
                        ScheduleEngine.show();
                    }
                });
            </script>
            <?php
        } elseif ($value['type'] == 'url' && $key == 'schedule_online') {
            ?>
            <script type="text/javascript">
                var href = "<?php echo get_home_url() . $value['url']; ?>";
                jQuery("#schedule_online_button").attr("href", href)
                jQuery("#rds_footer_element_<?= $i; ?>").attr("href", href);
            </script>
            <?php
        } elseif ($value['type'] == 'sms') {
            ?>
            <script type="text/javascript">
                var href = "<?php echo $value['url']; ?>";
                jQuery("#rds_footer_element_<?= $i; ?>").attr("href", href);
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                var href = "<?php echo get_home_url() . $value['url']; ?>";
                jQuery("#rds_footer_element_<?= $i; ?>").attr("href", href)
            </script>
            <?php
        }
    }
    $i++;
}
//exaple how to set image sizewise
// ['dektop', 'ipad', 'mobile']
$img1x = [
    get_exist_image_url('in-content-cta', 'in-content-bg'),
    get_exist_image_url('in-content-cta', 'in-content-bg@2x'),
    get_exist_image_url('in-content-cta', 'in-content-bg@3x')
];

$img2x = [
    get_exist_image_url('in-content-cta', 'in-content-bg'),
    get_exist_image_url('in-content-cta', 'in-content-bg@2x'),
    get_exist_image_url('in-content-cta', 'in-content-bg@3x')
];

$img3x = [
    get_exist_image_url('in-content-cta', 'in-content-bg'),
    get_exist_image_url('in-content-cta', 'in-content-bg@2x'),
    get_exist_image_url('in-content-cta', 'in-content-bg@3x')
];
$img1x = Implode(',', $img1x);
$img2x = Implode(',', $img2x);
$img3x = Implode(',', $img3x);
?>
<?php echo do_shortcode('[custom-bg-srcset class="got-an-emergency" img1x="' . $img1x . '" img2x="' . $img2x . '" img3x="' . $img3x . '" size1x="cover" size2x="cover" size3x="cover"]'); ?>

<script type="text/javascript">
                let places, input, address, city, inputs_class;
                jQuery(document).ready(function ($) {
                    //CODE FOR GEOLOCATION AUTOMATIC FIELD START
                    jQuery('body').on("keyup", '.rds_geo_autopopulate_value .ginput_container_text input', function () {
                        input_class = $(this);
                        var city = "";
                        var state = "";
                        var places = new google.maps.places.Autocomplete(
                                input_class[0]
                                );
                        google.maps.event.addListener(places, "place_changed", function () {
                            var place = places.getPlace();
                            var address = place.formatted_address;
                            var latitude = place.geometry.location.lat();
                            var longitude = place.geometry.location.lng();
                            var latlng = new google.maps.LatLng(latitude, longitude);
                            var geocoder = (geocoder = new google.maps.Geocoder());
                            geocoder.geocode({latLng: latlng}, function (results, status) {
                                if (status === google.maps.GeocoderStatus.OK) {
                                    if (results[0]) {
                                        var address = results[0].formatted_address;
                                        var pin =
                                                results[0].address_components[
                                                results[0].address_components.length - 1
                                        ].long_name;
                                        var country =
                                                results[0].address_components[
                                                results[0].address_components.length - 2
                                        ].long_name;
                                        state =
                                                results[0].address_components[
                                                results[0].address_components.length - 3
                                        ].long_name;
                                        city =
                                                results[0].address_components[
                                                results[0].address_components.length - 4
                                        ].long_name;
                                        jQuery(input_class).parent().parent().siblings(".rds_gravity_state_city").find('input').val(city + ', ' + state);
                                        jQuery(input_class).parent().parent().siblings(".rds_gravity_state_city").find('.gfield_label').addClass('float_label');
//                            jQuery(input_class).parent().parent().siblings(".rds_gravity_state").find('input').val(state);
//                            jQuery(input_class).parent().parent().siblings(".rds_gravity_state").find('.gfield_label').addClass('float_label');
//                            jQuery(input_class).parent().parent().siblings(".rds_gravity_city").find('input').val(city);
//                            jQuery(input_class).parent().parent().siblings(".rds_gravity_city").find('.gfield_label').addClass('float_label');
//                            jQuery(input_class).parent().parent().siblings(".rds_gravity_zip").find('input').val(pin);
//                            jQuery(input_class).parent().parent().siblings(".rds_gravity_zip").find('.gfield_label').addClass('float_label');
//                            jQuery(input_class).parent().parent().siblings(".rds_gravity_country").find('input').val(country);
//                            jQuery(input_class).parent().parent().siblings(".rds_gravity_country").find('.gfield_label').addClass('float_label');
                                    }
                                }
                            });
                        });

                    });
                    //CODE FOR GEOLOCATION AUTOMATIC FIELD END
                });
//CODE FOR OVERLAPING TEXT FIELDS AFTER SUBMITION STATRT
                jQuery(document).on('gform_post_render', function (event, form_id, current_page) {
                    var iframe_html = jQuery("#gform_ajax_frame_" + form_id).contents().find("html body").html();
                    var error = jQuery(iframe_html).find(".gform_validation_errors");
                    if (iframe_html && error.length == 0) {
//            event.preventDefault();
                        jQuery("body").find("#gform_" + form_id + " .gfield_label").each(function (k, d) {
                            if (jQuery(window).width() > 991) {
                                if (jQuery(this).closest(".home_form_c").length > 0) {
                                    this.style.setProperty('margin-top', '-2px', 'important');
                                    this.style.setProperty('color', '#949ca1', 'important');
                                    this.style.setProperty('font-size', '9px', 'important');
                                } else {
                                    this.style.setProperty('margin-top', '7px', 'important');
                                    this.style.setProperty('color', '#000', 'important');
                                    this.style.setProperty('font-size', '9px', 'important');
                                }
                            } else {
//                                this.style.setProperty('margin-left', '10px', 'important');
                                this.style.setProperty('margin-left', '0px', 'important');
                            }
//                this.classList.add("float_label");
                        });

                    }
                });
                //CODE FOR OVERLAPING TEXT FIELDS AFTER SUBMITION END

                function rgb2hex(rgb) {
                    rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
                    return (rgb && rgb.length === 4) ? "#" +
                            ("0" + parseInt(rgb[1], 10).toString(16)).slice(-2) +
                            ("0" + parseInt(rgb[2], 10).toString(16)).slice(-2) +
                            ("0" + parseInt(rgb[3], 10).toString(16)).slice(-2) : '';
                }
                function wc_hex_is_light(color) {
                    const hex = color.replace('#', '');
                    const c_r = parseInt(hex.substring(0, 0 + 2), 16);
                    const c_g = parseInt(hex.substring(2, 2 + 2), 16);
                    const c_b = parseInt(hex.substring(4, 4 + 2), 16);
                    const brightness = ((c_r * 299) + (c_g * 587) + (c_b * 114)) / 1000;
                    return brightness > 155;
                }
                jQuery(document).ready(function () {

                    jQuery(".apply-conditional-color").each(function (index) {
                        let color_bg = jQuery(this).parents('.container-fluid, #cta-a ').css("background-color");
                        // let model_color_bg = jQuery(this).parents('#cta-a').css("background-color");
                        let dark_color_class = jQuery(this).data("dark-color")
                        let light_color_class = jQuery(this).data("light-color")

                        // console.log(light_color_class,dark_color_class,rgb2hex(color_bg),wc_hex_is_light(rgb2hex(color_bg)));
                        if (wc_hex_is_light(rgb2hex(color_bg))) {
                            jQuery(this).addClass(dark_color_class);
                        } else {
                            jQuery(this).addClass(light_color_class);
                        }

                    });
                    // jQuery(".promotionC_icon").click(function () {
                    //     var text = jQuery(this).html().trim();
                    //     currentText = jQuery(this).text();

                    //     if (currentText == "More info ") {
                    //         jQuery(this).html(text.replace('More info ', 'Less info '));
                    //     } else {
                    //         jQuery(this).html(text.replace('Less info ', 'More info '));
                    //     }
                    // });
                    jQuery(".tool_tip_text").find("a.text-uppercase.text-decoration-none").attr("class","color_primary_hover")
                });
</script>
<script>
  const swiper = new Swiper('.swiper-container-img', {
    slidesPerView: 1,
    spaceBetween: 0,
 autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: {
      el: '.swiper-pagination-img',
      clickable: true,
    },
  });
</script>

<?php do_action('rds_footer_bottom'); ?>
<?php wp_footer(); ?>
</body>
</html>