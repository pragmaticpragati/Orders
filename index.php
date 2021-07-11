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
  <h2>Items Entry Form</h2>
  <form action="index.php" method= "post">
    <div class="form-group">
      <label for="item_price">Item Price</label>
      <input type="int" class="form-control" id="item_price" placeholder="Text of 0-20 characters" name="item_price">
    </div>
    <div class="form-group">
      <label for="item_des">Item Description </label>
      <input type="text" class="form-control" id="item_des" placeholder="Text of 0-20 characters" name="item_des">
    </div>

    <div class="form-group">
      <label for="sell_count">Sell Count</label>
      <input type="int" class="form-control" id="sell_count" placeholder="Integer between 0-30 digits" name="sell_count">
    </div>

    <div class="form-group">
      <label for="quantity">Quantity</label>
      <input type="int" class="form-control" id="quantity" placeholder="Integer between 0-30 digits" name="quantity">
    </div>

    <div class="form-group">
      <label for="item_code">Item Code</label>
      <input type="text" class="form-control" id="item_code" placeholder="Integer between 0-30 digits" name="item_code">
    </div>


    <button type="submit" name = "submit">Submit</button>
  </form>
</div>

<head>
  <title>Items Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
  <h2>Items Table</h2>
  <p>Data of all the items.</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Item Price</th>
        <th>Item Description</th>
        <th>Sell Count</th>
        <th>Quantity</th>
        <th>Item Code</th>
      </tr>
    </thead>

    <?php

//JUNE 27TH DATA DISPLAY 

        $sql = "SELECT item_price, item_des, sell_count, quantity, item_code from ITEM";
        $result = $conn -> query ($sql);
        if ($result -> num_rows > 0)
        {
            while ($row = $result -> fetch_assoc())
            {
                echo "<tr><td>".$row["item_price"]. "</td><td>". $row["item_des"]. "</td><td>". $row["sell_count"]."</td><td>".$row["quantity"]."</td><td>".$row["item_code"]."</td></tr>";
            }
            echo "</table>";
        }
        else 
        {
            echo "0 result"; 
        }
    
        $conn->close();
    ?>

<?php    

$sql = "SELECT item_price, item_des, sell_count, quantity, item_code from ITEM";
$result = $conn->query($sql);

 
 //June 27th  FORMS

 if(isset($_POST['submit']))
 {
     if(!empty($_POST['item_price']) && !empty($_POST['item_des']) && !empty($_POST['sell_count'] )&& !empty($_POST['quantity'] )&& !empty($_POST['item_code'] )){
         $item_price = $_POST['item_price'];
         $item_des = $_POST['item_des'];
         $sell_count = $_POST['sell_count']; 
         $quantity = $_POST['quantity'];
         $item_code = $_POST['item_code']; 
 
         $query = "insert into ITEM (item_price, item_des, sell_count, quantity, item_code) values ('$item_price','$item_des','$sell_count','$quantity','$item_code')";
 
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
