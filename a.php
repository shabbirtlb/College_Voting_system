<?php
session_start();
include("conn.php");
echo $n=$_POST['name'];
echo $c=$_POST['submit'];
$s="select * from user where Username like '$n'";
$e=mysqli_query($conn,$s);
$r=mysqli_fetch_assoc($e);
$co=$r['Committees'];
if ($co==''){
    $c1=$c;
}
else{
    echo $c1="$co,$c";
}
$q="UPDATE `user` set `Committees` = '$c1' where `Username` like '$n'";
$ex=mysqli_query($conn,$q);
$q="UPDATE $c set `pstatus` = 'Paid' where `name` like '$n'";
$ex=mysqli_query($conn,$q);
echo('<script>window.location="user.php"</script>');   
?>