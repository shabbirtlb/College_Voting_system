<?php
session_start();
$_SESSION['uname'];
include ('conn.php');
?>
<!DOCTYPE html>
<html lang ="en" and dir="ltr" >
    <head>
        <meta charset="utf-8">
        <title>Committee Page</title>
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
  top:70px;
  margin: auto;
  text-align: center;
  border-radius: 24px;
  max-height: 400px;
  width: 1200px;
  background-color:rgba(125, 82, 83, 0.215);
  border: solid;
  border-width: 1px;
  background-image:radial-gradient(#b7aae6,#6773fc)
}

.title {
  color: grey;
  font-size: 18px;
}


#b1{
  border: none;
  outline: 0;
  visibility:hidden;
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
  border-color: #970d1a;
  border-width: 2px;  
}
#b2:hover{
  background-color: rgb(248, 233, 98);
  color: #121212;     
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
      <h1 style="color:whitesmoke;font-size:56px;font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"><b>Committees</b></h1>  
      <div class="d-flex justify-content-end">
        <figure> 
        <a href="Committee.html">  
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
    <p>
    </p>
          <div class="row">
      <div class="card">
        <img src="download.jpg" alt="IEEE" style="width:min-content;height:144px;padding-left: 530px;">
          <h1>IEEE</h1> 
          <p class="title"></p>
          <p>IEEE is the world’s largest technical professional organization dedicated to advancing technology for the benefit of humanity. IEEE and its members inspire a global community through its highly cited publications, conferences, technology standards, and professional and educational activities.</p> 
          <?php
          include ('conn.php');
          $u=$_SESSION['uname'];
          $type=$_SESSION['type'];
          $q="select * from ieee where name like '$u'";
          $r=mysqli_query($conn,$q);
          $c=mysqli_num_rows($r);
          if($type!='Committee'){
          if($c==0){
          ?> 
          <form method="POST" action="r.php">
          <button type="submit" id="b2" name='submit' value='IEEE'>Join</button>
          </form>
          <?php
          }
          else{
            $s=mysqli_fetch_assoc($r);
            $p=$s['pstatus'];
            if($p=='Not paid'){
              ?>
              <center><button id="b2">Requested</button></center>
              <?php
            }
            else{
              ?>
              <center><button id="b2">Member</button></center>
              <?php
            }
          }
        }
          ?>
        </div>
        </div>
