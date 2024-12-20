<?php
/**
 * Template Name: Careers Template
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$args = rds_template();
?>
<main>
	<?php
	if (have_posts()) :
		while (have_posts()) : the_post();
			the_content();
		endwhile;
	endif;
	?>
	    <?php if ($args['page_templates']['career_page']['faq'] && $args['page_templates']['career_page']['faq']['enable']) { ?>
        <!-- Faq Start --> 
        <div class="container-fluid pb-5" >
            <div class="container career_faq">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="pb-3"><?php echo $args['page_templates']['career_page']['faq']['heading'] ?></h4>
                        <?php
                        $faqData = $args['page_templates']['career_page']['faq']['data'];
                        $accordion = '';
                        foreach ($faqData as $value) {
                            $accordion .= '[bc_card title="' . $value['question'] . '"] ' . $value['content'] . '[/bc_card]';
                        }
                        ?>
                        <?php echo do_shortcode('[bc_accordion]' . $accordion . '[/bc_accordion]'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Faq End -->
    <?php } ?>
	<div class="container-fluid">
		<div class="container">
			<?php
			get_template_part('global-templates/careers/gallery/a', null, $args);
			?>
		</div>
	</div>
</main>
<?php 

get_footer(); ?>