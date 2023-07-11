<?php
include ('conn.php');
session_start();
$el=$_POST['submit'];
$n=$_POST['cname'];
$u=$_SESSION['uname'];
$q="INSERT INTO $el (`uname`,`vstatus`,`Utype`) VALUES('$u','Voted','Participant')";
$r=mysqli_query($conn,$q);
$q="UPDATE $el SET `vcount`= vcount+1 WHERE uname like '$n' AND Utype LIKE 'Candidate'";
$r=mysqli_query($conn,$q);
echo('<script>window.location="elections.php"</script>');
?>
