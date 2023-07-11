<!DOCTYPE html>
<html lang ="en" and dir="ltr" >
    <head>
        <meta charset="utf-8">
        <title>Events Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
<style>
.navbar {
  background-color: #333;
  overflow: hidden;
  position:absolute;
  top: 0; 
  width: 100%;
  margin: 0;
  text-align: center;
}


.title {
  color: grey;
  font-size: 18px;
}
#b{
  top:1px;
  margin: 0px;
  left: 550px;
  text-align: center;
  border-radius: 14px;
  max-height: 400px;
  width: 520px;
  background-color:rgba(125, 82, 83, 0.215);
  border: solid;
  border-width: 1px;
  background-image:radial-gradient(#b7e1f5,#73f4f4)
    
}
#c1
{
  top:0px;
  margin: 0px;
  text-align: center;
  border-radius: 14px;
  width: 100%;
  left: 0px;
  background-image:radial-gradient(#121212,#800000);
  color:whitesmoke;
}

#b1{
  border: none;
  outline: 0;
  display: inline-block;
  /* padding: 1px; */
  color: #121212;
  text-align:center;
  cursor: pointer;  
  border-radius: 20px;
  width: 30%;
  font-size: 18px;
  border-color: #6cd0ff;
  border-width: 2px;         
} 
#b1:hover{
  background-color: #970d1a;
  color: aliceblue;
}
#b2{
  border: solid;
  outline: 0;
  display: inline-block;
  top: 1px;
  color: #fffefe;
  text-align:center;
  cursor: pointer;
  border-radius: 36px;
  width: 30%;
  text-align: center;
  font-size: 18px;
  border-color: #970d1a;
  border-width: 2px;
  background-color: #970d1a;
  opacity: 90%;  
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 1;
}
.card h3 {
  padding: 2px;
  margin: 8px 0;
}
</style>
<body>
  
    <nav id="navbar" class="navbar navbar" style="background-color: rgb(65, 3, 3);color:azure;height: 80px;">
      <img src="2276446876.png" style="height: 60px ;width:144px;position: relative">
      <h1 style="color:whitesmoke;font-size:56px;font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"><b>Events</b></h1>  
      <div class="d-flex justify-content-end">
        <figure> 
        <a href="Committee.php">  
        <img src="home-2-24.png" style="height: 18px;width:36px;padding-left: 12px;"></a> 
       <figcaption style="font-size: 12px;">Committees</figcaption> 
      </figure>
      <figure> 
        <a href="elections.php">  
        <img src="list-2-24.png" style="height:18px;width:85px;padding-left: 50px;"></a> 
       <figcaption style="font-size: 12px;">Elections</figcaption> 
      </figure>
      <figure> 
        <a href="events.php">  
          <img src="boombox-24.png" style="height:18px;width:95px;padding-left: 75px;"></a> 
       <figcaption style="font-size: 12px;">Events</figcaption> 
      </figure>
      <figure> 
      <?php
          session_start();
    include ('conn.php');
    $user=$_SESSION['uname'];
    if($user =='Admin'){?>
    <a href="admin.php">
    <?php
    }
    else{
      ?>
      <a href="user.php"> 
          <?php 
          }
          ?>  
      <img src="user-4-24.png" style="height:18px;width:95px;padding-left: 75px;"></a> 
      <figcaption style="font-size: 12px;">User</figcaption> 
      </figure> 
        </div>
    </nav>
    <?php
    include ('conn.php');
    $user=$_SESSION['uname'];
    $query="select * from user where Username like '$user'";
    $result=mysqli_query($conn,$query);
    $row2=mysqli_fetch_assoc($result);
    $type=$row2['Utype'];
    ?>
    <div class="content">
    <div class="content">
    <?php
    if($type=='Committee'){
        ?>
        <a href ="ecr.html" style="position:absolute;top:85px;right:10px"><button id="b4">Add Event</button></a>
    <?php
    }
        ?>
        <h1 style="color:#121212;padding-top: 80px;">Ongoing Events</h1>
        <hr style="border: 2px solid #121212;border-radius:24px;">
        <?php 
