<?php
include_once 'jwt.php';
if(isset($_POST['minimum'])&&isset($_POST['average'])&&isset($_POST['median'])&&isset($_POST['ninetyth'])&&isset($_POST['ninetifith'])&&isset($_POST['maximum']))
{
	if(
		($_POST['minimum']==1)&&
		($_POST['average']==4.5)&&
		(($_POST['median']==3)||($_POST['median']==4))&&
		($_POST['ninetyth']==10)&&
		($_POST['ninetifith']==12)&&
		($_POST['maximum']==15)
		)
	{
		$x = jwtToken("anyone", "listener001.php.php", "abC123!");
	}
}

echo "listener - identify timings to the nearest half second";

echo "You will need to run for this for the average sleep to become apparent, we suggest 1000 itterations, 10 users 100 times";

$x = rand(1,10);

switch ($x) {
    case 1:
        sleep(1);
        break;
    case 2:
        sleep(1);
        break;
    case 3:
        sleep(1);
        break;
	case 4:
        sleep(2);
        break;
	case 5:
        sleep(3);
        break;
	case 6:
        sleep(4);
        break;
	case 7:
        sleep(5);
        break;
	case 8:
        sleep(6);
        break;
	case 9:
        sleep(10);
        break;
	case 10:
        sleep(rand(10,15));
        break;
}



?>

<form name=details method="post" action="">
<table>
<tr><td>Minimum</td><td>
<input type="text" name="minimum">
</td></tr>
<tr><td>Average</td><td>
<input type="text" name="average">
</td></tr>
<tr><td>Median</td><td>
<input type="text" name="median">
</td></tr>
<tr><td>90th %</td><td>
<input type="text" name="ninetyth">
</td></tr>
<tr><td>95th %</td><td>
<input type="text" name="ninetifith">
</td></tr>
<tr><td>Maximum</td><td>
<input type="text" name="maximum">
</td></tr>
</table>



<input type ="submit" value ="Submit">
</form>