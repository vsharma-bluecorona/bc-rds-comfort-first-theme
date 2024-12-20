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
class RDS_Subpagesidebar_Financing_Widget extends Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->subpagesidebarfinancing_array = json_decode(get_option('rds_template'), TRUE);
        $subpagesidebarfinancings = $this->subpagesidebarfinancing_array['page_templates']['subpage']['sidebar']['financing'];
        $this->subpagesidebarfinancing = $subpagesidebarfinancings;
        $this->variationIsset = false;
            if (count($this->getFileVariations('easy-financing/subpage-sidebar')) > 1) {
                $this->variationIsset = true;
                $this->allVariation  = $this->getFileVariations('easy-financing/subpage-sidebar');
            }else{
                $this->singleVariation = array_keys($this->getFileVariations('easy-financing/subpage-sidebar'))[0];
            }
    }

    /**
     * Get widget name.
     *
     * Retrieve subpagesidebar financing widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-global-subpagesidebar-financing-widget';
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

    private $subpagesidebarfinancing_array = "";
    private $subpagesidebarfinancing = "";

    /**
     * Get widget title.
     *
     * Retrieve subpagesidebar financing  widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Subpagesidebar Financing  Widget', 'rds-global-subpagesidebar-financing-widget');
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
     * Retrieve subpagesidebar financing  widget icon.
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
        return ['subpagesidebar financing', 'tabs', 'toggle'];
    }

    /**
     * Register subpagesidebarfinancing widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
                'rds_global_subpagesidebar_financing_widget',
                [
                    'label' => esc_html__('Global Financing Subpage Sidebar ', 'rds-global-subpagesidebar-financing-widget'),
                ]
        );

        if ($this->variationIsset) {
            $this->add_control(
                     'variation',
                     array(
                         'label' => 'Variation',
                         'type' => \Elementor\Controls_Manager::SELECT,
                         'default' => $this->subpagesidebarfinancing['variation'],
                         'options' =>  $this->allVariation,
                     )
             ); 
        }

        $this->add_control(
                'heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->subpagesidebarfinancing['heading'],
                )
        );

         $this->add_control(
                'subheading',
                array(
                    'label' => 'SubHeading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->subpagesidebarfinancing['subheading'],
                )
        );

          $this->add_control(
                'button_text',
                array(
                    'label' => 'Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->subpagesidebarfinancing['button_text'],
                )
        ); 

           $this->add_control(
                'button_link',
                array(
                    'label' => 'Button Link',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->subpagesidebarfinancing['button_link'],
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
        $args = $this->subpagesidebarfinancing_array;
        if($this->variationIsset){
            $args['page_templates']['subpage']['sidebar']['financing']['variation'] = sanitize_text_field($settings['variation']);
        }
        $args['page_templates']['subpage']['sidebar']['financing']['heading'] = sanitize_text_field($settings['heading']);
        $args['page_templates']['subpage']['sidebar']['financing']['subheading'] = sanitize_text_field($settings['subheading']);
        $args['page_templates']['subpage']['sidebar']['financing']['button_text'] = sanitize_text_field($settings['button_text']);

        $args['page_templates']['subpage']['sidebar']['financing']['button_link'] = sanitize_text_field($settings['button_link']);
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
            if ($this->variationIsset) {
                get_template_part('global-templates/easy-financing/subpage-sidebar/'.$args['page_templates']['subpage']['sidebar']['financing']['variation'], null, $args);
            }else{
             get_template_part('global-templates/easy-financing/subpage-sidebar/'.$this->singleVariation, null, $args);
            } 
    }
}
