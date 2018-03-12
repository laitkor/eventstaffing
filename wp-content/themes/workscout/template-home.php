<script src="<?php echo get_site_url(); ?>/wp-content/themes/workscout-child/js/jssor.slider-26.6.0.min.js"></script>
<link rel="stylesheet" href="<?php echo get_site_url(); ?>/wp-content/themes/workscout-child/jQuery-flexImages-master/jquery.flex-images.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo get_site_url(); ?>/wp-content/themes/workscout-child/jQuery-flexImages-master/jquery.flex-images.js"></script>
<link rel="stylesheet" href="<?php echo get_site_url(); ?>/wp-content/themes/workscout-child/lightbox/css/lightbox.css">
<script src="<?php echo get_site_url(); ?>/wp-content/themes/workscout-child/lightbox/js/lightbox.js"></script>
<script type="text/javascript">
  jssor_1_slider_init = function() {

    var jssor_1_options = {
      $AutoPlay: 1,
      $Cols: 1,
      $Align: 0,
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$
      },
      $BulletNavigatorOptions: {
        $Class: $JssorBulletNavigator$
      }
    };

    var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

    /*#region responsive code begin*/

    var MAX_WIDTH = 980;

    function ScaleSlider() {
      var containerElement = jssor_1_slider.$Elmt.parentNode;
      var containerWidth = containerElement.clientWidth;

      if (containerWidth) {

        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

        jssor_1_slider.$ScaleWidth(expectedWidth);
      }
      else {
        window.setTimeout(ScaleSlider, 30);
      }
    }

    ScaleSlider();

    $Jssor$.$AddEvent(window, "load", ScaleSlider);
    $Jssor$.$AddEvent(window, "resize", ScaleSlider);
    $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
    /*#endregion responsive code end*/
  };
</script>
<?php
/**
 * Template Name: Page with Jobs Search
 *
 * @package WordPress
 * @subpackage workscout
 * @since workscout 1.0
 */
