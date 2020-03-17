Multi User Scenario
<h1>Requirements</h1>
<li>Connect 5 vusers on page A, 5 hits every 1 mins equally spaced
<li>Connect 5 vusers on page B, 2 hits every 30 seconds equally spaced
<li>Connect 10 vusers on page C 3 hits every 5 seconds equally spaced
<hr>
</br>
</br>
<h1>What to capture and report</h1>
<li>Report the average reponse time
<li>Report the 90th percentile
<li>Report the error rate
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
</table>

<input type ="submit" value ="Submit">
<?php
include_once 'jwt.php';




?>