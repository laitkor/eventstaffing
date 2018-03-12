<?php
function vComp() {
	echo '<p>This is a php code</p>';
 }
add_shortcode( 'vShortcode', 'vComp' );
?>