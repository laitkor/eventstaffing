<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WorkScout
 */

?>

<div class="five columns sidebar">
	<?php
    if(is_singular()){
        $sidebar = get_post_meta($post->ID, "pp_sidebar_set", $single = true);
        if ($sidebar) {
            //if ( ! dynamic_sidebar( $sidebar ) ) :?>

          <!--   <aside id="archives" class="widget">
                <h4 class="widget-title"><?php //esc_html_e( 'Recent', 'workscout' ); ?></h4>
                <ul> -->
                    <?php //echo $widget->showLatest($posts = $number); //wp_get_archives( array( 'type' => 'monthly' ) ); ?>
             <!--    </ul>
            </aside> -->

           <!--  <aside id="meta" class="widget">
                <h4 class="widget-title"><?php //esc_html_e( 'Meta', 'workscout' ); ?></h4>
                <ul> -->
                    <?php //wp_register(); ?>
                   <!--  <li><?php //wp_loginout(); ?></li> -->
                    <?php //wp_meta(); ?>
           <!--      </ul>
            </aside> -->
        <?php //endif;
        } else {
           //if (!dynamic_sidebar('sidebar-1')) : ?>
               <!-- <aside id="archives" class="widget">
                    <h2 class="widget-title"><?php //esc_html_e( 'Recent', 'workscout' ); ?></h2>
                    <ul>
                        <?php //echo $widget->showLatest($posts = $number); //wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                    </ul>
                </aside> -->

                <!-- <aside id="meta" class="widget">
                    <h4 class="widget-title"><?php //esc_html_e( 'Meta', 'workscout' ); ?></h4>
                    <ul> -->
                        <?php //wp_register(); ?>
                      <!--   <li><?php //wp_loginout(); ?></li> -->
                        <?php //wp_meta(); ?>
                    <!-- </ul>
                </aside>  -->
           <?php //endif;
        }
    } else {
        $widget = new workscout_tabbed; 
        if (!dynamic_sidebar('sidebar-1')) : 
        if(get_query_var('pagename') == 'blog') { ?>
        <aside id="archives" class="widget">
            <h4 class="widget-title"><?php esc_html_e( 'Recent', 'workscout' ); ?></h4>
            <ul>
                <?php echo $widget->showLatest($posts = $number); //wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
        <!-- <aside id="meta" class="widget">
            <h4 class="widget-title"><?php //esc_html_e( 'Meta', 'workscout' ); ?></h4>
            <ul>
                <?php //wp_register(); ?>
                <li><?php //wp_loginout(); ?></li>
                <?php //wp_meta(); ?>
            </ul>
        </aside> -->
        <?php } else { ?>
            <aside id="archives" class="widget">
                <h4 class="widget-title"><?php //esc_html_e( 'Archives', 'workscout' ); ?></h4>
                <ul>
                    <?php the_widget( 'WP_Widget_Archives' ); //wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                </ul>
            </aside>
        <?php } endif;
    } // end primary widget area
    ?>
</div><!-- #secondary -->
