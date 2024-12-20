<?php
//namespace Elementor;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

/**
 * Elementor accordion widget.
 *
 * Elementor widget that displays a collapsible display of content in an
 * promotion style, showing only one item at a time.
 *
 * @since 1.0.0
 */
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Promotion_Widget extends Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->promotion_arrya = json_decode(get_option('rds_template'), TRUE);
        $promotion = $this->promotion_arrya['globals']['promotion'];
        $this->promotion = $promotion;
        $this->variationIsset = false;
        if (count($this->getFileVariations('promotion/slider')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('promotion/slider');
        }else{
            $this->singleVariation = array_keys($this->getFileVariations('promotion/slider'))[0];
        }
    }

    /**
     * Get widget name.
     *
     * Retrieve promotion widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-global-promotion-widget';
    }

    /* Get RDS Spec File.
     *
     * Retrieve rds spec file from wp options.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */

    private $promotion_arrya = "";
    private $promotion = "";

    /**
     * Get widget title.
     *
     * Retrieve promotion widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Promotion', 'rds-global-promotion-widget');
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the category the widget belongs to.
     *
     * @since 2.1.0
     * @access public
     *
     * @return array Widget category.
     */
    public function get_categories() {
        return ['rds-global-widgets'];
    }

    /**
     * Get widget icon.
     *
     * Retrieve promotion widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-tags';
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the widget belongs to.
     *
     * @since 2.1.0
     * @access public
     *
     * @return array Widget keywords.
     */
    public function get_keywords() {
        return ['promotion', 'tabs', 'toggle'];
    }

    /**
     * Register Gravity form lists.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access public
     */
    public function get_gravity_forms_list() {
        global $wpdb;

        $forms_table = $wpdb->prefix . 'gf_form';

        $forms = $wpdb->get_results("SELECT * FROM $forms_table");

        $form_list = array();

        foreach ($forms as $form) {
            $form_list["$form->id"] = $form->title;
        }

        return $form_list;
    }

    /**
     * Register promotion widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
        $args1 = json_decode(get_option('rds_template'), TRUE);
        $promotion1 = $args1['globals']['promotion'];

        $promotionCategory = array(
            'taxonomy' => 'bc_promotion_category',
            'orderby' => 'name',
            'order'   => 'ASC'
        );
        
        $categoryNames = get_categories($promotionCategory);

        // $catName = [];
        $catName = array(
            'all' => esc_html__('all', 'rds-promotions-widget') // Static 'All' field
        );
        foreach ($categoryNames as $value) {
            $catName[$value->name] =  $value->name;
        }

        if (!empty($categoryNames) && !is_wp_error($categoryNames)) {
            foreach ($categoryNames as $category) {
                $catName[$category->name] = esc_html__($category->name, 'rds-promotions-widget');
            }
        }


        $this->start_controls_section(
                'rds_global_promotion_widget',
                [
                    'label' => esc_html__('Promotion', 'rds-global-promotion-widget'),
                ]
        );
       
        if ($this->variationIsset) {
            $options = array();
            foreach ($this->allVariation as $key => $value) {
                $options[$key] = esc_html__($value, 'rds-global-promotion-widget');
            }
            $this->add_control(
                     'variation',
                     array(
                        'label' => esc_html__('Variation', 'rds-global-promotion-widget'),
                        'type' => Controls_Manager::SELECT,
                        'default' => $this->promotion['variation'],
                         'options' =>  $options,
                     )
             ); 
         }

         $this->add_control(
            'category_filter',
            [
                'label' => esc_html__( 'Select Category', 'rds-promotions-widget' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' =>  $catName,
                'default' => $this->promotion['category_filter'],
            ]
        );
       
        //Promotion heading Start
        $this->add_control(
                'title',
                array(
                    'label' => 'Title',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->promotion['title'],
                )
        );
  
   
        // Promotion Subheading control start
        $this->add_control(
                'heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->promotion['heading'],
                )
        );

        // $this->add_control(
        //         'coupon_button_text',
        //         array(
        //             'label' => 'Coupon Button Text',
        //             'type' => \Elementor\Controls_Manager::TEXT,
        //             'default' => $this->promotion['coupon_button_text'],
        //         )
        //  );

        // $this->add_control(
        //         'request_button_link',
        //         array(
        //             'label' => 'Request Button Link',
        //             'type' => \Elementor\Controls_Manager::TEXT,
        //             'default' => $this->promotion['request_button_link'],
        //         )
        // );
    
        // Promotion Button control start
        $this->add_control(
                'button_link',
                array(
                    'label' => 'Button Link',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => $this->promotion['button_link'],
                    'show_external' => true,
                    'default' => $this->promotion['button_link']
                )
        );

        $this->add_control(
                'button_text',
                array(
                    'label' => 'Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->promotion['button_text'],
                )
        );
        // Promotion button control end
        //Promotion popup heading Start
        $this->add_control(
                'popup_form_heading',
                array(
                    'label' => 'Popup Heading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->promotion['popup_form_heading'],
                )
        );
     
        // Promotion popup Subheading control start
        $this->add_control(
                'popup_form_subheading',
                array(
                    'label' => 'Popup Subheading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->promotion['popup_form_subheading'],
                )
        );
       
        // Gravity Forms list start
        $Form_list = $this->get_gravity_forms_list();
        $this->add_control(
                'popup_gravity_form_id',
                array(
                    'label' => 'Gravity Forms',
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => $Form_list,
                    'default' => $this->promotion['popup_gravity_form_id'],
                )
        );
        // Gravity Forms list end
        $this->end_controls_section();
    }

    /**
     * Render promotion widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings();
        $args = $this->promotion_arrya;
        $widget_id = $this->get_id();
        $selected_category = $settings['category_filter'];
        $button_link = isset($settings['button_link']) ? sanitize_text_field($settings['button_link']) : "";
        $args['globals']['promotion']['button_link'] = $button_link;
        $args['globals']['promotion']['title'] = sanitize_text_field($settings['title']);
        $args['globals']['promotion']['heading'] = sanitize_text_field($settings['heading']);
        //$args['globals']['promotion']['coupon_button_text'] = sanitize_text_field($settings['coupon_button_text']);
        //$args['globals']['promotion']['request_button_link'] = sanitize_text_field($settings['request_button_link']);
       if($this->variationIsset){
        $args['globals']['promotion']['variation'] = sanitize_text_field($settings['variation']);
        }
        $args['globals']['promotion']['button_text'] = sanitize_text_field($settings['button_text']);
        $args['globals']['promotion']['popup_form_heading'] = sanitize_text_field($settings['popup_form_heading']);
        $args['globals']['promotion']['popup_form_subheading'] = sanitize_text_field($settings['popup_form_subheading']);
        
        $args['globals']['promotion']['popup_gravity_form_id'] = sanitize_text_field($settings['popup_gravity_form_id']);
        $args['globals']['promotion']['category_filter'] = $settings['category_filter'];
        $variation = sanitize_text_field($settings['variation']);
        //Update template spec file
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
        $args['globals']['promotion']['widget_id'] = $widget_id;
        $args['category_taxonomy'] = $selected_category;
        $call_back = "rds_variation_promotion_slider_html";
        //Display content
            $this->$call_back($args);
            $this->rds_promotion_script($widget_id);
    }

    /**
     * Render promotion widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 2.9.0
     * @access protected
     */
    public function rds_variation_promotion_slider_html($args) {
            if ($this->variationIsset) {
                get_template_part('global-templates/promotion/slider/'.$args['globals']['promotion']['variation'], null, $args);
            }else{
            get_template_part('global-templates/promotion/slider/'.$this->singleVariation, null, $args);
            }
        }

    public function rds_promotion_script($widget_id) {
        ?>
        <script>
            jQuery(document).ready(function () {
                var numImage = jQuery('.home-coupon-swiper-<?= $widget_id; ?> .swiper-slide').length;
                if (numImage <= 3) {
                    jQuery('.home-coupon-swiper-<?= $widget_id; ?> .swiper-wrapper').addClass('justify-content-center ps-lg-3');
                    new Swiper(".home-coupon-swiper-<?= $widget_id; ?>", {
                        spaceBetween: 30,
                        slidesPerView: 1,
                        loop: false,
                        pagination: {
                            el: ".home-coupon-pagination-<?= $widget_id; ?>",
                            clickable: true
                        },
                        breakpoints: {
                            640: {
                                slidesPerView: 1,
                                spaceBetween: 30
                            },
                            768: {
                                slidesPerView: 1,
                                spaceBetween: 30
                            },
                            992: {
                                slidesPerView: 3,
                                spaceBetween: 30
                            }
                        }
                    });
                } else {
                    new Swiper(".home-coupon-swiper-<?= $widget_id; ?>", {
                        spaceBetween: 30,
                        slidesPerView: 1,
                        autoplay: {
                            delay: 8000,
                            disableOnInteraction: false
                        },
                        loop: false,
                        pagination: {
                            el: ".home-coupon-pagination-<?= $widget_id; ?>",
                            clickable: true
                        },
                        breakpoints: {
                            640: {
                                slidesPerView: 1,
                                spaceBetween: 30
                            },
                            768: {
                                slidesPerView: 1,
                                spaceBetween: 30
                            },
                            992: {
                                slidesPerGroup: 3,
                                slidesPerView: 3,
                                spaceBetween: 30
                            }
                        }
                    });
                    var mySwiper = document.querySelector('.home-coupon-swiper-<?= $widget_id; ?>').swiper
                    document.querySelectorAll('.request_service_button').forEach(function(button) {
                        button.addEventListener('click', function() {
                            if (document.getElementById('request_coupon_form').classList.contains('show')) {
                                mySwiper.autoplay.stop();
                            }
                        });
                    });

                    document.querySelector('.coupon-popup-close').addEventListener('click', function() {
                        if (!document.getElementById('request_coupon_form').classList.contains('show')) {
                            mySwiper.autoplay.start();
                        }
                    });
                }
                

                new Swiper(".m-home-coupon-swiper-<?= $widget_id; ?>", {
                    spaceBetween: 30,
                    slidesPerView: 1,
                    autoplay: {
                        delay: 8000,
                        disableOnInteraction: false
                    },
                    loop: true,
                    pagination: {
                        el: ".m-home-coupon-pagination-<?= $widget_id; ?>",
                        clickable: true
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 1,
                            spaceBetween: 30
                        },
                        768: {
                            slidesPerView: 1,
                            spaceBetween: 30
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 30
                        }
                    }
                }); 
                if(jQuery('.m-home-coupon-swiper-<?= $widget_id; ?>').length == 1){
                    var mySwipera = document.querySelector('.m-home-coupon-swiper-<?= $widget_id; ?>').swiper
                    document.querySelectorAll('.request_service_button').forEach(function(button) {
                        button.addEventListener('click', function() {
                            if (document.getElementById('request_coupon_form').classList.contains('show')) {
                                mySwipera.autoplay.stop();
                            }
                        });
                    });

                    document.querySelector('.coupon-popup-close').addEventListener('click', function() {
                        if (!document.getElementById('request_coupon_form').classList.contains('show')) {
                            mySwipera.autoplay.start();
                        }
                    });
                }

                //variation b

                var numImage_b = jQuery('.home-coupon-swiper-b-<?= $widget_id; ?> .swiper-slide').length;

                if (numImage_b <= 3) {
                    jQuery('.home-coupon-swiper-b-<?= $widget_id; ?> .swiper-wrapper').addClass('justify-content-center ps-lg-3');
                    new Swiper(".home-coupon-swiper-b", {
                        spaceBetween: 30,
                        slidesPerView: 1,
                        loop: false,
                        pagination: {
                            el: ".home-coupon-pagination-b-<?= $widget_id; ?>",
                            clickable: true
                        },
                        breakpoints: {
                            640: {
                                slidesPerView: 1,
                                spaceBetween: 30
                            },
                            768: {
                                slidesPerView: 1,
                                spaceBetween: 30
                            },
                            992: {
                                slidesPerView: 3,
                                spaceBetween: 30
                            }
                        }
                    });
                } else {
                    new Swiper(".home-coupon-swiper-b-<?= $widget_id; ?>", {
                        spaceBetween: 30,
                        slidesPerView: 1,
                        autoplay: {
                            delay: 8000,
                            disableOnInteraction: false
                        },
                        loop: false,
                        pagination: {
                            el: ".home-coupon-pagination-b-<?= $widget_id; ?>",
                            clickable: true
                        },
                        breakpoints: {
                            640: {
                                slidesPerView: 1,
                                spaceBetween: 30
                            },
                            768: {
                                slidesPerView: 1,
                                spaceBetween: 30
                            },
                            992: {
                                slidesPerGroup: 3,
                                slidesPerView: 3,
                                spaceBetween: 30
                            }
                        }
                    });
                    var mySwiper = document.querySelector('.home-coupon-swiper-b-<?= $widget_id; ?>').swiper
                    document.querySelectorAll('.request_service_button').forEach(function(button) {
                        button.addEventListener('click', function() {
                            if (document.getElementById('request_coupon_form').classList.contains('show')) {
                                mySwiper.autoplay.stop();
                            }
                        });
                    });

                    document.querySelector('.coupon-popup-close').addEventListener('click', function() {
                        if (!document.getElementById('request_coupon_form').classList.contains('show')) {
                            mySwiper.autoplay.start();
                        }
                    });
                }
               

                new Swiper(".m-home-coupon-swiper-b-<?= $widget_id; ?>", {
                    spaceBetween: 30,
                    slidesPerView: 1,
                    autoplay: {
                        delay: 8000,
                        disableOnInteraction: false
                    },
                    loop: true,
                    pagination: {
                        el: ".m-home-coupon-pagination-b-<?= $widget_id; ?>",
                        clickable: true
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 1,
                            spaceBetween: 30
                        },
                        768: {
                            slidesPerView: 1,
                            spaceBetween: 30
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 30
                        }
                    }
                }); 
                if(jQuery('.m-home-coupon-swiper-b-<?= $widget_id; ?>').length == 1){
                    var mySwiperb = document.querySelector('.m-home-coupon-swiper-b-<?= $widget_id; ?>').swiper
                    document.querySelectorAll('.request_service_button').forEach(function(button) {
                        button.addEventListener('click', function() {
                            if (document.getElementById('request_coupon_form').classList.contains('show')) {
                                mySwiperb.autoplay.stop();
                            }
                        });
                    });

                    document.querySelector('.coupon-popup-close').addEventListener('click', function() {
                        if (!document.getElementById('request_coupon_form').classList.contains('show')) {
                            mySwiperb.autoplay.start();
                        }
                    });
                }
                //variation c
                var numImage_2 = jQuery('.home-coupon-swiper-c-<?= $widget_id; ?> .swiper-slide').length;

                if (numImage_2 <= 3) {
                    jQuery('.home-coupon-swiper-c-<?= $widget_id; ?> .swiper-wrapper').addClass('justify-content-center ps-lg-3');
                    new Swiper(".home-coupon-swiper-c-<?= $widget_id; ?>", {
                        spaceBetween: 30,
                        slidesPerView: 1,
                        loop: false,
                        pagination: {
                            el: ".home-coupon-pagination-c-<?= $widget_id; ?>",
                            clickable: true
                        },
                        breakpoints: {
                            640: {
                                slidesPerView: 1,
                                spaceBetween: 30
                            },
                            768: {
                                slidesPerView: 1,
                                spaceBetween: 30
                            },
                            992: {
                                slidesPerView: 3,
                                spaceBetween: 30
                            }
                        }
                    });
                } else {
                    new Swiper(".home-coupon-swiper-c-<?= $widget_id; ?>", {
                        spaceBetween: 30,
                        slidesPerView: 1,
                        loop: false,
                        
                        autoplay: {
                            delay: 8000,
                            disableOnInteraction: true,
                        },
                        speed: 1500,
                        pagination: {
                            el: ".home-coupon-pagination-c-<?= $widget_id; ?>",
                            clickable: true
                        },
                        breakpoints: {
                            640: {
                                slidesPerView: 1,
                                spaceBetween: 30
                            },
                            768: {
                                slidesPerView: 1,
                                spaceBetween: 30
                            },
                            992: {
                                slidesPerGroup: 3,
                                slidesPerView: 3,
                                spaceBetween: 30
                            }
                        }
                    });

                    var mySwiper = document.querySelector('.home-coupon-swiper-c-<?= $widget_id; ?>').swiper
                    document.querySelectorAll('.request_service_button').forEach(function(button) {
                        button.addEventListener('click', function() {
                            if (document.getElementById('request_coupon_form').classList.contains('show')) {
                                mySwiper.autoplay.stop();
                            }
                        });
                    });

                    document.querySelector('.coupon-popup-close').addEventListener('click', function() {
                        if (!document.getElementById('request_coupon_form').classList.contains('show')) {
                            mySwiper.autoplay.start();
                        }
                    }); 
                }
                new Swiper(".m-home-coupon-swiper-c-<?= $widget_id; ?>", {
                    spaceBetween: 30,
                    slidesPerView: 1,
                    autoplay: {
                        delay: 8000,
                        disableOnInteraction: false
                    },
                    pagination: {
                        el: ".m-home-coupon-pagination-c-<?= $widget_id; ?>",
                        clickable: true
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 1,
                            spaceBetween: 30
                        },
                        768: {
                            slidesPerView: 1,
                            spaceBetween: 30
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 30
                        }
                    }
                });
                if(jQuery('.swiper.m-home-coupon-swiper-c-<?= $widget_id; ?>').length == 1){
                    var mySwiperc = document.querySelector('.m-home-coupon-swiper-c-<?= $widget_id; ?>').swiper
                    document.querySelectorAll('.request_service_button').forEach(function(button) {
                        button.addEventListener('click', function() {
                            if (document.getElementById('request_coupon_form').classList.contains('show')) {
                                mySwiperc.autoplay.stop();
                            }
                        });
                    });

                    document.querySelector('.coupon-popup-close').addEventListener('click', function() {
                        if (!document.getElementById('request_coupon_form').classList.contains('show')) {
                            mySwiperc.autoplay.start();
                        }
                    });
                }
        });
        </script>
        <?php
    }

} 