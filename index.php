<?php
	// Get the URL for your own account's self feed at http://instagram.com/developer/endpoints/users/
	$url='https://api.instagram.com/v1/users/self/feed?access_token={api_key}&count=1';

	function get_data( $url )
	{
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

	$return = json_decode( get_data($url) );

	if ( $return->data )
	{
		foreach ( $return->data as $p )
			header("Location: ".$p->images->low_resolution->url);
	}
	else
	{
		// Either use an image on your server or point to something fun
		// This will be used if there is an error requesting the data
		// from Instagram.
		header("Location: {url_to_suitable_error_image}");
	}