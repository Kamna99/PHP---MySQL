
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New order</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Resources/css/order.css">
`</head>
<body>

<div class="container-fluid bg ">
    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
            
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
        <!--form start-->
        <form class="form-container" method="post" action="order.php">
        <div class="form-group">
            <label for="odate">Order Date</label>
            <input type="text" class="form-control" name="o_date" id="odate" placeholder="Enter Order Date">
          </div>
           <div class="form-group">
            <label for="ddate">Delivary Date</label>
            <input type="text" class="form-control" name="d_date" id="ddate" placeholder="Enter Delivary Date">
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
            <label for="qty">Order Quantity</label>
            <input type="text" class="form-control" name="qty" id="qty" placeholder="Enter Order Quantity">
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
session_start();
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("pam") or die (mysql_error());

if(isset($_POST['submit']))
    
{  
   $y=1000;
   $qty=$_POST['qty'];
   $o_date=$_POST['o_date'];
   $d_date=$_POST['d_date'];
   $o_loc=$_POST['o_loc'];
   $d_loc=$_POST['d_loc'];
   //$fo_cid=$_SESSION["clientID"];

   $query="insert into orderr(qty,o_date,d_date,o_loc,d_loc,fo_cid) values ('$qty','$o_date','$d_date','$o_loc','$d_loc','$fo_cid')";

   
   if(mysql_query($query)){
    echo "<script>alert('Order Placed Successfully')</script>";
    mysql_query("call insertuser();");
        
   // can place only one order per day    
   $res=mysql_query("select * from orderr where fo_cid='$fo_cid' && o_date='$o_date'  ");
   $row= mysql_fetch_array($res);
       
    
    echo "Client Id :                $row[fo_cid]<br>";  
    echo "Order Id:                  $row[o_id]<br>";
    echo "Order Qty :                $row[qty]<br>";
    echo "Order Date :               $row[o_date]<br>";
    echo "Delivary Date :            $row[d_date]<br>";
    echo "Order Location :           $row[o_loc]<br>";
    echo "Delivery Location :        $row[d_loc]<br>";
    echo "-----------------<br>" ;
    $z=$row['qty'];
    $x=$z*$y;
    echo "Order price";
    echo "  $x";
   
    
    

}else
       echo 'error';
}

?>