<div class ="row"style="padding-top:12px">
    <div class="card">
    <img src="download (1).jpg" alt="CSI" style="width:min-content;height:144px;padding-left: 475px;">    
    <h1>CSI</h1>  
    <p class="title"></p>
    <p>CSI- RAIT is a leading technical committee. It is a committee that acts as a catalyst for aspiring technophiles by bridging the gap between academia and industry. A platform for exploring and learning.<
              <?php
          include ('conn.php');
          $u=$_SESSION['uname'];
          $type=$_SESSION['type'];
          $q="select * from csi where name like '$u'";
          $r=mysqli_query($conn,$q);
          $c=mysqli_num_rows($r);
          if($type!='Committee'){
          if($c==0){
          ?> 
          <form method="POST" action="r.php">
          <button type="submit" id="b2" name='submit' value='csi'>Join</button>
          </form>
          <?php
          }
          else{
            $s=mysqli_fetch_assoc($r);
            $p=$s['pstatus'];
            if($p=='Not paid'){
              ?>
              <center><button id="b2">Requested</button></center>
              <?php
            }
            else{
              ?>
              <center><button id="b2">Member</button></center>
              <?php
            }
          }
        }
          ?>
        </div>
        </div>
    </div>
    </div>
    <div class ="row"style="padding-top:12px">
      <div class="card">
      <img src="acmlogo.png" alt="CSI" style="width:min-content;height:144px;padding-left: 525px;">    
      <h1>ACM</h1>  
      <p class="title"></p>
      <p>Association for Computing Machinery (ACM) is the world's largest educational and scientific computing society, delivers resources that advance computing as a science and profession. RAIT ACM is a Student Chapter of the Elite International level ACM organization. It is a committee focused on the overall development and progress of students in RAIT. We work in different fields like Technical, Creative, Publicity, Video Editing, Management, Social Media, and Editorial.</
                <?php
          include ('conn.php');
          $u=$_SESSION['uname'];
          $type=$_SESSION['type'];
          $q="select * from acm where name like '$u'";
          $r=mysqli_query($conn,$q);
          $c=mysqli_num_rows($r);
          if($type!='Committee'){
          if($c==0){
          ?> 
          <form method="POST" action="r.php">
          <button type="submit" id="b2" name='submit' value='acm'>Join</button>
          </form>
          <?php
          }
          else{
            $s=mysqli_fetch_assoc($r);
            $p=$s['pstatus'];
            if($p=='Not paid'){
              ?>
              <center><button id="b2">Requested</button></center>
              <?php
            }
            else{
              ?>
              <center><button id="b2">Member</button></center>
              <?php
            }
          }
        }
          ?>
        </div>
        </div>
      </div>
      </div>
      <div class ="row"style="padding-top:12px">
        <div class="card">
        <img src="kalarag.jpeg" alt="CSI" style="width:min-content;height:144px;padding-left: 525px;">    
        <h1>KALARAG</h1>  
        <p class="title"></p>
        <p>Kalaraag is an initiative taken up by the students of RAIT, who have come together as one for the sole purpose of creating and promoting Art. It is a team of engineering undergraduates who also happen to be musicians, actors, dancers, writers, painters, orators etc.</p>
                  <?php
          include ('conn.php');
          $u=$_SESSION['uname'];
          $type=$_SESSION['type'];
          $q="select * from kalaraag where name like '$u'";
          $r=mysqli_query($conn,$q);
          $c=mysqli_num_rows($r);
          if($type!='Committee'){
          if($c==0){
          ?> 
          <form method="POST" action="r.php">
          <button type="submit" id="b2" name='submit' value='kalaraag'>Join</button>
          </form>
          <?php
          }
          else{
            $s=mysqli_fetch_assoc($r);
            $p=$s['pstatus'];
            if($p=='Not paid'){
              ?>
              <center><button id="b2">Requested</button></center>
              <?php
            }
            else{
              ?>
              <center><button id="b2">Member</button></center>
              <?php
            }
          }
        }
          ?>
        </div>
        </div>
        </div>
        </div>
        <div class ="row"style="padding-top:12px">
          <div class="card">
          <img src="iste.jpg" alt="CSI" style="width:min-content;height:144px;padding-left: 525px;">    
          <h1>ISTE</h1>  
          <p class="title"></p>
          <p>The Indian Society for Technology in Education (ISTE) is a nonprofit organization that serves educators interested in the use of technology in education. ISTE-RAIT is a college committee that aims for the enhancement of leadership qualities among students and to provide them with a platform which enriches their interpersonal skills and extracurricular knowledge for overall growth of them as an individual.</p>
                    <?php
          include ('conn.php');
          $u=$_SESSION['uname'];
          $type=$_SESSION['type'];
          $q="select * from iste where name like '$u'";
          $r=mysqli_query($conn,$q);
          $c=mysqli_num_rows($r);
          if($type!='Committee'){
          if($c==0){
          ?> 
          <form method="POST" action="r.php">
          <button type="submit" id="b2" name='submit' value='iste'>Join</button>
          </form>
          <?php
          }
          else{
            $s=mysqli_fetch_assoc($r);
            $p=$s['pstatus'];
            if($p=='Not paid'){
              ?>
              <center><button id="b2">Requested</button></center>
              <?php
            }
            else{
              ?>
              <center><button id="b2">Member</button></center>
              <?php
            }
          }
        }
          ?>
        </div>
        </div>
          </div>
          </div>
          <div class ="row"style="padding-top:12px">
            <div class="card">
            <img src="suc-logo.png" alt="CSI" style="width:min-content;height:144px;padding-left: 525px;">    
            <h1>SUC</h1>  
            <p class="title"></p>
            <p>Student Union council is the voice of the students of the college and a source of an individual's overall development apart from the academics. We also overlook the anti-ragging committee and ensure the safety and comfort of the students, making their college journey, a smooth one.</p>

                      <?php
          include ('conn.php');
          $u=$_SESSION['uname'];
          $type=$_SESSION['type'];
          $q="select * from suc where name like '$u'";
          $r=mysqli_query($conn,$q);
          $c=mysqli_num_rows($r);
          if($type!='Committee'){
          if($c==0){
          ?> 
          <form method="POST" action="r.php">
          <button type="submit" id="b2" name='submit' value='suc'>Join</button>
          </form>
          <?php
          }
          else{
            $s=mysqli_fetch_assoc($r);
            $p=$s['pstatus'];
            if($p=='Not paid'){
              ?>
              <center><button id="b2">Requested</button></center>
              <?php
            }
            else{
              ?>
              <center><button id="b2">Member</button></center>
              <?php
            }
          }
        }
          ?>
        </div>
        </div>
            </div>
            </div>
    </div>
    </div>
</body>
