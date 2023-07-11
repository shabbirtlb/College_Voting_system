
            <!DOCTYPE html>
<html lang="en">
<?php    
include('conn.php');
?>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>User Profile</title>

    <meta name="author" content="Codeconvey" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>

    <!--Only for demo purpose - no need to add.-->
    <!-- <link rel="stylesheet" href="css/demo.css" />
    
	    <link rel="stylesheet" href="css/style.css"> -->
</head>
<body background="download (1).jpeg">
    <style>
            .box{
                position: absolute;

            width:100%;
            background-color:rgba(0,0,0,0.7);
            color:white;
        }
        body{
            background-size: 100%;
            background-repeat: no-repeat;
        }
        </style>
        <center><h1 style="color:whitesmoke">User Details</h1></center>
<div class='box'>
<?php
session_start();
include ('conn.php');
$user = $_SESSION['uname'];
            $q="select * from user where Username not like '$user'";
              $r=mysqli_query($conn,$q);
              $c=mysqli_num_rows($r);
              if($c!=0){
              while($rs=mysqli_fetch_assoc($r)){
              ?>
              <table class="table table-bordered">
                <th width="20%">Name</th>

                <td><?php echo $rs['Username']?></td>
                <th width="20%">Class</th>

                <td><?php echo $rs['Class']?></td>
                <th width="20%">Section</th>

                <td><?php echo $rs['Section']?></td>
                <th width="20%">Academic year</th>

                <td><?php echo $rs['Ayear']?></td>
                <th width="20%">Gender</th>
                <td><?php echo $rs['Gender'] ?></td>
                <th width="20%">Committees</th>
                <td><?php echo $rs['Committees'] ?></td>
                <th width="20%">Position</th>
                <td><?php echo $rs['Position'] ?></td>
                <th width="20%">email</th>
                <td><?php echo $rs['email'] ?></td>
                <th width="20%">Contact no.</th>
                <td><?php echo $rs['mnumber'] ?></td>
                <th width="20%">User type</th>
                <td><?php echo $rs['Utype'] ?></td>
              </table>
              <?php 
              }
            }
            ?>
</div>
</body>
</html>