<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class RDS_Comfort_template_Widget extends Widget_Base {

    public function get_name() {
        return 'rds-global-template-comfort-widget';
    }

    public function get_title() {
        return esc_html__('Template Comfort Widget', 'rds-global-template-comfort-widget');
    }

    public function get_categories() {
        return ['rds-global-widgets'];
    }

    public function get_icon() {
        return 'eicon-tabs';
    }

    public function get_keywords() {
        return ['template comfort', 'tabs', 'toggle'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content', 'rds-global-template-comfort-widget'),
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'rds-global-template-comfort-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Comfort You Can Count On', 'rds-global-template-comfort-widget'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'subheading',
            [
                'label' => esc_html__('Subheading', 'rds-global-template-comfort-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Maintenance Plans', 'rds-global-template-comfort-widget'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => esc_html__('Content', 'rds-global-template-comfort-widget'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('A maintenance plan lowers the risks of premature HVAC system failure. Our maintenance plans consist of steps that help your HVAC system retain its efficiency. Through these plans, our technicians can diagnose problems and fix them on the spot. Here’s a quick overview of the roles our plans play:', 'rds-global-template-comfort-widget'),
                'show_label' => false,
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

     
        $args = array(
            'heading' => $settings['heading'],
            'subheading' => $settings['subheading'],
            'content' => $settings['content']
        );

        
        echo '<div class="rds-comfort-template-widget">';
        echo '<div class="content">';
        get_template_part('global-templates/comfort-you-can/homepage/a', null, $args);
        echo '</div>';
        echo '</div>';
    }
}
