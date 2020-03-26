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
In the CSV below find, extract and POST back a UUID, you have to return the solution in the same second and may require more than one attempt</b>
</br>
The UUID format is 8 characters - 4 characters - 4 characters - 4 characters - 12 Characters
</br>
UUIDs have lower case characters a-f and numbers 0-9 broken up with hyphens
</br>E.g. 01234567-890a-bcde-f012-34567890abcd

</br></br>
</div>

</br></br>
<form name=details method="post" action="">
<input type="text" name="parameter">
<input type ="submit" value ="Submit">
</form>

</br></br>


<?php
include_once 'jwt.php';

$salt = "abc123!";

if(isset($_COOKIE['hash'])&& isset($_POST['parameter']))
{
	$str = $_POST['parameter'].time().$salt;
	if(strcmp(md5($str),$_COOKIE['hash'])==0)
	{
		jwtToken($_GET['name'], pathinfo(__FILE__, PATHINFO_FILENAME), "abC123!");
		echo "</br></br>";
	}
}
if(isset($_POST['parameter']))
{
	echo "Value entered: " . $_POST['parameter']."</br></br>";
}

$uuid = bin2hex(random_bytes(16));
$uuid = substr_replace( $uuid, "-", 8, 0 );
$uuid = substr_replace( $uuid, "-", 13, 0 );
$uuid = substr_replace( $uuid, "-", 18, 0 );
$uuid = substr_replace( $uuid, "-", 23, 0 ); 

$str =  md5($uuid. time().$salt);
setcookie("hash", $str, time() + (100), "/"); // 86400 = 1 day
echo "</br></br>";
$max = rand(1,1000);
for ($z=0;$z < $max;$z++)
{
	fake_UUID();
}


echo $uuid .",";


$max = rand(1,1000);
for ($z=0;$z < $max;$z++)
{
	fake_UUID();
}

function fake_UUID()
{
	$x=rand(1,2);
	switch($x)
	{
		case 1:
		$uuid = bin2hex(random_bytes(15));
		$uuid = substr_replace( $uuid, "-", 8, 0 );
		$uuid = substr_replace( $uuid, "-", 13, 0 );
		$uuid = substr_replace( $uuid, "-", 18, 0 );
		$uuid = substr_replace( $uuid, "-", 23, 0 ); 
		break;
		case 2:
		$uuid = bin2hex(random_bytes(16));
		$uuid = substr_replace( $uuid, "-", 7, 0 );
		$uuid = substr_replace( $uuid, "-", 13, 0 );
		$uuid = substr_replace( $uuid, "-", 18, 0 );
		$uuid = substr_replace( $uuid, "-", 23, 0 ); 
		break;
	}
	echo $uuid .",";
}
?>

</div>
  
<?php
htmlfoot();
?>