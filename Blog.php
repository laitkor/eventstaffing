<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 0.2b
 */

//
// Database `sburgosc_c3as7aff1ng`
//

// `sburgosc_c3as7aff1ng`.`admin`
ini_set('max_execution_time',0);
ini_set('memory_limit', '-1');
ini_set("error_reporting", E_ALL);
require_once(dirname(__FILE__).'/wp-load.php');
global $wpdb;

$table_name = $wpdb->prefix . "blog";
$blogData = $wpdb->get_results( "SELECT * FROM `wp_posts` WHERE post_type = 'post' " );

$origData = $wpdb->get_results( "SELECT * FROM `wp_blog` WHERE `name` != 'NULL'  " );
echo "<pre>"; print_r($origData);

// foreach ($blogData as $k => $val) {
// 	foreach ($origData as $key => $value) {
// 		if($val->post_title === $value->name)
// 		{
// 			//update_post_meta( $val->ID, 'date', $value->date); 
// 			echo $val->ID." | ".$value->name." | ".$value->date." | ".get_post_meta($val->ID, 'date', true)."<br/><br/>";
// 		}
// 	}
// }

// foreach ($blogData as $key => $value) {
//   if(!empty($value->name))
//   {
//     $info = $value->description."<br><div class='content'>".$value->content."</div>";
//     $PostData = array(
//       'post_type'=>"post",
//       'post_date'=> $value->date,
//       'post_date_gmt' => $value->date,
//       'post_title'=> $value->name,
//       'post_name'=> $value->name,
//       'post_content'=> $info,
//       'post_status'=>'publish',
//       );
//     $PostId = wp_insert_post($PostData);
//     if(!empty($value->featuredpic))
//     {
//       $imgurl = "http://ceastaffing.com/".$value->featuredpic;
//       $attach_id = Generate_Featured_Image($imgurl, $PostId);
//       update_post_meta($PostId, "_thumbnail_id", $attach_id); 
//     }
//     echo $PostId."Success Attchmeent Id".$attach_id."Image URL".$imgurl."<br/>";
//   }
//   else
//     echo "Empty Post".$value->id."<br/>";
// }

// function Generate_Featured_Image( $image_url, $post_id  ) {
//     $upload_dir = wp_upload_dir();
//     $image_data = file_get_contents($image_url);
//     $filename = basename($image_url);
//     if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;
//     else                                    $file = $upload_dir['basedir'] . '/' . $filename;
//     file_put_contents($file, $image_data);

//     $wp_filetype = wp_check_filetype($filename, null );
//     $attachment = array(
//         'post_mime_type' => $wp_filetype['type'],
//         'post_title' => sanitize_file_name($filename),
//         'post_content' => '',
//         'post_status' => 'inherit'
//     );
//     $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
//     require_once(ABSPATH . 'wp-admin/includes/image.php');
//     $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
//     $res1= wp_update_attachment_metadata( $attach_id, $attach_data );
//     $res2= set_post_thumbnail( $post_id, $attach_id );
//     return $attach_id;
// }