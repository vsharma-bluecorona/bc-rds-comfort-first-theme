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
require_once (get_template_directory() . '/inc/custom-widget-function.php');
class RDS_We_are_hiring_Widget extends Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->we_are_array = json_decode(get_option('rds_template'), TRUE);
        $we_ares = $this->we_are_array['page_templates']['homepage']['we_are_hiring'];
        $this->we_are = $we_ares;
        $this->variationIsset = false;
        if (count($this->getFileVariations('we-are-hiring')) > 1) {
            $this->variationIsset = true;
            $this->allVariation = $this->getFileVariations('we-are-hiring');
        } else {
            $this->singleVariation = array_keys($this->getFileVariations('we-are-hiring')) [0];
        }
    }
    /**
     * Get widget name.
     *
     * Retrieve we_are widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-global-we-are-hiring-widget';
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
    private $we_are_array = "";
    private $we_are = "";
    // private $variationKey = '';
    
    /**
     * Get widget title.
     *
     * Retrieve we are hiring  service widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('We Are Hiring ', 'rds-global-we-are-hiring-widget');
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
     * Retrieve company service  widget icon.
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
        return ['company service', 'tabs', 'toggle'];
    }
    /**
     * Register company service  widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section('rds_global_company_service_widget', ['label' => esc_html__('Global We Are Hiring Widget', 'rds-global-we-are-hiring-widget'), ]);
        if ($this->variationIsset) {
            $this->add_control('variation', array('label' => 'Variation', 'type' => \Elementor\Controls_Manager::SELECT, 'default' => $this->we_are['variation'], 'options' => $this->allVariation,));
        }
        $this->add_control('heading', array('label' => 'Heading', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => $this->we_are['heading'],));
        $this->add_control('subheading', array('label' => 'SubHeading', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => $this->we_are['subheading'],));
        $this->add_control('button_text', array('label' => 'Button Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => $this->we_are['button_text'],));
        $this->add_control('button_link', array('label' => 'Button Link', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => $this->we_are['button_link'],));
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
        $args = $this->we_are_array;
        if ($this->variationIsset) {
            $args['page_templates']['homepage']['we_are_hiring']['variation'] = sanitize_text_field($settings['variation']);
        }
        $args['page_templates']['homepage']['we_are_hiring']['heading'] = sanitize_text_field($settings['heading']);
        $args['page_templates']['homepage']['we_are_hiring']['subheading'] = sanitize_text_field($settings['subheading']);
        $args['page_templates']['homepage']['we_are_hiring']['button_text'] = sanitize_text_field($settings['button_text']);
        $args['page_templates']['homepage']['we_are_hiring']['button_link'] = sanitize_text_field($settings['button_link']);
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
            if ($this->variationIsset) {
                get_template_part('global-templates/we-are-hiring/' . $args['page_templates']['homepage']['we_are_hiring']['variation'], null, $args);
            } else {
                get_template_part('global-templates/we-are-hiring/' . $this->singleVariation, null, $args);
            }
    }
}
