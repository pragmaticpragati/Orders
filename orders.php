<?php
include 'file.php';
?>

<html>   
<head>   

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php

$dbhost = 'localhost';         
$dbuser = 'root';         
$dbpass = 'root';         
$dbname = 'Orders';         
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);         
if(! $conn ) 
{            
die('Could not connect: ' . mysqli_error());         
}?>

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
  <form action="purchase.php" method= "post">
    <div class="form-group">
      <label for="net_price">Net Price</label>
      <input type="int" class="form-control" id="net_price" placeholder="Text of 0-20 characters" name="net_price">
    </div>
    <div class="form-group">
      <label for="c_no">Item Description </label>
      <input type="text" class="form-control" id="c_no" placeholder="Text of 0-20 characters" name="c_no">
    </div>

    <div class="form-group">
      <label for="payment_state">Payment State</label>
      <input type="int" class="form-control" id="payment_state" placeholder="Integer between 0-30 digits" name="payment_state">
    </div>

    <div class="form-group">
      <label for="o_date">Order Date</label>
      <input type="int" class="form-control" id="o_date" placeholder="Integer between 0-30 digits" name="o_date">
    </div>

    <div class="form-group">
      <label for="o_time">Order Time</label>
      <input type="int" class="form-control" id="o_time" placeholder="Integer between 0-30 digits" name="o_time">
    </div>


    <button type="submit" name = "submit">Submit</button>
  </form>
</div>

<head>
  <title>Purchase Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
  <h2>Purchases Table</h2>
  <p>Data of all the purchases.</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Net Price</th>
        <th>Customer Number</th>
        <th>Payment State</th>
        <th>Order Date</th>
        <th>Order Time</th>
      </tr>
    </thead>

    <?php

//JUNE 27TH DATA DISPLAY 

        $sql = "SELECT net_price, c_no, payment_state, o_date, o_time from PURCHASE";
        $result = $conn -> query ($sql);
        if ($result -> num_rows > 0)
        {
            while ($row = $result -> fetch_assoc())
            {
                echo "<tr><td>".$row["net_price"]. "</td><td>". $row["c_no"]. "</td><td>". $row["payment_state"]."</td><td>".$row["o_date"]."</td><td>".$row["o_time"]."</td></tr>";
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

$sql = "SELECT net_price, c_no, payment_state, o_date, o_time from PURCHASE";
$result = $conn->query($sql);

 
 //June 27th  FORMS

 if(isset($_POST['submit']))
 {
     if(!empty($_POST['net_price']) && !empty($_POST['c_no']) && !empty($_POST['payment_state'] )&& !empty($_POST['o_date'] )&& !empty($_POST['o_time'] )){
         $net_price = $_POST['net_price'];
         $c_no = $_POST['c_no'];
         $payment_state = $_POST['payment_state']; 
         $o_date = $_POST['o_date'];
         $o_time = $_POST['o_time']; 
 
         $query = "insert into ITEM (net_price, c_no, payment_state, o_date, o_time) values ('$net_price','$c_no','$payment_state','$o_date','$o_time')";
 
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
