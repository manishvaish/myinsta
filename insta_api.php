	<?php
	$CLIENT_ID = 'afb145475a9b420daca46a95908ea178';
	$CLIENT_SECRET = '894702be32204c49b34fefc4d9178adf';
	$REDIRECT_URI = 'http://g29technology.com/develop/insta_api.php';


	$url = "https://api.instagram.com/oauth/authorize?client_id=$CLIENT_ID&redirect_uri=$REDIRECT_URI&response_type=code";

	if(!isset($_GET['code']))
	{
		echo '<a href="'.$url.'">Login With Instagram</a>';
	}
	else
	{
		$authorize_code = $_GET['code'];

	$insta_data = array(
	  'client_id'       => $CLIENT_ID,
	  'client_secret'   => $CLIENT_SECRET,
	  'grant_type'      => 'authorization_code',
	  'redirect_uri'    => $REDIRECT_URI,
	  'code'            => $authorize_code
	);

	$url = 'https://api.instagram.com/oauth/access_token';

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($insta_data));
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);
	curl_close($curl);
	$json_result = json_decode($result);

	echo '<pre>';
	print_r($json_result);
	exit;
	}
	?>
