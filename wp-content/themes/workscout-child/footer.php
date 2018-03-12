<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WorkScout
 */

?>
<!-- Footer
================================================== -->
<div class="margin-top-45"></div>

<div id="footer">
<!-- Main -->
<div class="container">

  <div class="four columns">
    <h4>We Tweet</h4>
    <div style="height: 340px; overflow: auto; " >
      <a class="twitter-timeline" href="https://twitter.com/CEAStaffing?ref_src=twsrc%5Etfw">Tweets by CEAStaffing</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
  </div>

  <div class="four columns">
    <h4>We Pin</h4>
    <a data-pin-do="embedBoard" data-pin-board-width="400" data-pin-scale-height="230" data-pin-scale-width="80" href="https://www.pinterest.com/ceastaffinginc/quotes-to-inspire/"></a>
  </div>

  <?php 
  $footer_layout = Kirki::get_option( 'workscout', 'pp_footer_widgets' ); 
  $footer_layout_array = explode(',', $footer_layout); 
  $x = 0;
  foreach ($footer_layout_array as $value) {
    $x++;
    if($x==4) break;

    if($x==3) { 
      ?>
      <!-- <div class="<?php echo esc_attr(workscout_number_to_width($value)); ?> columns"> --> 
      <div class="four columns">            
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer'.$x)) : endif; ?>
      </div> 
      <?php } ?>
      <?php } ?>
      <style type="text/css">
        #workscout_tabbed-10 ul.widget-tabs li {margin: 0; padding: 0; line-height: 0;}
        #workscout_tabbed-10 .tab-content {padding-top: 0;}
      #workscout_tabbed-10 .widget-text h5 a {color: #00c4cc; /*font-family: 'Shadows Into Light', cursive;*/ }
    </style>
    <script type="text/javascript">
	    jQuery("#workscout_tabbed-10 ul.blog").html('<h4>We Blog</h4>');
	    jQuery("#workscout_tabbed-4 ul.blog").html('<h4>We Blog</h4>');
    </script>

    <div class="four columns">
      <div class="contact-us">
        <h4>Contact Us</h4>
        <form name="contact" id="contact" action="" method="post">
          <input type="text" placeholder="Name" name="firstname" value=""/>
          <input type="text" placeholder="Email" name="email" value=""/>  
          <input type="text" placeholder="Phone" name="phone" value=""/>    
          <textarea placeholder="Message"></textarea><br/>
          <input type="submit" value="Submit" class="wpcf7-form-control wpcf7-submit">
        </form>
      </div>
    </div>
    <div class="four columns">
      <h4>Menu</h4>
      <h5><a href="#"><strong>ABOUT</strong></a></h5>
      <h5><a href="#"><strong>JOIN</strong></a></h5>
      <h5><a href="#"><strong>BLOG</strong></a></h5>
      <h5><a href="#"><strong>EVENT GALLERIES</strong></a></h5>
      <h5><a href="#"><strong>CONTACT US</strong></a></h5>
      <br/>
    </div>
             <!-- <div class="four columns">
              <aside id="nav_menu-4" class="footer-widget widget_nav_menu">
              <?php /* get the slider array */
                $footericons = ot_get_option( 'pp_footericons', array() );
                if ( !empty( $footericons ) ) {
                    echo '<h4>'.esc_html__('Follow us','workscout').'</h4>';
                    echo '<div class="menu-footer-menu-3-container">';
                    echo '<ul class="social-icons" id="footer_icons">';
                    foreach( $footericons as $icon ) {
                        echo '<li><a target="_blank" class="' . $icon['icons_service'] . '" title="' . esc_attr($icon['title']) . '" href="' . esc_url($icon['icons_url']) . '"><i class="icon-' . $icon['icons_service'] . '"></i></a></li>';
                    }
                    echo '</ul>';
                    echo '</div>';
                }
               ?>
               </aside>
    </div> -->
