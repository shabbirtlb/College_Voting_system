<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>User Profile</title>
    <meta name="author" content="Codeconvey" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>

    <!--Only for demo purpose - no need to add.-->
    <link rel="stylesheet" href="css/demo.css" />
    
	    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <style>
    #s{
      background-color:blue;
      color:white;
    }
    </style>
<?php
session_start();
include('conn.php');
$user=$_SESSION['uname'];
$type=$_SESSION['type'];
$q="select * from user where Username like '$user'";
$r=mysqli_query($conn,$q);
$rs=mysqli_fetch_assoc($r);
?>
<div class="ScriptTop">
    <div class="rt-container">
    <form action="lout.php" method="POST">
                  <button type="submit" style="position:absolute;right:10px;background-color:orangered;color: aliceblue;">Logout</button>
                </form> 
                <a href="p.html">
                  <button type="submit" style="position:absolute;right:70px;background-color: limegreen;color: aliceblue;">Change password</button> </a>
        <div class="col-rt-4" id="float-right">
 
            <!-- Ad Here -->
            
        </div>
        <div class="col-rt-2">
            <ul>
                <li><a href="Committee.php" title="Back to Main Page">Back to Main Page</a></li>
            </ul>
        </div>
    </div>
</div>

<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
<!-- Student Profile -->
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm"style="position:absolute;left:1px;top:10px;width:100%">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src=<?php echo $rs['pfp']?> alt="student dp">
            <h3>Admin</h3>  
          </div>

        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm"style="position:absolute;right:20px;top:10px;width:90%">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>User Details</h3>
            <form action="us.php" action="post"><button style="position:absolute;top:15px;right:5px;width:100px;background-color:blue;color: aliceblue;border-color:black;border-radius:10px;">Details</button></form>
          </div>    
          <div class="card-body pt-0">
            
          </div>
        </div>
        
          </div>
        <div style="height: 26px"></div>
        <div class="card shadow-sm" style="position:absolute;right:20px;top:120px;width:60%">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Events Information</h3>
            <form action="auth.php" method="post"><input type="text" placeholder="Enter Event Name..." name="event" id="event"><button style="position:absolute;left:205px;width:100px;background-color:blue;color: aliceblue;border-color:black">Authorize</button></form>
          </div>
          <div class="card-body pt-0">
            <h3>Events requesting authorization</h3>
            <?php
              $q="select * from events where Status like 'not'";
              $r=mysqli_query($conn,$q);
              $c=mysqli_num_rows($r);
              if($c!=0){
              while($rs=mysqli_fetch_assoc($r)){
              ?>
              <table class="table table-bordered">
                <th width="30%">Event Name</th>

                <td><?php echo $rs['Ename']?></td>
                <th width="30%">Start Date</th>

                <td><?php echo $rs['Sdate']?></td>
                <th width="30%">End Date</th>

                <td><?php echo $rs['Edate']?></td>
                <th width="30%">Location</th>

                <td><?php echo $rs['Loc']?></td>
                <th width="30%">Letter</th>

                <td><form action="f.php" method="post"><button type ="submit" value=<?php echo $rs['Letter']?> name="file">File</button></td>
              </table>
              <?php 
              }
            }
            ?>
            <h3>Authorized Events</h3>
            <?php
            $q="select * from events where Status  not like 'not'";
              $r=mysqli_query($conn,$q);
              $c=mysqli_num_rows($r);
              if($c!=0){
              while($rs=mysqli_fetch_assoc($r)){
              ?>
              <table class="table table-bordered">
                <th width="30%">Event Name</th>

                <td><?php echo $rs['Ename']?></td>
                <th width="30%">Start Date</th>

                <td><?php echo $rs['Sdate']?></td>
                <th width="30%">End Date</th>

                <td><?php echo $rs['Edate']?></td>
                <th width="30%">Location</th>

                <td><?php echo $rs['Loc']?></td>  
                <th width="30%">Authorized file</th>

                <td><form action="f.php" method="post"><button type ="submit" value=<?php echo $rs['Letter']?> name="file">File</button></td>
              </table>
              <?php 
              }
            }
            ?>
          </div>
    </div>
    <div class="card shadow-sm" style="position:absolute;right:20px;top:620px;width:60%">
      <div class="card-header bg-transparent border-0">     
        <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Elections Information</h3>
        <br>
      <div class="card-body pt-0">
      <h3>Elections</h3>
              <?php
              $q="select * from elections";
              $r=mysqli_query($conn,$q);
              $c=mysqli_num_rows($r);
              while($rs=mysqli_fetch_assoc($r)){
              ?>
              <table class="table table-bordered">
              <tr>
                <th width="30%">Election name</th>

                <td><?php echo $rs['Elname']?></td>
              </tr>
              <tr>
                <th width="30%">Committee</th>

                <td><?php echo $rs['Committee']?></td>
              </tr>
              <tr>
                <th width="30%">Start Date</th>

                <td><?php echo $rs['Sdate']?></td>
              </tr>
              <tr>
                <th width="30%">End Date</th>

                <td><?php echo $rs['Edate']?></td>
              </tr>
              <tr>
                <th width="30%">Completion Status</th>

                <td><?php echo $rs['Status']?></td>
              </tr>
              <?php
              $d=$rs['Edate'];
              $s=$rs['Status'];
              $date=date('20y-m-d');
              if($date>=$d and $s!='Declared'){
              ?>
              <tr>
                <th width="30%">Details</th>
                
                <td><form action="det2.php" method="POST"><button type="submit" name="det" value=<?php echo $rs['Elname']?>>Details</button></form></td>
              </tr>
              <?php }?>
              <?php
              $d=$rs['Edate'];
              $s=$rs['Status'];
              $date=date('20y-m-d');
              if($date>=$d and $s =='Declared'){
              ?>
              <tr>
                <th width="30%">Winner</th>
                
                <td><?php echo $rs['Winner']?></td>
              </tr>
              <?php }?>
              </table>
              <?php
              }
              ?>
      </div>
    </div>   
  </div>
</div>
<!-- partial -->
           
    		</div>
		</div>
    </div>
    
</section>


    <!-- Analytics -->

	</body>
</html>