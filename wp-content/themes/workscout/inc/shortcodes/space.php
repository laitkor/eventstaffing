<?php 

/**
* Spacer shortcode
* Usage: [space]
*/

    function workscout_space($atts, $content ) {
        extract(shortcode_atts(array(
            'class' => ''
            ), $atts));
        return '<div class="clearfix"></div><div class="'.$class.'"></div>';
    }

?>