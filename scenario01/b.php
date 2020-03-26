<?php
include_once 'functions.php';
include_once '../db_conn.php';

$cookie_name = "scenario01";

$str = "";
if(!isset($_COOKIE[$cookie_name])) 
{
	$str =  md5(time()."8614880573".rand(1,1000));
    setcookie($cookie_name, $str, time() + (305), "/");	
}
else
{
	$str = $_COOKIE[$cookie_name];
}	

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, "perf");

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully";

$sql = "INSERT INTO scenario01 (id, page, cookie_id) VALUES (ifnull((SELECT max(id)+1 FROM `scenario01` as sc WHERE cookie_id = '".$str."'),0), 'b', '".$str."')";
$conn->query($sql);

$sql = "SELECT  Unix_timestamp(now()) - unix_timestamp(min(a.datetime)) as `mintime`,
 count(*) as `cnt`,
avg(UNIX_TIMESTAMP(a.datetime)-(SELECT UNIX_TIMESTAMP(x.datetime)FROM `scenario01` as `x` where x.cookie_id = a.cookie_id and x.id = a.id -1)) as `diff`,
(SELECT count( distinct cookie_id)FROM `scenario01` WHERE UNIX_TIMESTAMP(datetime) > (select min(unix_timestamp(datetime)) from scenario01 where cookie_id = '".$_COOKIE[$cookie_name]."') and page ='b') as `cc` FROM `scenario01` as `a` 
where a.id >0 and UNIX_TIMESTAMP(datetime) > (select min(unix_timestamp(datetime)) from scenario01 where cookie_id = '".$_COOKIE[$cookie_name]."' and page ='b')";

$result = $conn->query($sql);
if ($result->num_rows > 0) {  
    while($row = $result->fetch_assoc()) {
        echo "Minimum time: ".$row["mintime"]." - Total queries " . $row["cnt"]. " - Average difference: " . $row["diff"]. " Unique users" . $row["cc"]. "<br>";
		
		if(($row["mintime"] > 300)&&($row["cnt"] > 140)&&($row["diff"] > 6) &&($row["diff"] <=7 ) &&($row["cc"] ==3))
		{
			
			echo "</br><h1>pass</h1></br>";
			$s=time()."abC123!b";
			echo "Time: ".time() ." Code:".md5($s);
		}
    }
} 
else 
{
    echo "0 results";
}
$conn->close();

timing(1,1,1,1,1,1,1,1,1,2,5);


errorrate(0);
?>
