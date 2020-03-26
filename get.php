<?php
include_once 'htmlstatic';
htmlhead("GET");
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
		<b>Apart from the very first exercise all exercises require a GET with a parameter of "name" to be sent with your name.</b>	  </br></br>
      In this exercise simply hit this page using a http request. There must be a GET with your full name, the GET parameter is "name".</br>
	  Copy and keep the code below.
      </div>

<?php

include_once 'jwt.php';

foreach (getallheaders() as $name => $value) {
    if(strcmp($name, "Accept")==0)
	{
		echo "Are you using a web browser? </br>Do not record this page as recorded headers will block success </br>This page will not show a pass if the \"Accept\" header is set as will occur with Web browsers";
		exit();
	}
}

if(isset($_GET['name']))
{
	echo "Your name is: " . $_GET['name'] . "</br></br>";
	$x = jwtToken($_GET['name'],pathinfo(__FILE__, PATHINFO_FILENAME), "abC123!"); 
	echo $x."</br></br>";
}
else
{
	echo "No GET parameter of name, try again";
	exit();
}

?>
</div>

    
   
<?php
htmlfoot();
?>