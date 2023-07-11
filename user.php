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
                  <button type="submit" style="position:absolute;right:70px;background-color: limegreen;color: aliceblue;">Edit profile</button> </a>
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
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <?php if($rs['pfp'] != ''){ ?>
            <img class="profile_img" src=<?php echo $rs['pfp'] ?>alt="student dp">
            <?php 
            }
            else{?>
            <img class="profile_img" src="user.jpg"alt="student dp">
            <?php
            }
            ?>
            <h3><?php echo $user?></h3>
          </div>
          <?php if ($type != 'Committee'){
              ?>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">Student ID:</strong><?php echo $rs['Rno']?></p>
            <p class="mb-0"><strong class="pr-1">Class:</strong><?php echo $rs['Class']?></p>
            <p class="mb-0"><strong class="pr-1">Section:</strong><?php echo $rs['Section']?></p>
          </div>
          <?php 
          } 
          else{
            ?>
            <div class="card-body">
            <p class="mb-0"><strong class="pr-1">Class:</strong><?php echo $rs['Class']?></p>
          </div>
          <?php }?>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
          </div>
          <div class="card-body pt-0">
            <?php if ($type != 'Committee'){
              ?>
              <table class="table table-bordered">
              <tr>
                <th width="30%">Roll</th>
                <td width="2%">:</td>
                <td><?php echo $rs['Rno']?></td>
              </tr>
              <tr>
                <th width="30%">Academic Year	</th>
                <td width="2%">:</td>
                <td><?php echo $rs['Ayear']?></td>
              </tr>
              <tr>
                <th width="30%">Gender</th>
                <td width="2%">:</td>
                <td><?php echo $rs['Gender']?></td>
              </tr>
              <tr>
                <th width="30%">Committees</th>
                <td width="2%">:</td>
                <td><?php echo $rs['Committees']?></td>
              </tr>
              <tr>
                <th width="30%">Position</th>
                <td width="2%">:</td>
                <td><?php echo $rs['Position']?></td>
              </tr>
            </table>
            <?php
            }
            else{
              ?>
              <table class="table table-bordered">
              <tr>
                <th width="30%">Mail</th>
                <td width="2%">:</td>
                <td><?php echo $rs['email']?></td>
              </tr>
              <tr>
                <th width="30%">Mobile number	</th>
                <td width="2%">:</td>
                <td><?php echo $rs['mnumber']?> </td>
              </tr>
            </table>
            <?php
            }
            ?>
          </div>
        </div>
        <?php
        $type=$_SESSION['type'];
        if ($type=='Committee'){
        ?>
        <div style="height: 26px"></div>
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Member Information</h3>
          </div>
          <div class="card-body pt-0">
            <h3>Members :</h3>
          <?php
              $q="select * from $user where pstatus like'Paid'";
              $r=mysqli_query($conn,$q);
              $c=mysqli_num_rows($r);
              if($c!=0){
              while($rs=mysqli_fetch_assoc($r)){
              ?>
              <table class="table table-bordered">
                <th width="30%">Name</th>
                <td width="2%">:</td>
                <td><?php echo $rs['name']?></td>
                <th width="30%">Position</th>
                <td width="2%">:</td>
                <td><?php echo $rs['position']?></td>
                <th width="30%">Contact</th>
                <td width="2%">:</td>
                <td><?php echo $rs['contact']?></td>
              </table>
              <?php 
              }
            }
            ?>
            <br>
            <h3>Membership Requests :</h3>
            <form action="a.php" method="POST">
              <label>Status update of:</label><br><input type="text" name="name" placeholder="Enter name">
              <button type="submit" name="submit" value="<?php echo $user?>" id ="s">Update</button>
          </form> 
            <?php
            $q="select * from $user where pstatus not like'Paid'";
              $r=mysqli_query($conn,$q);
              $c=mysqli_num_rows($r);
              if($c!=0){
              while($rs=mysqli_fetch_assoc($r)){
              ?>
                <table class="table table-bordered">
                <th width="30%">Name</th>
                <td width="2%">:</td>
                <td><?php echo $rs['name']?></td>
                <th width="30%">Position</th>
                <td width="2%">:</td>
                <td><?php echo $rs['position']?></td>
                <th width="30%">Contact</th>
                <td width="2%">:</td>
                <td><?php echo $rs['contact']?></td>
              </table>
              <?php 
              }
            }?>
          </div>
        <div style="height: 26px"></div>
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
          </div>
          <div class="card-body pt-0">
              <h3>Events</h3>
              <?php
              $q="select * from events where Committee like'$user'";
              $r=mysqli_query($conn,$q);
              $c=mysqli_num_rows($r);
              while($rs=mysqli_fetch_assoc($r)){
              ?>
              <table class="table table-bordered">
              <tr>
                <th width="30%">Event name</th>
                <td width="2%">:</td>
                <td><?php echo $rs['Ename']?></td>
              </tr>
              <tr>
                <th width="30%">Start Date</th>
                <td width="2%">:</td>
                <td><?php echo $rs['Sdate']?></td>
              </tr>
              <tr>
                <th width="30%">End Date</th>
                <td width="2%">:</td>
                <td><?php echo $rs['Edate']?></td>
              </tr>
              <tr>
                <th width="30%">Location</th>
                <td width="2%">:</td>
                <td><?php echo $rs['Loc']?></td>
              </tr>
              <tr>
                <th width="30%">Timings</th>
                <td width="2%">:</td> 
                <td><?php echo $rs['Stime']?>-<?php echo $rs['Etime']?></td>
              </tr>
              <tr>
                <th width="30%">Details</th>
                <td width="2%">:</td> 
                <td><form action="det.php" method="POST"><button type="submit" name="det" value=<?php echo $rs['Ename']?>>Details</button></form></td>
              </tr>
              </table>
              <?php
              }
              ?>
              <h3>Elections</h3>
              <?php
              $q="select * from elections where Committee like'$user'";
              $r=mysqli_query($conn,$q);
              $c=mysqli_num_rows($r);
              while($rs=mysqli_fetch_assoc($r)){
              ?>
              <table class="table table-bordered">
              <tr>
                <th width="30%">Election name</th>
                <td width="2%">:</td>
                <td><?php echo $rs['Elname']?></td>
              </tr>
              <tr>
                <th width="30%">Start Date</th>
                <td width="2%">:</td>
                <td><?php echo $rs['SDate']?></td>
              </tr>
              <tr>
                <th width="30%">End Date</th>
                <td width="2%">:</td>
                <td><?php echo $rs['EDate']?></td>
              </tr>
              <tr>
                <th width="30%">Status</th>
                <td width="2%">:</td>
                <td><?php echo $rs['Status']?></td>
              </tr>
              <?php
              $d=$rs['EDate'];
              $s=$rs['Status'];
              $date=date('20y-m-d');
              if($date>=$d and $s!='Declared'){
              ?>
              <tr>
                <th width="30%">Details</th>
                <td width="2%">:</td> 
                <td><form action="det2.php" method="POST"><button type="submit" name="det" value=<?php echo $rs['Elname']?>>Details</button></form></td>
              </tr>
              <?php }?>
              <?php
              $d=$rs['EDate'];
              $s=$rs['Status'];
              $date=date('20y-m-d');
              if($date>=$d and $s =='Declared'){
              ?>
              <tr>
                <th width="30%">Winner</th>
                <td width="2%">:</td> 
                <td><?php echo $rs['Winner']?></td>
              </tr>
              <?php }?>
              </table>
              <?php
              }
              ?>
          </div>
        </div>
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