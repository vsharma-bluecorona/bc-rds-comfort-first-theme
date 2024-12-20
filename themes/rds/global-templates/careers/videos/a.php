<div class="row">
    <div class="col-lg-12">
        <h4 class="text-center pt-lg-2"><?php echo $args['page_templates']['career_page']['video']['heading']; ?></h4>
        <div class="swiper video-swiper py-md-5 mb-lg-0 mb-5 pt-3">
            <div class="swiper-wrapper py-md-5 mb-lg-0 mb-5">
                <?php $youtubeItems = $args['page_templates']['career_page']['video']['items']; 
                foreach ($youtubeItems as $value) {
                    echo'<div class="swiper-slide">
                            <iframe width="100%" height="205" src="'.$value['video_url'].'" title="YouTube video player" frameborder="0"  allowfullscreen></iframe>
                        </div>';
                } ?>
            </div>
            <div class="swiper-pagination career-video-pagination pagination-variation-a position-relative pb-lg-3 d-lg-none"></div>
            <div class="swiper-button-prev video_prev text_36 line_height_36 d-md-block d-block"><i class="icon-chevron-left1 true_black d-md-block d-block"></i></div>
            <div class="swiper-button-next video_next text_36 line_height_36 d-md-block d-block"><i class="icon-chevron-right1 true_black d-md-block d-block"></i></div>
        </div>
    </div>
</div>  
<script type="text/javascript">
      jQuery(document).ready(function(){
              var youtubeSwiper = new Swiper('.video-swiper', {
                loop:true,
                slidesPerView:1,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                centeredSlides: true,
                navigation: {
                  nextEl: '.swiper-button-next',
                  prevEl: '.swiper-button-prev',
                },
                pagination: {
                  el: ".career-video-pagination",
                  clickable: true,
                },
                breakpoints: {
                  640: {
                    slidesPerView: 1,
                  },
                  768: {
                    slidesPerView: 3,
                  },
                  
                },
                // function to stop youtube video on slidechange
                on: {
                    slideChange: function (el) {
                      jQuery('.swiper-slide').each(function () {
                          var youtubePlayer = jQuery(this).find('iframe').get(0);
                          if (youtubePlayer) {
                            youtubePlayer.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
                          }
                      });
                    },
                },
              });
        });
</script>
<style>
  @media screen and (max-width:767px){
    .video-swiper .swiper-slide iframe {
      height: 185px;
    }
  }
</style>