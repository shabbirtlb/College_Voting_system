<?php
session_start();
include('conn.php');
echo $e=$_POST['event'];
echo $u=$_POST['name'];
$q="UPDATE `elections` SET `Winner`='$u' ,`Status`='Declared' WHERE Elname like '$e'";
$r=mysqli_query($conn,$q);
echo('<script>window.location="user.php"</script>');    
?>