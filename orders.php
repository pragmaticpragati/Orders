<?php
include 'file.php';
?>
<html>   
<head>   

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</form>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Clothing Store</a>
    </div>
    <ul class="nav navbar-nav">
      
      
      <li><a href="index.php">Items</a></li>
      <li><a href="orders.php">Orders</a></li>
      <li><a href="customer.php">Customers</a></li>
      <li><a href="purchase.php">Purchases</a></li>
      <li><a href="https://github.com/pragmaticpragati/Orders/wiki">Help</a></li>
      <li><a href="https://github.com/pragmaticpragati/Orders/blob/main/DatabaseScript.sql">Install Script</a></li>
    </ul>
  </div>
</nav>
  

<div class="container">
  <h2>Orders Entry Form</h2>
  <form action="orders.php" method= "post">
    <div class="form-group">
      <label for="o_time">o_time:</label>
      <input type="int" class="form-control" id="o_time" placeholder="Text of 0-20 characters" name="o_time">
    </div>
    <div class="form-group">
      <label for="item_des">Item Description</label>
      <input type="text" class="form-control" id="item_des" placeholder="Text of 0-20 characters" name="item_des">
    </div>
    <div class="form-group">
      <label for="o_date">Date</label>
      <input type="date" class="form-control" id="o_date" placeholder="Integer between 0-30 digits" name="o_date">
    </div>
    <div class="form-group">
      <label for="c_no">Customer Number</label>
      <input type="int" class="form-control" id="c_no" placeholder="Integer between 0-30 digits" name="c_no">
    </div>
    <div class="form-group">
      <label for="order_no">Order Number</label>
      <input type="text" class="form-control" id="order_no" placeholder="Integer between 0-30 digits" name="order_no">
    </div>


   
    <button type="submit2" name = "submit2">Submit</button>
  </form>
</div>

<!-- DISPLAY -->

<head>
  <title>Orders Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Orders Table</h2>
  <p>Data of all the orders.</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Time</th>
        <th>Item Description</th>
        <th>Date</th>
        <th>Customer Number</th>
        <th>Order Number</th>
      </tr>
    </thead>
    <?php

    
        //JUNE 27TH DATA DISPLAY 

        $sql = "SELECT o_time, item_des, o_date, c_no, order_no from ORDER";
        $result = $conn -> query ($sql);
        if ($result -> num_rows > 0)
        { 
            while ($row = $result -> fetch_assoc())
            {
                echo "<tr><td>".$row["o_time"]. "</td><td>". $row["item_des"]. "</td><td>". $row["o_date"]."</td><td>". $row["c_no"]."</td><td>". $row["order_no"]."</td></tr>";
            }
            echo "</table>";
        }
        else 
        {
            echo "0 result"; 
        }
    
        $conn->close();
    ?>
  </table>
</div>





<?php    


$sql = "SELECT o_time, item_des, o_date, c_no, order_no FROM ORDER";
$result = $conn->query($sql);

 
 //June 27th  FORMS

 if(isset($_POST['submit2']))
 {
     if(!empty($_POST['o_time']) && !empty($_POST['item_des']) && !empty($_POST['o_date']) && !empty($_POST['c_no'] )&& !empty($_POST['order_no'] )){
         $o_time = $_POST['o_time'];
         $item_des = $_POST['item_des'];
         $o_date = $_POST['o_date']; 
         $c_no = $_POST['c_no']; 
         $order_no = $_POST['order_no']; 
 
         $query = "insert into ORDER (o_time, item_des, o_date, c_no, order_no) values ('$o_time','$item_des','$o_date','$c_no','$order_no')";
 
         $run = mysqli_query($conn, $query) or die (mysqli_error());
 
         if($run)
         {
             echo "Data added successfully";
         }
         else 
         {
             echo "Data could not be added";
         }
 
     }
    
     else
     {
         echo "Please input data for all fields";
 
     }
 }

//JUNE 27TH DATA DISPLAY 



  $conn->close();


?>
 </head>
</body>
</html>

