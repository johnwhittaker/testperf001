Multi User Scenario
<h1>Requirements</h1>
<li>Connect 5 vusers on page A, 5 hits every 1 mins equally spaced
<li>Connect 5 vusers on page B, 2 hits every 30 seconds equally spaced
<li>Connect 10 vusers on page C 3 hits every 5 seconds equally spaced
<hr>
</br>
</br>
<h1>What to capture and report</h1>
<li>Report the average reponse time - to the nearest second
<li>Report the 90th percentile - to the nearest second
<li>Report the error rate - to the nearest 5%
<li>Each page when it has been done correctly it will produce a code, this is valid for 5 minutes after finishing
</br>
</br>
<a href= "./scenario01/a.php">A</a>
</br></br>
<a href= "./scenario01/b.php">B</a>
</br></br>
<a href= "./scenario01/c.php">C</a>
</br></br>
<hr>

<h1>Enter results</h1>

<form name=details method="post" action="">
<table>
<th>
<td>A</td><td>B</td><td>C</td>
</th>
<tr>
<td>Average</td>
<td>
<input type="text" name="avga">
</td>
<td>
<input type="text" name="avgb">
</td>
<td>
<input type="text" name="avgc">
</td>
</tr>
<tr>
<td>90th Percentile</td>
<td>
<input type="text" name="ninea">
</td>
<td>
<input type="text" name="nineb">
</td>
<td>
<input type="text" name="ninec">
</td>
</tr>
<tr>
<td>Error rate</td>
<td>
<input type="text" name="errora">
</td>
<td>
<input type="text" name="errorb">
</td>
<td>
<input type="text" name="errorc">
</td>
</tr>
<tr>
<td>Code</td>
<td>
<input type="text" name="codea">
</td>
<td>
<input type="text" name="codeb">
</td>
<td>
<input type="text" name="codec">
</td>
</tr>
</table>

<input type ="submit" value ="Submit">
<?php
include_once 'jwt.php';


$a=array();
$b=array();
$c=array();
for($x=0;$x<=301;$x++)
{
	array_push($a, md5((time()-$x."abC123!a")));
	array_push($b, md5((time()-$x."abC123!b")));
	array_push($c, md5((time()-$x."abC123!a")));
}


if(
	isset($_POST['avga'])&&
	isset($_POST['avgb'])&&
	isset($_POST['avgc'])&&
	isset($_POST['ninea'])&&
	isset($_POST['nineb'])&&
	isset($_POST['ninec'])&&
	isset($_POST['errora'])&&
	isset($_POST['errorb'])&&
	isset($_POST['errorc'])&&
	isset($_POST['codea'])&&
	isset($_POST['codeb'])&&
	isset($_POST['codec'])
	)
	{
	if(
		($_POST['avga']==4)&&
		($_POST['avgb']==1)&&
		($_POST['avgc']==10)&&
		($_POST['ninea']==8)&&
		($_POST['nineb']==1)&&
		($_POST['ninec']==18)&&
		($_POST['errora']==25)&&
		($_POST['errorb']==0)&&
		($_POST['errorc']==5)&&
		(in_array($_POST['codea'], $a))&&
		(in_array($_POST['codeb'], $b))&&
		(in_array($_POST['codec'], $c))
		)
	{
		$x = jwtToken("anyone", "scenario001.php.php", "abC123!");
	}
}
?>