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
 * Thankyou style, showing only one item at a time.
 *
 * @since 1.0.0
 */
require_once (get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Thankyou extends Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->thankyou_arrya = json_decode(get_option('rds_template'), TRUE);
        $thankyou = $this->thankyou_arrya['page_templates']['thankyou_page'];
        $this->thankyou = $thankyou;
        $this->variationIsset = false;
        if (count($this->getFileVariations('thank-you')) > 1) {
            $this->variationIsset = true;
            $this->allVariation = $this->getFileVariations('thank-you');
        } else {
            $this->singleVariation = array_keys($this->getFileVariations('thank-you')) [0];
        }
    }

    /**
     * Get widget name.
     *
     * Retrieve thankyou widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-global-thankyou-widget';
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

    private $thankyou_arrya = "";
    private $thankyou = "";

    /**
     * Get widget title.
     *
     * Retrieve thankyou widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Thankyou Widget ', 'rds-global-thankyou-widget');
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
     * Retrieve thankyou widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-tags';
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
        return ['thankyou', 'tabs', 'toggle'];
    }

    /**
     * Register Gravity form lists.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access public
     */


    /**
     * Register thankyou widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
                'rds_global_thankyou_widget',
                [
                    'label' => esc_html__('Thankyou Widget', 'rds-global-thankyou-widget'),
                ]
        );

        $this->add_control(
			'show_promotions',
			[
				'label' => esc_html__( 'Enable Promotions', 'rds-global-thankyou-widget' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'rds-global-thankyou-widget' ),
				'label_off' => esc_html__( 'Hide', 'rds-global-thankyou-widget' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
       
          if ($this->variationIsset) {
        $this->add_control(
                'variation',
                [
                    'label' => esc_html__('Variation', 'rds-global-thankyou-widget'),
                    'type' => Controls_Manager::SELECT,
                    'options' => $this->allVariation,
                    'default' => $this->thankyou['variation'],
                ]
        );
        }
      
        $this->add_control(
            'middle_content',
            array(
                'label' => 'Middle Content',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => $this->thankyou['middle_content'],

            )
        );
        
        $this->add_control(
                'scroll_button_text',
                array(
                    'label' => 'Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->thankyou['scroll_button_text'],
                )
        );
        $this->add_control(
            'affiliation_heading',
            array(
                'label' => 'Affiliation Heading',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => $this->thankyou['affiliation_heading'],
            )
    );

   
        $this->add_control(
                'heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->thankyou['promotions']['heading'],
                )
        );
 
        $this->add_control(
                'content',
                array(
                    'label' => 'Content',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->thankyou['promotions']['content'],
                )
        );

  
       
        $this->add_control(
                'button_link',
                array(
                    'label' => 'Button link',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->thankyou['promotions']['button_link'],
                )
        );
        $this->add_control(
            'button_text',
            array(
                'label' => 'Button Text',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => $this->thankyou['promotions']['button_text'],
            )
    );
        $this->end_controls_section();
    }

    /**
     * Render thankyou widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings();
        $args = $this->thankyou_arrya;
        // $widget_id = $this->get_id();
        if ($this->variationIsset) {
            $args['page_templates']['thankyou_page']['variation'] = sanitize_text_field($settings['variation']);
        }
        $args['page_templates']['thankyou_page']['show_promotions'] = $settings['show_promotions'] ? true : false;
        $args['page_templates']['thankyou_page']['middle_content'] = $settings['middle_content'];
        $args['page_templates']['thankyou_page']['scroll_button_text'] = sanitize_text_field($settings['scroll_button_text']);
        $args['page_templates']['thankyou_page']['affiliation_heading'] = sanitize_text_field($settings['affiliation_heading']);
        $args['page_templates']['thankyou_page']['promotions']['heading'] = sanitize_text_field($settings['heading']);
        $args['page_templates']['thankyou_page']['promotions']['content'] = sanitize_text_field($settings['content']);
        $args['page_templates']['thankyou_page']['promotions']['button_text'] = sanitize_text_field($settings['button_text']);
        $args['page_templates']['thankyou_page']['promotions']['button_link'] = sanitize_text_field($settings['button_link']);

        $variation = sanitize_text_field($settings['variation']);
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template')); 
             if ($this->variationIsset) {
                get_template_part('global-templates/thank-you/' . $args['page_templates']['thankyou_page']['variation'], null, $args);
            } else {
                get_template_part('global-templates/thank-you/' . $this->singleVariation, null, $args);
            
         }
    }
} 