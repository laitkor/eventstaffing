<?php
//require_once("../../../../wp-load.php");
/**
 * API Name: Popbooking Talent List & Profile
 *
 * API fetch the talent list & talent detail.
 * Created : Saurabh Saxena (saurabh.saxena@laitkor.com)
 */
$url = 'https://connect.popbookings.com/Token'; 
$response = wp_remote_post( $url, array(
	'method' => 'POST',
	'timeout' => 1000,
	'redirection' => 5,
	'httpversion' => '1.0',
	'blocking' => true,
	'headers' => array('Content-Type' => 'application/x-www-form-urlencoded'),
	'body' => array( 'username' => 'Y2VhYXBpQHBvcGJvb2tpbmdzLmNvbQ==', 'password' => 'UEBzczRBcGlQcm9kdWN0aW9u', 'grant_type' => 'password')
    )
); 

if ( is_wp_error( $response ) ) 
{
   $error_message = $response->get_error_message();
   //echo "Something went wrong in Token API: ".$error_message;
} 
else 
{
   $data = json_decode(wp_remote_retrieve_body( $response ), true);
   $Auth = $data['token_type']." ".$data['access_token'];
}

$talentListURL = 'https://connect.popbookings.com/api/talent/list';

if( !empty( $Auth ) )
{
	
	if(empty($_POST['minHeight']))
		unset($_POST['minHeight']);
	else
		$_POST['minHeight'] = $_POST['minHeight'].'.'.$_POST['minHeightInch'];

	if(empty($_POST['maxHeight']))
		unset($_POST['maxHeight']);
	else
		$_POST['maxHeight'] = $_POST['maxHeight'].'.'.$_POST['maxHeightInch'];

	if(!empty($_POST['cityName']) && !empty($_POST['location']))
	{
		$_POST['location']  = $_POST['cityName'].' '.$_POST['location'];
		unset($_POST['cityName']);
	}
	else if(empty($_POST['cityName']))
		unset($_POST['cityName']);
	else if(!empty($_POST['cityName']))
	{
		$_POST['location']  = $_POST['cityName'];
		unset($_POST['cityName']);
	}
	else if(empty($_POST['location']))
	{
		unset($_POST['location']);
	}

	if(empty($_POST['distance']))
		unset($_POST['distance']);

	if(empty($_POST['gender']))
		unset($_POST['gender']);

	$_POST['fetchRows'] = $_POST['numberofrows'];

	unset($_POST['minHeightInch']); unset($_POST['maxHeightInch']); unset($_POST['action']); unset($_POST['numberofrows']);

	$getTalentData = wp_remote_post( $talentListURL, array('method' => 'POST',	'timeout' => 1000, 'redirection' => 5,
		'httpversion' => '1.0',
		'blocking' => true,
		'headers' => array('Content-Type' => 'application/json', 'Authorization' => $Auth),
		'body' => json_encode($_POST)
		)
	);
	$talentData = json_decode(wp_remote_retrieve_body( $getTalentData ), true);
	if ( is_wp_error( $getTalentData ) ) 
	{
		$error_message = $getTalentData->get_error_message();
		echo "Something went wrong in Talent List API: ".$error_message; exit;
	} 
	else if(empty($talentData))
	{
		echo "No Data Found for searched filters !"; exit;
	}
	else
		$talentData = json_decode(wp_remote_retrieve_body( $getTalentData ), true);
	//echo "<pre>"; print_r(json_encode($_POST)); print_r($talentData); exit;
}
else
{
	echo  "Something went wrong in talent list API !"; exit;
}

$talentProfileURL = 'https://connect.popbookings.com/api/talent/profile';

if(!empty($talentData))
{
	foreach ($talentData as $talent) {

		if( !empty( $Auth ) )
		{
			$getTalentProfileData = wp_remote_post($talentProfileURL, array('method' => 'POST',	'timeout' => 1000, 'redirection' => 5,
				'httpversion' => '1.0',
				'blocking' => true,
				'headers' => array('Content-Type' => 'application/x-www-form-urlencoded', 'Authorization' => $Auth),
				'body' => array('id' => $talent['id'])
				)
			);
		}
		else
		{
			//echo  "Something went wrong in talent profile API !"; 
		}

		if ( is_wp_error( $getTalentProfileData ) ) 
		{
			$error_message = $getTalentProfileData->get_error_message();
			echo "Something went wrong in Talent List API: ".$error_message; exit;
		} 
		else 
		{
			$talentProfile[$talent['id']] = json_decode(wp_remote_retrieve_body( $getTalentProfileData ), true);
		}
	}
}

