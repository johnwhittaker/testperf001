Manually set a header titled "hello" and with a value of "world"

<?php
include_once 'jwt.php';
foreach (getallheaders() as $name => $value) {

	if(strcmp($name,"hello")==0 && strcmp($value,"world")==0)
	{
		jwtToken("anyone", "headers001.php", "abC123!"); 
		
	}
}
?>