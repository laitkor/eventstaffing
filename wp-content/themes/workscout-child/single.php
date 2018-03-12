<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WorkScout
 */

get_header(); ?>

<!-- Titlebar
================================================== -->

<?php 
	$header_image = get_post_meta($post->ID, 'pp_job_header_bg', TRUE); 
	//if sinlge post doesn't have, check if blog has:
	if(empty($header_image)) {
		$header_image = Kirki::get_option( 'workscout', 'pp_blog_header_upload', '' );  
	}
	if(!empty($header_image)) {
			$transparent_status = get_post_meta($post->ID, 'pp_transparent_header', TRUE); 	
			if($transparent_status == 'on'){ ?>
				<div id="titlebar" class="photo-bg single with-transparent-header" style="background: url('<?php echo esc_url($header_image); ?>')">
			<?php } else { ?>
				<div id="titlebar" class="photo-bg single" style="background: url('/wp-content/themes/workscout/images/event-banner.png')">
			<?php } ?>
		<?php } else { ?>
			<div id="titlebar" class="single">
	<?php } ?>
		<div class="container">

			<div class="sixteen columns">
				<h2><?php if(get_post_type() == 'event'){ echo "Archives: Events"; }else{ echo Kirki::get_option( 'workscout', 'pp_blog_title' ); } ?></h2>	
				<?php if(get_post_type() == 'event'){ }else { ?><span><?php echo Kirki::get_option( 'workscout', 'pp_blog_subtitle' ); ?></span><?php }?>
			</div>

		</div>
	</div>


<!-- Content
================================================== -->
<?php $layout = get_post_meta($post->ID, 'pp_sidebar_layout', true); ?>

<div class="container <?php echo esc_attr($layout); ?>">

	<!-- Blog Posts -->
	<div class="eleven columns" id="eventCss">
		<div class="padding-right">
		
		<?php while ( have_posts() ) : the_post(); ?>
	
			<?php
				
				if(	get_post_type() == 'event' )
				{					
					get_template_part( 'template-parts/event', 'single' );
				}
				else
				{				
					get_template_part( 'template-parts/content', 'single' ); 
				}
			?>

			<?php the_post_navigation(array(
		        'prev_text'          => '<i class="fa fa-chevron-left"></i>  %title',
		        'next_text'          => '%title <i class="fa fa-chevron-right"></i>',
		        'screen_reader_text' => esc_html__( 'Post navigation','workscout' ),
		    )); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</div><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div>
</div>
	<!-- Widgets / End -->
</div>

<?php get_footer(); ?>
