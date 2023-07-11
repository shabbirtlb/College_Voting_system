<?php
include ('conn.php');
session_start();
    echo $u=$_SESSION['uname'];
    echo $p1=$_POST['p1'];
    $p2=$_POST['p2'];
    $p=$_POST['f'];
    if ($p1==$p2){
    $query1="UPDATE `user` SET `password`='$p1' ,`pfp`='$p' WHERE Username like '$u'";
    $res1=mysqli_query($conn,$query1);
    echo('<script>alert("Profile updated")</script>');
    echo('<script>window.location="user.php"</script>');
    }   
    else{
        echo('<script>alert("Passwords do not match")</script>');
        echo('<script>window.location="p.html"</script>');
    }
?>