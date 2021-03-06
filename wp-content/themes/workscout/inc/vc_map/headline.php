<?php 

/*
 * Headline for Visual Composer
 *
 */
add_action( 'init', 'pp_headline_integrateWithVC' );
function pp_headline_integrateWithVC() {
  vc_map( array(
    "name" => esc_html__("Headline","workscout"),
    "base" => "headline",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Header', 'workscout' ),
//    'admin_enqueue_js' => array(get_template_directory_uri().'/vc_templates/js/vc_image_caption_box.js'),
    "category" => esc_html__('WorkScout',"workscout"),
    "params" => array(
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Title', 'workscout' ),
        'param_name' => 'content',
        'description' => esc_html__( 'Enter text which will be used as title', 'workscout' )
        ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Type', 'workscout' ),
        'param_name' => 'type',
        'description' => esc_html__( 'Choose header weight', 'workscout' ),
        'value' => array(
          'H1' => 'h1',
          'H2' => 'h2',
          'H3' => 'h3',
          'H4' => 'h4',
          'H5' => 'h5',
          ),
        'std' => 'h3',
        ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Top margin', 'workscout' ),
        'param_name' => 'margintop',
        'value' => array(
          '0' => '0',
          '10' => '10',
          '15' => '15',
          '20' => '20',
          '25' => '25',
          '30' => '30',
          '35' => '35',
          '40' => '40',
          '45' => '45',
          '50' => '50',
          ),
        'std' => '15',
        'description' => esc_html__( 'Choose top margin (in px)', 'workscout' )
        ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Bottom margin', 'workscout' ),
        'param_name' => 'marginbottom',
        'value' => array(
          '0' => '0',
          '10' => '10',
          '15' => '15',
          '20' => '20',
          '25' => '25',
          '30' => '30',
          '35' => '35',
          '40' => '40',
          '45' => '45',
          '50' => '50',
          ),
        'std' => '35',
        'description' => esc_html__( 'Choose bottom margin (in px)', 'workscout' )
        ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Clearfix after?', 'workscout' ),
        'param_name' => 'clearfix',
        'description' => esc_html__( 'Add clearfix after headline, you might want to disable it for some elements, like the recent products carousel.', 'workscout' ),
        'value' => array(
          esc_html__( 'Yes, please', 'workscout' ) => '1',
          esc_html__( 'No, thank you', 'workscout' ) => 'no',
          ),
        'std' => '1',
        ),
      ),
  ));
}

?>