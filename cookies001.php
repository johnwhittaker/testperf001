<?php
include_once 'jwt.php';
include_once 'htmlstatic';
htmlhead("Cookies01");
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
        <h3 class="text-muted"><a href="http://challenge.planittesting.com/"><img src="./images/logo.jpg" height="60px" style="margin-top:-10px"></a> Basic HTTP Sampler</h3>
      </div>    
      In this exercise simply hit this page twice, the first visit will get a cookie, the second will send it back. The cookie is time limited and needs an automated script.</br>
	  You may need to repeat this exercise more than once ans the cookie timing is sensitive.</br>
	  
	  Copy and keep the code below.
      </div>
	

<?php
$cookie_name = "ex";
setcookie($cookie_name, md5(time()."8614880573"), time() + (0), "/"); // 86400 = 1 day

if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie not set! </br>";
} 
else 
{
	if(strcmp( md5(time()."8614880573"),$_COOKIE[$cookie_name])==0)
	{
		echo "pass <br>" ;
		jwtToken($_GET['name'], "cookies001.php", "abC123!"); 
	}
}
 
htmlfoot();
?>
