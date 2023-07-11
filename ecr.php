<?php
session_start();
include ('conn.php');
echo $el=$_POST['Ename'];
echo $loc=$_POST['n1'];
$cost=$_POST['m1'];
$st=$_POST['st'];
$et=$_POST['et'];
echo $l=$_POST['f'];
echo $u=$_SESSION['uname'];
echo $s=$_POST['s'];
$e=$_POST['e'];
$q1="INSERT INTO `events` (`Ename`, `Committee`, `Sdate`, `Edate`,`Stime`,`Etime`,`Loc`,`Cost`,`Letter`) VALUES ('$el','$u','$s','$e','$st','$et','$loc','$cost','$l')";
$r1=mysqli_query($conn,$q1);
    $q2="CREATE TABLE $el(`uname` varchar(30),`Utype` varchar(10),`pstatus` varchar(30) default 'Not paid',`num` int(12))";
    $r2=mysqli_query($conn,$q2);
    $q3="INSERT INTO $el(`uname`,`Utype`) VALUES ('$u','Organizer')";
    mysqli_query($conn,$q3);
    echo('<script>window.location="events.php"</script>');
?>