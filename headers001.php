<?php
include_once 'jwt.php';
include_once 'htmlstatic';
htmlhead("Regular Expression 01");
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
		<b>

Set a header titled "hello" and with a value of "world"</b>

<?php
include_once 'jwt.php';
foreach (getallheaders() as $name => $value) {

	if(strcmp($name,"hello")==0 && strcmp($value,"world")==0)
	{
		jwtToken($_GET['name'], pathinfo(__FILE__, PATHINFO_FILENAME), "abC123!");
		
	}
}
?>


</div>
  
<?php
htmlfoot();
?>