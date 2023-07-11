<?php
include ('conn.php');
session_start();
echo $el=$_POST['submit'];
echo $u=$_SESSION['uname'];
$sql="select * from user where Username like '$u'";
$r1=mysqli_query($conn,$sql);
$rs1=mysqli_fetch_assoc($r1);
$n=$rs1['mnumber'];
$q="INSERT INTO $el(`uname`,`Utype`,`num`) VALUES('$u','Participant','$n')";
$r=mysqli_query($conn,$q);
echo('<script>window.location="events.php"</script>'); 
?>
