<?php

class jwtheader
{
}
class body
{
}

function jwtToken($name, $exercise, $key)
{
	$jwtheader=new jwtheader;
	$body = new body;
	$jwtheader->typ = "JWT";
	$jwtheader->alg = 'HS265';
	$jwtheader->company = "Planit";
	$jwtheader = json_encode($jwtheader);

	$body->name = $name;
	$body->ex = $exercise;
	$body->date_submission =  date("Y-m-d h:i:s", strtotime("now"));
	$body = json_encode($body);

	// Encode jwtheader to Base64Url String
	$base64Urljwtheader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($jwtheader));

	// Encode body to Base64Url String
	$base64Urlbody = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($body));

	// Create Signature Hash
	$signature = hash_hmac('sha256', $base64Urljwtheader . "." . $base64Urlbody, $key, true);

	// Encode Signature to Base64Url String
	$base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

	// Create JWT
	$jwt = $base64Urljwtheader . "." . $base64Urlbody . "." . $base64UrlSignature;
	
	echo "</hr>";
	echo "<h1>Correct: </h1>";
	echo $jwt;
}
?>