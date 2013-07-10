<html>
	 <title> Let's OAuth2-dance </title>
	 <body>
		<h1>Back to Lev's App URL</h1>

<?php

$auth_code = $_GET['code'];
$error = $_GET['error'];
$error_description = $_GET['error_description'];

if ($auth_code)
{
	$client_id = 'obgmj237f1nziyvsyv9loaxvmgbqvfe5';
	$client_secret = 'jj4oeiZzBgoy7ZUblqOUvxjimwfWfvBA';
	$grant_type = 'authorization_code';
	$code = '';
	$host = 'https://lkantorovskiy.inside-box.net';
	$uri = '/api/oauth2/token';

	// execute the server-side token call
	$url = $host . $uri;
	$postData = array();
	$postData['client_id'] = $client_id;
	$postData['client_secret'] = $client_secret;
	$postData['code'] = $auth_code;
	$postData['grant_type'] = $grant_type;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
	$res = curl_exec($ch);
	curl_close($ch);

	$vars = json_decode($res, true);


 if ($vars['error'])
	{
?>
		<p>
		Error: <?=$vars['error']?>
		<br>
		Error description: <?=$vars['error_description']?>

<?
	}
	else
	{
?>
		<!-- script>
			alert("I got back auth_code <?=$auth_code?>");
			alert("Then I executed (server side) request\n client_id=<?=$client_id?>&client_secret=<?=$client_secret?>&grant_type=<?=$grant_type?>&code=<?=$auth_code?>");
			alert('And I got back result <?=$res?>');
		</script -->

		<p>
		access_token: <?=$vars['access_token']?>
		<br>
		expires_in: <?=$vars['expires_in']?>
		<br>
		refresh_token: <?=$vars['refresh_token']?>
		<br>
		token_type: <?=$vars['token_type']?>
<?
	}
}
else
{
?>
	<h2> User denied access to my app :( </h2>
	Error: <?=$error?>
	<br>
	Error description: <?=$error_description?>
<?
}
?>

		<p>
	</body>
</html>