</div>
    
	<!-- Bottom -->
	<div class="container">
		<div class="footer-bottom"> 
			<div class="sixteen columns">				
                <!-- <?php /* get the slider array */
                $footericons = ot_get_option( 'pp_footericons', array() );
                if ( !empty( $footericons ) ) {
                    echo '<h4>'.esc_html__('Follow us','workscout').'</h4>';
                    echo '<ul class="social-icons" id="footer_icons">';
                    foreach( $footericons as $icon ) {
                        echo '<li><a target="_blank" class="' . $icon['icons_service'] . '" title="' . esc_attr($icon['title']) . '" href="' . esc_url($icon['icons_url']) . '"><i class="icon-' . $icon['icons_service'] . '"></i></a></li>';
                    }
                    echo '</ul>';
                }
                ?> -->
				
				<div class="copyrights"><?php $copyrights = Kirki::get_option( 'workscout', 'pp_copyrights' ); 
		        if (function_exists('icl_register_string')) {
		            icl_register_string('Copyrights in footer','copyfooter', $copyrights);
		            echo icl_t('Copyrights in footer','copyfooter', $copyrights);
		        } else {
		            echo wp_kses($copyrights,array('br' => array(),'em' => array(),'strong' => array(),'a' => array('href' => array(),'title' => array())));
		        } ?></div>
			</div>
		</div>
	</div>

</div>

<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>
<div id="ajax_response"></div>
</div>
<!-- Wrapper / End -->

<?php if ( is_page_template( 'template-contact.php' ) ) { ?>
<script type="text/javascript">
(function($){
    $(document).ready(function() {
        $('#googlemaps').gMap( {
            maptype: '<?php echo ot_get_option('pp_contact_maptype','ROADMAP') ?>',
            scrollwheel: false,
            zoom: <?php echo ot_get_option('pp_contact_zoom',13) ?>,
            markers: [
                <?php $markers = ot_get_option('pp_contact_map');
                if(!empty($markers)) {
                    $allowed_tags = wp_kses_allowed_html( 'post' );
                    foreach ($markers as $marker) { 
                      $str = str_replace(array("\n", "\r"), '', $marker['content']);?>
                      {
                        address: '<?php echo esc_js($marker['address']); ?>', // Your Adress Here
                        html: '<strong style="font-size: 14px;"><?php echo esc_js($marker['title']); ?></strong></br><?php echo wp_kses($str,$allowed_tags); ?>',
                        popup: true,
                      },
                    <?php }
                } ?>
                    ],
                });
    });
})(this.jQuery);
</script>
<?php } //eof is_page_template ?>

<script type="text/javascript">    
    var count = 1;
    setInterval(function() { 

        if(count==1)
        {
            jQuery(".sponser-1").show();
            jQuery(".sponser-2").hide();
            jQuery(".sponser-3").hide();         
        }
        else
        if(count==2)
        {
            jQuery(".sponser-1").hide();
            jQuery(".sponser-2").show();
            jQuery(".sponser-3").hide();         
        }
        else
        if(count==3)
        {
            jQuery(".sponser-1").hide();
            jQuery(".sponser-2").hide();
            jQuery(".sponser-3").show();         
        }
        count++;
        if(count == 4)
            count = 1;
     }, 8000);

</script>    
    
<!-- <div class="mfp-wrap mfp-close-btn-in mfp-auto-cursor my-mfp-zoom-in mfp-ready" tabindex="-1" style="top: 150px; position: absolute; height: 357px;"><div class="mfp-container mfp-inline-holder"><div class="mfp-content"><div id="login-dialog" style="display: none;" class="small-dialog zoom-anim-dialog apply-popup woocommerce-login-popup">

        <div class="small-dialog-headline">
            <h2>Your Title</h2>
        </div>

        <div class="small-dialog-content woo-reg-box">
          What is Lorem Ipsum?
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.   
        </div>
    <button title="Close (Esc)" type="button" class="mfp-close"></button>

    </div>
   </div>
  </div>
</div> -->
<style type="text/css">
    .talent-img img, .talent-image img {cursor: pointer;}
</style>
<script type="text/javascript">
    jQuery(function() { 
        jQuery(".talent-first-row .talent-img").click(function(e) {           
            var talentDialog = jQuery("#talent-dialog-box").html();
            jQuery('body').prepend(talentDialog);
        });
        //or
        jQuery(".talent-first-row ul li").click(function(e) {           
            var talentDialog = jQuery("#talent-dialog-box").html();
            jQuery('body').prepend(talentDialog);
        });
        //or
        jQuery("#talent-profile-list .talent-profile-grid .talent-image").click(function(e) {           
            var talentDialog = jQuery("#talent-dialog-box").html();
            jQuery('body').prepend(talentDialog);
        });     
    });

    function closeMe()
    {
      jQuery('body > .my-mfp-zoom-in').remove();
      jQuery('body > .mfp-wrap').remove();
    }
</script>
<?php wp_footer(); ?>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
</body>
</html>
