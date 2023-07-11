<!DOCTYPE html>
<html lang="en">
<?php    
session_start();
include('conn.php');
$e =$_POST['det'];
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
<body background="Document.jpg">
    <style>
        .box{
            position: absolute;
            top: 100px;
            left:450px;
            width:500px;
            background-color:rgba(0,0,0,0.7);
            color:white;
        }
        body{
            background-size: 100%;
            background-repeat: no-repeat;
        }
        </style>
        <center><h1>Election Details</h1></center>
<div class='box'>
<form action="w.php"  method="POST">
    <label>Winner :</label><br><input type="text" name="name" placeholder="Enter name :">
    <button type ="submit" name="event" value=<?php echo $e?>>Declare</button>
</form>
<?php
$q="select * from $e where Utype like 'Candidate'";
$r=mysqli_query($conn,$q);
while($rs=mysqli_fetch_assoc($r)){
    ?>
    <table class="table table-bordered">
        <tr>
      <th width="30%">Name</th>
      <td width="2%">:</td>
      <td><?php echo $rs['uname']?></td>
</tr>
<tr>
      <th width="30%">Vote count</th>   
      <td width="2%">:</td>
      <td><?php echo $rs['vcount']?></td>
</tr>
    </table>
    <?php
}
?>
</div>
</body>
</html>