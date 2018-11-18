<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transport</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Resources/css/transport.css">
</head>
<body>

<div class="container-fluid bg ">
    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
            
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
        <!--form start-->
        <form class="form-container" method="post" action="transport.php">
        
          <div class="form-group">
            <label for="staffid">Staff ID</label>
            <input type="text" class="form-control" name="fa_sid" id="staffid" placeholder="Enter Your Staff Id">
          </div>
           <div class="form-group">
            <label for="orderid">Order ID</label>
            <input type="text" class="form-control" name="fa_oid" id="orderid" placeholder="Enter Order Id">
          </div>
         <div class="form-group">
            <label for="ttime">Transport Time</label>
            <input type="text" class="form-control" name="ttime" id="ttime" placeholder="Enter time required for transportation">
          </div>
           <div class="form-group">
            <label for="oloc">Order Location</label>
            <input type="text" class="form-control" name="o_loc" id="oloc" placeholder="Enter Pick-Up Location">
          </div>
           <div class="form-group">
            <label for="dloc">Delivary Location</label>
            <input type="text" class="form-control" name="d_loc" id="dloc" placeholder="Enter Delivary Location">
          </div>
           <div class="form-group">
            <label for="vtype">Vehicle Type</label>
            <input type="text" class="form-control" name="v_type" id="vtype" placeholder="Enter type of vehicle">
          </div>
          <div class="form-group">
            <label for="v_no">Vehicle Number</label>
            <input type="text" class="form-control" name="v_no" id="vno" placeholder="Enter Vehicle no">
          </div>
           <div class="form-group">
          <input type="submit"  name="submit" class="btn-logout btn" value="SUBMIT">
           
            <a href="index.php" class="btn">LOGOUT</a>
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

mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("pam") or die (mysql_error());
if(isset($_POST['submit']))
    
{  
   $fa_sid=$_POST['fa_sid'];
   $fa_oid=$_POST['fa_oid'];
   $ttime=$_POST['ttime'];
   $o_loc=$_POST['o_loc'];
   $d_loc=$_POST['d_loc'];
   $v_type=$_POST['v_type'];
   $v_no=$_POST['v_no'];
  
    $query="insert into transport(t_time,prev_loc,del_loc,v_type,v_no) values ('$ttime','$o_loc','$d_loc','$v_type','$v_no')";
    
    if(mysql_query($query)){
    $res=mysql_query("select * from transport where v_no = '$v_no' ");
    $row=mysql_fetch_array($res);
    $query1=("insert into assigns(fa_sid,fa_oid,fa_tid) values ('$fa_sid','$fa_oid','$row[t_id]')");
     if(mysql_query($query1)){
      echo "<script>alert('Transport Successfully Placed')</script>";
      exit();
    } 
    } 
}

?>