$date = date('20y-m-d');
$query2="select * from events where  Status not like 'Not' and Sdate ='$date' or Sdate<'$date' and Edate >'$date' ";
$res2=mysqli_query($conn,$query2);
$c=mysqli_num_rows($res2);
?>
<?php while($row1=mysqli_fetch_assoc($res2)) {
          ?>
        <div class="container">
            <div clas="card" id="c1">
            <h1 style="text-align:center;"><?php echo $row1['Ename']?></h1>
            <h3 style="text-align:center;">Committee : <?php echo $row1['Committee']?></h3>
            <h3 style="text-align: center;">Dates : <?php echo $row1['Sdate']?> to <?php echo $row1['Edate']?></h3>
            <h3 style="text-align: center;">Timings : <?php echo $row1['Stime'] ?> to <?php echo $row1['Etime']?></h3>
            <h3 style="text-align :center">Location: <?php echo $row1['Loc'] ?></h3>
            <h4 style="text-align :center">Cost :<?php echo $row1['Cost']?></h4>
            <?php
                $e=$row1['Ename'];
                $query2="select * from $e where uname like '$user'";
                $res1=mysqli_query($conn,$query2);
                $r=mysqli_num_rows($res1);
                if($type!='admin'){
                if($r!=0){
                  ?>
                  <center><button id="b2">Registered</button></center> 
                <?php
                }
                else{
                ?>
            <form action="ev.php" method="POST">
           <center> <button id="b2" type="submit" name ="submit" value=<?php echo $e?>>Register</button></center>
        </form>
        <?php
                }}        ?>
        </div>
    </div>
    <br>
    <?php } ?>
    <h1 style="color:#121212;padding-top: 10px;">Upcoming Events</h1>
        <hr style="border: 2px solid #121212;border-radius:24px;">
        <?php 
$date = date('20y-m-d');
$query2="select * from events where Status like 'Authorized'  and Sdate >'$date' and Edate >'$date' ";
$res2=mysqli_query($conn,$query2);
$c=mysqli_num_rows($res2);
?>
<?php while($row1=mysqli_fetch_assoc($res2)) {
          ?>
        <div class="container">
            <div clas="card" id="c1">
            <h1 style="text-align:center;"><?php echo $row1['Ename']?></h1>
            <h3 style="text-align:center;">Committee : <?php echo $row1['Committee']?></h3>
            <h3 style="text-align: center;">Dates : <?php echo $row1['Sdate']?> to <?php echo $row1['Edate']?></h3>
            <h3 style="text-align: center;">Timings : <?php echo $row1['Stime'] ?> to <?php echo $row1['Etime']?></h3>
            <h3 style="text-align :center">Location: <?php echo $row1['Loc']?></h3>
            <h4 style="text-align :center">Cost :<?php echo $row1['Cost']?></h4>
            <?php 
                $e=$row1['Ename'];
                $query2="select * from $e where uname like '$user'";
                $res1=mysqli_query($conn,$query2);
                $r=mysqli_num_rows($res1);
                if($type!='admin'){
                if($r!=0){
                  ?>
                  <center><button>Registered</button></center> 
                <?php
                }
                else{
                ?>
            <form action="ev.php" method="post">
           <center> <button id="b2" type="submit" name="submit" value=<?php echo $e?>>Register</button></center>
        </form>
        <?php
                }}
        ?>
        </div>
    </div>
    <?php } ?>
    <h1 style="color:#121212;padding-top: 10px;">Completed Events</h1>
        <hr style="border: 2px solid #121212;border-radius:24px;">
        <?php 
$date = date('20y-m-d');
$query2="select * from events where Status like 'Authorized' and Sdate <'$date' and Edate <'$date'";
$res2=mysqli_query($conn,$query2);
$c=mysqli_num_rows($res2);
?>
<?php while($row1=mysqli_fetch_assoc($res2)) {  
          ?>
        <div class="container">
            <div clas="card" id="c1">
            <h1 style="text-align:center;"><?php echo $row1['Ename']?></h1>
            <h3 style="text-align:center;">Committee : <?php echo $row1['Committee']?></h3>
            <h3 style="text-align: center;">Dates : <?php echo $row1['Sdate']?> to <?php echo $row1['Edate']?></h3>
            <h3 style="text-align: center;">Timings : <?php echo $row1['Stime'] ?> to <?php echo $row1['Etime']?></h3>
            <h3 style="text-align :center">Location: <?php echo $row1['Loc'] ?></h3>
            <h4 style="text-align :center">Cost :<?php echo $row1['Cost']?></h4>
        </div>
    </div>
    <?php
     } ?>
    </div>
    </div>
</body>
</html>