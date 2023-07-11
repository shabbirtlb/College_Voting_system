<?php
session_start();
include ('conn.php');
echo $n=$_POST['event'];
$q="UPDATE `events` set `Status` = 'Authorized' where `Ename` like '$n'";
$ex=mysqli_query($conn,$q);
echo('<script>window.location="admin.php"</script>');   
?>