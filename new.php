<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> new user</title>
     <title>Client</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Resources/css/newuser.css">
</head>
<body>

<div class="container-fluid bg">
    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
            
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
        <!--form start-->
        <form class="form-container" action="new.php" method="post">
          <div class="form-group">
            <h2 align="center" class="heading">NEW USER</h2>
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name">
          </div>
          <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" name="password" id="Password" placeholder="Enter Your Password">
          </div>
          <div class="form-group">
            <label for="email">Password</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your E-mail">
          </div>
          <div class="form-group">
            <label for="Phone">Phone</label>
            <input type="text" class="form-control" name="phone" id="Phone" placeholder="Enter Your Phone">
          </div>
          <br>
          <div class="form-group">
          <input type="submit"  name="submit" class="btn btn-success btn-block" value="Submit">
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
   $name=$_POST['name'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   $password=$_POST['password'];
   $_SESSION["loginName"]=$_POST['name'];
   
    $query="insert into user(u_name,u_email,u_phone,password) values ('$name','$email','$phone','$password')";
    if(mysql_query($query)){
    echo "<p style='color:white'>Data Entered Successfully</p>";
    echo "<br><br>";
    $res= mysql_query("select * from user where u_email='$email' ");
    $row= mysql_fetch_array($res);
    mysql_query("insert into client (fc_uid) values ('$row[u_id]')");
        
    $res= mysql_query("select * from user where u_id='$row[u_id]' ");
    $row= mysql_fetch_array($res);
    echo "<p style='color:white'>User Id--$row[u_id]</p>";
    echo "<br>"; 
    $res1= mysql_query("select * from client where fc_uid='$row[u_id]' ");
    $row1= mysql_fetch_array($res1);
    echo "<p style='color:white'>Client Id--$row1[c_id]</p>";
    
    } 
   

   
}

//one client can place on;y one rder
//one staff can handle multiple orders
    
    
    //staff enter manually
    //client entry via form

?>