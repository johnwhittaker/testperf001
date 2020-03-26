$.getJSON("challenge3_driver.php?type=session&requestid=Wz3aPZFlW72n&ts=", function( json ) {
  $.getJSON("challenge3_driver.php?type=input&session="+json.pSession+"&requestid="+json.requestid+"&ts=", function( json ) {
  	document.getElementById('value').innerHTML = json.value;
  	document.getElementById('input').name = json.input;
   });
 });

