<?php





function db_conn_open($servername, $username, $password)
{
	
	
}

function db_insert($sql )
{
	if ($conn->query($sql) === TRUE) 
	{
		echo "New record created successfully";
	} 
	else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>