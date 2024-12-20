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
class RDS_Blog_Financing_Widget extends Widget_Base {

    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->blogsidebarfinancing_array = json_decode(get_option('rds_template'), TRUE);
        $blogsidebarfinancings = $this->blogsidebarfinancing_array['page_templates']['blog']['sidebar']['financing'];
        $this->blogsidebarfinancing = $blogsidebarfinancings;
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
        return 'rds-global-blogsidebar-financing-widget';
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

    private $blogsidebarfinancing_array = "";
    private $blogsidebarfinancing = "";

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
        return esc_html__('Blog Sidebar Financing Widget', 'rds-global-blogsidebar-financing-widget');
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
        return ['Blog sidebar financing', 'tabs', 'toggle'];
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
                    'label' => esc_html__('Blog sidebar financing', 'rds-global-blogsidebar-financing-widget'),
                ]
        );
    
        $this->add_control(
                'heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->blogsidebarfinancing['heading'],
                )
        );

         $this->add_control(
                'subheading',
                array(
                    'label' => 'SubHeading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->blogsidebarfinancing['subheading'],
                )
        );

          $this->add_control(
                'button_text',
                array(
                    'label' => 'Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->blogsidebarfinancing['button_text'],
                )
        ); 

           $this->add_control(
                'button_link',
                array(
                    'label' => 'Button Link',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->blogsidebarfinancing['button_link'],
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
        $args = $this->blogsidebarfinancing_array;
       
        $args['page_templates']['blog']['sidebar']['financing']['heading'] = sanitize_text_field($settings['heading']);
        $args['page_templates']['blog']['sidebar']['financing']['subheading'] = sanitize_text_field($settings['subheading']);
        $args['page_templates']['blog']['sidebar']['financing']['button_text'] = sanitize_text_field($settings['button_text']);
        $args['page_templates']['blog']['sidebar']['financing']['button_link'] = sanitize_text_field($settings['button_link']);
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));

            get_template_part('global-templates/easy-financing/blog-sidebar/a', null, $args);
    }
}
