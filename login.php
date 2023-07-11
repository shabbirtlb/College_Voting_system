<?php
include ('conn.php');
session_start();
if(isset($_POST['submit'])){
    $username=$_POST['uname'];
    $password=$_POST['pass'];
    $query1="select * from user where Username ='$username' and password ='$password'";
    $res1=mysqli_query($conn,$query1);
    if (mysqli_num_rows($res1)!=0){
        $data=mysqli_fetch_assoc($res1);
        echo('<script>alert("login success")</script>');
        echo $_SESSION['uname']=$username;
        echo $_SESSION['type']=$data['Utype'];
        echo('<script>window.location="Committee.php"</script>');
    }
    else{
        echo('<script>alert("Incorrect username or password")</script>');
        echo('<script>window.location="index.html"</script>');
    }
    }
?>