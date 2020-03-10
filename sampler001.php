<?php

include_once 'jwt.php';

$x = jwtToken("anyone", "sampler001.php", "abC123!"); 
echo $x

?>