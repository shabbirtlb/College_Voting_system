<?php
session_start();
include('conn.php');
echo $e=$_POST['event'];
$u=$_POST['name'];
$q="UPDATE $e SET `pstatus`='paid' WHERE uname like '$u'";
$r=mysqli_query($conn,$q);
echo('<script>window.location="user.php"</script>');
?>