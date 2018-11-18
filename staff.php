<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Resources/css/staff_options.css">
</head>
<body>
<div class="container-fluid bg">
    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
            
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
        <!--form start-->
        <form class="form-container">
         <div class="form-group">
            <h2 align="center" class="heading">Welcome, <?php echo  $_SESSION["loginName"] ?></h2>
          </div>
       
         <div class="form-group">
            <a href="transport.php"  class="btn  btn-block" >Transport Order</a>
        </div>
         <div class="form-group">
            <a href="update.php"  class="btn  btn-block" >Update Order Status</a>
        </div>
          <div class="form-group">
            <a href="#" class="btn-logout">LOGOUT</a>
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

