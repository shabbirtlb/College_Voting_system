<?php
session_start();
include ('conn.php');
$el=$_POST['Ename'];
$n1=$_POST['n1'];
$m1=$_POST['m1'];
$n2=$_POST['n2'];
$m2=$_POST['m2'];
$n3=$_POST['n3'];
$m3=$_POST['m3'];
$c1=$_POST['c1'];
$c2=$_POST['c2'];
$c3=$_POST['c3'];   
echo $u=$_SESSION['uname'];
echo $s=$_POST['s'];
$e=$_POST['e'];
$q1="INSERT INTO `elections` (`Elname`, `Committee`, `SDate`, `EDate`) VALUES ('$el','$u','$s','$e')";
$r1=mysqli_query($conn,$q1);

    $q2="CREATE TABLE $el(`uname` varchar(30),`sem` int(1),`course` varchar(30),`Utype` varchar(10),`motto` varchar(50),`vstatus` varchar(30) default 'No',vcount int(4) default 0,`pfp` varchar(50))";
    $r2=mysqli_query($conn,$q2);
    $q3="INSERT INTO $el(`uname`,`sem`,`course`,`Utype`,`motto`,`pfp`) VALUES ('$n1',5,'Comp Engg','Candidate','$m1','$c1')";
    $q4="INSERT INTO $el(`uname`,`sem`,`course`,`Utype`,`motto`,`pfp`) VALUES ('$n2',5,'Comp Engg','Candidate','$m2','$c2')";
    $q5="INSERT INTO $el(`uname`,`sem`,`course`,`Utype`,`motto`,`pfp`) VALUES ('$n3',5,'Comp Engg','Candidate','$m3','$c3')";
    mysqli_query($conn,$q3);
    mysqli_query($conn,$q4);
    mysqli_query($conn,$q5);
    echo('<script>window.location="elections.php"</script>');

?>