<html>
<body>


<?php

$x = rand(1, 10000);
echo "Take the random value and add 1: " . $x ."<br>";
$cookie_name = "random";

setcookie($cookie_name, md5($x."8614880573"), time() + (100), "/"); // 86400 = 1 day

$cookie_name = "ex";
setcookie($cookie_name, md5(time()."8614880573"), time() + (0), "/"); // 86400 = 1 day


echo "<br>Value: " . $_POST['value']."<br>";

if(!isset($_COOKIE["random"])) {
    echo "Cookie not set!";
	
} 
else 
{
	if(strcmp( md5(time()."8614880573"),$_COOKIE["ex"])==0)
	{
		if(strcmp( md5(($_POST['value']-1)."8614880573"),$_COOKIE["random"])==0)
		{
			echo "pass <br>" ;
		}
		else{
			echo "fail";
		}
	}
	else
	{
		echo "Too SLow";
	}
   
}
?>
<br><br>

Enter Value
<form name=details method="post" action="">
<input type="text" name="value">
<input type ="submit" value ="Submit">
</form>

</body>
</html>