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
 * request service style, showing only one item at a time.
 *
 * @since 1.0.0
 */
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Subpagesidebar_Request_Widget extends Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->subpagesidebarrequest_array = json_decode(get_option('rds_template'), TRUE);
        $subpagesidebarrequests = $this->subpagesidebarrequest_array['page_templates']['subpage']['sidebar']['request_service'];
        $this->subpagesidebarrequest = $subpagesidebarrequests;
        $this->variationIsset = false;
        if (count($this->getFileVariations('form/subpage')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('form/subpage');
        }else{
            $this->singleVariation = array_keys($this->getFileVariations('form/subpage'))[0];
        }
    }

    /**
     * Get widget name.
     *
     * Retrieve subpagesidebar request widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-global-subpagesidebar-request-widget';
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

    private $subpagesidebarrequest_array = "";
    private $subpagesidebarrequest = "";

    /**
     * Get widget title.
     *
     * Retrieve subpagesidebar request  widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Subpagesidebar Request Service Widget', 'rds-global-subpagesidebar-request-widget');
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
     * Retrieve subpagesidebar request  widget icon.
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
        return ['subpagesidebar request', 'tabs', 'toggle'];
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
     * Register subpagesidebarrequest widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
                'rds_global_subpagesidebar_request_widget',
                [
                    'label' => esc_html__('Global Request Service Subpage Sidebar', 'rds-global-subpagesidebar-request-widget'),
                ]
        );
        
        if ($this->variationIsset) {
            $this->add_control(
                     'variation',
                     array(
                        'label' => esc_html__('Variation', 'rds-global-subpagesidebar-request-widget'),
                        'type' => Controls_Manager::SELECT,
                        'default' => $this->subpagesidebarrequest['variation'],
                        'options' =>  $this->allVariation,
                     )
             ); 
         }
        $this->add_control(
                'heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->subpagesidebarrequest['heading'],
                )
        );

          $this->add_control(
                'subheading',
                array(
                    'label' => 'SubHeading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->subpagesidebarrequest['subheading'],
                )
        );

         $Form_list = $this->get_gravity_forms_list();
                $this->add_control(
                        'gravity_form_id',
                        array(
                            'label' => 'Gravity Forms',
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => $Form_list,
                            'default' => $this->subpagesidebarrequest['gravity_form_id'],
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
        $args = $this->subpagesidebarrequest_array;
        if($this->variationIsset){
            $args['page_templates']['subpage']['sidebar']['request_service']['variation'] = sanitize_text_field($settings['variation']);
        }
        $args['page_templates']['subpage']['sidebar']['request_service']['heading'] = sanitize_text_field($settings['heading']);
        $args['page_templates']['subpage']['sidebar']['request_service']['variation'] = sanitize_text_field($settings['variation']);
        $args['page_templates']['subpage']['sidebar']['request_service']['subheading'] = sanitize_text_field($settings['subheading']);
        $args['page_templates']['subpage']['sidebar']['request_service']['gravity_form_id'] = sanitize_text_field($settings['gravity_form_id']);
       
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
            if ($this->variationIsset) {
                get_template_part('global-templates/form/subpage/'.$args['page_templates']['subpage']['sidebar']['request_service']['variation'], null, $args);
            }else{
             get_template_part('global-templates/form/subpage/'.$this->singleVariation, null, $args);
        }
    }
}
