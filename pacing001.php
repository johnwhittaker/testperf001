<?php
include_once 'jwt.php';

$cookie_name = "pacing_tracking";

echo "pacing, hit this page once every 5 seconds for 5 minutes</br></br>";



if(!isset($_COOKIE[$cookie_name])||(is_null($_COOKIE[$cookie_name]))||($_COOKIE[$cookie_name]=="null")) {
    echo "Cookie not set!";
	$body[time()]= time();
	$body = json_encode($body);
}

if(isset($_COOKIE[$cookie_name]) &&($_COOKIE[$cookie_name]!="null")) 
{

	$body = json_decode($_COOKIE[$cookie_name], true);
	$t = time();

	foreach($body as $x => $x_value) 
	{
		
		$diff[] = (time()-($x_value + 0));
	}
	$counter =0;
	$last =0;
	$pass =true;
	foreach($diff as $x => $value) 
	{
		if ($counter ==0)
		{
			$last = $value;
			$difference = 0;
		}
		else
		{
			$difference = $last - $value;
			if ($difference <5 && $difference >6) 
			{
				$pass = false;
			}
			$last = $value;
		}
		if ($pass)
		{
			echo "Key="  .$x. ", Value=" .  $value . " Difference : " . $difference . " -  Working so far, keep going";
		}
		else
		{
			echo "Key="  .$x. ", Value=" .  $value . " Difference : " . $difference . " - Failed - restart";
		}
		echo "<br>";
		
		$counter++;
		
	}
	if ($pass && $counter ==10)
	{
		$x = jwtToken("anyone", "pacing001.php", "abC123!"); 
	}

	$body[time()] = time();
	$body = json_encode($body);
}
setcookie($cookie_name, $body, time() + (60), "/"); // 86400 = 1 day
?>