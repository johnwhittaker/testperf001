<?php
include_once 'jwt.php';
include_once 'htmlstatic';
htmlhead("Threads 01");
checkname();
?>

<?php
include_once 'functions.php';
include_once 'db_conn.php';

$cookie_name = "threads01";

$str = "";
if(!isset($_COOKIE[$cookie_name])) 
{
    setcookie($cookie_name, md5(time()."8614880573".rand(1,1000)), time() + (305), "/");	
}
else
{
	$conn = db_conn_open();

	$sql = "INSERT INTO threads01 (id, cookie_id) VALUES (ifnull((SELECT max(id)+1 FROM `threads01` as sc WHERE cookie_id = '".$_COOKIE[$cookie_name]."'),0), '".$_COOKIE[$cookie_name]."')";
	$conn->query($sql);


	$sql = "SELECT  Unix_timestamp(now()) - unix_timestamp(min(a.datetime)) as `mintime`,
	 count(*) as `cnt`,
	avg(UNIX_TIMESTAMP(a.datetime)-(SELECT UNIX_TIMESTAMP(x.datetime)FROM `threads01` as `x` where x.cookie_id = a.cookie_id and x.id = a.id -1)) as `diff`,
	(SELECT count( distinct cookie_id)FROM `threads01` WHERE UNIX_TIMESTAMP(datetime) > (select min(unix_timestamp(datetime)) from threads01 where cookie_id = '".$_COOKIE[$cookie_name]."')) as `cc` FROM `threads01` as `a` 
	where a.id >0 and UNIX_TIMESTAMP(datetime) > (select min(unix_timestamp(datetime)) from threads01 where cookie_id = '".$_COOKIE[$cookie_name]."')";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {  
		while($row = $result->fetch_assoc()) {
			echo "Minimum time: ".$row["mintime"]." - Total queries " . $row["cnt"]. " - Average difference: " . $row["diff"]. " Unique users" . $row["cc"]. "<br>";
			
			if(($row["mintime"] > 300)&&($row["cnt"] > 140)&&($row["diff"] >= 5) &&($row["diff"] <=6 ) &&($row["cc"] ==3))
			{
				jwtToken($_GET['name'],pathinfo(__FILE__, PATHINFO_FILENAME), "abC123!"); 
			}
		}
	} 
	else 
	{
		echo "0 results";
	}
}
$conn->close();

timing(1,1,1,1,2,3,4,5,6,10,12);

errorrate(1);
?>