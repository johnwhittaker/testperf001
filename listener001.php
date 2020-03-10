<?php

echo "listener - identify pause time";


echo "You will need to run for this for the average sleep to become apparent";

$x = rand(1,10)

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

sleep(rand(1, 18));

?>

<form name=details method="post" action="">
<input type="text" name="minimum">
<input type="text" name="average">
<input type="text" name="ninetyth">
<input type="text" name="ninetifith">
<input type="text" name="maximum">
<input type ="submit" value ="Submit">
</form>