<!DOCTYPE html>
<html lang ="en" and dir="ltr" >
    <head>
        <meta charset="utf-8">
        <title>Elections Page</title>
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
.card {
  top:0px;
  margin: 0px;
  text-align: center;
  border-radius: 14px;
  max-height: 900px;
  width: 1500px;
  background-color:rgba(125, 82, 83, 0.215);
  border: solid;
  border-width: 1px;
  background-image:radial-gradient(#121212,#970d1a);
  color: aliceblue;
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
  height: 300px;
  width: 350px;
  border: dotted 2px #ebf57e;
  left: 0px;
  background-image:radial-gradient(#FFFFFF,#FFFFFF);
      color:#970d1a;
}
#v{
  border: none;
  outline: 0;
  display: inline-block;
  color: #121212;
  text-align:center;
  cursor: pointer;  
  border-radius: 10px;
  width: 10%;
  height:50px;
  font-size: 18px;
  border-color: #6cd0ff;
  border-width: 2px; 
  color:white;
  background-color:#970d1a;
}
#b2{
  border: solid;
  outline: 0;
  display: inline-block;
  /* padding: 1px; */
  color: #fffefe;
  text-align:center;
  cursor: pointer;
  border-radius: 20px;
  width: 30%;
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
      <h1 style="color:whitesmoke;font-size:56px;font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"><b>Elections</b></h1>  
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
    else{?>
        <a href="user.php"> 
          <?php 
          }
          ?>  
          <img src="user-4-24.png" style="height:18px;width:95px;padding-left: 75px;"></a> 
       <figcaption style="font-size: 12px;">User</figcaption> 
      </figure>
        </div>
    </nav>
    
    <div class="content"><?php
    $query="select * from user where Username like '$user'";
    $result=mysqli_query($conn,$query);
    $row2=mysqli_fetch_assoc($result);
    $type=$row2['Utype'];
    if($type=='Committee'){
        ?>
        <a href ="elcr.html" style="position:absolute;top:85px;right:10px"><button id="b4">Add Election</button></a>
    <?php
    }
    ?>
        <h1 style="color:#121212;padding-top: 80px;">Ongoing Elections</h1>
        <hr style="border: 2px solid #121212;border-radius:24px;">
        <?php
  $date = date('20y-m-d');
$query2="select * from elections where Sdate = '$date' or Sdate < '$date' and Edate > '$date'";
$res2=mysqli_query($conn,$query2);
?>
<?php while( $row1=mysqli_fetch_assoc($res2)) {
          ?>
  <div class="row">
        <div class="card">
            <h4 style="text-align:center;"><?php echo $row1['Elname'] ?></h3>
            <h4 style="text-align:center;">Committee :<?php echo $row1['Committee'] ?></h3>
            <h4 style="text-align:center;">Ends: <?php echo $row1['Edate'] ?></h3>
            <?php
            $e=$row1['Elname'];
            $q1 = "select * from $e where Utype like 'Candidate'";
            $res=mysqli_query($conn,$q1);
            ?>
        <div class="container">
            <div class="row">
                               <?php
                 while($row=mysqli_fetch_assoc($res)){
                    ?>
                    <div class="col-3">
                        <div class="card" id="c1">
                            <?php if($row['pfp']!='')
                            {
                              ?>
                              <img src=<?php echo $row['pfp'] ?> style="padding-top:5px;width:120px;height:130px;border-radius: 12px;align-self: center;">
                              <?php }
                              else{
                                ?>
                              <img src="user.jpg" style="padding-top:5px;width:min-content;height:130px;border-radius: 12px;align-self: center;">
                              <?php }?>
                            <b><p>Name : <?php echo $row['uname']?></p> 
                            <p>Semester: <?php echo $row['sem']?> </p>
                            <p>Course:<?php echo $row['course']?></p>
                            <p>Motto:<?php echo $row['motto']?></p></b>
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <br>
            <?php
                $e=$row1['Elname'];
                $query2="select * from $e where uname like '$user'";
                $res1=mysqli_query($conn,$query2);
                $r=mysqli_num_rows($res1);
                if($type!= "admin"){
                if($r!=0  ){
                  ?>
                  <center><button id ='v'>Voted</button></center> 
                <?php
                }
                else{
                ?>
            <form action="e.php" method="POST">
            <label>Enter name of candidate you want to vote for :</label>
            <input type="text" style="width: 150px;" placeholder="Enter the full name" name="cname">
            <br>
            <button id="b2" type="submit" name="submit" value=<?php echo $e ?> style="align-self:center ;">Vote</button>
        </form>
        <?php
                }}
        ?>
            
        </div>
        </div>
        <br>
<?php } ?>
    </div>
    <h1 style="color:#121212;padding-top: 10px;">Upcoming Elections</h1>
        <hr style="border: 2px solid #121212;border-radius:24px;">
        <?php
   $type;
  $date = date('20y-m-d');
$query2="select * from elections where Sdate > '$date' and Edate > '$date'";
$res2=mysqli_query($conn,$query2);
?>
<?php while( $row1=mysqli_fetch_assoc($res2)) {
          ?>
  <div class="row">
        <div class="card">
            <h4 style="text-align:center;"><?php echo $row1['Elname'] ?></h3>
            <h4 style="text-align:center;">Committee :<?php echo $row1['Committee'] ?></h3>
            <h4 style="text-align:center;">Ends: <?php echo $row1['Edate'] ?></h3>
            <?php
            $e=$row1['Elname'];
            $q1 = "select * from $e where Utype like 'Candidate'";
            $res=mysqli_query($conn,$q1);
            ?>
        <div class="container">
            <div class="row">
                               <?php
                 while($row=mysqli_fetch_assoc($res)){
                    ?>
                    <div class="col-3">
                        <div class="card" id="c1">
                        <?php if($row['pfp']!=''){
                            ?>
                            <img src=<?php echo $row['pfp'] ?> style="padding-top:5px;width:120px;height:130px;border-radius: 12px;align-self: center;">
                            <?php }
                            else{
                              ?>
                            <img src="user.jpg" style="padding-top:5px;width:min-content;height:130px;border-radius: 12px;align-self: center;">
                            <?php }?>
                            <b><p>Name : <?php echo $row['uname']?></p> 
                            <p>Semester: <?php echo $row['sem']?> </p>
                            <p>Course:<?php echo $row['course']?></p>
                            <p>Motto:<?php echo $row['motto']?></p></b>
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        </div>
        <br>
<?php } ?>
    </div>
    <h1 style="color:#121212;padding-top: 10px;">Previous Elections</h1>
        <hr style="border: 2px solid #121212;border-radius:24px;">
        <?php
  $date = date('20y-m-d');
  $query2="select * from elections where Sdate < '$date' and Edate < '$date' or Edate = '$date' and Winner not like ''";
  $res2=mysqli_query($conn,$query2);
?>
<?php while( $row1=mysqli_fetch_assoc($res2)) {
          ?>
  <div class="row">
        <div class="card">
            <h4 style="text-align:center;"><?php echo $row1['Elname'] ?></h3>
            <h4 style="text-align:center;">Committee :<?php echo $row1['Committee'] ?></h3>
            <h4 style="text-align:center;">Ended: <?php echo $row1['Edate'] ?></h3>
            <h1 style="text-align:center;">Winner:</h1>
            <b><h2 style="text-align:center"><?php echo $row1['Winner']?></h2></b>
            <?php
            $w=$row1['Winner'];
            $e=$row1['Elname'];
            $q1 = "select * from $e where Utype like 'Candidate' and Uname like '$w'";
            $res=mysqli_query($conn,$q1);
            ?>
        <div class="container">
            <div class="row">
                               <?php
                 while($row=mysqli_fetch_assoc($res)){
                    ?>
                    <div class="col-3">
                        <div class="card" id="c1" style="left:400px">
                            <img src=<?php echo $row['pfp'] ?> style="padding-top:5px;width:min-content;height:130px;border-radius: 48px;align-self: center;">
                            <b><p>Name : <?php echo $row['uname']?></p> 
                            <p>Semester: <?php echo $row['sem']?> </p>
                            <p>Course:<?php echo $row['course']?></p>
                            <p>Motto:<?php echo $row['motto']?></p></b>
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        </div>
        <br>
<?php } ?>
    </div>
    </div>

</body>
</html>