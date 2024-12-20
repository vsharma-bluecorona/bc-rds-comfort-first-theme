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
//require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Giving_Back_template_Widget extends Widget_Base {
    

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
        return 'rds-global-template-giving-back-widget';
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

    // private $subpagesidebarfinancing_array = "";
    // private $subpagesidebarfinancing = "";

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
        return esc_html__('Template Giving Back  Widget', 'rds-global-template-giving-back-widget');
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
        return ['template giving back', 'tabs', 'toggle'];
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
                'rds_global_giving_back_template_widget',
                [
                    'label' => esc_html__('Global Giving Back Template Widget ', 'rds-global-template-giving-back-widget'),
                ]
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
       
             get_template_part('global-templates/giving-back/homepage/a');
            } 
    
}
