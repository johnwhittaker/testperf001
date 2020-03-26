<?php
include_once 'htmlstatic';
htmlhead("Basic page");
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
        <h3 class="text-muted"><a href="http://challenge.planittesting.com/"><img src="./images/logo.jpg" height="60px" style="margin-top:-10px"></a> Basic HTTP Sampler</h3>
      </div>    
      In this exercise simply hit this page using a http request.</br>
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

$x = jwtToken("anyone", "sampler001.php", "abC123!"); 
echo $x."</br></br>";



?>
</div>

    
   
<?php
htmlfoot();
?>