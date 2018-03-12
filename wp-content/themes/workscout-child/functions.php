<?php 
add_action( 'wp_enqueue_scripts', 'workscout_enqueue_styles' );
function workscout_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css',array('workscout-base','workscout-responsive','workscout-font-awesome') );
}

function remove_parent_theme_features() {
   	
}
add_action( 'after_setup_theme', 'remove_parent_theme_features', 10 );

//-----------------------------------------Event Gallery ----------------------------------------------

function eventGallery() { 

$args = array(
	'numberposts' => 6,
	'offset' => 0,
	'category' => 0,
	'orderby' => 'id',
	'order' => 'DESC',
	'include' => '',
	'exclude' => '',
	'meta_key' => '',
	'meta_value' =>'',
	'post_type' => 'event',
	'post_status' => 'publish',
	'suppress_filters' => true
);

$recent_event_posts = wp_get_recent_posts( $args, ARRAY_A );
?>

<div class="vc_row wpb_row vc_row-fluid" id="event_section">
<div class="wpb_column vc_column_container vc_col-sm-12">
<div class="vc_column-inner">
<div class="wpb_wrapper">
<!-- <h3 class="margin-top-0 margin-bottom-25">Event Gallery</h3> -->
		<div class="recent-blog-posts">
			<?php 
			$x=1;
			foreach($recent_event_posts as $post) {
				//$post_title = $post['post_title'].'<br/>';
				$post_content = substr($post['post_content'],0,100).'...';
				$slug = $post['post_name'];
				$post_date = $post['post_date'];
				$post_date = date("F m, Y", strtotime($post_date));
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post['ID']), 'post'); 
				$image = $thumb[0];
			?>	
                <div class="vc_col-sm-4 wpb_column alpha">
                    <article class="recent-post">                        
                        <figure class="recent-post-img">   
                        	<!-- <a href="javascript:void(0)"> -->             
                            <img width="498" height="315" style="height:237px;" src="<?php echo $image; ?>" class="attachment-workscout-small-blog size-workscout-small-blog wp-post-image" alt="">
                            <!-- </a> -->
                            <div class="hover-icon">
                            <h3> EVENTS & PROMOTIONS
                            <a href="<?php echo $slug; ?>">
                            <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                            </a>
                            </h3>
                            <div class="event-date"><?php echo get_post_meta($post['ID'], 'date', true); ?></div>
                            <p><?php echo $post_content; ?></p>
                            </div>
                    </figure>
                        
                    <!--<section class="from-the-blog-content">                        
                            <div style="float:left">October 2017</div>
                            <div style="float:right">NATIONWIDE</div>
                            <div style="clear:both"></div>                        
                    </section>-->

                	</article>
            	</div>

            <?php } ?>

        </div>
           
           <div class="view_all_events">
				<a class="button" href="events"> VIEW ALL EVENTS </a>
   		   </div>

         </div>
       </div>
     </div>     
   </div>
	
<?php }
add_shortcode( 'vcEventGalleryHomePage', 'eventGallery' );
//----------------------------------- Event Gallery For Home Page ---------------------------------------
//------------------------------------- Blog Post For Home Page -----------------------------------------
function blogPostHomePage() { 
	$args = array(
	'numberposts' => 2,
	'offset' => 0,
	'category' => 0,
	'orderby' => 'post_date',
	'order' => 'DESC',
	'include' => '',
	'exclude' => '',
	'meta_key' => '',
	'meta_value' =>'',
	'post_type' => 'post',
	'post_status' => 'publish',
	'suppress_filters' => true
);

$recent_posts = wp_get_recent_posts( $args, ARRAY_A );

?>
<div class="vc_row wpb_row vc_inner vc_row-fluid">
<?php foreach($recent_posts as $post) {
	$post_title = $post['post_title'].'<br/>';
	$post_content = substr($post['post_content'],0,100).'...';
	$slug = $post['post_name'];
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post['ID']), 'post');
	$image = $thumb[0];
?>
	<div class="wpb_column vc_column_container vc_col-sm-6">		
		<div class="vc_column-inner">
			<div class="wpb_wrapper">
				<div class="wpb_text_column wpb_content_element">
					<div class="wpb_wrapper">
						<figure class="recent-post-img">
							<a href="<?php echo $slug; ?>">
								<img class="attachment-workscout-small-blog size-workscout-small-blog wp-post-image" src="<?php echo $image; ?>" alt="" width="498" style="max-height:296px">
							</a>
							<p class="pfix"></p>
							<div class="hover-icon">
							</div>
						</figure>
						<h4 style="text-align: center;"><?php echo ucfirst(strtolower($post_title)); ?></h4>
						<p style="text-align: center;"><?php echo $post_content; ?> </p>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
</div>
<?php }
add_shortcode( 'vcBlogPostHomePage', 'blogPostHomePage' );
//----------------------------------- Blog Post For Home Page ------------------------------------------

function eventGridView() { ?>
<link rel="stylesheet" href="<?php echo get_site_url(); ?>/wp-content/themes/workscout-child/jQuery-flexImages-master/jquery.flex-images.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo get_site_url(); ?>/wp-content/themes/workscout-child/jQuery-flexImages-master/jquery.flex-images.js"></script>
<?php
$args = array(
	'numberposts' => -1,
	'offset' => 0,
	'category' => 0,
	'orderby' => 'id',
	'order' => 'ASC',
	'include' => '',
	'exclude' => '',
	'meta_key' => '',
	'meta_value' =>'',
	'post_type' => 'event',
	'post_status' => 'publish',
	'suppress_filters' => true
);

$recent_event_posts = wp_get_recent_posts( $args, ARRAY_A );

?>

<div id="demo" class="flex-images">
	<?php 
	$x=1;
	foreach($recent_event_posts as $post) {
		//$post_title = $post['post_title'].'<br/>';
		$post_content = substr($post['post_content'],0,100).'...';
		$slug = $post['post_name'];
		$post_date = $post['post_date'];
		$post_date = date("F m, Y", strtotime($post_date));
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post['ID']), 'post'); 
		$image = $thumb[0];
	?>	
  	<a href="<?php echo $slug; ?>">
		<div class="item">
			<img src="<?php echo $image; ?>" alt="" title=""/>  		
		</div>  
  	</a>

  <?php } ?>
</div> 
<script type="text/javascript">
jQuery('#demo').flexImages({
	 rowHeight: 225
});
</script>
<?php }
add_shortcode( 'vcEventGridView', 'eventGridView' );
//------------------------------------- Talent Profile For Home Page ------------------------------------
add_action('wp_ajax_my_action', 'my_action');
add_action('wp_ajax_nopriv_my_action', 'my_action');
function my_action()
{
	require_once('PopAPI/pop.php');
}