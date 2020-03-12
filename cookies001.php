<html>
<body>


<?php
include_once 'jwt.php';
$cookie_name = "ex";

setcookie($cookie_name, md5(time()."8614880573"), time() + (0), "/"); // 86400 = 1 day

if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie not set!";
	
} 
else 
{
	if(strcmp( md5(time()."8614880573"),$_COOKIE[$cookie_name])==0)
	{
		echo "pass <br>" ;
		jwtToken("anyone", "cookies001.php", "abC123!"); 
	}
    #echo "Cookie '" . $cookie_name . "' is set!<br>";
    #echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

</body>
</html>