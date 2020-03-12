
In the CSV below find, extract and POST back a UUID, you have to return the solution in the same second and may require more than one attempt :)
</br>
The UUID format is 8 characters - 4 characters - 4 characters - 4 characters - 12 Characters
</br>
UUIDs have lower case characters a-f and numbers 0-9 broken up with hyphens, 01234567-890a-bcde-f012-34567890abcd

</br></br>
<form name=details method="post" action="">
<input type="text" name="parameter">
<input type ="submit" value ="Submit">
</form>

</br></br>


<?php
include_once 'jwt.php';

$salt = "abc123!";

if(isset($_COOKIE['hash'])&& isset($_POST['parameter']))
{
	$str = $_POST['parameter'].time().$salt;
	if(strcmp(md5($str),$_COOKIE['hash'])==0)
	{
		jwtToken("anyone", "Regex001.php", "abC123!"); 
		echo "</br></br>";
	}
}
if(isset($_POST['parameter']))
{
	echo "Value entered: " . $_POST['parameter']."</br></br>";
}
else
{
	echo "No value entered</br></br>";
}

$uuid = bin2hex(random_bytes(16));
$uuid = substr_replace( $uuid, "-", 8, 0 );
$uuid = substr_replace( $uuid, "-", 13, 0 );
$uuid = substr_replace( $uuid, "-", 18, 0 );
$uuid = substr_replace( $uuid, "-", 23, 0 ); 

$str =  md5($uuid. time().$salt);
setcookie("hash", $str, time() + (100), "/"); // 86400 = 1 day
echo "</br></br>";
$max = rand(1,1000);
for ($z=0;$z < $max;$z++)
{
	fake_UUID();
}


echo $uuid .",";


$max = rand(1,1000);
for ($z=0;$z < $max;$z++)
{
	fake_UUID();
}

function fake_UUID()
{
	$x=rand(1,2);
	switch($x)
	{
		case 1:
		$uuid = bin2hex(random_bytes(15));
		$uuid = substr_replace( $uuid, "-", 8, 0 );
		$uuid = substr_replace( $uuid, "-", 13, 0 );
		$uuid = substr_replace( $uuid, "-", 18, 0 );
		$uuid = substr_replace( $uuid, "-", 23, 0 ); 
		break;
		case 2:
		$uuid = bin2hex(random_bytes(16));
		$uuid = substr_replace( $uuid, "-", 7, 0 );
		$uuid = substr_replace( $uuid, "-", 13, 0 );
		$uuid = substr_replace( $uuid, "-", 18, 0 );
		$uuid = substr_replace( $uuid, "-", 23, 0 ); 
		break;
	}
	echo $uuid .",";
}
?>