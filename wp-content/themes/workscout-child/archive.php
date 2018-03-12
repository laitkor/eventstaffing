<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WorkScout
 */

get_header(); ?>

<?php
// $args = array(
//     'posts_per_page' => -1,
//     'post_type' => 'event',
//     'date_query' => array(
//         array(
//             'year'  => '2017',
//             'month' => '10'
//         ),
//     ),
// );
//$posts = get_posts( $args );
//echo count($posts);
//print_r( $posts ); 
?>
<?php //wp_reset_query(); // reset the query ?>

<div id="titlebar" class="single">
	<div class="container">

		<div class="sixteen columns">
			<?php
				the_archive_title( '<h2 class="page-title">', '</h2>' );
				the_archive_description( '<span class="taxonomy-description">', '</span>' );
			?>
		</div>

	</div>
</div>

<?php 

$layout = Kirki::get_option( 'workscout', 'pp_blog_layout' ); ?>
<!-- Content
================================================== -->
<div class="container <?php echo esc_attr($layout); ?>">

	<!-- Blog Posts -->
	<div class="eleven columns">
		<div class="padding-right">
		<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>
				
			<?php
				if(	strpos($_SERVER[REQUEST_URI],"event") !== false || strpos($_SERVER[REQUEST_URI],"2017") !== false || strpos($_SERVER[REQUEST_URI],"2016") !== false || strpos($_SERVER[REQUEST_URI],"2016") !== false || strpos($_SERVER[REQUEST_URI],"2015") !== false || strpos($_SERVER[REQUEST_URI],"2014") !== false || strpos($_SERVER[REQUEST_URI],"2013") !== false)
				{
					get_template_part( 'template-parts/events', get_post_format() );
				}
				else
				{
					get_template_part( 'template-parts/content', get_post_format() );
				}
			?>

			<?php endwhile; ?>

			<?php if(function_exists('wp_pagenavi')) { 
				wp_pagenavi(array(
					'next_text' => '<i class="fa fa-chevron-right"></i>',
					'prev_text' => '<i class="fa fa-chevron-left"></i>',
					'use_pagenavi_css' => false,
					));
			} else {
				workscout_posts_navigation(array(
		 			'prev_text'  => ' ',
		            'next_text'  => ' ',
				)); 
			} ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>


		</div>
	</div>
	<!-- Blog Posts / End -->
	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>