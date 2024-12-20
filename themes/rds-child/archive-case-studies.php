<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$get_rds_template_data_array = rds_template();
?>
<main>
    <?php get_template_part('global-templates/subpage-hero/subpage-sidebar/b'); ?>
    <div class="w-100 d-block">
        <div class="d-flex flex-column">
            <div class="d-block order-1 order-lg-1">
                <!-- Subpage content area starts -->
                <div class="container-fluid pt-4 pb-lg-0 pb-4 my-2  px-lg-3 px-0 page_content">
                    <div class="container subpage_full_content pb-lg-5">
                        <div class="row pt-lg-4 pb-lg-4 ">
                            <div class="col-12">
                                <h1>Case Studies</h1>
                                <div class="row">
                                    <?php
                                    
                                    function get_subsite_url($subsite_id) {
                                        switch_to_blog($subsite_id);
                                        $subsite_url = get_site_url();
                                        restore_current_blog();
                                        return $subsite_url;
                                    }

                                    
                                    $all_posts = array();

                                    $blogid = get_current_blog_id();
                                    if ($blogid == 1) {
                                        
                                        $subsite_ids = array(3, 4);
                                        
                                        foreach ($subsite_ids as $subsite_id) {
                                            switch_to_blog($subsite_id);
                                            $subsite_url = get_subsite_url($subsite_id); 
                                            $subsite_posts = get_posts(array('post_type' => 'case-studies', 'posts_per_page' => -1));
                                            foreach ($subsite_posts as $post) {
                                                $post->subsite_url = $subsite_url; 
                                            }
                                            restore_current_blog();
                                            $all_posts = array_merge($all_posts, $subsite_posts);
                                        }
                                    } else {
                                       
                                        $subsite_url = get_subsite_url($blogid); 
                                        $subsite_posts = get_posts(array('post_type' => 'case-studies', 'posts_per_page' => 9));
                                        foreach ($subsite_posts as $post) {
                                            $post->subsite_url = $subsite_url; 
                                        }
                                        $all_posts = $subsite_posts;
                                    }

                                  
                                    foreach ($all_posts as $post) {
                                        $subsite_url = $post->subsite_url;
                                        $subsite_permalink = trailingslashit($subsite_url) . 'case-studies/' . $post->post_name;
                                        ?>
                                        <div class="col-lg-4 col-md-12 mb-4 pb-2 pt-4">
                                            <div class="card border-0 rounded-0 p-0 position-relative blogs h-100">
                                                <a href="<?php echo esc_url($subsite_permalink); ?>/" class="no_hover_underline no-underline">
                                                    <div class="blog_img_container mb-4"><img src="<?php echo post_content_first_image(); ?>" class="blog_img  img-fluid w-100" alt="blog-thumbnail" width="350" height="200"></div>
                                                    <div class="card-body px-0 py-0">
                                                        <h3 class="mb-0 pb-3 text_28 text_bold line_height_35"><?php echo esc_html($post->post_title); ?></h3>
                                                        <p>
                                                            <?php
                                                            $my_content = wp_strip_all_tags(get_the_excerpt());
                                                            $excerpt = wp_trim_words($my_content, 25);
                                                            echo $excerpt . '...';
                                                            ?>
                                                        </p>
                                                        <span class="no_hover_underline w-100 d-inline-flex align-items-center   mb-3 position-absolute lessthenfour blog_read_more_text_color" style="bottom: -40px">
                                                            <span class="continue blog_read_more_text_color text-uppercase text_18 line_height_23 text_semibold"> Keep Reading</span> <i class="bc_line_height_18 icon-chevron-right2 ms-1 position-relative "></i>
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mt-4 mb-4 mb-lg-0 pt-3 blog-page-pagination">
                                    <?php
                                        // echo paginate_links(array(
                                        //     'total'     => $custom_query->max_num_pages,
                                        //     'prev_text' => '<i class="icon-angles-left4"></i>',
                                        //     'next_text' => '<i class="icon-angles-right4"></i>',
                                        // ));
                                    understrap_pagination(['prev_text' => '<i class="icon-angles-left4"></i>',
                                    'next_text' => '<i class="icon-angles-right4"></i>']);
                                    wp_reset_query();
                                    ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Subpage content area ends -->
                </div>
            </div>
            <div class="order-5">
           <?php echo do_shortcode('[elementor-template id="13225"]'); ?>
            </div>
            
        </div>
    </div>
    <?php
           
            if ($get_rds_template_data_array['globals']['company_services']) {
                get_template_part('global-templates/affiliation/c', null, $get_rds_template_data_array);
            }
            ?>
</main>
<?php
get_footer();
