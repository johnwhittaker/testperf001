<html>

<?php

if (strcmp(md5("x8ENnpXH70ZKourSoord".floor(time()/1)*1),$_POST['fname'])==0)
{
	echo "Match";
}
else
{
	echo "no match";
}


echo "</br> Return this text in the field below: " .md5("x8ENnpXH70ZKourSoord".floor(time()/1)*1);
?>
<form name=details method="post" action="">
<input type="text" name="fname">
<input type ="submit" value ="Submit">
</form>
</html>
<li>