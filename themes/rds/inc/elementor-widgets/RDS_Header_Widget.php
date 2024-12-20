<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

/**
 * Elementor Header widget.
 *
 * Elementor widget that displays a collapsible display of content in an
 * Header style, showing only one item at a time.
 *
 * @since 1.0.0
 */
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Header_Widget extends Widget_Base {
     use FileVariations;
     public $variationIsset = false;
     public $allVariation;
     public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->Header_arrya = json_decode(get_option('rds_template'), TRUE);
        $Header = $this->Header_arrya['globals']['header'];
        $this->Header = $Header;
         $this->variationIsset = false;

         if (count($this->getFileVariations('header')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('header');
         }else{
            $this->singleVariation = array_keys($this->getFileVariations('header'))[0];
         }

    }

    /**
     * Get widget name.
     *
     * Retrieve Header widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-header-widget-global';
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

    private $Header_arrya = "";
    private $Header = "";

    /**
     * Get widget title.
     *
     * Retrieve Header widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Header', 'rds-header-widget-global');
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
     * Retrieve Header widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-header';
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
        return ['Header'];
    }

    /**
     * Register header  widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
        $header = $this->Header;
        $this->start_controls_section(
                'rds_global_header_widget',
                [
                    'label' => esc_html__('Header', 'rds-global-header--widget'),
                ]
        );
        if ($this->variationIsset) {
            $this->add_control(
                    'variation',
                    array(
                        'label' => 'Variation',
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => $header['variation'],
                        'options' => $this->allVariation,
                    )
            );
        }
        $this->add_control(
                'call_text',
                array(
                    'label' => 'Call Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $header['call_text'],
                    'condition' => [
                        'variation' => ['a', 'b', 'd'],
                    ]
                )
        );

        $this->add_control(
                'phone_number',
                array(
                    'label' => 'Phone Number',
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => $header['phone_number'],
                    'condition' => [
                        'variation' => ['d'],
                    ]
                )
        );
      
        $this->end_controls_section();

        $this->start_controls_section(
                'desktop_schedule_online_h_button',
                [
                    'label' => esc_html__('Desktop Schedule Online Button', 'rds-global-announcement-bar-widget'),
                    'condition' => [
                        'variation' => ['a', 'b', 'd'],
                    ]
                ]
        );
        $this->add_control(
                'desktop_schedule_online_h_enable',
                array(
                    'name' => 'desktop_schedule_online_h_enable',
                    'label' => 'Enable Schedule Online',
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => 'Yes',
                    'label_off' => 'No',
                    'return_value' => $this->Header_arrya['globals']['desktop_schedule_online_button']['enabled'] ? "yes" : "no",
                    'default' => 'yes',
                )
        );
        $this->add_control(
                'desktop_schedule_online_h_label',
                array(
                    'name' => 'desktop_schedule_online_h_label',
                    'label' => 'Label',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->Header_arrya['globals']['desktop_schedule_online_button']['label'],
                )
        );
        $this->add_control(
                'desktop_schedule_online_button_h_type',
                array(
                    'label' => 'Schedule Online Type',
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'service_titan' => "Service Titan",
                        'schedule_online' => "Schedule Online",
                        'zocdoc' => "Zocdoc",
                        'url' => "URL"
                    ],
                    'default' => $this->Header_arrya['globals']['desktop_schedule_online_button']['type'],
                ),
        );
        $this->add_control(
                'desktop_schedule_online_h_url',
                array(
                    'label' => 'URL',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->Header_arrya['globals']['desktop_schedule_online_button']['url'],
                    'condition' => [
                        'desktop_schedule_online_button_h_type' =>'url',
                        'variation' => ['d'],
                    ]
                )
        );
        $this->add_control(
                'desktop_schedule_online_h_icon_class',
                array(
                    'label' => 'Icon',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->Header_arrya['globals']['desktop_schedule_online_button']['icon_class'],
                )
        );
        $this->end_controls_section();

        $this->start_controls_section(
                'mobile_schedule_h_online',
                [
                    'label' => esc_html__('Mobile Schedule Online Button ', 'rds-global-announcement-bar-widget'),
                    'condition' => [
                        'variation' => ['a', 'b', 'c'],
                    ]
                ]
        );
          $this->add_control(
                'schedule_online_h_enable',
                array(
                    'label' => 'Enable Schedule Online',
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => 'Yes',
                    'label_off' => 'No',
                    'return_value' => $this->Header_arrya['globals']['ctas']['schedule_online']['enabled'] ? "yes" : "no",
                    'default' => 'yes',
                )
        );
        $this->add_control(
                'schedule_online_h_label',
                array(
                    'label' => 'Label',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->Header_arrya['globals']['ctas']['schedule_online']['label'],
                )
        );
        $this->add_control(
                'schedule_online_h_type',
                array(
                    'label' => 'Schedule Online Type',
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'service_titan' => "Service Titan",
                        'schedule_online' => "Schedule Online",
                        'url' => "URL"
                    ],
                    'default' => $this->Header_arrya['globals']['ctas']['schedule_online']['type'],
                ),
        );
        $this->add_control(
                'schedule_online_h_url',
                array(
                    'label' => 'URL',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->Header_arrya['globals']['ctas']['schedule_online']['url'],
                    'condition' => [
                        'schedule_online_h_type' =>'url',
                    ]
                )
        );
        $this->add_control(
                'schedule_online_h_icon_class',
                array(
                    'label' => 'Icon',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->Header_arrya['globals']['ctas']['schedule_online']['icon_class'],
                )
        );
        $this->end_controls_section();
    }

    /**
     * Render header  widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings();
        $args = $this->Header_arrya;
        //Header Part start
        if($this->variationIsset){
            $args['globals']['header']['variation'] = sanitize_text_field($settings['variation']);
          }
          $args['globals']['header']['call_text'] = sanitize_text_field($settings['call_text']);
          $args['globals']['header']['phone_number'] = sanitize_text_field($settings['phone_number']);
        //  //desktop_schedule_online_button start
        $args['globals']['desktop_schedule_online_button']['type'] = sanitize_text_field($settings['desktop_schedule_online_button_h_type']);
        $args['globals']['desktop_schedule_online_button']['enabled'] = sanitize_text_field($settings['desktop_schedule_online_h_enable']) ? true : false;
        $args['globals']['desktop_schedule_online_button']['url'] = isset($settings['desktop_schedule_online_h_url']) ? sanitize_text_field($settings['desktop_schedule_online_h_url']) : "";
        $args['globals']['desktop_schedule_online_button']['label'] = sanitize_text_field($settings['desktop_schedule_online_h_label']);
        $args['globals']['desktop_schedule_online_button']['icon_class'] = sanitize_text_field($settings['desktop_schedule_online_h_icon_class']);
        //desktop_schedule_online_button end
        //mobile_schedule_online  start
        $args['globals']['ctas']['schedule_online']['type'] = sanitize_text_field($settings['schedule_online_h_type']);
        $args['globals']['ctas']['schedule_online']['enabled'] = sanitize_text_field($settings['schedule_online_h_enable']) ? true : false;
        $args['globals']['ctas']['schedule_online']['url'] = isset($settings['schedule_online_h_url']) ? sanitize_text_field($settings['schedule_online_h_url']) : "";
        $args['globals']['ctas']['schedule_online']['label'] = sanitize_text_field($settings['schedule_online_h_label']);
        $args['globals']['ctas']['schedule_online']['icon_class'] = sanitize_text_field($settings['schedule_online_h_icon_class']);
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $update = $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
        if ($this->variationIsset) {
                get_template_part('global-templates/header/'.$args['globals']['header']['variation'], null, $args);
            }else{
             get_template_part('global-templates/header/'.$this->singleVariation, null, $args);
            }

    }
}