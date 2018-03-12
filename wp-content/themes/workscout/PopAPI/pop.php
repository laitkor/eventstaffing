<?php
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
	if( isset($_POST['SEARCH']) )
	{
		$_POST['minHeight'] = $_POST['minHeight'].'.'.$_POST['minHeightInch'];
		$_POST['maxHeight'] = $_POST['maxHeight'].'.'.$_POST['maxHeightInch'];
		unset($_POST['minHeightInch']); unset($_POST['maxHeightInch']); unset($_POST['SEARCH']);
		$getTalentData = wp_remote_post( $talentListURL, array('method' => 'POST',	'timeout' => 1000, 'redirection' => 5,
			'httpversion' => '1.0',
			'blocking' => true,
			'headers' => array('Content-Type' => 'application/json', 'Authorization' => $Auth),
			'body' => json_encode($_POST, JSON_FORCE_OBJECT)
			)
		);
	}
	else
	{
		$getTalentData = wp_remote_post( $talentListURL, array('method' => 'POST',	'timeout' => 1000, 'redirection' => 5,
			'httpversion' => '1.0',
			'blocking' => true,
			'headers' => array('Content-Type' => 'application/json', 'Authorization' => $Auth),
			'body' => json_encode(array('offset'=> $_POST['offset'], 'fetchRows' => 21))
			)
		);
	}
}
else
{
	//echo  "Something went wrong in talent list API !";
}

if ( is_wp_error( $getTalentData ) ) 
{
	$error_message = $getTalentData->get_error_message();
	//echo "Something went wrong in Talent List API: ".$error_message;
} 
else 
{
	$talentData = json_decode(wp_remote_retrieve_body( $getTalentData ), true);
	//echo "<pre>"; print_r($talentData);
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
			echo  "Something went wrong in talent profile API !";
		}

		if ( is_wp_error( $getTalentProfileData ) ) 
		{
			$error_message = $getTalentProfileData->get_error_message();
			//echo "Something went wrong in Talent List API: ".$error_message;
		} 
		else 
		{
			$talentProfile[$talent['id']] = json_decode(wp_remote_retrieve_body( $getTalentProfileData ), true);
		}
	}
}