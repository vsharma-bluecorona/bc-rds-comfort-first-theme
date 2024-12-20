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
 * service area style, showing only one item at a time.
 *
 * @since 1.0.0
 */
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Service_Area_Widget extends Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->service_array = json_decode(get_option('rds_template'), TRUE);
        $servicee = $this->service_array['globals']['service_area'];
        $this->service = $servicee;
        $this->variationIsset = false;
        if (count($this->getFileVariations('service-area')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('service-area');
        }else{
            $this->singleVariation = array_keys($this->getFileVariations('service-area'))[0];
        }
    }

    /**
     * Get widget name.
     *
     * Retrieve service area widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-global-service-area-widget';
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

    private $service_array = "";
    private $service = "";

    /**
     * Get widget title.
     *
     * Retrieve service area  widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Service Area', 'rds-global-service-area-widget');
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
     * Retrieve request service  widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-kit-parts';
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
        return ['service area', 'tabs', 'toggle'];
    }

    /**
     * Register Gravity form lists.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access public
     */
    

    /**
     * Register service area  widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
        // $site_titles = get_multisite_site_titles();
        $this->start_controls_section(
                'rds_global_service_area_widget',
                [
                    'label' => esc_html__('Global Service Area Widget', 'rds-global-service-area-widget'),
                ]
        );
        if ($this->variationIsset) {
            $this->add_control(
                     'variation',
                     array(
                        'label' => esc_html__('Variation', 'rds-global-request-service-widget'),
                        'type' => Controls_Manager::SELECT,
                        'default' => $this->service['variation'],
                        'options' =>  $this->allVariation,
                     )
             ); 
         }
        if (is_multisite()) {
            $this->add_control(
                'multisite_service_area_option',
                [
                    'label' => esc_html__( 'Enable Multi Site Serice Area', 'rds-global-service-area-widget' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Yes', 'rds-global-service-area-widget' ),
                    'label_off' => esc_html__( 'No', 'rds-global-service-area-widget' ),
                    'return_value' => isset($this->service['multisite_service_area_option']) ?"yes":"",
                    'default' => 'yes',
                    'condition' => [
                        'variation' => ['c'],
                    ],
                ]
            );
        }

        $this->add_control(
                'first_tab_title',
                array(
                    'label' => 'First Tab Title',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->service['first_tab_title'],
                    'condition' => [
                        'variation' => 'c',
                        'multisite_service_area_option' => '',
                    ],
                )
        );
        $this->add_control(
                'first_tab_heading',
                array(
                    'label' => 'First Tab Heading',
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => $this->service['first_tab_heading'],
                    'condition' => [
                        'variation' => 'c',
                        'multisite_service_area_option' => '',
                    ],
                )
        );

        $this->add_control(
                'first_tab_description_html_allowed',
                array(
                    'label' => 'First Tab Description',
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => $this->service['first_tab_description_html_allowed'],
                    'condition' => [
                        'variation' => 'c',
                        'multisite_service_area_option' => '',
                    ],
                )
        );
        $this->add_control(
                'first_tab_button_text',
                array(
                    'label' => 'First Tab Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->service['first_tab_button_text'],
                    'condition' => [
                        'variation' => 'c',
                        'multisite_service_area_option' => '',
                    ],
                )
        );

        $this->add_control(
                'first_tab_button_link',
                array(
                    'label' => 'First Tab Button Link',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->service['first_tab_button_link'],
                    'condition' => [
                        'variation' => 'c',
                        'multisite_service_area_option' => '',
                    ],
                )
        );

           $this->add_control(
                'second_tab_title',
                array(
                    'label' => 'Second Tab Title',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->service['second_tab_title'],
                    'condition' => [
                        'variation' => 'c',
                        'multisite_service_area_option' => '',
                    ],
                )
        );

        $this->add_control(
                'second_tab_heading',
                array(
                    'label' => 'Second Tab Heading',
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => $this->service['second_tab_heading'],
                    'condition' => [
                        'variation' => 'c',
                        'multisite_service_area_option' => '',
                    ],
                )
        );

        $this->add_control(
                'second_tab_description_html_allowed',
                array(
                    'label' => 'Second Tab Description',
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => $this->service['second_tab_description_html_allowed'],
                    'condition' => [
                        'variation' => 'c',
                        'multisite_service_area_option' => '',
                    ],
                )
        );

        $this->add_control(
                'second_tab_button_text',
                array(
                    'label' => 'Second Tab Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->service['second_tab_button_text'],
                    'condition' => [
                        'variation' => 'c',
                        'multisite_service_area_option' => '',
                    ],
                )
        );

        $this->add_control(
            'second_tab_button_link',
            array(
                'label' => 'Second Tab Button Link',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => $this->service['second_tab_button_link'],
                'condition' => [
                    'variation' => 'c',
                    'multisite_service_area_option' => '',
                ],
            )
        );

         $this->add_control(
                'third_tab_title',
                array(
                    'label' => 'Third Tab Title',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->service['third_tab_title'],
                    'condition' => [
                        'variation' => 'c',
                        'multisite_service_area_option' => '',
                    ],
                )
        );
        $this->add_control(
                'third_tab_heading',
                array(
                    'label' => 'Third Tab Heading',
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => $this->service['third_tab_heading'],
                    'condition' => [
                        'variation' => 'c',
                        'multisite_service_area_option' => '',
                    ],
                )
        );

        $this->add_control(
                'third_tab_description_html_allowed',
                array(
                    'label' => 'Third Tab Description',
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => $this->service['third_tab_description_html_allowed'],
                    'condition' => [
                        'variation' => 'c',
                        'multisite_service_area_option' => '',
                    ],
                )
        );

        $this->add_control(
                'third_tab_button_text',
                array(
                    'label' => 'Third Tab Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->service['third_tab_button_text'],
                    'condition' => [
                        'variation' => 'c',
                        'multisite_service_area_option' => '',
                    ],
                )
        );

        $this->add_control(
                'third_tab_button_link',
                array(
                    'label' => 'Third Tab Button Link',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->service['third_tab_button_link'],
                    'condition' => [
                        'variation' => 'c',
                        'multisite_service_area_option' => '',
                    ],
                )
        );

        $this->add_control(
                'fourth_tab_title',
                array(
                    'label' => 'Fourth Tab Title',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->service['fourth_tab_title'],
                    'condition' => [
                        'variation' => 'c',
                        'multisite_service_area_option' => '',
                    ],
                )
        );

        $this->add_control(
                'fourth_tab_heading',
                array(
                    'label' => 'Fourth Tab Heading',
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => $this->service['fourth_tab_heading'],
                    'condition' => [
                        'variation' => 'c',
                        'multisite_service_area_option' => '',
                    ],
                )
        );

        $this->add_control(
                'fourth_tab_description_html_allowed',
                array(
                    'label' => 'Fourth Tab Description',
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => $this->service['fourth_tab_description_html_allowed'],
                    'condition' => [
                        'variation' => 'c',
                        'multisite_service_area_option' => '',
                    ],
                )
        );

        $this->add_control(
                'fourth_tab_button_text',
                array(
                    'label' => 'Fourth Tab Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->service['fourth_tab_button_text'],
                    'condition' => [
                        'variation' => 'c',
                        'multisite_service_area_option' => '',
                    ],
                )
        );

        $this->add_control(
                'fourth_tab_button_link',
                array(
                    'label' => 'Fourth Tab Button Link',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->service['fourth_tab_button_link'],
                    'condition' => [
                        'variation' => 'c',
                        'multisite_service_area_option' => '',
                    ],
                )
        );

        $this->add_control(
                'heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => $this->service['heading'],
                    'condition' => [
                        'variation' => ['a', 'b'],
                    ],
                )
        );

         $this->add_control(
                'subheading',
                array(
                    'label' => 'Subheading',
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => $this->service['subheading'],
                    'condition' => [
                        'variation' => 'a',
                    ],
                )
        );
         $this->add_control(
                'description_html_allowed',
                array(
                    'label' => 'Description',
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => $this->service['description_html_allowed'],
                    'condition' => [
                        'variation' => ['a', 'b'],
                    ],
                )
        );

         $this->add_control(
                'button_text',
                array(
                    'label' => 'Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->service['button_text'],
                    'condition' => [
                        'variation' => ['a', 'b'],
                    ],
                )
        );

         $this->add_control(
                'button_link',
                array(
                    'label' => 'Button Link',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->service['button_link'],
                    'condition' => [
                        'variation' => ['a', 'b'],
                    ],
                )
        );
     
              
        $this->end_controls_section();

    }

    /**
     * Render request widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings();
        $args = $this->service_array;
        if($this->variationIsset){
            $args['globals']['service_area']['variation'] = sanitize_text_field($settings['variation']);
        }
        if (is_multisite()) {
            $args['globals']['service_area']['multisite_service_area_option'] = $settings['multisite_service_area_option'] ? true : false;
        }
        $args['globals']['service_area']['subheading'] = $settings['subheading'];
        $args['globals']['service_area']['heading'] = $settings['heading'];
        $args['globals']['service_area']['button_link'] = sanitize_text_field($settings['button_link']);
        $args['globals']['service_area']['button_text'] = sanitize_text_field($settings['button_text']);
        $args['globals']['service_area']['description_html_allowed'] = $settings['description_html_allowed'];

        $args['globals']['service_area']['first_tab_title'] = sanitize_text_field($settings['first_tab_title']);
        $args['globals']['service_area']['second_tab_title'] = sanitize_text_field($settings['second_tab_title']);
        $args['globals']['service_area']['third_tab_title'] = sanitize_text_field($settings['third_tab_title']);
        $args['globals']['service_area']['fourth_tab_title'] = sanitize_text_field($settings['fourth_tab_title']);

        $args['globals']['service_area']['first_tab_heading'] = $settings['first_tab_heading'];
        $args['globals']['service_area']['second_tab_heading'] = $settings['second_tab_heading'];
        $args['globals']['service_area']['third_tab_heading'] = $settings['third_tab_heading'];
        $args['globals']['service_area']['fourth_tab_heading'] = $settings['fourth_tab_heading'];

        $args['globals']['service_area']['first_tab_description_html_allowed'] = $settings['first_tab_description_html_allowed'];
        $args['globals']['service_area']['second_tab_description_html_allowed'] = $settings['second_tab_description_html_allowed'];
        $args['globals']['service_area']['third_tab_description_html_allowed'] = $settings['third_tab_description_html_allowed'];
        $args['globals']['service_area']['fourth_tab_description_html_allowed'] = $settings['fourth_tab_description_html_allowed'];

        $args['globals']['service_area']['first_tab_button_text'] = sanitize_text_field($settings['first_tab_button_text']);
        $args['globals']['service_area']['second_tab_button_text'] = sanitize_text_field($settings['second_tab_button_text']);
        $args['globals']['service_area']['third_tab_button_text'] = sanitize_text_field($settings['third_tab_button_text']);
        $args['globals']['service_area']['fourth_tab_button_text'] = sanitize_text_field($settings['fourth_tab_button_text']);

        $args['globals']['service_area']['first_tab_button_link'] = sanitize_text_field($settings['first_tab_button_link']);
        $args['globals']['service_area']['second_tab_button_link'] = sanitize_text_field($settings['second_tab_button_link']);
        $args['globals']['service_area']['third_tab_button_link'] = sanitize_text_field($settings['third_tab_button_link']);
        $args['globals']['service_area']['fourth_tab_button_link'] = sanitize_text_field($settings['fourth_tab_button_link']);
        
        //Update template spec file
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
            if ($this->variationIsset) {
                get_template_part('global-templates/service-area/'. $args['globals']['service_area']['variation'], null, $args);
            }else{
                get_template_part('global-templates/service-area/'.$this->singleVariation, null, $args);
            } 
    }
}
