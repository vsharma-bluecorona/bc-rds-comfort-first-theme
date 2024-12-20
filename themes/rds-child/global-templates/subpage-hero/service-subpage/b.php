<?php
            //exaple how to set image sizewise
            // ['dektop', 'ipad', 'mobile']

              $img1x = [
                get_exist_image_url('subpage-hero', 'D-subpage-banner'),
                get_exist_image_url('subpage-hero', 'D-subpage-banner'),
                get_exist_image_url('subpage-hero', 'mob-subpage-banner')
            ];
            
            $img2x = [
                get_exist_image_url('subpage-hero', 'D-subpage-banner@2x'),
                get_exist_image_url('subpage-hero', 'D-subpage-banner@2x'),
                get_exist_image_url('subpage-hero', 'mob-subpage-banner@2x')
            ];
            
            $img3x = [
                get_exist_image_url('subpage-hero', 'D-subpage-banner@3x'),
                get_exist_image_url('subpage-hero', 'D-subpage-banner@3x'),
                get_exist_image_url('subpage-hero', 'mob-subpage-banner@3x')
            ];
 if (is_page() && strpos($_SERVER['REQUEST_URI'], 'fall-bogo-special') !== false) {
            $img1x = [
                get_exist_image_url('subpage-hero/bogo', 'subpage-banner'),
                get_exist_image_url('subpage-hero/bogo', 'subpage-banner'),
                get_exist_image_url('subpage-hero/bogo', 'm-subpage-banner')
            ];
            
            $img2x = [
                get_exist_image_url('subpage-hero/bogo', 'subpage-banner@2x'),
                get_exist_image_url('subpage-hero/bogo', 'subpage-banner@2x'),
                get_exist_image_url('subpage-hero/bogo', 'm-subpage-banner@2x')
            ];
            
            $img3x = [
                get_exist_image_url('subpage-hero/bogo', 'subpage-banner@3x'),
                get_exist_image_url('subpage-hero/bogo', 'subpage-banner@3x'),
                get_exist_image_url('subpage-hero/bogo', 'm-subpage-banner@3x')
            ];

        }
			$img1x = Implode(',', $img1x);
			$img2x = Implode(',', $img2x);
			$img3x = Implode(',', $img3x);

        ?>
 <?php echo do_shortcode('[custom-bg-srcset class="subpage_banner" img1x="'.$img1x.'" img2x="'.$img2x.'" img3x="'.$img3x.'" size1x="cover" size2x="cover" size3x="cover"]'); ?>
<div class="container-fluid subpage_banner py-5">
    <div class="container px-0 py-lg-1">
        <div class="row py-2 py-lg-4 mt-lg-1">
            <div class="col-md-10 offset-md-1 py-3 py-lg-5">  
            </div>
        </div>
    </div>
</div>