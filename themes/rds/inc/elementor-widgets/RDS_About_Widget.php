<?php
//namespace Elementor;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Text_Shadow;
//use Elementor\Utils;
use Elementor\Icons_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor accordion widget.
 *
 * Elementor widget that displays a collapsible display of content in an
 * request service style, showing only one item at a time.
 *
 * @since 1.0.0
 */
class RDS_About_Widget extends Widget_Base {

    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->about_array = json_decode(get_option('rds_template'), TRUE);
        $abouts = $this->about_array['page_templates']['about_us_page'];
        $this->about = $abouts;
    }


    /**
     * Get widget name.
     *
     * Retrieve about widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-template-about-widget';
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

    private $about_array = "";
    private $about = "";

    /**
     * Get widget title.
     *
     * Retrieve about widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('About Us Template', 'rds-template-about-widget');
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
        return ['rds-template-widgets'];
    }

    /**
     * Get widget icon.
     *
     * Retrieve about  widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-site-identity';
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
        return ['about', 'tabs', 'toggle'];
    }

  

    /**
     * Register history template  widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {        
        $this->start_controls_section(
                'rds_about_widget',
                [
                    'label' => esc_html__('About Us Template Widget', 'rds-about-widget'),
                ]
        );
        $this->add_control(
                'checkbox_value',
                array(
                    'name' => 'enable',
                    'label' => 'Enable Section',
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => 'Yes',
                    'label_off' => 'No',
                    'return_value' => isset($this->about['enable'])?"yes":"",
                    'default' => 'yes',
                )
        );
          $this->add_control(
                'variation',
                [
                    'label' => esc_html__('Variation', 'rds-template-about-widget'),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'a' => esc_html__('A', 'rds-template-about-widget'),
                        'b' => esc_html__('B', 'rds-template-about-widget'),
                        'c' => esc_html__('C', 'rds-template-about-widget'),
                        'd' => esc_html__('D', 'rds-template-about-widget'),
                        
                    ],
                    'default' => $this->about['variation'],
                ]
        );
       
        $this->add_control(
                'seo_heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => $this->about['seo_section']['heading'],
                )
        );
        $this->add_control(
                'seo_subheading',
                array(
                    'label' => 'Sub Heading',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => $this->about['seo_section']['subheading'],
                )
        );

        $this->add_control(
                'seo_before_read_more',
                array(
                    'label' => 'Description',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => $this->about['seo_section']['before_read_more_content'],
                )
        );
        $this->add_control(
                'seo_after_read_more',
                array(
                    'label' => 'More description with Read more...',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => $this->about['seo_section']['after_read_more_content'],
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
        $args = json_decode(get_option('rds_template'), TRUE);
        $settings = $this->get_settings();

        $args['page_templates']['about_us_page']['enable'] = sanitize_text_field($settings['checkbox_value']) ? true : false;

        $args['page_templates']['about_us_page']['variation'] = sanitize_text_field($settings['variation']);
        $args['page_templates']['about_us_page']['seo_section']['heading'] = sanitize_text_field($settings['seo_heading']);
        $args['page_templates']['about_us_page']['seo_section']['subheading'] = sanitize_text_field($settings['seo_subheading']);
        $args['page_templates']['about_us_page']['seo_section']['before_read_more_content'] = sanitize_text_field($settings['seo_before_read_more']);
        $args['page_templates']['about_us_page']['seo_section']['after_read_more_content'] = sanitize_text_field($settings['seo_after_read_more']);
        
        //Update template spec file
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
        //Display content
        if ($settings['checkbox_value']) {
            get_template_part('global-templates/about-us/'.$settings['variation'], null, $args);
         }
    }

    /**
     * Render request widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 2.9.0
     * @access protected
     */
}


use ElementorPro\Modules\ThemeBuilder\Conditions\Condition_Base;

add_action('elementor/theme/register_conditions', function ($conditions_manager) {
    class Page_Template_Condition extends Condition_Base {
        public static function get_type() {
            return 'page_template';
        }

        public function get_name() {
            return 'page_template';
        }

        public static function get_priority() {
            return 30;
        }

        public function get_label() {
            return __('Page Template', 'your-text-domain'); // Change 'your-text-domain' to your theme's text domain.
        }

        public function check($args) {
            // Check if the current page uses the specified page template.
            if (is_page_template($args['id'])) {
                return true;
            }

            return false;
        }

        protected function _register_controls() {
            $this->add_control(
                'page_template',
                [
                    'label' => __('Page Template', 'your-text-domain'), // Change 'your-text-domain' to your theme's text domain.
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => get_page_templates(),
                ]
            );
        }
    }

    $conditions_manager->register_condition(new Page_Template_Condition());
}, 100);