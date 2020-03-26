<?php
include_once 'jwt.php';
include_once 'htmlstatic';
htmlhead("Programming01");
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
        <h3 class="text-muted"><a href="http://challenge.planittesting.com/"><img src="./images/logo.jpg" height="60px" style="margin-top:-10px"></a> HTTP Get</h3>
      </div>
		<b>Take the random value below and add 1, then POST in the field below</b></br>
		Needs to be done in less than 1 second, retry it more than once if it fails</br>
		Cookies are required</br>
	Enter Value
<form name=details method="post" action="">
<input type="text" name="value">
<input type ="submit" value ="Submit">
</form>
</div>
	  
	  
	  
<?php
if(!isset($_COOKIE["random"])||!isset($_COOKIE["ex"])) 
{
   echo "<h1>Too Slow</h1>";
} 
else 
{
	if(strcmp( md5(time()."8614880573"),$_COOKIE["ex"])==0)
	{
		if(strcmp( md5(($_POST['value']-1)."8614880573"),$_COOKIE["random"])==0)
		{
			jwtToken($_GET['name'], pathinfo(__FILE__, PATHINFO_FILENAME), "abC123!"); 
		}
		else{
			echo "<h1>Fail</h1>";
		}
	}
	else
	{
		echo "<h1>Too Slow</h1>";
	}
   
}

$x = rand(1, 10000);
echo "<h1>Value: " . $x ."</h1><br>";
$cookie_name = "random";

setcookie($cookie_name, md5($x."8614880573"), time() + (100), "/"); // 86400 = 1 day

$cookie_name = "ex";
setcookie($cookie_name, md5(time()."8614880573"), time() + (0), "/"); // 86400 = 1 day

?>
</div>

    
   
<?php
htmlfoot();
?>