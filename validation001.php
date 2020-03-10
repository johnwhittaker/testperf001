<html>
Keep hitting this page, the correct page will contain "Correct:"

You will need to validate which response has the correct page response

<?php

include_once 'jwt.php';


$x = rand(1, 1000);
echo $x;
if ($x==123)
{
	jwtToken("anyone", "Validation001.php", "abC123!"); 
}
else
{
	echo "</br></br>no match";
}


?>
</html>