<?php

class RDS_Accordion_Widget extends \Elementor\Widget_Base {

    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);

        // Enqueue required scripts and stylesheets
        wp_enqueue_script('jquery-ui-accordion');
    }

    public function get_categories() {
        return ['rds-global-widgets'];
    }

    public function get_name() {
        return 'rds-accordion-widget';
    }

    public function get_title() {
        return 'RDS Accordion';
    }

    public function get_icon() {
        return 'eicon-tabs';
    }

    protected function render() {
        $settings = $this->get_settings();
        $accordion = "";
        if (!empty($settings['accordion_items'])) {?>
            <div class="container-fluid pb-5" >
                <div class="container career_faq">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php foreach ($settings['accordion_items'] as $item) {
                                 if (!empty($item['item_title']) && !empty($item['item_content'])) {
                                $accordion .= '[bc_card title="' . $item['item_title'] . '"] ' . $item['item_content'] . '[/bc_card]';

                            }
                            }
                            echo do_shortcode('[bc_accordion]' . $accordion . '[/bc_accordion]'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (!is_admin() && !defined('DOING_AJAX')) {
        }else{ ?>
            <script>
        jQuery(document).ready(function () {
            jQuery('.accordion').on('show.bs.collapse', function (e) {
                toggleIcon(e.target);
            });
            jQuery('.accordion').on('hidden.bs.collapse', function (e) {
                toggleIcon(e.target);
            });
        });
        function toggleIcon(target) {
            var target = jQuery(target).parent('.accordion-item').find('i');
            target.toggleClass('icon-chevron-up4');
            target.toggleClass('icon-chevron-down4');
        }
    </script>
       <?php  }
        }
    }

    protected function _register_controls() {
        $this->start_controls_section(
                'accordion_section',
                array(
                    'label' => __('Accordion Template Widget', 'rds-accordion-widget'),
                )
        );

        $this->add_control(
                'accordion_items',
                array(
                    'label' => __('Accordion Items', 'rds-accordion-widget'),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => array(
                        array(
                            'name' => 'item_title',
                            'label' => __('Title', 'rds-accordion-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __('', 'rds-accordion-widget'),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'item_content',
                            'label' => __('Content', 'rds-accordion-widget'),
                            'type' => \Elementor\Controls_Manager::WYSIWYG,
                            'default' => __('', 'rds-accordion-widget'),
                            'label_block' => true,
                        ),
                    // Add more fields for each item property (e.g., content)
                    ),
                    'default' => array(
                        array(
                            'item_title' => __('Item ', 'rds-accordion-widget'),
                            'item_content' => __('Content ', 'rds-accordion-widget'),
                        // Set default values for each item property
                        ),
                    ),
                    'title_field' => '{{{ item_title }}}', // Field to be used as the title in the editor
                    'content_field' => '{{{ item_content }}}',
                )
        );

        $this->end_controls_section();
    }

}
