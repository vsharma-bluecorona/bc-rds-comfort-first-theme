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
class RDS_Service_Subpage_Banner_Widget extends Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->service_array = json_decode(get_option('rds_template'), TRUE);
        $services = $this->service_array['page_templates']['service_subpage']['banner'];
        $this->service = $services;
        $this->variationIsset = false;
        if (count($this->getFileVariations('subpage-hero/service-subpage')) > 1) {
            $this->variationIsset = true;
            $this->allVariation = $this->getFileVariations('subpage-hero/service-subpage');
        } else {
            $this->singleVariation = array_keys($this->getFileVariations('subpage-hero/service-subpage')) [0];
        }
    }
    /**
     * Get widget name.
     *
     * Retrieve service subpage banner widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-global-service-subpage-banner-widget';
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
    private $service_array = "";
    private $service = "";
    /**
     * Get widget title.
     *
     * Retrieve service subpage banner widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Service Subpage Banner Widget', 'rds-global-service-subpage-banner-widget');
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
     * Retrieve service subapge banner widget icon.
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
        return ['service', 'tabs', 'toggle'];
    }
    /**
     * Register subpage widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section('rds_global_service_subpage_banner_widget', ['label' => esc_html__('Global Service Subpage Banner Widget', 'rds-global-service-subpage-banner-widget'), ]);
        if ($this->variationIsset) {
            $this->add_control('variation', array('label' => esc_html__('Variation', 'rds-global-subpage-widget'), 'type' => Controls_Manager::SELECT, 'options' => $this->allVariation, 'default' => $this->service['variation'],));
        }
        $this->add_control('heading', array('label' => 'Heading', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => $this->service['heading'], 'condition' => ['variation' => 'a', ]));
        $this->add_control('subheading', array('label' => 'SubHeading', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => $this->service['subheading'], 'condition' => ['variation' => 'a', ]));
        $this->add_control('button_text', array('label' => 'Button Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => $this->service['button_text'], 'condition' => ['variation' => 'a', ]));
        $this->add_control('button_link', array('label' => 'Button Link', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => $this->service['button_link'], 'condition' => ['variation' => 'a', ]));
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
        $args = $this->service_array;
        $args['page_templates']['service_subpage']['banner']['heading'] = sanitize_text_field($settings['heading']);
        if ($this->variationIsset) {
            $args['page_templates']['service_subpage']['banner']['variation'] = sanitize_text_field($settings['variation']);
        }
        $args['page_templates']['service_subpage']['banner']['subheading'] = sanitize_text_field($settings['subheading']);
        $args['page_templates']['service_subpage']['banner']['button_text'] = sanitize_text_field($settings['button_text']);
        $args['page_templates']['service_subpage']['banner']['button_link'] = sanitize_text_field($settings['button_link']);
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
            if ($this->variationIsset) {
                get_template_part('global-templates/subpage-hero/service-subpage/' . $args['page_templates']['service_subpage']['banner']['variation'], null, $args);
            } else {
                get_template_part('global-templates/subpage-hero/service-subpage/' . $this->singleVariation, null, $args);
        }
    }
}
?>
<script type="text/javascript">
        function couponBannerButtonClick(attr) {
            var CouponTitle = jQuery(attr).siblings('.coupon_title').text();
            var CouponsubTitle = jQuery(attr).siblings('.coupon_subtitle').text();
            var Couponsubheading = jQuery(attr).siblings('.coupon_subtitle2 ').text();
            console.log(CouponTitle + " " + CouponsubTitle + " " + Couponsubheading)
            jQuery(".coupon-name").find('input:text').val(CouponTitle + " " + CouponsubTitle + " " + Couponsubheading);
            jQuery(".bc-promotion-title").text(CouponTitle + " " + CouponsubTitle + " " + Couponsubheading);
        }

    </script>