include get_template_directory()."/PopAPI/pop.php";
get_header(); ?>
<?php $fancy_header = Kirki::get_option( 'workscout','pp_transparent_header');  $talents = $talentData; ?>
<div id="banner" <?php echo workscout_get_search_header();?>  class="workscout-search-banner jobs-search-banner <?php if( $fancy_header ) { ?> with-transparent-header parallax background <?php } ?>" >
    <div class="container">
        <div class="sixteen columns">
            <div class="search-container sc-jobs">
               <!-- Form -->
                <h2><?php echo Kirki::get_option( 'workscout','pp_jobs_home_title','Find Job');  ?></h2>
                <?php 
                $search_elements = Kirki::get_option( 'workscout', 'pp_job_search_elements',array('keywords','location')); 
                $el_nr = count($search_elements); ?>
                <form method="GET" class="inputs-number-<?php echo esc_attr($el_nr); ?>" action="<?php echo get_permalink(get_option('job_manager_jobs_page_id')); ?>">
                    <?php if (in_array("keywords", $search_elements)) : ?>
                    <input type="text" id="search_keywords" name="search_keywords"  class="ico-01" placeholder="<?php 
                    (  $el_nr == 3 ) ? esc_attr_e('keywords','workscout') : esc_attr_e('job title, keywords or company name','workscout'); ?>" value=""/>
                    <?php endif; ?>
                    <?php if (in_array("location", $search_elements)) : ?>
                    <?php if ( get_option( 'job_manager_regions_filter' ) || is_tax( 'job_listing_region' ) ) {  ?>
                        <?php
                        $dropdown = wp_dropdown_categories( array(
                          'show_option_all'           => __( 'All Regions', 'workscout' ),
                          'hierarchical'              => true,
                          'orderby'                   => 'name',
                          'taxonomy'                  => 'job_listing_region',
                          'name'                      => 'search_region',
                          'id'                        => 'search_location',
                          'class'                     => 'search_region job-manager-category-dropdown chosen-select-deselect ' . ( is_rtl() ? 'chosen-rtl' : '' ),
                          'hide_empty'                => 0,
                          'selected'                  => isset( $_GET[ 'search_region' ] ) ? $_GET[ 'search_region' ] : '',
                          'echo'                      => false,
                          )  );
                        $fixed_dropdown = str_replace("&nbsp;", "", $dropdown); echo $fixed_dropdown;
                    } else { ?>
                    <input type="text" id="search_location" name="search_location" class="ico-02" placeholder="<?php esc_attr_e('city, province or region','workscout'); ?>" value=""/> 
                    <?php } ?>
                    <?php endif; ?>

                    <?php 
                        if (in_array("category", $search_elements)) :                
                              /* job_manager_dropdown_categories( array( 
                                'taxonomy' => 'job_listing_category', 
                                'hierarchical' => 1, 
                                'show_option_all' => esc_html__( 'Any category', 'workscout' ), 
                                'name' => 'search_categories', 
                                'orderby' => 'name', 
                                'selected' => '', 
                                'name'              => 'search_category',
                                'multiple' => false,
                                'hide_empty' => true ) );*/ 
                            wp_dropdown_categories( 
                                array(
                                    'taxonomy'          => 'job_listing_category',
                                    'name'              => 'search_category',
                                    'class'             => 'chosen-select',
                                    'hierarchical'      => false,
                                    'hide_empty'       => true ,
                                    'show_option_all'   => esc_html__('All categories','workscout')
                                    )
                                );
                        endif;
                    ?>
                   <div class="slider" id="slider">
                      <a style="display: none;" href="#" class="control_next">></a>
                      <!-- <a href="#" class="control_prev"><</a>  -->                  
                      <ul>
                        <li>                            
                          <div class="heading-title">
                            <img src="<?php echo get_template_directory_uri().'/images/c (1).png'?>" alt="" title=""/>    
                            <p>Become a part of our team and begin working event in your area now!</p>
                          </div>
                        </li>
                        <li>                            
                          <div class="heading-title">
                            <img src="<?php echo get_template_directory_uri().'/images/e (1).png'?>" alt="" title=""/>
                            <p>Who do we work with? Check out the
                              brands CEA staffing has
                              represented through the years.</p>
                            </div>
                          </li>
                          <li>                            
                            <div class="heading-title">
                              <img src="<?php echo get_template_directory_uri().'/images/a (1).png'?>" alt="" title=""/>
                              <p>Nationwide bilingual event staffing!
                                Browse through our database of the
                                best bilingual staff in the industry.</p>
                              </div>
                            </li>
                          </ul>
                        </div>  
                      <style type="text/css">
                       @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300,600); 

                        #slider {
                          position: relative;
                          overflow: hidden;
                          margin: 20px auto 0 auto;
                          border-radius: 4px;
                        }

                        #slider ul {
                          position: relative;
                          margin: 0;
                          padding: 0;
                          height: 500px;
                          list-style: none;
                        }

                        #slider ul li {
                          position: relative;
                          /*display: block;*/
                          /*float: left;*/
                          margin: 0;
                          padding: 0;
                          width: 100%;
                          height: 500px;
                          /*background: #ccc;*/
                          text-align: center;
                          line-height: 300px;
                        }

                        a.control_prev, a.control_next {
                          position: absolute;
                          top: 40%;
                          z-index: 999;
                          display: block;
                          padding: 4% 3%;
                          width: auto;
                          height: auto;
                          background: #2a2a2a;
                          color: #fff;
                          text-decoration: none;
                          font-weight: 600;
                          font-size: 18px;
                          opacity: 0.8;
                          cursor: pointer;
                        }

                        a.control_prev:hover, a.control_next:hover {
                          opacity: 1;
                          -webkit-transition: all 0.2s ease;
                        }

                        a.control_prev {
                          border-radius: 0 2px 2px 0;
                        }

                        a.control_next {
                          right: 0;
                          border-radius: 2px 0 0 2px;
                        }

                        .slider_option {
                          position: relative;
                          margin: 10px auto;
                          width: 160px;
                          font-size: 18px;
                        }
                   </style>
                   <script type="text/javascript">
                       jQuery(document).ready(function ($) {
                         // $('#checkbox').change(function(){
                            setInterval(function () {
                                moveRight();
                            }, 5000);
                          //});
                          
                            var slideCount = $('#slider ul li').length;
                            var slideWidth = $('#slider ul li').width();
                            var slideHeight = $('#slider ul li').height();
                            var sliderUlWidth = slideCount * slideWidth;
                            
                            $('#slider').css({ width: slideWidth, height: slideHeight });
                            
                            $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
                            
                            $('#slider ul li:last-child').prependTo('#slider ul');

                            function moveLeft() {
                                $('#slider ul').animate({
                                    left: + slideWidth
                                }, 200, function () {
                                    $('#slider ul li:last-child').prependTo('#slider ul');
                                    $('#slider ul').css('left', '');
                                });
                            };

                            function moveRight() {
                                $('#slider ul').animate({
                                    left: - slideWidth
                                }, 200, function () {
                                    $('#slider ul li:first-child').appendTo('#slider ul');
                                    $('#slider ul').css('left', '');
                                });
                            };

                            $('a.control_prev').click(function () {
                                moveLeft();
                            });

                            $('a.control_next').click(function () {
                                moveRight();
                            });
                        });    
                  </script>  
                </form>
                <!-- Browse Jobs -->
                <div class="browse-jobs">
                    <?php 
                    if(Kirki::get_option( 'workscout','pp_categories_page')){
                        $categoriespage = Kirki::get_option( 'workscout','pp_categories_page');
                    } elseif (ot_get_option('pp_categories_page')) {
                        $categoriespage = ot_get_option('pp_categories_page'); 
                    }

                    if(!empty($categoriespage)) { 
                        printf( __( ' Or browse job offers by <a href="%s">category</a>', 'workscout' ), get_permalink($categoriespage) );
                    } ?>
                </div>
                
                <?php 
                if(Kirki::get_option( 'workscout','pp_home_job_counter')) { ?>
                <!-- Announce -->
                <!-- <div class="announce">
                    <?php $count_jobs = wp_count_posts( 'job_listing', 'readable' ); 
                    printf( esc_html__( 'We have %s job offers for you!', 'workscout' ), '<strong>' . $count_jobs->publish . '</strong>' ) ?>
                </div> -->
                <?php } ?>
            </div>

        </div>
    </div>
