<?php

$host = 'https://lkantorovskiy.inside-box.net';
$uri = '/api/oauth2/authorize';
$client_id = 'obgmj237f1nziyvsyv9loaxvmgbqvfe5';

?>

<html>
	<title> Let's OAuth2-dance </title>
 	<body>
		<h1>First the app asks the user to login to grant access</h1>
		<p>  
		<form action='<?= $host . $uri ?>' method='GET'>
			<input type='hidden' name='client_id' value='<?=$client_id?>'/>
			<input type='hidden' name='response_type' value='code' />
			Login to grant access:
			<p>
			<!-- <input onclick="alert('Redirecting to\n<?= $host ?>\n<?=$uri?>?\nclient_id=<?=$client_id?>&response_type=code'); return true;" type=submit value='Login to enable Levs app'/> -->
			<input type=submit value='Login to enable Levs app'/>
		</form> 
	</body>
</html>
