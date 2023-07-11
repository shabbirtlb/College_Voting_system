<?php
session_start();
include('conn.php');
echo $c=$_POST['submit'];
echo $u=$_SESSION['uname'];
$s="select * from user where Username like '$u'";
$e=mysqli_query($conn,$s);
$r=mysqli_fetch_assoc($e);
$rn=$r['RNo.'];
$cl=$r['Section'];
$y=$r['Class'];
$co=$r['mnumber'];
$p='Member';
$st='Not paid';
$i="INSERT INTO $c(`name`, `position`, `pstatus`, `rollno`,`contact`) VALUES ('$u','$p','$st','$rn','$co')";
$ex=mysqli_query($conn,$i);
echo('<script>window.location="Committee.php"</script>');   
?>