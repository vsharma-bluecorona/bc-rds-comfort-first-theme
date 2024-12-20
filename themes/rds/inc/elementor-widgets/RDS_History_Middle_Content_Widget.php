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
    class RDS_History_Middle_Content_Widget extends Widget_Base {

        public function __construct($data = array(), $args = null) {
            parent::__construct($data, $args);
            $this->historyContent_array = json_decode(get_option('rds_template'), TRUE);
            $historyContents = $this->historyContent_array['page_templates']['history_page'];
            $this->historyContent = $historyContents;
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
        return 'rds-global-history-middle-content-widget';
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

    private $historyContent_array = "";
    private $historyContent = "";

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
        return esc_html__('History Middle Content Widget', 'rds-global-history-middle-content-widget');
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
    * Retrieve historyContent  widget icon.
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
            'rds_global_historyContent_widget',
            [
                'label' => esc_html__('History Middle Content Widget', 'rds-global-history-middle-content-widget'),
            ]
        );


        $this->add_control(
            'middle_content',
            array(
                'label' => 'Middle Content',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => $this->historyContent['middle_content'],

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
        $args = $this->historyContent_array;

        $args['page_templates']['history_page']['middle_content'] = $settings['middle_content'];
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
        if (!empty($settings['middle_content'])) {
            get_template_part('global-templates/history/middle-content/a', null, $args);
        }
    }
}