<?php
$f=$_POST['file'];
$filename =$f;
  
header('Content-type: application/pdf');
  
header('Content-Disposition: inline; filename="' . $filename . '"');
  
header('Content-Transfer-Encoding: binary');
  
header('Accept-Ranges: bytes');
 
@readfile($f);
?>