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
class RDS_Subpagesidebar_Widget extends Widget_Base {

    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->subpagesidebar_array = json_decode(get_option('rds_template'), TRUE);
        $subpagesidebars = $this->subpagesidebar_array['page_templates']['subpage']['sidebar']['banner'];
        $this->subpagesidebar = $subpagesidebars;
    }

    /**
     * Get widget name.
     *
     * Retrieve subpagesidebar widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-global-subpagesidebar-widget';
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

    private $subpagesidebar_array = "";
    private $subpagesidebar = "";

    /**
     * Get widget title.
     *
     * Retrieve subpagesidebar  widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Subpagesidebar Banner Widget', 'rds-global-subpagesidebar-widget');
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
     * Retrieve subpagesidebar  widget icon.
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
        return ['subpagesidebar ', 'tabs', 'toggle'];
    }

    
    /**
     * Register subpagesidebar widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
                'rds_global_subpagesidebar_widget',
                [
                    'label' => esc_html__('Global Subpagesidebar Banner Widget', 'rds-global-subpagesidebar-widget'),
                ]
        );
    
        $this->add_control(
                'variation',
                [
                    'label' => esc_html__('Variation', 'rds-global-subpagesidebar-widget'),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'a' => esc_html__('A', 'rds-global-subpagesidebar-widget'),
                        'b' => esc_html__('B', 'rds-global-subpagesidebar-widget'),
                        'c' => esc_html__('C', 'rds-global-subpagesidebar-widget'),
                        'd' => esc_html__('D', 'rds-global-subpagesidebar-widget'),
                        
                    ],
                    'default' => $this->subpagesidebar['variation'],
                ]
        );
        $this->add_control(
                'heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->subpagesidebar['heading'],
                    'condition' => [
                        'variation' => ['a', 'e'],
                    ]
                )
        );

          $this->add_control(
                'subheading',
                array(
                    'label' => 'SubHeading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->subpagesidebar['subheading'],
                    'condition' => [
                        'variation' => ['a', 'e'],
                    ]
                )
        );

        //   $this->add_control(
        //         'content',
        //         array(
        //             'label' => 'Content',
        //             'type' => \Elementor\Controls_Manager::TEXTAREA,
        //             'default' => $this->subpagesidebar['content'],
        //             'condition' => [
        //                 'variation' => 'e',
        //             ]
        //         )
        // );

          $this->add_control(
                'button_text',
                array(
                    'label' => 'Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->subpagesidebar['button_text'],
                    'condition' => [
                        'variation' => ['a', 'e'],
                    ]
                )
        );

          $this->add_control(
                'button_link',
                array(
                    'label' => 'Button Link',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->subpagesidebar['button_link'],
                    'condition' => [
                        'variation' => ['a', 'e'],
                    ]
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
        $args = $this->subpagesidebar_array;
       
        $args['page_templates']['subpage']['sidebar']['banner']['heading'] = sanitize_text_field($settings['heading']);
        $args['page_templates']['subpage']['sidebar']['banner']['variation'] = sanitize_text_field($settings['variation']);
        $args['page_templates']['subpage']['sidebar']['banner']['subheading'] = sanitize_text_field($settings['subheading']);
        $args['page_templates']['subpage']['sidebar']['banner']['button_text'] = sanitize_text_field($settings['button_text']);
        $args['page_templates']['subpage']['sidebar']['banner']['button_link'] = sanitize_text_field($settings['button_link']);
        // $args['page_templates']['subpage']['sidebar']['banner']['content'] = $settings['content'];
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
       get_template_part('global-templates/subpage-hero/subpage-sidebar/'.$settings['variation'], null, $args);
    }
}
