<?php
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Financing_CTA_Widget extends \Elementor\Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->variationIsset = false;

         if (count($this->getFileVariations('fullwidth-cta/service-subpage')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('fullwidth-cta/service-subpage');
         }else{
            $this->singleVariation = array_keys($this->getFileVariations('fullwidth-cta/service-subpage'))[0];
         }
        // Enqueue required scripts and stylesheets
        wp_enqueue_script('jquery-ui-accordion');
    }

    public function get_categories() {
        return ['rds-global-widgets'];
    }

    public function get_name() {
        return 'rds-financing-cta-widget';
    }

    public function get_title() {
        return 'Financing CTA';
    }

    public function get_icon() {
        return 'eicon-call-to-action';
    }

    public function render() {
        $args = array();if(is_admin()){$args = json_decode(get_option('rds_template'), TRUE);}

        $settings = $this->get_settings();

        if (!empty($settings) && is_array($settings)) {
             if($this->variationIsset){
            $args['page_templates']['service_subpage']['financing']['variation'] = sanitize_text_field($settings['variation']);
          }
            $button_link = isset($settings['button_link']) ? sanitize_text_field($settings['button_link']) : "";
            $args['page_templates']['service_subpage']['financing']['button_link'] = $button_link;
            $args['page_templates']['service_subpage']['financing']['heading'] = sanitize_text_field($settings['heading']);
            $args['page_templates']['service_subpage']['financing']['subheading'] = sanitize_text_field($settings['subheading']);
            $args['page_templates']['service_subpage']['financing']['button_text'] = sanitize_text_field($settings['button_text']);
            $variation = sanitize_text_field($settings['variation']);
            $args['page_templates']['service_subpage']['financing']['heading_tag'] = sanitize_text_field($settings['heading_tag']);
            $args['page_templates']['service_subpage']['financing']['subheading_tag'] = sanitize_text_field($settings['subheading_tag']);
            if(is_admin()){    
            //Update template spec file
            global $wpdb;
            $tableName = $wpdb->prefix . 'options';
            $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            $result = $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
            }
            //Display content
            $call_back = "rds_variation_" . $variation . "_html";
                  if ($this->variationIsset) {
                get_template_part('global-templates/fullwidth-cta/service-subpage/'.$args['page_templates']['service_subpage']['financing']['variation'], null, $args);
            }else{
             get_template_part('global-templates/fullwidth-cta/service-subpage/'.$this->singleVariation, null, $args);
            }
        }
    }

    public function _register_controls() {
        $args = json_decode(get_option('rds_template'), TRUE);
        $financing_cta = $args['page_templates']['service_subpage']['financing'];
        $this->start_controls_section(
                'rds_financing_cta',
                array(
                    'label' => __('Financing CTA', 'rds-financing-cta-widget'),
                )
        );
        $this->add_control(
                'heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $financing_cta['heading'],
                )
        );
        $this->add_control(
                'heading_tag',
                array(
                    'label' => 'Heading Tag',
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => array(
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                        'span' => 'span',
                        'p' => 'p',
                    ),
                    'default' => 'h2',
                )
        );
        $this->add_control(
                'subheading',
                array(
                    'label' => 'Subheading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $financing_cta['subheading'],
                )
        );
        $this->add_control(
                'subheading_tag',
                array(
                    'label' => 'Sub Heading Tag',
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => array(
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                        'span' => 'span',
                        'p' => 'p',
                    ),
                    'default' => 'h4',
                )
        );
        if ($this->variationIsset) {
            $this->add_control(
                    'variation',
                    array(
                        'label' => 'Variation',
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => $financing_cta['variation'],
                        'options' => $this->allVariation,
                    )
            );
        }

        $this->add_control(
                'button_link',
                array(
                    'label' => 'Button Link',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => $financing_cta['button_link'],
                    'default' => $financing_cta['button_link']
                )
        );

        $this->add_control(
                'button_text',
                array(
                    'label' => 'Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $financing_cta['button_text'],
                )
        );
        $this->end_controls_section();
    }

}