<?php 

add_action( 'init', 'ws_box_resume_categories_full_integrateWithVC' );
function ws_box_resume_categories_full_integrateWithVC() {
  $box_resumes_categories = array('None' => ' ');

  $resume_categories = get_terms( 'resume_category', 'orderby=count&hide_empty=0' );
  if ( is_array( $resume_categories ) && ! empty( $resume_categories ) ) {
    foreach ( $resume_categories as $resume_category ) {
        $box_resumes_categories[ $resume_category->name ] =  esc_attr($resume_category ->term_id) ;
    }
  }
  vc_map( array(
    "name" => esc_html__("Resumes categories list","workscout"),
    "base" => "resume_categories",
    'icon' => 'workscout_icon',
    'description' => esc_html__( 'Dispays list of resume categories - use only on full-width page', 'workscout' ),
    "category" => esc_html__('WorkScout',"workscout"),
    "params" => array(
      /*    
    
        'type' => 'parent',  
       */
      array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Title', 'workscout' ),
        'param_name' => 'title',
        'description' => esc_html__( 'Enter text which will be used as title', 'workscout' )
      ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Wide version (use only on full-width page in full row', 'workscout' ),
        'param_name' => 'full_width',
        'description' => esc_html__( 'Setting this to wide on page with sidebar or not in the maximum wide container will cause layout break.', 'workscout' ),
        'value' => array(
          esc_html__( 'Standard', 'workscout' ) => 'false',
          esc_html__( 'Wide', 'workscout' ) => 'yes',
          ),
         'save_always' => true,
      ),
      array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Hide empty", 'workscout'),
        "param_name" => "hide_empty",
        "value" => array(
         'Hide' => '1',
         'Show' => '0',
          ),
        'save_always' => true,
        "description" => "Hides categories that doesn't have any resumes"
      ),      
      array(
        "type" => "dropdown",
        "class" => "",
        "heading" => esc_html__("Type ", 'workscout'),
        "param_name" => "type",
        "value" => array(
         'none' => '',
         'Group by parent' => 'group_by_parents' ,
         'Show all categories' => 'all',
          'Show just child categories from selected parent' => 'parent' ,
          ),
         'save_always' => true,
        "description" => ""
      ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Parent id', 'workscout' ),
        'param_name' => 'parent_id',
        'value' => $box_resumes_categories,
        'dependency' => array(
          'element' => 'type',
          'value' => array( 'parent' ),
        ),
         'save_always' => true,
      ),
      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Order by', 'workscout' ),
        'param_name' => 'orderby',
        'value' => array(
          esc_html__( 'Name', 'workscout' ) => 'naem',
          esc_html__( 'ID', 'workscout' ) => 'ID',
          esc_html__( 'Count', 'workscout' ) => 'count',
          esc_html__( 'Slug', 'workscout' ) => 'slug',
          esc_html__( 'None', 'workscout' ) => 'none',
          ),
         'save_always' => true,
        ),

      array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Order', 'workscout' ),
        'param_name' => 'order',
        'value' => array(
          esc_html__( 'Descending', 'workscout' ) => 'DESC',
          esc_html__( 'Ascending', 'workscout' ) => 'ASC'
          ),
         'save_always' => true,
      ),
       array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Total items', 'workscout' ),
        'param_name' => 'number',
        'value' => 10, // default value
        'description' => esc_html__( 'Set max limit for items  (limited to 1000).', 'workscout' ),
      ),
      array(
        'type' => 'from_vs_indicatior',
        'heading' => esc_html__( 'From Visual Composer', 'workscout' ),
        'param_name' => 'from_vs',
        'value' => 'yes',
        'save_always' => true,
        )
    )
  ));
}
 ?>