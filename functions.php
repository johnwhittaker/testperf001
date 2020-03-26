<?php

function timing($a,$b,$c,$d,$e,$f,$g,$h,$i,$j)
{
	$x = rand(1,10);

	switch ($x) 
	{
		case 1:
			sleep($a);
			break;
		case 2:
			sleep($b);
			break;
		case 3:
			sleep($c);
			break;
		case 4:
			sleep($d);
			break;
		case 5:
			sleep($e);
			break;
		case 6:
			sleep($f);
			break;
		case 7:
			sleep($g);
			break;
		case 8:
			sleep($h);
			break;
		case 9:
			sleep($i);
			break;
		case 10:
			sleep(rand($i,$j));
			break;
	}
}

function errorrate($error_rate)
{
	$x = rand(1,100);
	if($x <= $error_rate)
	{
		http_response_code(404);
	}
	else
	{
		http_response_code(200);
	}
}

?>