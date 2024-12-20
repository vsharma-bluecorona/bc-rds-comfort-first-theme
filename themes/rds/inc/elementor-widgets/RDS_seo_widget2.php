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
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_seo_widget2 extends Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->seo_array = json_decode(get_option('rds_template'), TRUE);
        $seos = $this->seo_array['page_templates']['homepage']['seo_section'];
        $this->seo = $seos;
        $this->variationIsset = false;
            if (count($this->getFileVariations('seo-section')) > 1) {
                $this->variationIsset = true;
                $this->allVariation  = $this->getFileVariations('seo-section');
            }else{
                $this->singleVariation = array_keys($this->getFileVariations('seo-section'))[0];
            }
    }

    /**
     * Get widget name.
     *
     * Retrieve seo widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-template-seolanding-widget';
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

    private $seo_array = "";
    private $seo = "";

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
        return esc_html__('RDS SEO Landing Widget', 'rds-template-seolanding-widget');
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
        return ['seo', 'tabs', 'toggle'];
    }

    /**
     * Register seo template  widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {        
        $this->start_controls_section(
                'rds_seo_widget',
                [
                    'label' => esc_html__('Seo Template landing Widget', 'rds-seo-widget'),
                ]
        );

        if ($this->variationIsset) {
            $options = array();
            foreach ($this->allVariation as $key => $value) {
                $options[$key] = esc_html__($value, 'rds-template-seolanding-widget');
            }
            $this->add_control(
                'seo_variation',
                     array(
                        'label' => esc_html__('Variation', 'rds-template-seolanding-widget'),
                        'type' => Controls_Manager::SELECT,
                        'default' => __('', 'rds-template-seolanding-widget'),
                        'options' =>  $this->allVariation,
                     )
             ); 
        }
       
        $this->add_control(
                'heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => __('', 'rds-template-seolanding-widget'),
                )
        );
        $this->add_control(
                'subheading',
                array(
                    'label' => 'Sub Heading',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => __('', 'rds-template-seolanding-widget'),
                )
        );

        $this->add_control(
            'before_read_more_content',
            array(
                'label' => 'Description',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('', 'rds-template-seo-widget'),
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
        $args = array();
        $settings = $this->get_settings();
        if($this->variationIsset){
            $args['page_templates']['homepage']['seo_section']['variation'] = sanitize_text_field($settings['seo_variation']);
        }
        $args['page_templates']['homepage']['seo_section']['heading'] = sanitize_text_field($settings['heading']);
        $args['page_templates']['homepage']['seo_section']['subheading'] = sanitize_text_field($settings['subheading']);
        $args['page_templates']['homepage']['seo_section']['before_read_more_content'] = $settings['before_read_more_content'];

        if ($this->variationIsset) {
            get_template_part('global-templates/seo-section/'.$args['page_templates']['homepage']['seo_section']['variation'], null, $args);
        }else{
         get_template_part('global-templates/seo-section/'.$this->singleVariation, null, $args);
        }
        
            ?>

            <script type="text/javascript">
                jQuery(document).ready(function(){
                  function toggleColor(t, e) {
    var n = jQuery(t).data("open-color-class"),
        i = jQuery(t).data("close-color-class");
    (void 0 === n && void 0 === i) || ("toggle" != e ? (jQuery(t).find("span").addClass(i), jQuery(t).find("span").removeClass(n)) : (jQuery(t).find("span").toggleClass(n), jQuery(t).find("span").toggleClass(i)));
}

   jQuery(".bc_toggle_content").on("click", function (t) {
        t.preventDefault();
        var e = jQuery(this).data("toggle"),
            n = jQuery(this).data("toggle-group");
        toggleContent(e, this),
            void 0 !== n &&
                jQuery(".bc_toggle_content").each(function () {
                    var t = jQuery(this).data("toggle");
                    jQuery(this).data("toggle-group") == n && e != t && toggleContent(t, this, "hide");
                });
                function toggleContent(t, e, n) {
    (n && void 0 !== n) || (n = "toggle"), jQuery(t).animate({ height: n }, "slow");
    var i,
        t = jQuery(e).data("open-icon"),
        o = jQuery(e).data("close-icon");
    (void 0 !== t && void 0 !== o) || ((t = "icon-plus2"), (o = "icon-minus2")),
        "toggle" != n
            ? (jQuery(e).find("i").addClass(t), jQuery(e).find("i").removeClass(o), toggleColor(e, n))
            : ((i = jQuery(e).find("i").hasClass(t)),
              jQuery(e).find("i").toggleClass(t),
              jQuery(e).find("i").toggleClass(o),
              toggleColor(e, n),
              void 0 === (t = jQuery(e).children("span").html().trim()) ||
                  (i && -1 != t.search("read more") && jQuery(e).children("span").html(t.replace("read more", "read less")), i) ||
                  -1 == t.search("read less") ||
                  jQuery(e).children("span").html(t.replace("read less", "read more")));
}
    });

    jQuery(".bc_toggle_btn").on('click', function(e) {
            e.preventDefault();
            var currentPageUrl = window.location.href;
            var headerHeight = jQuery('header').height();
            var offsetValue = headerHeight + 30;
            if (jQuery(this).hasClass("bc_toggle_btn_closed")) {
                jQuery("html, body").animate({
                    scrollTop: jQuery(this).parent('.bc_homepage').offset().top - offsetValue
                }, 500);
                jQuery(this).removeClass("bc_toggle_btn_closed");
            } else {
                jQuery('html, body').animate({
                    scrollTop: jQuery(this).parent('.bc_homepage').offset().top - offsetValue
                }, 500);
                jQuery(this).addClass("bc_toggle_btn_closed");
            }
        });

                });
            </script>
        <?php 
    }

}