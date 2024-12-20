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
    class RDS_History_CTA_Widget extends Widget_Base {

        public function __construct($data = array(), $args = null) {
            parent::__construct($data, $args);
            $this->historyCTA_array = json_decode(get_option('rds_template'), TRUE);
            $historyCTAs = $this->historyCTA_array['page_templates']['history_page']['in_content_cta'];
            $this->historyCTA = $historyCTAs;
        }

    /**
    * Get widget name.
    *
    * Retrieve About Middle content widget name.
    *
    * @since 1.0.0
    * @access public
    *
    * @return string Widget name.
    */
    public function get_name() {
        return 'rds-global-history-cta-widget';
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

    private $historyCTA_array = "";
    private $historyCTA = "";

    /**
    * Get widget title.
    *
    * Retrieve About Middle content widget title.
    *
    * @since 1.0.0
    * @access public
    *
    * @return string Widget title.
    */
    public function get_title() {
        return esc_html__('History In Content CTA Widget', 'rds-global-history-cta-widget');
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
    * Retrieve historyCTA  widget icon.
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
        return ['about middle content widget ', 'tabs', 'toggle'];
    }


    /**
    * Register About Middle content widget controls.
    *
    * Adds different input fields to allow the user to change and customize the widget settings.
    *
    * @since 3.1.0
    * @access protected
    */
    protected function register_controls() {
        $this->start_controls_section(
            'rds_global_historyCTA_widget',
            [
                'label' => esc_html__('History In Content CTA Widget', 'rds-global-history-cta-widget'),
            ]
        );


        $this->add_control(
            'heading',
            array(
                'label' => 'Heading',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => $this->historyCTA['heading'],

            )
        );

         $this->add_control(
            'button_text',
            array(
                'label' => 'Button Text',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => $this->historyCTA['button_text'],

            )
        );

          $this->add_control(
            'button_link',
            array(
                'label' => 'Button Link',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => $this->historyCTA['button_link'],
                'condition' => [
                         'button_text!' => '',
                    ]

            )
        );

        $this->end_controls_section();

    }

    /**
    * Render About Middle Content widget output on the frontend.
    *
    * Written in PHP and used to generate the final HTML.
    *
    * @since 1.0.0
    * @access protected
    */
    protected function render() {
        $settings = $this->get_settings();
        $args = $this->historyCTA_array;
        $args['page_templates']['history_page']['in_content_cta']['heading'] = $settings['heading'];
        $args['page_templates']['history_page']['in_content_cta']['button_text'] = $settings['button_text'];
        $args['page_templates']['history_page']['in_content_cta']['button_link'] = $settings['button_link'];
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
        if (!empty($settings['heading'])) {
            get_template_part('global-templates/history/cta/a', null, $args);
        }
    }
}