if(!empty($talentData) && !empty($talentProfile))
{
	$text_to_be_wrapped = ''; $j= $_POST['offset'];
	foreach ($talentData as $talent) 
	{
		$text_to_be_wrapped.= '<div class="talent-profile-grid"><div class="talent-image" id="dialog-box-'.$j.'" onclick="openModal('.$j.')"><img src="'.$talent['primaryPhotoURL'].'" alt="" title=""/></div><div id="talent-dialog-box-'.$j.'"  style="display: none;"><div class="mfp-bg my-mfp-zoom-in mfp-ready"></div><div class="mfp-wrap mfp-close-btn-in mfp-auto-cursor my-mfp-zoom-in mfp-ready" tabindex="-1" style="top: 1500px; position: absolute; height: 418px;"><div class="mfp-container mfp-inline-holder"><div class="mfp-content"><div id="talent-dialog" class="small-dialog zoom-anim-dialog apply-popup woocommerce-login-popup talent-popup-wrapper"><div class="small-dialog-content woo-reg-box"><form method="post" class="login workscout_form"><div class="container"><div class="row"><div class="vc_column_container vc_col-sm-3"><div class="t-image"><div id="jssor_1" class="flex-images" style="position:relative;margin:0 auto;top:0px;left:0px;width:200px;height:200px;overflow:hidden;visibility:hidden;"><div data-u="loading" class="jssorl-004-double-tail-spin example-image-link" style="position:absolute;top:0px;left:0px;text-align:center;background-color:rgba(0,0,0,0.7);">
		<img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="'.$talentProfile[$talent['id']]['primaryPhotoURL'].'" alt="" title=""></div><div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:200px;height:200px;overflow:hidden;">
		<div><a href="'.$talentProfile[$talent['id']]['primaryPhotoURL'].'" class="example-image-link" data-lightbox="example-set-'.$j.'"><img rel="lightbox['.$j.']" src="'.$talentProfile[$talent['id']]['primaryPhotoURL'].'" alt="" title=""></a></div>';
		foreach ($talentProfile[$talent['id']]['profilePhotos'] as $key => $value) 
		{
			$text_to_be_wrapped.= '<div><a href="'.$value['photoURL'].'" class="example-image-link" data-lightbox="example-set-'.$j.'"><img rel="lightbox['.$j.']" src="'.$value['photoURL'].'" alt="" title=""></a></div>';
		}
		$text_to_be_wrapped.= '</div></div></div></div><div class="vc_column_container vc_col-sm-9"><h3>'.$talentProfile[$talent['id']]['firstName']." ".$talentProfile[$talent['id']]['lastName'][0].'.</h3><div class="about-details"><h4>About Me</h4><p>'.$talentProfile[$talent['id']]['bioText'].'</p></div></div></div><div class="row"><div class="vc_column_container vc_col-sm-12"><div class="talent-profile"><div class="vc_column_container vc_col-sm-4"><div class="list"><span>LOCATION:</span>'.$talentProfile[$talent['id']]['city'].' , '.$talentProfile[$talent['id']]['state'].', '.$talentProfile[$talent['id']]['country'].'</div><div class="list"><span>ETHNICITY:</span></div>
		<div class="list"><span>AGE:</span></div><div class="list"><span>HEIGHT:</span>'.$talentProfile[$talent['id']]['height'].'</div><div class="list"><span>WEIGHT:</span>'.$talentProfile[$talent['id']]['Weight'].' LBS</div></div><div class="vc_column_container vc_col-sm-4"><div class="list"><span>HAIR:</span>'.$talentProfile[$talent['id']]['hairColor'].'</div><div class="list"><span>EYES:</span>'.$talentProfile[$talent['id']]['eyeColor'].'</div><div class="list"><span>TATTOOS:</span>'.$talentProfile[$talent['id']]['hasTattoos'].'</div>    
		<div class="list"><span>PIERCINGS:</span>'.$talentProfile[$talent['id']]['hasPiercings'].'</div></div><div class="vc_column_container vc_col-sm-4"><div class="list"><span>LANGUAGES:</span>'.$talentProfile[$talent['id']]['language1'].', '.$talentProfile[$talent['id']]['language2'].'</div><div class="list"><span>EXPERIENCE:</span></div></div><div class="border-grey"></div><div class="vc_column_container vc_col-sm-3"><div class="list"><span>BUST:</span></div></div><div class="vc_column_container vc_col-sm-3"><div class="list"><span>CUP:</span></div></div><div class="vc_column_container vc_col-sm-3"><div class="list"><span>WAIST:</span></div></div><div class="vc_column_container vc_col-sm-3"><div class="list"><span>HIPS:</span></div></div><div class="vc_column_container vc_col-sm-3"><div class="list"><span>SHOE:</span>'.$talentProfile[$talent['id']]['shoeSize'].'</div></div><div class="vc_column_container vc_col-sm-3"><div class="list"><span>DRESS:</span>'.$talentProfile[$talent['id']]['dressSize'].'</div></div><div class="vc_column_container vc_col-sm-3"><div class="list"><span>SHIRT:</span>'.$talentProfile[$talent['id']]['shirtSize'].'</div></div><div class="vc_column_container vc_col-sm-3"><div class="list"><span>INSEAM:</span></div></div></div></div></div></div></form></div><button title="Close (Esc)" type="button" class="mfp-close" onclick="closeMe();"></button></div></div></div></div></div><div class="talent-name"><a href="#">'.$talent['firstName'].' '.$talent['lastName'][0].'.</a></div></div>';
		$j++;
	}
	echo $text_to_be_wrapped; exit;
}