<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Resources/css/staff.css">
</head>
<body>
    <div class="container-fluid bg">
    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
            
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
        <!--form start-->
        <form class="form-container" method="post" action="logins.php">
          <div class="form-group">
            <h2 align="center" class="heading">STAFF LOGIN</h2>
          </div>
          <div class="form-group">
            <label for="userid">Login ID</label>
            <input type="text" class="form-control" name="u_id" id="userid" placeholder="Enter Your User Id">
          </div>
          <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" name="password" id="Password" placeholder="Enter Your Password">
          </div>
        
           <div class="form-group">
          <input type="submit"  name="submit" class="btn btn-primary btn-block" value="Submit">
          </div>
        </form>
        <!-- form end -->
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            
        </div>
    </div>
</div>    
</body>
</html>
<?php
session_start();
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("pam") or die (mysql_error());
if(isset($_POST['submit']))
    
{ 
    
   $u_id=$_POST['u_id'];
   $password=$_POST['password'];
    $res=mysql_query("select * from user where u_id='$u_id' ");
   $client_res = mysql_query("select * from client where fc_uid = '$u_id'");
    $row= mysql_fetch_array($res);
   $client_row = mysql_fetch_array($client_res);
   $_SESSION["loginName"] = $row['u_name'];
    if($password==$row['password'] && Staff==$row['C/S'])        
        header('location:staff.php');    
    else
        echo "Invalid id or password";
        
 } 



?>