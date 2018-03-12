<script type="text/javascript">
  var site_url = '<?php echo get_site_url(); ?>';
  var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo get_site_url(); ?>/wp-content/themes/workscout-child/js/jssor.slider-26.6.0.min.js"></script>
<link rel="stylesheet" href="<?php echo get_site_url(); ?>/wp-content/themes/workscout-child/jQuery-flexImages-master/jquery.flex-images.css">
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
<script src="<?php echo get_site_url(); ?>/wp-content/themes/workscout-child/js/script.js"></script>
<?php
/**
 * Template Name: Talent Page
 *
 * A page showing talent below title.
 *
 *
 * @package WordPress
 * @subpackage workscout
 * @since workscout 1.0
 */
get_header(); 
?>
<div id="titlebar" class="single" style="background: url('/wp-content/themes/workscout/images/event-banner.png')">
  <div class="container">
    <div class="sixteen columns">
      <h1>Our Talent</h1>
    </div>
  </div>
</div>
<div id='loadingmessage' style='display:none'>
  <img src='/wp-content/themes/workscout/images/loading.gif'/>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div id="talent-profile-list" class="talent-profile-list-data">
        <hr/>
        <!-- ADD DIV HERE --> 
      </div>
      <hr/>
      <h1 class="load-more">Load More</h1>
    </div>
  </div>
  <form id="myForm" method="POST">
    <input type="hidden" id="action" name="action" value="my_action"/>
    <input type="hidden" id="offset" name="offset" value="0"/>
    <input type="hidden" id="numberofrows" name="numberofrows" value="21"/>
    <div class="container">
      <div id="talent-filter-row">
        <div class="row">
          <div class="filter-form-talent">
            <div class="vc_col-sm-4">
              <div class="form-group-1">
                <label>CITY OR ZIP</label>
                <input name="cityName" type="text">
              </div>
              <div class="form-group-1">
                <label>WITHIN</label>
                <select name="distance">
                  <option value="" selected="selected">--</option>
                  <option value="5">5 miles</option>
                  <option value="10">10 miles</option>
                  <option value="25">25 miles</option>
                  <option value="50">50 miles</option>
                  <option value="100">100 miles</option>
                </select>
              </div>
              <div class="form-group-1">
                <label>STATE</label>
                <select name="location" >
                  <option value="" selected="selected">--</option>
                  <option value="AL">AL</option>
                  <option value="AK">AK</option>
                  <option value="AZ">AZ</option>
                  <option value="AR">AR</option>
                  <option value="CA">CA</option>
                  <option value="CO">CO</option>
                  <option value="CT">CT</option>
                  <option value="DE">DE</option>
                  <option value="DC">DC</option>
                  <option value="FL">FL</option>
                  <option value="GA">GA</option>
                  <option value="HI">HI</option>
                  <option value="ID">ID</option>
                  <option value="IL">IL</option>
                  <option value="IN">IN</option>
                  <option value="IA">IA</option>
                  <option value="KS">KS</option>
                  <option value="KY">KY</option>
                  <option value="LA">LA</option>
                  <option value="ME">ME</option>
                  <option value="MD">MD</option>
                  <option value="MA">MA</option>
                  <option value="MI">MI</option>
                  <option value="MN">MN</option>
                  <option value="MS">MS</option>
                  <option value="MO">MO</option>
                  <option value="MT">MT</option>
                  <option value="NE">NE</option>
                  <option value="NV">NV</option>
                  <option value="NH">NH</option>
                  <option value="NJ">NJ</option>
                  <option value="NM">NM</option>
                  <option value="NY">NY</option>
                  <option value="NC">NC</option>
                  <option value="ND">ND</option>
                  <option value="OH">OH</option>
                  <option value="OK">OK</option>
                  <option value="OR">OR</option>
                  <option value="PA">PA</option>
                  <option value="RI">RI</option>
                  <option value="SC">SC</option>
                  <option value="SD">SD</option>
                  <option value="TN">TN</option>
                  <option value="TX">TX</option>
                  <option value="UT">UT</option>
                  <option value="VT">VT</option>
                  <option value="VA">VA</option>
                  <option value="WA">WA</option>
                  <option value="WV">WV</option>
                  <option value="WI">WI</option>
                  <option value="WY">WY</option>
                </select>
              </div>
            </div>
            <div class="vc_col-sm-3">
              <div class="form-group-2">
                <label>AGE</label>
                <input name="" type="text">
                <input  name="" type="text">
              </div>
              <div class="form-group-2">
                <label>Weight</label>
                <input name="" type="text">
                <input  name="" type="text">
              </div>
            </div>
            <div class="vc_col-sm-3">
              <div class="form-group-3">
                <label>HEIGHT</label>
                <select name="minHeight">
                  <option value="" selected="selected">--</option>
                  <option value="4">4'</option>
                  <option value="5">5'</option>
                  <option value="6">6'</option>
                </select>
                <select name="minHeightInch" >
                  <option value="" selected="selected">--</option>
                  <option value="0">0"</option>
                  <option value="1">1"</option>
                  <option value="2">2"</option>
                  <option value="3">3"</option>
                  <option value="4">4"</option>
                  <option value="5">5"</option>
                  <option value="6">6"</option>
                  <option value="7">7"</option>
                  <option value="8">8"</option>
                  <option value="9">9"</option>
                  <option value="10">10"</option>
                  <option value="11">11"</option>
                </select>
                <span>To</span>
                <select name="maxHeight" >
                  <option value="" selected="selected">--</option>
                  <option value="4">4'</option>
                  <option value="5">5'</option>
                  <option value="6">6'</option>
                </select>
                <select name="maxHeightInch" >
                  <option value="" selected="selected">--</option>
                  <option value="0">0"</option>
                  <option value="1">1"</option>
                  <option value="2">2"</option>
                  <option value="3">3"</option>
                  <option value="4">4"</option>
                  <option value="5">5"</option>
                  <option value="6">6"</option>
                  <option value="7">7"</option>
                  <option value="8">8"</option>
                  <option value="9">9"</option>
                  <option value="10">10"</option>
                  <option value="11">11"</option>
                  <option value="12">12"</option>
                </select>
              </div>
            </div>
            <div class="vc_col-sm-2">
              <div class="form-group-4">
                <label>GENDER</label>
                <select class="mt5" id="gender" name="gender">
                  <option value="" selected="selected">--</option>
                  <option value="F">Female</option>
                  <option value="M">Male</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class=" btn-wapper">
                  <input name="SEARCH" class="btn search-data" value="SEARCH" type="button">
                  <input class="btn" value="RESET" type="reset">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="vc_col-sm-2">
            <div class="talent-options">
              <h4 >HAIR COLOR</h4>
              <div class="check-box-list" style="width:100%;">
                <p class="roundedOne">
                  <input id="hair-blonde" class="haircolor" type="checkbox" name="hairColorArray[][0]" value="BLONDE">
                  <label for="hair-blonde" ><span>&nbsp;BLONDE</span></label>
                </p>
                <p class="roundedOne">
                  <input id="hair-brown" class="haircolor" type="checkbox" name="hairColorArray[][0]" value="BROWN">
                  <label for="hair-brown" ><span>&nbsp;BROWN</span></label>
                </p>
                <p class="roundedOne">
                  <input id="hair-black" class="haircolor" type="checkbox" name="hairColorArray[][0]" value="BLACK">
                  <label for="hair-black" ><span>&nbsp;BLACK</span></label>
                </p>
                <p class="roundedOne">
                  <input id="hair-red" class="haircolor" type="checkbox" name="hairColorArray[][0]" value="RED">
                  <label for="hair-red" ><span>&nbsp;RED</span></label>
                </p>
                <p class="roundedOne">
                  <input id="hair-other" class="haircolor" type="checkbox" name="hairColorArray[][0]" value="OTHER">
                  <label for="hair-other" ><span>&nbsp;OTHER</span></label>
                </p>
              </div>
            </div>
          </div>
          <div class="vc_col-sm-2">
            <div class="talent-options">
              <h4>EYE COLOR</h4>
              <div class="check-box-list" style="width:100%;">
                <p class="roundedOne">
                  <input id="checklist-1" class="haircolor" type="checkbox" name="eyeColorArray[][0]" value="BLUE">
                  <label for="checklist-1" class="mr10"><span>&nbsp;BLUE</span></label>
                </p>
                <p class="roundedOne">
                  <input id="checklist-2" class="haircolor" type="checkbox" name="eyeColorArray[][0]" value="GREEN">
                  <label for="checklist-2" class="mr10"><span>&nbsp;GREEN</span></label>
                </p>
                <p class="roundedOne">
                  <input id="checklist-3" class="haircolor" type="checkbox" name="eyeColorArray[][0]" value="BROWN">
                  <label for="checklist-3" class="mr10"><span>&nbsp;BROWN</span></label>
                </p>
                <p class="roundedOne">
                  <input id="checklist-4" class="haircolor" type="checkbox" name="eyeColorArray[][0]" value="HEZEL">
                  <label for="checklist-4" class="mr10"><span>&nbsp;HEZEL</span></label>
                </p>
                <p class="roundedOne">
                  <input id="checklist-5" class="haircolor" type="checkbox" name="eyeColorArray[][0]" value="AMBER">
                  <label for="checklist-5" class="mr10"><span>&nbsp;AMBER</span></label>
                </p>
              </div>
            </div>
          </div>
          <div class="vc_col-sm-2">
            <div class="talent-options">
              <h4>LANGUAGES SPOKEN</h4>
              <div class="check-box-1">
                <input id="language-1" type="radio" name="language" value="ENGLISH">
                <label for="language-1" class="mr10"><span>&nbsp;ENGLISH</span></label>
              </div>
              <div class="check-box-1">
                <input id="language-2" type="radio" name="language" value="JAPANESE">
                <label for="language-2" class="mr10"><span>&nbsp;JAPANESE</span></label>
              </div>
              <div class="check-box-1">
                <input id="language-3" type="radio" name="language" value="HEBREW">
                <label for="language-3" class="mr10"><span>&nbsp;HEBREW</span></label>
              </div>
              <div class="check-box-1">
                <input id="language-4" type="radio" name="language" value="SPANISH">
                <label for="language-4" class="mr10"><span>&nbsp;SPANISH</span></label>
              </div>
              <div class="check-box-1">
                <input id="language-5" type="radio" name="language" value="RUSSIAN">
                <label for="language-5" class="mr10"><span>&nbsp;RUSSIAN</span></label>
              </div>
              <div class="check-box-1">
                <input id="language-6" type="radio" name="language" value="FRENCH">
                <label for="language-6" class="mr10"><span>&nbsp;FRENCH</span></label>
              </div>
              <div class="check-box-1">
                <input id="language-7" type="radio" name="language" value="MANDARIN">
                <label for="language-7" class="mr10"><span>&nbsp;MANDARIN</span></label>
              </div>
              <div class="check-box-1">
                <input id="language-8" type="radio" name="language" value="ARABIC">
                <label for="language-8" class="mr10"><span>&nbsp;ARABIC</span></label>
              </div>
              <div class="check-box-1">
                <input id="language-9" type="radio" name="language" value="GERMAN">
                <label for="language-9" class="mr10"><span>&nbsp;GERMAN</span></label>
              </div>
            </div>
          </div>
          <div class="vc_col-sm-3">
          <div class="talent-options">
            <h4>PROFESSIONAL EXPERIENCE</h4>
            <div class="check-box-list">
              <p class="roundedOne">
                <input id="hair-blonde" class="haircolor" type="checkbox">
                <label for="hair-blonde" ><span>&nbsp;TRADE SHOWS</span></label>
              </p>
              <p class="roundedOne">
                <input id="hair-brown" class="haircolor" type="checkbox">
                <label for="hair-brown" ><span>&nbsp;PROMOTIONS</span></label>
              </p>
              <p class="roundedOne">
                <input id="hair-black" class="haircolor" type="checkbox">
                <label for="hair-black" ><span>&nbsp;STREET TEAMS</span></label>
              </p>
              <p class="roundedOne">
                <input id="hair-red" class="haircolor" type="checkbox">
                <label for="hair-red" ><span>&nbsp;PRINT</span></label>
              </p>
              <p class="roundedOne">
                <input id="hair-brown" class="haircolor" type="checkbox">
                <label for="hair-brown" class="mr10"><span>&nbsp;RUNWAY</span></label>
              </p>
            </div>
            <div class="check-box-list">
              <p class="roundedOne">
                <input id="hair-black" class="haircolor" type="checkbox">
                <label for="hair-black" class="mr10"><span>&nbsp;MANAGER</span></label>
              </p>
              <p class="roundedOne">
                <input id="hair-red" class="haircolor" type="checkbox">
                <label for="hair-red" class="mr10"><span>&nbsp;SINGING</span></label>
              </p>
              <p class="roundedOne">
                <input id="hair-other" class="haircolor" type="checkbox">
                <label for="hair-other" class="mr10"><span>&nbsp;DANCE</span></label>
              </p>
              <p class="roundedOne">
                <input id="hair-other" class="haircolor" type="checkbox">
                <label for="hair-other" class="mr10"><span>&nbsp;TEAM LEAD</span></label>
              </p>
            </div>
          </div>
        </div>
        <div class="vc_col-sm-3">
          <div class="talent-options">
            <h4>ETHNICITY</h4>
            <div class="check-box-list">
              <p class="roundedOne">
                <input id="hair-blonde" class="haircolor" type="checkbox">
                <label for="hair-blonde" ><span>&nbsp;CAUCASIAN</span> </label>
              </p>
              <p class="roundedOne">
                <input id="hair-brown" class="haircolor" type="checkbox">
                <label for="hair-brown" ><span>&nbsp;MIDDLE EASTERN</span></label>
              </p>
              <p class="roundedOne">
                <input id="hair-black" class="haircolor" type="checkbox">
                <label for="hair-black" ><span>&nbsp;NATIVE AMERICAN</span></label>
              </p>
              <p class="roundedOne">
                <input id="hair-red" class="haircolor" type="checkbox">
                <label for="hair-red" ><span>&nbsp;ASIAN</span></label>
              </p>
              <p class="roundedOne">
                <input id="hair-brown" class="haircolor" type="checkbox">
                <label for="hair-brown" class="mr10"><span>&nbsp;AFRICAN</span></label>
              </p>
            </div>
            <div class="check-box-list">
              <p class="roundedOne">
                <input id="hair-red" class="haircolor" type="checkbox">
                <label for="hair-red" class="mr10"><span>&nbsp;INDIAN</span></label>
              </p>
              <p class="roundedOne">
                <input id="hair-other1" class="haircolor" type="checkbox">
                <label for="hair-other1" class="mr10"><span>&nbsp;HISPANIC</span></label>
              </p>
              <p class="roundedOne">
                <input id="hair-other2" class="haircolor" type="checkbox">
                <label for="hair-other2" class="mr10"><span>&nbsp;MIXED</span></label>
              </p>
              <p class="roundedOne">
                <input id="hair-other3" class="haircolor" type="checkbox">
                <label for="hair-other3" class="mr10"><span>&nbsp;MIXED</span></label>
              </p>
            </div>
          </div>
        </div>
        </div>
        
      </div>
    </div>
  </form>
</div>
<?php get_footer(); ?>
