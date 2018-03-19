<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WorkScout
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> -->
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri().'/css/custom.css'; ?>"> -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">
<link href="https://fonts.googleapis.com/css?family=Abel|Damion|Oswald|Roboto+Condensed|Satisfy" rel="stylesheet"> 
<link rel='stylesheet' id='js_composer_front-css' href='<?php echo get_site_url(); ?>/wp-content/plugins/js_composer/assets/css/js_composer.min.css?ver=5.3' type='text/css' media='all' />
<link href="<?php echo get_site_url(); ?>/wp-content/themes/workscout/css/custom.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Open+Sans+Condensed:300" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Indie+Flower|Pavanam" rel="stylesheet">
<?php wp_head(); ?>
</head>
<?php $layout = Kirki::get_option( 'workscout','pp_body_style','fullwidth' ); ?>
<body <?php body_class($layout); ?>>
<div id="wrapper">
<div id="top-header">
	<div class="container">
		<div class="social-media-icons">
			<aside id="nav_menu-4" class="footer-widget widget_nav_menu">
				<div class="menu-footer-menu-3-container">
					<div class="login-btn-top">
						<?php if ( !is_user_logged_in() )  {  ?>
							<a href="#login-dialog" class="small-dialog popup-with-zoom-anim"><i class="fa fa-lock"></i> <?php esc_html_e('Log In','workscout') ?></a>
						<?php } ?>
						<?php if ( is_user_logged_in() )  {  ?>
							<a href="<?php echo wp_logout_url( home_url() );  ?>"><i class="fa fa-sign-out"></i> <?php esc_html_e('Log Out','workscout') ?></a>
						<?php } ?>
					</div>
					<ul class="social-icons" id="footer_icons">
						<li>
							<a target="_blank" class="facebook" title="" href="https://www.facebook.com/eventstaffing">
								<i class="icon-facebook"></i>
							</a>
						</li>
						<li>
							<a target="_blank" class="twitter" title="" href="https://twitter.com/eventstaffing">
								<i class="icon-twitter"></i>
							</a>
						</li>
						<li>
							<a target="_blank" class="linkedin" title="" href="https://linkedin.com/eventstaffing">
								<i class="icon-linkedin"></i>
							</a>
						</li>
						<li>
							<a target="_blank" class="pinterest" title="" href="https://pinterest.com/eventstaffing">
								<i class="icon-pinterest"></i>
							</a>
						</li>
					</ul>
				</div>
			</aside>
		</div>
	</div>
</div>
<header <?php workscout_header_class(); ?> id="main-header">
<div class="container">
	<div class="sixteen columns">
	
		<!-- Logo -->
		<div id="logo">
			 <?php
                
                $logo = Kirki::get_option( 'workscout', 'pp_logo_upload', '' ); 
                $logo_retina = Kirki::get_option( 'workscout', 'pp_retina_logo_upload', '' ); 
                if( is_singular() ) {
                	$header_image = get_post_meta($post->ID, 'pp_job_header_bg', TRUE); 
                	if( !empty($header_image) ) {
                		$transparent_status = get_post_meta($post->ID, 'pp_transparent_header', TRUE); 	

                		if($transparent_status == 'on'){
                			$logo_transparent = Kirki::get_option( 'workscout','pp_transparent_logo_upload');

							$logo =(!empty($logo_transparent)) ? $logo_transparent : $logo ;	
                		}
                	}
                }
                if( is_page_template( 'template-home.php' ) ) {
                		
					if(Kirki::get_option( 'workscout','pp_transparent_header')) {
						$logo_transparent = Kirki::get_option( 'workscout','pp_transparent_logo_upload');
						$logo =(!empty($logo_transparent)) ? $logo_transparent : $logo ;
					}
				}        
				if( is_page_template( 'template-home-resumes.php' ) ) {
					
					if(Kirki::get_option( 'workscout','pp_resume_home_transparent_header')) {
						$logo_transparent = Kirki::get_option( 'workscout','pp_transparent_logo_upload');
						$logo =(!empty($logo_transparent)) ? $logo_transparent : $logo ;
					}
				}
				

                if($logo) {
                    if(is_front_page()){ ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="<?php echo esc_url($logo); ?>" data-rjs="<?php echo esc_url($logo_retina); ?>" alt="<?php esc_attr(bloginfo('name')); ?>"/></a>
                    <?php } else { ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url($logo); ?>" data-rjs="<?php echo esc_url($logo_retina); ?>" alt="<?php esc_attr(bloginfo('name')); ?>"/></a>
                    <?php }
                } else {
                    if(is_front_page()) { ?>
                    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php } else { ?>
                    <h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
                    <?php }
                }
                ?>
                <?php if(get_theme_mod('workscout_tagline_switch','hide') == 'show') { ?><div id="blogdesc"><?php bloginfo( 'description' ); ?></div><?php } ?>
		</div>

		<!-- Menu -->
	
		<nav id="navigation" class="menu"> 

			<?php  //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'responsive','container' => false ) );
				   wp_nav_menu(array( 'theme_location' => 'primary', 'menu_id' => 'responsive','menu' => 'Menu 1', 'container' => false )); 

			$minicart_status = Kirki::get_option( 'workscout', 'pp_minicart_in_header', false );
			if(Kirki::get_option( 'workscout', 'pp_login_form_status', true ) ) { 
				
					$login_system = Kirki::get_option( 'workscout', 'pp_login_form_system' );
					switch ($login_system) {
						case 'custom':
							get_template_part('template-parts/login-custom');
							break;

						case 'woocommerce':
							get_template_part('template-parts/login-woocommerce');
							
							break;

						case 'um':
							get_template_part('template-parts/login-um');
							break;					

						case 'workscout':
							get_template_part('template-parts/login-workscout');
							break;
						
						default:
							# code...
							break;
					}			
			} 
			?>
			
		</nav>
		<!-- Navigation -->
		<div id="mobile-navigation">
			<a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i><?php esc_html_e('Menu','workscout'); ?></a>
		</div>
	</div>
</div>
</header>
<div class="clearfix"></div>
<?php if(isset($_GET['success']) && $_GET['success'] == 1 )  { ?>
	 <script type="text/javascript">
        jQuery(document).ready(function ($) {    	
		    	$.magnificPopup.open({
				  items: {
				    src: '<div id="singup-dialog" class="small-dialog zoom-anim-dialog apply-popup">'+
		                	'<div class="small-dialog-headline"><h2><?php esc_html_e("Success!","workscout"); ?></h2></div>'+
		                	'<div class="small-dialog-content"><p class="margin-reset"><?php esc_html_e("You have successfully registered and logged in. Thank you!","workscout"); ?></p></div>'+
		        		'</div>', // can be a HTML string, jQuery object, or CSS selector
				    type: 'inline'
				  }
				});
	    	});
    </script>
<?php } ?>



<?php  $link = $_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
    $link_array = explode('/',$link);   
    if(/*in_array("events",$link_array) ||*/ in_array("events",$link_array) || in_array("2017",$link_array) || in_array("2016",$link_array) || in_array("2015",$link_array) || in_array("2014",$link_array) || in_array("2013",$link_array) ) { ?>
	<style type="text/css">
	#titlebar {
		background-image: url(<?php echo get_template_directory_uri(); ?>/images/event-banner.png);
    	background-size: 100%;
	}
	#titlebar h2, #titlebar h1, #titlebar nav ul li span {color: #FFF;}
	.single article .post-img { display: block !important; }	
	</style>
<?php } ?>
<?php if(in_array("talent-profile",$link_array)) { ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">
<?php } ?>