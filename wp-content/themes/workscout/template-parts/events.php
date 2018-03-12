<div class="wpb_wrapper" id="event_section">
        <div class="recent-blog-posts"> 
          <div class="vc_col-sm-6 wpb_column alpha">
            <article class="recent-post">                        
              <figure class="recent-post-img">                   
                <?php 
                  if ( ! post_password_required() ) { 
                    if(has_post_thumbnail()) { ?>          
                      <?php the_post_thumbnail('post-thumbnail', array('alt' => 'Image Not Found !'));  ?>
                      <?php } else { echo "Image Not Found !"; } } ?>
                      <?php $slug =  $post->post_name; //echo get_post_type(); ?>
                      <div class="hover-icon">
                        <h3> EVENTS & PROMOTIONS <?php // the_title(); ?>
                            <a href="<?php echo get_site_url(); ?>/<?php echo $slug; ?>">
                            <i class="fa fa-arrow-circle-o-right" style="color: #FFF;" aria-hidden="true"></i>
                          </a>
                        </h3>
                        <div class="event-date"><?php echo get_post_meta($post->ID, 'date', true); //the_date(); ?></div>
                          <p><?php the_excerpt(); ?></p>
                      </div>  
              </figure>
            </article>
          </div>
        </div>
      </div>
      <style type="text/css">
        .widget-tabs li:first-child {margin-left:12px;}
      </style>  
      <script type="text/javascript">
        jQuery(function() {
          //jQuery('#event_section .recent-blog-posts .wpb_column.alpha').removeClass('vc_col-sm-4');
          // jQuery('#event_section .recent-blog-posts .wpb_column.alpha').addClass('vc_col-sm-6');          
          var url = window.location.href;
          
          if(url.indexOf("events") != -1) {
            jQuery('[href*="http://ceastaffing.stpi.com/2017/10/"]').css('color','#8A3935');
            jQuery('[href*="http://ceastaffing.stpi.com/2017/10/"]').css('font-weight','bold');
          }
          jQuery('[href*="'+url+'"]').css('color','#8A3935');
          jQuery('[href*="'+url+'"]').css('font-weight','bold');
          //jQuery('.pagination').remove();
        });
</script>