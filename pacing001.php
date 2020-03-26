<?php
include_once 'jwt.php';
include_once 'htmlstatic';
htmlhead("Pacing01");
checkname();
?>
 <body style="">

<!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Begin page content -->
      <div class="container">

      <!-- Fixed navbar -->
     <div class="header">
            <ul class="nav nav-pills pull-right">
              <li class="active"><a href="../../../../testperf001/index.php">Home</a></li>
            </ul>
        <h3 class="text-muted"><a href="http://challenge.planittesting.com/"><img src="./images/logo.jpg" height="60px" style="margin-top:-10px"></a> Pacing</h3>
      </div>
		<b>Pacing, hit this page once every 5 seconds for 5 minutes</br></br></b></br>
		
		Cookies are required</br\>
</div>
<?php
$cookie_name = "pacing_tracking";
$counter =0;
if(!isset($_COOKIE[$cookie_name])||(is_null($_COOKIE[$cookie_name]))||($_COOKIE[$cookie_name]=="null")) {
    echo "Cookie not set!";
	$cookie_text[$counter]= time();
	$cookie_text = json_encode($cookie_text);
}

if(isset($_COOKIE[$cookie_name]) &&($_COOKIE[$cookie_name]!="null")) 
{
	$cookie_text = json_decode($_COOKIE[$cookie_name], true);
	$t = time();

	foreach($cookie_text as $x => $x_value) 
	{
		$diff[] = (time()-($x_value + 0));
	}
	$counter =0;
	$last =0;
	$pass =true;
	foreach($diff as $x => $value) 
	{
		if ($counter ==0)
		{
			$last = $value;
			$difference = 0;
		}
		else
		{
			$difference = $last - $value;
			
			if (($difference <=4.9) || ($difference >=6.1)) 
			{
			
				$pass = false;
			}
			$last = $value;
		}
		if ($pass)
		{
			echo "Cnt: " . $counter . " Diff: " . $difference . "Working";
		}
		else
		{
			echo "Cnt: " . $counter . " Diff: " . $difference . "Failed";
		}
		echo "<br>";
		
		$counter++;
		
	}
	if ($pass && $counter >=60)
	{
		jwtToken($_GET['name'], pathinfo(__FILE__, PATHINFO_FILENAME), "abC123!"); 
	}

	$cookie_text[$counter] = time();
	$cookie_text = json_encode($cookie_text);
}
setcookie($cookie_name, $cookie_text, time() + (310), "/"); 
?>

</div>
   
<?php
htmlfoot();
?>