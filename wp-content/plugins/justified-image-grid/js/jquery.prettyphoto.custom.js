/*! ------------------------------------------------------------------------
	Class: prettyPhoto
	Use: Lightbox clone for jQuery
	Author: Stephane Caron (http://www.no-margin-for-errors.com)
	Version: 3.1.6
	Customization: by Firsh for Justified Image Grid v3.6
------------------------------------------------------------------------- */
function loadJIGprettyPhoto($) {
	$.prettyPhoto = {version: '3.1.6'};
	$.prettyPhoto.JIG = true;
	
	$.fn.prettyPhoto = function(pp_settings) {
		if(typeof pp_settings === 'undefined' || (typeof pp_settings !== 'undefined' && typeof pp_settings.jig_call === 'undefined')){
			jigReCallPrettyPhotoAfterPossibleResize = true;
		}else{
			jigReCallPrettyPhotoAfterPossibleResize = undefined;
		}

		pp_settings = jQuery.extend({
			jig_call: false,
			jig_socials: 'ftpg',
			title_position: 'inside',
			videoplayer: false,
			hook: 'rel', /* the attribute tag to use for prettyPhoto hooks. default: 'rel'. For HTML5, use "data-rel" or similar. */
			advanced_deeplinking: false,
			smart_deeplinking: true,
			animation_speed: 'fast', /* fast/slow/normal */
			ajaxcallback: function() {},
			slideshow: 5000, /* false OR interval time in ms */
			autoplay_slideshow: false, /* true/false */
			opacity: 0.80, /* Value between 0 and 1 */
			show_title: true, /* true/false */
			allow_resize: true, /* Resize the photos bigger than viewport. true/false */
			allow_expand: true, /* Allow the user to expand a resized image. true/false */
			default_width: 500,
			default_height: 344,
			counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
			theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
			horizontal_padding: 20, /* The padding on each side of the picture */
			hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
			wmode: 'opaque', /* Set the flash wmode attribute */
			autoplay: true, /* Automatically start videos: True/False */
			modal: false, /* If set to true, only the close button will close the window */
			deeplinking: true, /* Allow prettyPhoto to update the url to enable deeplinking. */
			overlay_gallery: true, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
			overlay_gallery_max: 300, /* Maximum number of pictures in the overlay gallery */
			keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
			analytics: false,
			changepicturecallback: function(){}, /* Called everytime an item is shown/changed */
			callback: function(){}, /* Called when prettyPhoto is closed */
			ie6_fallback: true,
			markup: '<div class="pp_pic_holder"> <div class="ppt">&nbsp;</div> <div class="pp_top"> <div class="pp_left"></div> <div class="pp_middle"></div> <div class="pp_right"></div> </div> <div class="pp_content_container"> <div class="pp_left"> <div class="pp_right"> <div class="pp_content"> <div class="pp_loaderIcon"></div> <div class="pp_fade"> <a href="#" class="pp_expand" title="Expand the image">Expand</a> <div class="pp_hoverContainer"> <a class="pp_next" href="#">next</a> <a class="pp_previous" href="#">previous</a> </div> <div id="pp_full_res"></div> <div class="pp_details"> <div class="pp_nav"> <a href="#" class="pp_arrow_previous">Previous</a> <a href="#" class="pp_arrow_next">Next</a> <p class="currentTextHolder">0/0</p> </div> <p class="pp_description"></p> <div class="pp_bottom_right"> <a class="pp_close" href="#">Close</a> <div class="pp_social">{pp_social}</div> </div> </div> </div> </div> </div> </div> </div> <div class="pp_bottom"> <div class="pp_left"></div> <div class="pp_middle"></div> <div class="pp_right"></div> </div> </div> <div class="pp_overlay"></div>',
			gallery_markup: '<div class="pp_gallery"> <a href="#" class="pp_arrow_previous">Previous</a> <div> <ul> {gallery} </ul> </div> <a href="#" class="pp_arrow_next">Next</a> </div>',
			image_markup: '<img id="fullResImage" src="{path}" />',
			flash_markup: '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"><param name="wmode" value="{wmode}" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed></object>',
			quicktime_markup: '<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}"><param name="src" value="{path}"><param name="autoplay" value="{autoplay}"><param name="type" value="video/quicktime"><embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>',
			iframe_markup: '<iframe src ="{path}" width="{width}" height="{height}" frameborder="no" allowfullscreen></iframe>',
			inline_markup: '<div class="pp_inline">{content}</div>',
			custom_markup: '',
			social_tools: true /* html or false to disable */,

			jig_facebook: '<div class="jig_pp_social_btn jig_pp_facebook" data-src="//www.facebook.com/plugins/like.php?href={f_location_href}&amp;width=135&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=21"></div>',

			jig_twitter: '<div class="jig_pp_social_btn jig_pp_twitter" data-src="//platform.twitter.com/widgets/tweet_button.html?url={location_href}&text={twitter_text}"></div>',

			jig_pinterest: '<div class="jig_pp_social_btn jig_pp_pinterest" data-href="//www.pinterest.com/pin/create/button/?url={location_href}&media={location_img}&description={d}"></div>',

			jig_google: '<div class="jig_pp_social_btn jig_pp_google" data-href="{unencoded_location_href}"></div>'
		}, pp_settings);
		if(pp_settings.jig_call === false && pp_settings.smart_deeplinking === true && pp_settings.deeplinking === true){
			// Only JIG layout supports smart deeplinking so fall back to advanced
			pp_settings.smart_deeplinking = false;
			pp_settings.advanced_deeplinking = true;
		}

		if(pp_settings.social_tools){
			var socialButtons = pp_settings.jig_socials;
			socialButtons = socialButtons.toLowerCase();
			socialButtons = socialButtons.split("");

			var facebookIndex = $.inArray('f',socialButtons),
				twitterIndex = $.inArray('t',socialButtons),
				pinterestIndex = $.inArray('p',socialButtons),
				googleIndex = $.inArray('g',socialButtons);

			if (facebookIndex !== -1)	socialButtons[facebookIndex]	= pp_settings.jig_facebook;
			if (twitterIndex !== -1)	socialButtons[twitterIndex]		= pp_settings.jig_twitter;
			if (pinterestIndex !== -1){
				socialButtons[pinterestIndex]	= pp_settings.jig_pinterest;
				if(typeof window["jigBuildPinterestButton"] === "undefined"){
					window["jigBuildPinterestButton"] = function(el){
						setTimeout(function(){window["jigBuildPinterestButton"](el);},500);
					};
				}
				if(pp_settings.jig_call === true && typeof window["jigPinterestTrickRan"] == "undefined"){
					window["jigPinterestTrick"]();
					$(window).off('load', window["jigPinterestTrick"]).on('load', window["jigPinterestTrick"]);
				}
			}
			if (googleIndex !== -1)		socialButtons[googleIndex]		= pp_settings.jig_google;

			pp_settings.social_tools = socialButtons.join("");
		}

		// Global variables accessible only by prettyPhoto
		var matchedObjects = this,
			percentBased = false,
			pp_dimensions,
			pp_open,
			pp_contentHeight,
			pp_contentWidth,
			pp_containerHeight,
			pp_containerWidth,
			windowHeight = $(window).height(),
			windowWidth = $(window).width(),
			pp_slideshow,
			JIGelement;

		if(pp_settings.jig_call == true){
			JIGelement = matchedObjects.first().closest('.justified-image-grid');
		}
		// Global elements
		doresize = true;
		scroll_pos = _get_scroll();

		// jQuery 3 removed the .selector so it's not possible to do the followin
		if(typeof matchedObjects.selector !== "undefined" && matchedObjects.selector.indexOf('#jig') == -1){
			matchedObjects = matchedObjects.filter(':not(.justified-image-grid a)'); // If it's not a JIG call, only allow NON-JIG elements in the matched objects, this prevents themes from calling prettyPhoto on JIG with their own settings
		}
		pp_settings.matchedObjects = matchedObjects;

		// Window/Keyboard events
		$(window).off('resize.prettyphoto').on('resize.prettyphoto',function(){ 
			_resize_overlay();
			_center_overlay();
		});
		
		if(pp_settings.keyboard_shortcuts) {
			$(document).off('keydown.prettyphoto').on('keydown.prettyphoto',function(e){
				if(typeof $pp_pic_holder != 'undefined'){
					if($pp_pic_holder.is(':visible')){
						switch(e.keyCode){
							case 37:
								$.prettyPhoto.changePage('previous');
								e.preventDefault();
								break;
							case 39:
								$.prettyPhoto.changePage('next');
								e.preventDefault();
								break;
							case 27:
								if(!settings.modal)
								$.prettyPhoto.close();
								e.preventDefault();
								break;
						}
						// return false;
					}
				}
			});
		}
		
		/**
		* Initialize prettyPhoto.
		*/
		$.prettyPhoto.initialize = function() {
			
			settings = pp_settings;
			
			if(settings.theme == 'pp_default') settings.horizontal_padding = 16;
			
			// Find out if the picture is part of a set
			theRel = $(this).attr(settings.hook).split(" ").shift();

			var galleryRegExp = /\[(?:.*)\]/;
			isSet = (galleryRegExp.exec(theRel)) ? true : false;
			
			// Put the SRCs, TITLEs, ALTs into an array.
			if(isSet){
				pp_images = jQuery.map(matchedObjects, function(n, i){
					if($(n).attr(settings.hook) && $(n).attr(settings.hook).indexOf(theRel) != -1) return $(n).attr('href');
				});
				pp_titles = jQuery.map(matchedObjects, function(n, i){
					if($(n).attr(settings.hook) && $(n).attr(settings.hook).indexOf(theRel) != -1) return ($(n).find('img').attr('alt')) ? $(n).find('img').attr('alt') : "";
				});
				pp_descriptions = jQuery.map(matchedObjects, function(n, i){
					if($(n).attr(settings.hook) && $(n).attr(settings.hook).indexOf(theRel) != -1) return ($(n).attr('title')) ? $(n).attr('title') : "";
				});
			}else{
				pp_images = $.makeArray($(this).attr('href'));
				pp_titles = $.makeArray($(this).find('img').attr('alt'));
				pp_descriptions = $.makeArray($(this).attr('title'));
			}

			
			if(pp_images.length > settings.overlay_gallery_max) settings.overlay_gallery = false;
			
			set_position = jQuery.inArray($(this).attr('href'), pp_images); // Define where in the array the clicked item is positionned
			rel_index = (isSet) ? set_position : $("a["+settings.hook+"^='"+theRel+"']").index($(this));
			
			_build_overlay(this); // Build the overlay {this} being the caller
			
			if(settings.allow_resize)
				$(window).on('scroll.prettyphoto',function(){
					windowHeight = $(window).height(), windowWidth = $(window).width();
					_center_overlay();
				});
			
			
			$.prettyPhoto.open();
			
			return false;
		};


		/**
		* Opens the prettyPhoto modal box.
		* @param image {String,Array} Full path to the image to be open, can also be an array containing full images paths.
		* @param title {String,Array} The title to be displayed with the picture, can also be an array containing all the titles.
		* @param description {String,Array} The description to be displayed with the picture, can also be an array containing all the descriptions.
		*/
		$.prettyPhoto.open = function(event) {
			if(typeof settings == "undefined"){ // Means it's an API call, need to manually get the settings and set the variables
				settings = pp_settings;
				pp_images = $.makeArray(arguments[0]);
				pp_titles = (arguments[1]) ? $.makeArray(arguments[1]) : $.makeArray("");
				pp_descriptions = (arguments[2]) ? $.makeArray(arguments[2]) : $.makeArray("");
				isSet = (pp_images.length > 1) ? true : false;
				set_position = (arguments[3])? arguments[3]: 0;
				_build_overlay(event.target); // Build the overlay {this} being the caller
			}
			
			if(settings.hideflash) $('object,embed,iframe[src*=youtube],iframe[src*=vimeo]').css('visibility','hidden'); // Hide the flash

			_checkPosition($(pp_images).length); // Hide the next/previous links if on first or last images.
		
			$('.pp_loaderIcon').show();

			if(settings.deeplinking){
				setHashtag(settings.matchedObjects);
			}
			if(settings.analytics == true && typeof _gaq !== 'undefined'){
				_gaq.push(['_trackEvent', 'Photos', 'View', pp_images[set_position]]);
			}

			var URI = '';
			if(settings.advanced_deeplinking == true || settings.smart_deeplinking == true){
					URI = decodeURI(document.location.href);
					var URIarray = URI.split('#!');
					URI = URIarray[0]+'#!'+URIarray[1];
			}else{
					URI = location.href;
			}

			// Build social tools src/href with the current URL
			if(settings.social_tools){

				var new_social;

				new_social = settings.social_tools.replace(
					/{location_href}/g,
					encodeURIComponent(location.href)
				);
				new_social = new_social.replace(
					/{unencoded_location_href}/g,
					location.href
				);
				// Facebook bug of likes and shares being reset
				//new_social=new_social.replace("{f_location_href}",encodeURIComponent(URI));
				// Unfortunately only this works
				var queryStringChar = '?'; // for default URLs and if the content URL has the ? then it doesn't matter
				if(URI.indexOf('?') !== -1 && URI.indexOf('?') < URI.indexOf('#!')){
						queryStringChar = '&'; // if the page URL has the ? then add _escaped_fragment_ with an &
				}
				new_social=new_social.replace(
					/{f_location_href}/g,
					encodeURIComponent(
						URI.replace(
							'#!',
							queryStringChar+'_escaped_fragment_='
						)
					)
				);
				//new_social=new_social.replace(/{t_location_href}/g,encodeURIComponent(location.href.replace(/\|(poster|videoplayer)/ig, "$1")));
				// Pinterest only
				
				var imageURL = pp_images[set_position],
					URLmatches = /(?:poster=)(.*)(?:\|videoplayer)/m.exec(imageURL);
				if (URLmatches === null) {
					new_social=new_social.replace(/{location_img}/g,encodeURIComponent(pp_images[set_position]));
				} else {
					new_social=new_social.replace(/{location_img}/g,encodeURIComponent(URLmatches[1]));
				}
				var imageDescription = '';
				if(new_social.indexOf("{twitter_text}") !== -1){
					if(typeof pp_titles[set_position] !== 'undefined'){
						imageDescription = pp_titles[set_position];
						new_social = new_social.replace(
							/{twitter_text}/g,
							encodeURIComponent(
								strip_tags(
									imageDescription.replace(
										/<a(?:.+?)href=['"](.+?)['"](?:.+?>)(.+?)(?:<\/a>)/mg,
										"$2: $1"
									)
								)
							)
						);
					}else{
						new_social = new_social.replace(
							/{twitter_text}/g,
							encodeURIComponent(document.title)
						);

					}
				}
				if(typeof pp_descriptions[set_position] !== 'undefined'){
					imageDescription += imageDescription !== '' ? ' '+pp_descriptions[set_position] : pp_descriptions[set_position];
				}
	
				new_social=new_social.replace(/{d}/g,encodeURIComponent(strip_tags(imageDescription.replace(/<a(?:.+?)href=['"](.+?)['"](?:.+?>)(.+?)(?:<\/a>)/mg, "$2: $1"))));

				$pp_pic_holder.find('.pp_social').html(new_social);

			}else{
				$pp_pic_holder.find('.pp_social').remove();
			}



			
			// Fade the content in
			if($ppt.is(':hidden')) $ppt.css('opacity',0).show();
			$pp_overlay.show().fadeTo(settings.animation_speed,settings.opacity, "JIGswing");

			// Display the current position
			$pp_pic_holder.find('.currentTextHolder').text((set_position+1) + settings.counter_separator_label + $(pp_images).length);

			if(settings.title_position == 'inside'){
				pp_descriptions[set_position] =
						((settings.show_title && pp_titles[set_position] != "" && typeof pp_titles[set_position] != "undefined") ?
							'<div class="ppt_inside">'+pp_titles[set_position]+'</div>'
							: ''
						)+(typeof pp_descriptions[set_position] != 'undefined' ?
							pp_descriptions[set_position]
							: ''
						);
				pp_titles[set_position] = undefined;
				$pp_pic_holder.find('.pp_details').addClass('pp_includes_title');
			}
			// Set the description
			if(typeof pp_descriptions[set_position] != 'undefined' && pp_descriptions[set_position] != ""){
				$pp_pic_holder.find('.pp_description').html(pp_descriptions[set_position]);
			}else{
				$pp_pic_holder.find('.pp_description').empty();
			}
			
			// Get the dimensions
			var movie_width = ( parseFloat(getParam('width',pp_images[set_position])) ) ? getParam('width',pp_images[set_position]) : settings.default_width.toString(),
				movie_height = ( parseFloat(getParam('height',pp_images[set_position])) ) ? getParam('height',pp_images[set_position]) : settings.default_height.toString();
			
			// If the size is % based, calculate according to window dimensions
			percentBased=false;
			if(movie_height.indexOf('%') != -1) { movie_height = parseFloat(($(window).height() * parseFloat(movie_height) / 100) - 150); percentBased = true; }
			if(movie_width.indexOf('%') != -1) { movie_width = parseFloat(($(window).width() * parseFloat(movie_width) / 100) - 150); percentBased = true; }
			
			// Fade the holder
			$pp_pic_holder.fadeIn({
				duration:400,
				easing: "JIGswing",
				complete: function(){
					// Set the title
					(settings.show_title && pp_titles[set_position] != "" && typeof pp_titles[set_position] != "undefined") ? $ppt.html(pp_titles[set_position]) : $ppt.remove();
					
					var imgPreloader = "",
						skipInjection = false;
					// Inject the proper content
					switch(_getFileType(pp_images[set_position])){
						case 'image':
							imgPreloader = new Image();

							// Preload the neighbour images
							var nextImage = new Image();
							if(isSet && set_position < $(pp_images).length -1) nextImage.src = pp_images[set_position + 1];
							var prevImage = new Image();
							if(isSet && pp_images[set_position - 1]) prevImage.src = pp_images[set_position - 1];

							$pp_pic_holder.find('#pp_full_res')[0].innerHTML = settings.image_markup.replace(/{path}/g,pp_images[set_position]);

							imgPreloader.onload = function(){
								// Fit item to viewport
								pp_dimensions = _fitToViewport(imgPreloader.width,imgPreloader.height);

								_showContent();
							};

							imgPreloader.onerror = function(){
								alert('Image cannot be loaded. Make sure the path is correct and image exist.');
								$.prettyPhoto.close();
							};
						
							imgPreloader.src = pp_images[set_position];
						break;
					
						case 'youtube':
							pp_dimensions = _fitToViewport(movie_width,movie_height); // Fit item to viewport
							// Regular youtube link
							movie_id = getParam('v',pp_images[set_position]);
							// youtu.be link
							if(movie_id == ""){
								movie_id = pp_images[set_position].split('youtu.be/');
								movie_id = movie_id[1];
								if(movie_id.indexOf('?') > 0)
									movie_id = movie_id.substr(0,movie_id.indexOf('?')); // Strip anything after the ?

								if(movie_id.indexOf('&') > 0)
									movie_id = movie_id.substr(0,movie_id.indexOf('&')); // Strip anything after the &
							}

							movie = '//www.youtube.com/embed/'+movie_id;
							(getParam('rel',pp_images[set_position])) ? movie+="?rel="+getParam('rel',pp_images[set_position]) : movie+="?rel=0";
								
							if(settings.autoplay) movie += "&autoplay=1";
						
							toInject = settings.iframe_markup.replace(/{width}/g,pp_dimensions['width']).replace(/{height}/g,pp_dimensions['height']).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,movie);
						break;
					
						case 'vimeo':
							pp_dimensions = _fitToViewport(movie_width,movie_height); // Fit item to viewport
							movie_id = pp_images[set_position];
							var match = movie_id.match(/https?:\/\/(?:www\.)?vimeo\.com\/(?:(\d+)|channels\/\w+?\/(\d+))/m),
								videoID = match[1] | match[2];
							movie = '//player.vimeo.com/video/'+ videoID +'?title=0&amp;byline=0&amp;portrait=0';
							if(settings.autoplay) movie += "&autoplay=1;";
					
							vimeo_width = pp_dimensions['width'] + '/embed/?moog_width='+ pp_dimensions['width'];
					
							toInject = settings.iframe_markup.replace(/{width}/g,vimeo_width).replace(/{height}/g,pp_dimensions['height']).replace(/{path}/g,movie);
						break;
					
						case 'quicktime':
							pp_dimensions = _fitToViewport(movie_width,movie_height); // Fit item to viewport
							pp_dimensions['height']+=15; pp_dimensions['imageHeight']+=15; pp_dimensions['containerHeight']+=15; // Add space for the control bar
					
							toInject = settings.quicktime_markup.replace(/{width}/g,pp_dimensions['width']).replace(/{height}/g,pp_dimensions['height']).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,pp_images[set_position]).replace(/{autoplay}/g,settings.autoplay);
						break;
					
						case 'flash':
							pp_dimensions = _fitToViewport(movie_width,movie_height); // Fit item to viewport
						
							flash_vars = pp_images[set_position];
							flash_vars = flash_vars.substring(pp_images[set_position].indexOf('flashvars') + 10,pp_images[set_position].length);

							filename = pp_images[set_position];
							filename = filename.substring(0,filename.indexOf('?'));
						
							toInject =  settings.flash_markup.replace(/{width}/g,pp_dimensions['width']).replace(/{height}/g,pp_dimensions['height']).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,filename+'?'+flash_vars);
						break;
					
						case 'iframe':
							pp_dimensions = _fitToViewport(movie_width,movie_height); // Fit item to viewport
					
							frame_url = pp_images[set_position];
							frame_url = frame_url.substr(0,frame_url.indexOf('iframe')-1);

							toInject = settings.iframe_markup.replace(/{width}/g,pp_dimensions['width']).replace(/{height}/g,pp_dimensions['height']).replace(/{path}/g,frame_url);
						break;
						
						case 'videoplayer':
							pp_dimensions = _fitToViewport(movie_width,movie_height); // Fit item to viewport
					
							frame_url = pp_images[set_position];
							if(settings.videoplayer !== false){
								// cuts off |videoplayer from the URL and replaces pipe with &
								frame_url = settings.videoplayer+frame_url.substr(0,frame_url.indexOf('|videoplayer')).replace(/\|/,"&");
							}
							
							toInject = settings.iframe_markup.replace(/{width}/g,pp_dimensions['width']).replace(/{height}/g,pp_dimensions['height']).replace(/{path}/g,frame_url);
						break;
						case 'ajax':
							doresize = false; // Make sure the dimensions are not resized.
							pp_dimensions = _fitToViewport(movie_width,movie_height);
							doresize = true; // Reset the dimensions
						
							skipInjection = true;
							$.get(pp_images[set_position],function(responseHTML){
								toInject = settings.inline_markup.replace(/{content}/g,responseHTML);
								$pp_pic_holder.find('#pp_full_res')[0].innerHTML = toInject;
								_showContent();
							});
							
						break;
						
						case 'custom':
							pp_dimensions = _fitToViewport(movie_width,movie_height); // Fit item to viewport
						
							toInject = settings.custom_markup;
						break;
					
						case 'inline':
							// to get the item height clone it, apply default width, wrap it in the prettyPhoto containers , then delete
							myClone = $(pp_images[set_position]).clone().append('<br clear="all" />').css({'width':settings.default_width}).wrapInner('<div id="pp_full_res"><div class="pp_inline"></div></div>').appendTo($('body')).show();
							doresize = false; // Make sure the dimensions are not resized.
							pp_dimensions = _fitToViewport($(myClone).width(),$(myClone).height());
							doresize = true; // Reset the dimensions
							$(myClone).remove();
							toInject = settings.inline_markup.replace(/{content}/g,$(pp_images[set_position]).html());
						break;
					};

					if(!imgPreloader && !skipInjection){
						$pp_pic_holder.find('#pp_full_res')[0].innerHTML = toInject;
						// Show content
						_showContent();
					};
				}
			});



			return false;
		};

	
		/**
		* Change page in the prettyPhoto modal box
		* @param direction {String} Direction of the paging, previous or next.
		*/
		$.prettyPhoto.changePage = function(direction){
			currentGalleryPage = 0;
			
			if(direction == 'previous') {
				set_position--;
				if (set_position < 0) set_position = $(pp_images).length-1;
			}else if(direction == 'next'){
				set_position++;
				if(set_position > $(pp_images).length-1) set_position = 0;
			}else{
				set_position=direction;
			};
			
			rel_index = set_position;

			if(!doresize) doresize = true; // Allow the resizing of the images
			if(settings.allow_expand) {
				$('.pp_contract').removeClass('pp_contract').addClass('pp_expand');
			}

			_hideContent(function(){ $.prettyPhoto.open(); });
		};


		/**
		* Change gallery page in the prettyPhoto modal box
		* @param direction {String} Direction of the paging, previous or next.
		*/
		$.prettyPhoto.changeGalleryPage = function(direction){
			if(direction=='next'){
				currentGalleryPage ++;

				if(currentGalleryPage > totalPage) currentGalleryPage = 0;
			}else if(direction=='previous'){
				currentGalleryPage --;

				if(currentGalleryPage < 0) currentGalleryPage = totalPage;
			}else{
				currentGalleryPage = direction;
			};
			
			slide_speed = (direction == 'next' || direction == 'previous') ? settings.animation_speed : 0;

			slide_to = currentGalleryPage * (itemsPerPage * itemWidth);

			$pp_gallery.find('ul').animate({left:-slide_to},slide_speed, "JIGeaseInOutQuad");
		};


		/**
		* Start the slideshow...
		*/
		$.prettyPhoto.startSlideshow = function(){
			if(typeof pp_slideshow == 'undefined'){
				$pp_pic_holder.find('.pp_play').off('click').removeClass('pp_play').addClass('pp_pause').click(function(){
					$.prettyPhoto.stopSlideshow();
					return false;
				});
				pp_slideshow = setInterval($.prettyPhoto.startSlideshow,settings.slideshow);
			}else{
				$.prettyPhoto.changePage('next');	
			};
		}


		/**
		* Stop the slideshow...
		*/
		$.prettyPhoto.stopSlideshow = function(){
			$pp_pic_holder.find('.pp_pause').off('click').removeClass('pp_pause').addClass('pp_play').click(function(){
				$.prettyPhoto.startSlideshow();
				return false;
			});
			clearInterval(pp_slideshow);
			pp_slideshow=undefined;
		}


		/**
		* Closes prettyPhoto.
		*/
		$.prettyPhoto.close = function(){
			if($pp_overlay.is(":animated")) return;
			
			$.prettyPhoto.stopSlideshow();
			
			$pp_pic_holder.stop().find('object,embed').css('visibility','hidden');
			
			$('div.pp_pic_holder,div.ppt,.pp_fade').fadeOut({
																duration: settings.animation_speed,
																easing: "JIGswing",
																complete: function(){
																			$(this).remove();
																		}
															});
			
			$pp_overlay.fadeOut({	duration: settings.animation_speed,
									easing: "JIGswing",
									complete: function(){
				
												if(settings.hideflash) $('object,embed,iframe[src*=youtube],iframe[src*=vimeo]').css('visibility','visible'); // Show the flash									
												$(this).remove(); // No more need for the prettyPhoto markup
												$(window).off('scroll.prettyphoto');
												clearHashtag();
												settings.callback();
												doresize = true;
												pp_open = false;
												settings = undefined;
											}
			});
		};


		

		function strip_tags(input, allowed) {
			input = htmlspecialchars_decode(input);
			allowed = (((allowed || "") + "").toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []).join(''); // making sure the allowed arg is a string containing only tags in lowercase (<a><b><c>)
			var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
				commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
			return input.replace(commentsAndPhpTags, '').replace(tags, function ($0, $1) {
				return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
			});
		}

		function htmlspecialchars_decode(string, quote_style) {
			if(string === undefined){
				return '';
			}
			var optTemp = 0,
				noquotes = false;
			if (typeof quote_style === 'undefined') {
				quote_style = 2;
			}
			string = string.toString().replace(/&lt;/g, '<').replace(/&gt;/g, '>');
			var OPTS = {
				'ENT_NOQUOTES': 0,
				'ENT_HTML_QUOTE_SINGLE': 1,
				'ENT_HTML_QUOTE_DOUBLE': 2,
				'ENT_COMPAT': 2,
				'ENT_QUOTES': 3,
				'ENT_IGNORE': 4
			};
			if (quote_style === 0) {
				noquotes = true;
			}
			if (typeof quote_style !== 'number') { // Allow for a single string or an array of string flags
				quote_style = [].concat(quote_style);
				for (var i = 0, j = quote_style.length; i < j; i += 1) {
					// Resolve string input to bitwise e.g. 'PATHINFO_EXTENSION' becomes 4
					if (OPTS[quote_style[i]] === 0) {
						noquotes = true;
					} else if (OPTS[quote_style[i]]) {
						optTemp = optTemp | OPTS[quote_style[i]];
					}
				}
				quote_style = optTemp;
			}
			if (quote_style & OPTS.ENT_HTML_QUOTE_SINGLE) {
				string = string.replace(/&#0*39;/g, "'"); // PHP doesn't currently escape if more than one 0, but it should
				// string = string.replace(/&apos;|&#x0*27;/g, "'"); // This would also be useful here, but not a part of PHP
			}
			if (!noquotes) {
				string = string.replace(/&quot;/g, '"');
			}
			// Put this in last place to avoid escape being double-decoded
			string = string.replace(/&amp;/g, '&');

			return string;
		}
		/**
		* Set the proper sizes on the containers and animate the content in.
		*/
		function _showContent(){

			$('.pp_loaderIcon').hide();

			// Calculate the opened top position of the pic holder
			projectedTop = scroll_pos['scrollTop'] + ((windowHeight/2) - (pp_dimensions['containerHeight']/2));
			if(projectedTop < 0) projectedTop = 0;

			$ppt.fadeTo(settings.animation_speed, 1, "JIGswing");

			// Resize the content holder
			$pp_pic_holder.find('.pp_content')
				.animate({
					height:pp_dimensions['imageHeight'],
					width:pp_dimensions['imageWidth']
				},settings.animation_speed, "JIGeaseInOutQuad");
			
			// Resize picture the holder
			$pp_pic_holder.animate({
				'top': projectedTop,
				'left': ((windowWidth/2) - (pp_dimensions['containerWidth']/2) < 0) ? 0 : (windowWidth/2) - (pp_dimensions['containerWidth']/2),
				width:pp_dimensions['containerWidth']
			},settings.animation_speed, "JIGeaseInOutQuad", function(){

				$pp_pic_holder.find('.pp_hoverContainer,#fullResImage').height(pp_dimensions['height']).width(pp_dimensions['width']);

				$pp_pic_holder.find('.pp_fade').fadeIn({
					"duration": settings.animation_speed,
					"easing": "JIGswing",
					"complete" : function(){
						if(settings.social_tools){
							if(facebookIndex !== -1){
								loadFacebookButton();
							}
							if(twitterIndex !== -1){
								loadTweetButton();
							}
							if (pinterestIndex !== -1){
								loadPinButton();
							}
							if (googleIndex !== -1){
								loadGoogleButton();
							}
						}
					}
				}); // Fade the new content


				// Show the nav
				if(isSet && _getFileType(pp_images[set_position])=="image" && pp_images.length > 1) {
					$pp_pic_holder.find('.pp_hoverContainer').show();
				}else{
					$pp_pic_holder.find('.pp_hoverContainer').hide();
				}
			
				if(settings.allow_expand) {
					if(pp_dimensions['resized']){ // Fade the resizing link if the image is resized
						$('a.pp_expand,a.pp_contract').show();
					}else{
						$('a.pp_expand').hide();
					}
				}
				
				if(settings.autoplay_slideshow && !pp_slideshow && !pp_open) $.prettyPhoto.startSlideshow();
				
				settings.changepicturecallback(); // Callback!
				

				pp_open = true;
			});
			
			_insert_gallery();
			pp_settings.ajaxcallback();

		}
		
		/**
		* Hide the content...DUH!
		*/
		function _hideContent(callback){
			// Fade out the current picture
			$pp_pic_holder.find('#pp_full_res object,#pp_full_res embed').css('visibility','hidden');
			$pp_pic_holder.find('.pp_fade').fadeOut({
														duration:settings.animation_speed,
														easing: "JIGswing",
														complete: function(){
																	$('.pp_loaderIcon').show();
																	callback();
																}
			});
		};
	
		/**
		* Check the item position in the gallery array, hide or show the navigation links
		* @param setCount {integer} The total number of items in the set
		*/
		function _checkPosition(setCount){
			(setCount > 1) ? $('.pp_nav').removeClass('pp_nav_hidden') : $('.pp_nav').addClass('pp_nav_hidden'); // Hide the bottom nav if it's not a set.
		};
	
		/**
		* Resize the item dimensions if it's bigger than the viewport
		* @param width {integer} Width of the item to be opened
		* @param height {integer} Height of the item to be opened
		* @return An array containin the "fitted" dimensions
		*/

		// Heavily modified by JIG to avoid crashes and bad fitting
		function _fitToViewport(imageWidth,imageHeight){
			_getDimensions(imageWidth,imageHeight);
			resized = false;
			var smallerWindowWidth = windowWidth-50,
				smallerWindowHeight = windowHeight-40,
				// Define them in case there's no resize needed
				newimageWidth = imageWidth,
				newimageHeight = imageHeight;
						
			if( ((pp_containerWidth > smallerWindowWidth) || (pp_containerHeight > smallerWindowHeight)) && doresize && settings.allow_resize && !percentBased) {
				var resized = true,
					fitting = true,
					enoughPlease = false;
				while (fitting){

					if((pp_containerWidth > smallerWindowWidth)){
						newimageWidth = (Math.min(smallerWindowWidth, newimageWidth) - 20);
						newimageHeight = (imageHeight/imageWidth) * newimageWidth;
						// Stop the loop and leave the image alone if it's too small anyway - prevents crash! (infinite loop)
						if(newimageWidth < 200){
							newimageWidth = 200;
							newimageHeight = (imageHeight/imageWidth) * newimageWidth;
							fitting = false;
							enoughPlease = true;
						}
					}
					if((pp_containerHeight > smallerWindowHeight)){
						newimageHeight = (Math.min(smallerWindowHeight, newimageHeight) - 20);
						newimageWidth = (imageWidth/imageHeight) * newimageHeight;
						// Stop the loop and leave the image alone if it's too small anyway - prevents crash! (infinite loop)
						if(newimageHeight < 200){
							newimageHeight = 200;
							newimageWidth = (imageWidth/imageHeight) * newimageHeight;
							fitting = false;
							enoughPlease = true;
						}
					}

					_getDimensions(newimageWidth,newimageHeight);

					if(enoughPlease == false && ((pp_containerWidth > smallerWindowWidth) || (pp_containerHeight > smallerWindowHeight))){
						fitting = true;
					}else{
						fitting = false;
					}
				};
			};
			_center_overlay();
			return {
				width:Math.floor(newimageWidth),
				height:Math.floor(newimageHeight),
				containerHeight:Math.floor(pp_containerHeight),
				containerWidth:Math.floor(pp_containerWidth) + (settings.horizontal_padding * 2),
				imageHeight:Math.floor(pp_contentHeight),
				imageWidth:Math.floor(pp_contentWidth),
				resized:resized
			};
		};
		
		/**
		* Get the containers dimensions according to the item size
		* @param width {integer} Width of the item to be opened
		* @param height {integer} Height of the item to be opened
		*/
		function _getDimensions(imageWidth,imageHeight){
			imageWidth = parseFloat(imageWidth);
			imageHeight = parseFloat(imageHeight);
			
			// Get the details height, to do so, I need to clone it since it's invisible
			$pp_details = $pp_pic_holder.find('.pp_details');
			$pp_details.width(imageWidth);
			var detailsHeight = 0;
			var themeClass = settings.theme !== 'facebook' ? settings.theme : 'pp_facebook';
			var $ppTemp = $('<div class="prettyPhotoTemporaryMeasure"><div class="pp_content_container"></div></div>').addClass(themeClass).css({'position':'absolute','top':-10000}).appendTo('body');

			$pp_details = $pp_details.clone().width(imageWidth).appendTo($ppTemp.find('.pp_content_container'));

			if(settings.title_position == 'inside'){

				// Reset styles of previous slide
				$('.pp_details.pp_includes_title').removeClass('pp_alt_x_position pp_alt_br_position pp_socials_own_line');
				$('.pp_details .pp_nav, .pp_details .pp_description, .pp_details .pp_bottom_right').removeAttr('style');

				var $pp_description = $pp_details.find('.pp_description:visible');
				if($pp_description.length !== 0 && $pp_description.position().left === 0){
					// If description has broken down to next line
					// Add ample right margin so it stays there
					$('.pp_details .pp_description').css('margin-right',0).prev().css('margin-right',48);
					if($pp_details.find('.pp_social').outerWidth(true) < $pp_details.width()-$pp_details.find('.pp_nav').outerWidth(true)){
						$('.pp_details.pp_includes_title').addClass('pp_alt_br_position');
					}else{
						$('.pp_details.pp_includes_title').addClass('pp_alt_x_position');
					}
					
				}else if($pp_details.find('.pp_bottom_right').position().top){
					// Description is still at the top
					// If X and socials don't fit to the top

					if($pp_description.length === 0 || $pp_details.find('.pp_social').height() > 30){
						// If social is in 2 lines OR there is no description
						$('.pp_details.pp_includes_title').addClass('pp_alt_x_position');
						// Since removing the close button from the flow, can make socials fit, but getting covered by the close button, it needs to be ensured that they go to their own line - end of the parent if block
					}else{
						$('.pp_details .pp_description').css('margin-right',0);
					}
					// Keeping / putting the socials on their own line
					$('.pp_details .pp_bottom_right').css('float','none');
					if($pp_details.find('.pp_social').length == 1){
						$('.pp_details.pp_includes_title').addClass('pp_socials_own_line');
					}
				}
			}
			detailsHeight += $ppTemp.outerHeight(true);
			detailsHeight = (detailsHeight <= 34) ? 36 : detailsHeight; // Min-height for the details
			$ppTemp.remove();

			titleHeight = 0;
			if(settings.title_position !== 'inside'){
				// Get the titles height, to do so, I need to clone it since it's invisible
				$pp_title = $pp_pic_holder.find('.ppt');
				$pp_title.width(imageWidth);
				titleHeight = parseFloat($pp_title.css('marginTop')) + parseFloat($pp_title.css('marginBottom'));
				$pp_title = $pp_title.clone().appendTo($('body')).css({
					'position':'absolute',
					'top':-10000
				});
				titleHeight += $pp_title.height();
				$pp_title.remove();
			}
			
			// Get the container size, to resize the holder to the right dimensions
			pp_contentHeight = imageHeight + detailsHeight;
			pp_contentWidth = imageWidth;
			pp_containerHeight = pp_contentHeight + titleHeight + $pp_pic_holder.find('.pp_top').height() + $pp_pic_holder.find('.pp_bottom').height();
			pp_containerWidth = imageWidth;

		}
	
		function _getFileType(itemSrc){
			if(itemSrc.match(/\b\|videoplayer\b/i)){
				return 'videoplayer';
			}else if (itemSrc.match(/youtube\.com\/watch/i) || itemSrc.match(/youtu\.be/i)) {
				return 'youtube';
			}else if (itemSrc.match(/vimeo\.com/i)) {
				return 'vimeo';
			}else if(itemSrc.match(/\b.mov\b/i)){ 
				return 'quicktime';
			}else if(itemSrc.match(/\b.swf\b/i)){
				return 'flash';
			}else if(itemSrc.match(/\biframe=true\b/i)){
				return 'iframe';
			}else if(itemSrc.match(/\bajax=true\b/i)){
				return 'ajax';
			}else if(itemSrc.match(/\bcustom=true\b/i)){
				return 'custom';
			}else if(itemSrc.substr(0,1) == '#'){
				return 'inline';
			}else{
				return 'image';
			};
		};
	
		function _center_overlay(){
			if(doresize && typeof $pp_pic_holder != 'undefined') {
				scroll_pos = _get_scroll();
				var imageHeight = $pp_pic_holder.height(), imageWidth = $pp_pic_holder.width();

				projectedTop = (windowHeight/2) + scroll_pos['scrollTop'] - (imageHeight/2);
				if(projectedTop < 0) projectedTop = 0;
				
				if(imageHeight > windowHeight)
					return;

				$pp_pic_holder.css({
					'top': projectedTop,
					'left': (windowWidth/2) + scroll_pos['scrollLeft'] - (imageWidth/2)
				});
				
			};
		};
	
		function _get_scroll(){
			if (self.pageYOffset) {
				return {scrollTop:self.pageYOffset,scrollLeft:self.pageXOffset};
			} else if (document.documentElement && document.documentElement.scrollTop) { // Explorer 6 Strict
				return {scrollTop:document.documentElement.scrollTop,scrollLeft:document.documentElement.scrollLeft};
			} else if (document.body) {// all other Explorers
				return {scrollTop:document.body.scrollTop,scrollLeft:document.body.scrollLeft};
			};
		};
	
		function _resize_overlay() {
			windowHeight = $(window).height(), windowWidth = $(window).width();
			
			if(typeof $pp_overlay != "undefined") $pp_overlay.height($(document).height()).width(windowWidth);
		};
	
		function _insert_gallery(){
			if(isSet && settings.overlay_gallery && _getFileType(pp_images[set_position])=="image") {
				itemWidth = 52+5; // 52 beign the thumb width, 5 being the right margin.
				navWidth = (settings.theme == "facebook" || settings.theme == "pp_default") ? 50 : 30; // Define the arrow width depending on the theme
				
				itemsPerPage = Math.floor((pp_dimensions['containerWidth'] - 100 - navWidth) / itemWidth);
				itemsPerPage = (itemsPerPage < pp_images.length) ? itemsPerPage : pp_images.length;
				totalPage = Math.ceil(pp_images.length / itemsPerPage) - 1;

				// Hide the nav in the case there's no need for links
				if(totalPage == 0){
					navWidth = 0; // No nav means no width!
					$pp_gallery.find('.pp_arrow_next,.pp_arrow_previous').hide();
				}else{
					$pp_gallery.find('.pp_arrow_next,.pp_arrow_previous').show();
				};

				galleryWidth = itemsPerPage * itemWidth;
				fullGalleryWidth = pp_images.length * itemWidth;
				
				// Set the proper width to the gallery items
				$pp_gallery
					.css('margin-left',-((galleryWidth/2) + (navWidth/2)))
					.find('div:first').width(galleryWidth+5)
					.find('ul').width(fullGalleryWidth)
					.find('li.selected').removeClass('selected');
				
				goToPage = (Math.floor(set_position/itemsPerPage) < totalPage) ? Math.floor(set_position/itemsPerPage) : totalPage;

				$.prettyPhoto.changeGalleryPage(goToPage);
				
				$pp_gallery_li.filter(':eq('+set_position+')').addClass('selected');
			}else{
				$pp_pic_holder.find('.pp_content').off('mouseenter mouseleave');
				// $pp_gallery.hide();
			}
		}

		function _build_overlay(caller){
			

			// Inject Social Tool markup into General markup

			settings.markup = settings.markup.replace('{pp_social}',''); 
			
			$('body').append(settings.markup); // Inject the markup
			
			$pp_pic_holder = $('.pp_pic_holder') , $ppt = $('.ppt'), $pp_overlay = $('div.pp_overlay'); // Set my global selectors
			
			// Inject the inline gallery!
			if(isSet && settings.overlay_gallery) {
				currentGalleryPage = 0;
				toInject = "";
				for (var i=0; i < pp_images.length; i++) {
					if(!pp_images[i].match(/\b(jpg|jpeg|png|webp|bmp|gif)\b/gi)){
						classname = ' class="default"';
						img_src = '';
					}else{
						classname = '';
						if(typeof JIGelement !== 'undefined'){
							img_src = JIGelement.find('a.jig-link[href="'+pp_images[i]+'"]:not(.jig-hiddenLink) img').eq(0).attr('src');
							if(typeof img_src == 'undefined' || img_src.substr(0,5) === "data:"){
								img_src = pp_images[i];
							}
						}else{
							img_src = pp_images[i];
						}
					}




					toInject += '<li'+classname+'><a href="#"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" style="background-image: url(' + img_src + ');" alt="' + encodeURIComponent(strip_tags(pp_titles[i].replace(/<a(?:.+?)href=['"](.+?)['"](?:.+?>)(.+?)(?:<\/a>)/mg, "$2: $1"))) + '" /></a></li>';
				};
				
				toInject = settings.gallery_markup.replace(/{gallery}/g,toInject);
				
				$pp_pic_holder.find('#pp_full_res').after(toInject);
				
				$pp_gallery = $('.pp_pic_holder .pp_gallery'), $pp_gallery_li = $pp_gallery.find('li'); // Set the gallery selectors
				
				$pp_gallery.find('.pp_arrow_next').click(function(){
					$.prettyPhoto.changeGalleryPage('next');
					$.prettyPhoto.stopSlideshow();
					return false;
				});
				
				$pp_gallery.find('.pp_arrow_previous').click(function(){
					$.prettyPhoto.changeGalleryPage('previous');
					$.prettyPhoto.stopSlideshow();
					return false;
				});
				
				$pp_pic_holder.find('.pp_content').hover(
					function(){
						$pp_pic_holder.find('.pp_gallery:not(.disabled)').fadeIn({duration: 400, easing: "JIGswing"});
					},
					function(){
						$pp_pic_holder.find('.pp_gallery:not(.disabled)').fadeOut({duration: 400, easing: "JIGswing"});
					});

				itemWidth = 52+5; // 52 beign the thumb width, 5 being the right margin.
				$pp_gallery_li.each(function(i){
					$(this)
						.find('a')
						.click(function(){
							$.prettyPhoto.changePage(i);
							$.prettyPhoto.stopSlideshow();
							return false;
						});
				});
			};
			
			
			// Inject the play/pause if it's a slideshow
			if(settings.slideshow){
				$pp_pic_holder.find('.pp_nav').prepend('<a href="#" class="pp_play">Play</a>')
				$pp_pic_holder.find('.pp_nav .pp_play').click(function(){
					$.prettyPhoto.startSlideshow();
					return false;
				});
			}
			var themeClass = settings.theme !== 'facebook' ? settings.theme : 'pp_facebook';
			$pp_pic_holder.attr('class','pp_pic_holder ' + themeClass); // Set the proper theme
			
			$pp_overlay
				.css({
					'opacity':0,
					'height':$(document).height(),
					'width':$(window).width()
					})
				.on('click',function(){
					if(!settings.modal) $.prettyPhoto.close();
				});

			$('a.pp_close').on('click',function(){ $.prettyPhoto.close(); return false; });


			if(settings.allow_expand) {
				$('a.pp_expand').on('click',function(e){
					// Expand the image
					if($(this).hasClass('pp_expand')){
						$(this).removeClass('pp_expand').addClass('pp_contract');
						doresize = false;
					}else{
						$(this).removeClass('pp_contract').addClass('pp_expand');
						doresize = true;
					};
				
					_hideContent(function(){ $.prettyPhoto.open(); });
			
					return false;
				});
			}
		
			$pp_pic_holder.find('.pp_previous, .pp_nav .pp_arrow_previous').on('click',function(){
				$.prettyPhoto.changePage('previous');
				$.prettyPhoto.stopSlideshow();
				return false;
			});
		
			$pp_pic_holder.find('.pp_next, .pp_nav .pp_arrow_next').on('click',function(){
				$.prettyPhoto.changePage('next');
				$.prettyPhoto.stopSlideshow();
				return false;
			});
			_center_overlay(); // Center it
		};
		if(!pp_alreadyInitialized && getHashtag() && pp_settings.jig_call == true){
			/*setTimeout(function(){ */
				var patt, matchByIndex, hashImage, hashMatches, hashTag, hashRel, deeplinkingFallback = false;
				
				// Grab the rel index to trigger the click on the correct element
				hashTag = getHashtag(); 
				hashRel = hashTag.substring(0,hashTag.indexOf('/'));
				hashTag = hashTag.substring(hashTag.indexOf('/')+1,hashTag.length);

				if((/^([A-Z]{2}\/[_\w]*)$/im.test(hashTag))){

					hashTag = hashTag.replace("/","-");

					hashMatches = JIGelement.find('.jig-contentID-'+hashTag).find("a["+pp_settings.hook+"^='"+hashRel+"']").first();
					// Try hidden links
					if(hashMatches.length === 0){
						hashMatches = JIGelement.find("a["+pp_settings.hook+"^='"+hashRel+"'].jig-contentID-"+hashTag).first();
					}
					if(hashMatches.length !== 0){

						pp_alreadyInitialized = true;
						$(window).one('jigPrettyPhotoActivation', function() {
							jigOtherPrettyPhotoIsPresent = undefined; // No need to re-call prettyPhoto as this is already a JIG call (prevents double reopen)
							hashMatches.trigger('click');
						});

						deeplinkingFallback = false;
					}else{
						deeplinkingFallback = true;
					}
				}else{
					deeplinkingFallback = true;
				}

				if(deeplinkingFallback == true){
					patt = new RegExp("(^\\d+)?/?(https?://.+$)");
					hashMatches = hashTag.match(patt); 

					if(hashMatches !== null){
						hashTag = hashMatches[1];
						hashImage = hashMatches[2];
						



							matchByIndex = JIGelement.find("a["+pp_settings.hook+"^='"+hashRel+"']").eq(hashTag);
							if(matchByIndex.attr('href') !== hashImage){

								// the key to partially match a weird url is this href^= 
								matchByIndex = JIGelement.find("a["+pp_settings.hook+"^='"+hashRel+"'][href^='"+hashImage+"']");
							}
							if(matchByIndex.length !== 0){
								pp_alreadyInitialized = true;
								$(window).one('jigPrettyPhotoActivation', function() {
									jigOtherPrettyPhotoIsPresent = undefined; // No need to re-call prettyPhoto as this is already a JIG call (prevents double reopen)
									matchByIndex.trigger('click');

								});
								deeplinkingFallback = false;
							}else{
								deeplinkingFallback = true;

							}
						deeplinkingFallback = false;
					}
				}
				
				if(deeplinkingFallback == true){
					// Little timeout to make sure all the prettyPhoto initialize scripts has been run.
					// Useful in the event the page contain several init scripts.

					if(JIGelement.find("a["+pp_settings.hook+"^='"+hashRel+"']").eq(hashTag).trigger('click').length !== 0){
						pp_alreadyInitialized = true;
					} 
				}
			/*},50);*/
		}
		
		return matchedObjects.off('click.prettyphoto').on('click.prettyphoto',$.prettyPhoto.initialize); // Return the jQuery object for chaining. The unbind method is used to avoid click conflict when the plugin is called more than once
		//return this.off('click.prettyphoto').on('click.prettyphoto',$.prettyPhoto.initialize); // Return the jQuery object for chaining. The unbind method is used to avoid click conflict when the plugin is called more than once
	};
	
	function getHashtag(){
		var hashtag = false,
			patt, hashMatches,
			url = location.hash;
			url = url.replace('%5B','[');
			url = url.replace('%5D',']');
			url = url.replace(/([^|])(poster=|videoplayer)/mg, "$1|$2");

		patt = /^#!?([\w\-[\]]+?\/(?:(\d+)(?=\/))?(https?:\/\/[^&]*)?([A-Z]{2}\/[_\w]*)?)/im;
		hashMatches = url.match(patt); 
		if(hashMatches !== null){
			hashtag = hashMatches[1];
		}
		return hashtag;
	};
	
	function setHashtag(matchedObjects){
		if(typeof theRel == 'undefined') return; // theRel is set on normal calls, it's impossible to deeplink using the API
		var fallbackToAdvanced = false;
		if(settings.smart_deeplinking == true && matchedObjects){
			var contentID = '',
				a = matchedObjects.filter("[href='"+pp_images[set_position]+"']"),
				theClass = a.attr('class'),
				contentIDregex = /(?:jig-contentID)-(\w{2})-([^\s]*)/im;

			if(theClass.indexOf('jig-contentID') !== -1){
				contentID = contentIDregex.exec(theClass);
				if (contentID != null) {
					contentID = contentID[1]+"/"+contentID[2];
				}
			}else{
				theClass = a.closest('.jig-imageContainer').attr('class');
				contentID = contentIDregex.exec(theClass);
				if (contentID != null) {
					contentID = contentID[1]+"/"+contentID[2];
				}
			}

			if(contentID){
				location.hash = '!'+theRel+'/'+contentID;
				return;
			}else{
				fallbackToAdvanced = true;
			}
		}
		if(settings.advanced_deeplinking == true || fallbackToAdvanced == true){
			location.hash = '!'+theRel+'/'+pp_images[set_position];
		}else{
			location.hash = theRel+'/'+rel_index+'/';
		}
	};
	
	function clearHashtag(){
		if(typeof theRel == 'undefined') return;
		var patt, hashMatches,
			url = location.hash,
			escapedRel = theRel.replace("[",")\\[");
		escapedRel = escapedRel.replace("]","\\]");
		if(escapedRel.indexOf(')') === -1){
			escapedRel += ')';
		}
		// only clear the hash if it's a prettyPhoto hash
		patt = new RegExp("^#(!?"+escapedRel+"/(\\d+?/)?(https?:\/\/.*)?([A-Z]{2}\/[_\w]*)?");
		hashMatches = url.match(patt); 
		if(hashMatches !== null){
			//location.hash = hashMatches[1];
			location.hash = '!';
		}
	}

	function getParam(name,url){
	  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
	  var regexS = "[\\?&]"+name+"=([^&#]*)";
	  var regex = new RegExp( regexS );
	  var results = regex.exec( url );
	  return ( results == null ) ? "" : results[1];
	}

	// loads Twitter button, once the prettyPhoto modal is open (called near the callback)
	function loadTweetButton(){
		var $twitterParent = $('.jig_pp_twitter'),
			$twitterButton = $('<iframe src="'+$twitterParent.data('src')+'" width="61" height="20" title="Twitter Tweet Button" style="border: 0; overflow: hidden;" scrolling="no"></iframe>');
			$twitterParent.empty().append($twitterButton);
	}
	// loads Facebook button, once the prettyPhoto modal is open (called near the callback)
	function loadFacebookButton(){
		var $facebookParent = $('.jig_pp_facebook'),
			$facebookButton = $('<iframe src="'+$facebookParent.data('src')+'" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:135px; height:21px;" allowTransparency="true"></iframe>');
			$facebookParent.empty().append($facebookButton);
	}

	// loads Google+ button, once the prettyPhoto modal is open (called near the callback)
	function loadGoogleButton(){
		var $googleParent = $('.jig_pp_google'),
			$googleButton = $('<g:plusone size="medium" annotation="none" href="'+$googleParent.data('href')+'"></g:plusone>');
			$googleParent.empty().append($googleButton);

			(function(){if(document.getElementById("jigGooglePlus"))gapi.plusone.go();else{var a=document.createElement("script");a.type="text/javascript";a.async=!0;a.src="https://apis.google.com/js/plusone.js";a.id="jigGooglePlus";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)}})();

	}

	// loads Pin button, once the prettyPhoto modal is open (called near the callback)
	function loadPinButton(){
		var $pinParent = jQuery(".jig_pp_pinterest"),
			$pinButton = jQuery('<a href="'+$pinParent.data('href')+'" class="pin-it-button" data-pin-do="buttonPin" data-pin-config="beside" data-pin-save="true"></a>');

			$pinParent.empty().append($pinButton);

			window["jigBuildPinterestButton"]($pinParent[0]);
			measurePinBtn();
	}



	var measurePinBtnTimeout,
		measurePinBtnTries = 0;
	function measurePinBtn(){
		var $pinWrapper = $(".jig_pp_pinterest");
		var socialsHeightBeforePinMeasure = $('.pp_details .pp_social').height();
		var brTopBeforePinMeasure = $('.pp_bottom_right').position().top;

		if($pinWrapper.length !== 0){
			var PinBtnScrollWidth = $pinWrapper.get(0).scrollWidth;
			// If there is data pin log then the processing of the button is finished, there is either a count or not, it won't change anymore

			var $pins = $pinWrapper.find('> span');

			if(PinBtnScrollWidth !== 0 && typeof $pins.attr('data-pin-log') !== 'undefined'){

				$(".jig_pp_pinterest").addClass('jig_pp_measured_pinterest').width(PinBtnScrollWidth);
				// If there is a change in pin button width that causes the socials row to change height, reflect this in the prettyPhoto window (like add 26px, better than overflowing or hiding the overflowing element...)
				if(brTopBeforePinMeasure < $('.pp_bottom_right').position().top){

					$('.pp_content').height($('.pp_content').height()+$('.pp_bottom_right').position().top-brTopBeforePinMeasure);
				}else if(socialsHeightBeforePinMeasure < $('.pp_details .pp_social').height()){

					$('.pp_content').height($('.pp_content').height()+$('.pp_details .pp_social').height()-socialsHeightBeforePinMeasure);
				}
				if(typeof measurePinBtnTimeout !== 'undefined'){
					measurePinBtnTries = 0;
					clearTimeout(measurePinBtnTimeout);
				}
			}else{
				if(measurePinBtnTries < 30){
					measurePinBtnTimeout = setTimeout(function(){
						measurePinBtnTries++;
						measurePinBtn();
						return;
					},500);
				}
			}
		}
	}

	// Pinterest needs some workaround tricks for dynamic content and Pin buttons that appear after their script is loaded
	// This function is overwritten by the proper Pin script, so it is just a placeholder until it arrives
	// Look for the global JS function that is defined by Pinterest script for rebuilding (rare but best)
	// Add Pin script the right way
	// This will expose the build function of the Pinterest script by this global
	// Assign the found function (a global with any name, exposed build function) from the best case scenario
	window["jigPinterestTrick"] = function(){
		var $pins = $('.jig_pp_social_btn.jig_pp_pinterest span[class$="_button_pin"]');
		if($pins.length > 1){
			$pins.not(':last').remove();
		}
		
		if(typeof window["jigPinterestTrickRan"] !== "undefined" && window["jigPinterestTrickRan"] === 1){
			return;
		}else{
			window["jigPinterestTrickRan"] = "pending";
		}
		var foundFunction = false,
			windowOwnProps = Object.keys(window),
			windowOwnPropsLength = windowOwnProps.length,
			aProp;

		// This detetcs when JIG or someone else properly included a data-pin-build on their Pinterest script inclusion (very rare)
		for(var i = 0; i < windowOwnPropsLength; i += 1){
   			try{
   				if(windowOwnProps[i].indexOf('webkit') !== -1){
   					continue;
   				}
   				aProp = windowOwnProps[i];

				if(typeof window[aProp] === "function" && window[aProp] == "function (a){d.f.build(a)}"){
					foundFunction = window[aProp];
					break;
				}

			}catch(exception){}
		}

		// Most often the build function needs to be found (if script already in the page), or just include the script
		if(foundFunction == false){ 
			for(var j = 0; j < windowOwnPropsLength; j += 1){
				try{
					if(windowOwnProps[j].indexOf('webkit') !== -1){
	   					continue;
	   				}
					aProp = windowOwnProps[j];

					if(aProp.indexOf("PIN_") === 0){
						if(aProp.length > 12){ 
							if(typeof window[aProp].f.build === "function"){
								foundFunction = window[aProp].f.build;
								break;
							}
						}else{
							foundFunction = "almost";
							// temporary PIN object, don't hurt it (it's still loading)
						}

					}
				}catch(exception){}
			}
			if(foundFunction === false){
				window["jigPinterestTrickRan"] = 1;
				// need to include pin script, it's not found
				var s = document.createElement("script");
				s.type = "text/javascript";
				s.async = true;
				s.src = "//assets.pinterest.com/js/pinit.js";
				s.setAttribute("data-pin-build", "jigBuildPinterestButton");

				$("body").append(s);
			}else if(typeof foundFunction === "function"){
				window["jigPinterestTrickRan"] = 1;
				window["jigBuildPinterestButton"] = foundFunction;
			}

		}else{
			window["jigPinterestTrickRan"] = 1;
			window["jigBuildPinterestButton"] = foundFunction;
		}
	};


	/*var parseFBshareBtnTimeout, parseFBshareBtnTries = 0;
	function parseFBshareBtn(){
		if(typeof FB !== 'undefined' && typeof FB.XFBML !== 'undefined'){
			FB.XFBML.parse($('.jig_pp_facebook_share')[0]);
			if(typeof parseFBshareBtnTimeout !== 'undefined'){
				clearTimeout(parseFBshareBtnTimeout);
			}
		}else{
			if(parseFBshareBtnTries < 30){
				parseFBshareBtnTimeout = setTimeout(function(){
					parseFBshareBtnTries++;
					parseFBshareBtn();
					return;
				},500);
			}
		}
	}*/


	// From https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/keys
	if (!Object.keys) {
		Object.keys = (function() {
			'use strict';
			var hasOwnProperty = Object.prototype.hasOwnProperty,
				hasDontEnumBug = !({ toString: null }).propertyIsEnumerable('toString'),
				dontEnums = [
					'toString',
					'toLocaleString',
					'valueOf',
					'hasOwnProperty',
					'isPrototypeOf',
					'propertyIsEnumerable',
					'constructor'
				],
				dontEnumsLength = dontEnums.length;

			return function(obj) {
				if (typeof obj !== 'object' && (typeof obj !== 'function' || obj === null)) {
					throw new TypeError('Object.keys called on non-object');
				}

				var result = [], prop, i;

				for (prop in obj) {
					if (hasOwnProperty.call(obj, prop)) {
						result.push(prop);
					}
				}

				if (hasDontEnumBug) {
					for (i = 0; i < dontEnumsLength; i++) {
						if (hasOwnProperty.call(obj, dontEnums[i])) {
							result.push(dontEnums[i]);
						}
					}
				}
				return result;
			};
		}());
	}

	
}
(function (){
	if(typeof jQuery.prettyPhoto !== 'undefined'){
		//intentionally global, detects if the page already uses prettyPhoto
		jigOtherPrettyPhotoIsPresent = true;
	}
	loadJIGprettyPhoto(jQuery); // adds ability to re-add to the jQuery object if a newly loaded jQuery 'reset' it
	pp_alreadyInitialized = false; // Used for the deep linking to make sure not to call the same function several times.
})();