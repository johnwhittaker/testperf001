<html>
Keep hitting this page, the correct page will contain "Correct"

You will need to validate which response has the correct page response

<?php

include_once 'jwt.php';


$x = rand(1, 10);
echo $x;
if ($x==2)
{
	jwtToken("anyone", "Validation001.php", "abC123!"); 
}
else
{
	echo "</br></br>no match";
}


?>
</html>