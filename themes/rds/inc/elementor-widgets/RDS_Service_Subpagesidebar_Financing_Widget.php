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
 * financing service style, showing only one item at a time.
 *
 * @since 1.0.0
 */
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Service_Subpagesidebar_Financing_Widget extends Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->service_subpagesidebarfinancing_array = json_decode(get_option('rds_template'), TRUE);
        $service_subpagesidebarfinancings = $this->service_subpagesidebarfinancing_array['page_templates']['service_subpage']['financing'];
        $this->service_subpagesidebarfinancing = $service_subpagesidebarfinancings;
        $this->variationIsset = false;
        if (count($this->getFileVariations('fullwidth-cta/service-subpage')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('fullwidth-cta/service-subpage');
        }else{
            $this->singleVariation = array_keys($this->getFileVariations('fullwidth-cta/service-subpage'))[0];
        }
    }

    /**
     * Get widget name.
     *
     * Retrieve service subpagesidebar financing widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-global-service-subpagesidebar-financing-widget';
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

    private $service_subpagesidebarfinancing_array = "";
    private $service_subpagesidebarfinancing = "";

    /**
     * Get widget title.
     *
     * Retrieve service subpagesidebar financing  widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Service Subpagesidebar financing Service Widget', 'rds-global-service-subpagesidebar-financing-widget');
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
     * Retrieve service subpagesidebar financing  widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-tabs';
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
        return ['service subpagesidebar financing', 'tabs', 'toggle'];
    }

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
     * Register service subpagesidebarfinancing widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
                'rds_global_service_subpagesidebar_financing_widget',
                [
                    'label' => esc_html__('Global Financing Service Subpage Sidebar ', 'rds-global-service-subpagesidebar-financing-widget'),
                ]
        );

        if ($this->variationIsset) {
            $options = array();
            foreach ($this->allVariation as $key => $value) {
                $options[$key] = esc_html__($value, 'rds-global-service-subpagesidebar-financing-widget');
            }
            $this->add_control(
                     'variation',
                     array(
                        'label' => esc_html__('Variation', 'rds-global-service-subpagesidebar-financing-widget'),
                        'type' => Controls_Manager::SELECT,
                         'default' => $this->service_subpagesidebarfinancing['variation'],
                         'options' =>  $options,
                     )
             ); 
        }
        $this->add_control(
                'heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->service_subpagesidebarfinancing['heading'],
                )
        );

          $this->add_control(
                'subheading',
                array(
                    'label' => 'SubHeading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->service_subpagesidebarfinancing['subheading'],

                )
        );

         $this->add_control(
                'button_text',
                array(
                    'label' => 'Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->service_subpagesidebarfinancing['button_text'],
                    'condition' => [
                        'variation' => ['a', 'c'],
                    ],

                )
        );

         $this->add_control(
                'button_link',
                array(
                    'label' => 'Button Link',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->service_subpagesidebarfinancing['button_link'],

                )
        );
        $this->end_controls_section();
    }

    /**
     * Render financing widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings();
        $args = $this->service_subpagesidebarfinancing_array;
        if($this->variationIsset){
            $args['page_templates']['service_subpage']['financing']['variation'] = sanitize_text_field($settings['variation']);
        }
        $args['page_templates']['service_subpage']['financing']['heading'] = sanitize_text_field($settings['heading']);
        $args['page_templates']['service_subpage']['financing']['subheading'] = sanitize_text_field($settings['subheading']);
        $args['page_templates']['service_subpage']['financing']['button_text'] = sanitize_text_field($settings['button_text']);
        $args['page_templates']['service_subpage']['financing']['button_link'] = sanitize_text_field($settings['button_link']);
       
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
        $get_rds_template_data_array = rds_template();
        //  if ($get_rds_template_data_array['globals']['services'] && $get_rds_template_data_array['globals']['services']['enable']) {
            get_template_part( 'global-templates/services/sidebar/services-sidebar/a', null, $get_rds_template_data_array); 
            // }
            if ($this->variationIsset) {
                get_template_part('global-templates/fullwidth-cta/service-subpage/'.$args['page_templates']['service_subpage']['financing']['variation'], null, $args);
            }else{
             get_template_part('global-templates/fullwidth-cta/service-subpage/'.$this->singleVariation, null, $args);
        }
    }
}
