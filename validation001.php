<?php
include_once 'jwt.php';
include_once 'htmlstatic';
htmlhead("Validation01");
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
        <h3 class="text-muted"><a href="http://challenge.planittesting.com/"><img src="./images/logo.jpg" height="60px" style="margin-top:-10px"></a>Validation</h3>
      </div>
		<b>Apart from the very first exercise all exercises require a GET with a parameter of "name" to be sent with your name.</b>	  </br></br>
      Keep hitting this page, the right page will contain "Correct"</br>

		You will need to validate which response has the correct page response</br>
		1 in 10,000 page hits is correct
		This is a needle in a haystack exercise and will require perseverance
      </div>


<?php

include_once 'jwt.php';

$x = rand(1, 10000);
#echo $x;
if ($x==1234)
{
	jwtToken($_GET['name'], pathinfo(__FILE__, PATHINFO_FILENAME), "abC123!"); 
}
else
{
	echo "</br></br><h1>No Match, try again</h1>";
}
?>
</div>

    
<?php
htmlfoot();
?>