</div>
<?php 
while ( have_posts() ) : the_post(); ?>
<!-- 960 Container -->
<div class="container page-container home-page-container">
  <article <?php post_class("sixteen columns"); ?>>
    <div id="talent-slider" class="vc_row wpb_row vc_row-fluid">
      <div class="wpb_wrapper">
        <div class="view_all_talents"><a class="button" href="talent"> BROWSE TALENT</a></div>
        <?php $j=1;
        $text_to_be_wrapped_in_shortcode = '<div class="talent-first-row"><ul>';
        foreach($talents as $talent) { 
          $text_to_be_wrapped_in_shortcode .= '<li><div class="talent-image" id="dialog-box-'.$j.'"><img src="'.$talent['primaryPhotoURL'].'" alt="" title=""/><script type="text/javascript">jQuery(function(){jQuery("#dialog-box-'.$j.'").click(function(e) { var talentDialog = jQuery("#talent-dialog-box-'.$j.'").html(); jQuery("body").prepend(talentDialog); }); });</script></div><div id="talent-dialog-box-'.$j.'" style="display: none;">
          <div class="mfp-bg my-mfp-zoom-in mfp-ready"></div>
          <div class="mfp-wrap mfp-close-btn-in mfp-auto-cursor my-mfp-zoom-in mfp-ready" tabindex="-1" style="top: 1500px; position: absolute; height: 418px;">
            <div class="mfp-container mfp-inline-holder">
              <div class="mfp-content">
                <div id="talent-dialog" class="small-dialog zoom-anim-dialog apply-popup woocommerce-login-popup talent-popup-wrapper">
                  <div class="small-dialog-content woo-reg-box">
                    <form method="post" class="login workscout_form">
                      <div class="container">
                       <div class="row">
                         <div class="vc_column_container vc_col-sm-3">
                         <div class="t-image"><div id="jssor_1" class="flex-images" style="position:relative;margin:0 auto;top:0px;left:0px;width:200px;height:200px;overflow:hidden;visibility:hidden;">
  <div data-u="loading" class="jssorl-004-double-tail-spin example-image-link" style="position:absolute;top:0px;left:0px;text-align:center;background-color:rgba(0,0,0,0.7);">
    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="'.$talentProfile[$talent['id']]['primaryPhotoURL'].'" alt="" title=""></div><div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:200px;height:200px;overflow:hidden;">
    <div><a href="'.$talentProfile[$talent['id']]['primaryPhotoURL'].'" class="example-image-link" data-lightbox="example-set-'.$j.'"><img rel="lightbox['.$j.']" src="'.$talentProfile[$talent['id']]['primaryPhotoURL'].'" alt="" title=""></a></div>';
                      foreach ($talentProfile[$talent['id']]['profilePhotos'] as $key => $value) {
                        $text_to_be_wrapped_in_shortcode .= '<div><a href="'.$value['photoURL'].'" class="example-image-link" data-lightbox="example-set-'.$j.'"><img rel="lightbox['.$j.']" src="'.$value['photoURL'].'" alt="" title=""></a></div>';
                      }
                      $text_to_be_wrapped_in_shortcode .= '</div></div><script type="text/javascript">jssor_1_slider_init();</script></div></div><div class="vc_column_container vc_col-sm-9">
                         <h3>'.$talentProfile[$talent['id']]['firstName']." ".$talentProfile[$talent['id']]['lastName'][0].'.</h3>
                         <div class="about-details">
                           <h4>About Me</h4>
                           <p>'.$talentProfile[$talent['id']]['bioText'].'</p>    
                         </div>
                       </div> 
                     </div>
                     <div class="row">
                      <div class="vc_column_container vc_col-sm-12">
                       <div class="talent-profile">
                        <div class="vc_column_container vc_col-sm-4">
                         <div class="list"><span>LOCATION:</span>'.$talentProfile[$talent['id']]['city'].', '.$talentProfile[$talent['id']]['state'].', '.$talentProfile[$talent['id']]['country'].'</div>  
                         <div class="list"><span>ETHNICITY:</span></div>
                         <div class="list"><span>AGE:</span></div> 
                         <div class="list"><span>HEIGHT:</span>'.$talentProfile[$talent['id']]['height'].'</div>    
                         <div class="list"><span>WEIGHT:</span>'.$talentProfile[$talent['id']]['Weight'].'LBS</div></div> 
                       <div class="vc_column_container vc_col-sm-4">  
                        <div class="list"><span>HAIR:</span>'.$talentProfile[$talent['id']]['hairColor'].'</div>    
                        <div class="list"><span>EYES:</span>'.$talentProfile[$talent['id']]['eyeColor'].'</div> 
                        <div class="list"><span>TATTOOS:</span>'.$talentProfile[$talent['id']]['hasTattoos'].'</div>    
                        <div class="list"><span>PIERCINGS:</span>'.$talentProfile[$talent['id']]['hasPiercings'].'</div> 
                      </div> 
                      <div class="vc_column_container vc_col-sm-4">  
                        <div class="list"><span>LANGUAGES:</span>'.$talentProfile[$talent['id']]['language1'].', '.$talentProfile[$talent['id']]['language2'].'</div>    
                        <div class="list"><span>EXPERIENCE:</span></div>   
                      </div>
                      <div class="border-grey"></div>
                      <div class="vc_column_container vc_col-sm-3">
                       <div class="list"><span>BUST:</span></div> 
                     </div> 
                     <div class="vc_column_container vc_col-sm-3">
                       <div class="list"><span>CUP:</span></div> 
                     </div> 
                     <div class="vc_column_container vc_col-sm-3">
                       <div class="list"><span>WAIST:</span></div> 
                     </div> 
                     <div class="vc_column_container vc_col-sm-3">
                       <div class="list"><span>HIPS:</span></div> 
                     </div> 
                     <div class="vc_column_container vc_col-sm-3">
                      <div class="list"><span>SHOE:</span>'.$talentProfile[$talent['id']]['shoeSize'].'</div> 
                    </div>  
                    <div class="vc_column_container vc_col-sm-3">
                      <div class="list"><span>DRESS:</span>'.$talentProfile[$talent['id']]['dressSize'].'</div> 
                    </div> 
                    <div class="vc_column_container vc_col-sm-3">
                      <div class="list"><span>SHIRT:</span>'.$talentProfile[$talent['id']]['shirtSize'].'</div> 
                    </div> 
                    <div class="vc_column_container vc_col-sm-3">
                      <div class="list"><span>INSEAM:</span></div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>           
          </form>     
        </div>
        <button title="Close (Esc)" type="button" class="mfp-close" onclick="closeMe();"></button></div></div></div></div>
      </div></li>';
          $j++;
        }
        $text_to_be_wrapped_in_shortcode .= '</ul></div>';
        echo do_shortcode( '[clients_carousel wide="none" ]' . $text_to_be_wrapped_in_shortcode . '[/clients_carousel]' ); 
        ?>
      </div>
    </div>  
    <?php the_content(); ?>
  </article>
</div>
<?php endwhile; // end of the loop.
get_footer(); ?>