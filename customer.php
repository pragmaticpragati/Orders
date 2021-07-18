
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
  <h2>Customer Entry Form</h2>
  <form action="customer.php" method= "post">
    <div class="form-group">
      <label for="cname">Customer Name:</label>
      <input type="text" class="form-control" id="cname" placeholder="Enter customer name" name="cname">
    </div>
    <div class="form-group">
      <label for="caddress">Customer Address</label>
      <input type="text" class="form-control" id="caddress" placeholder="Enter customer address" name="caddress">
    </div>
    <div class="form-group">
      <label for="customer_no">Customer Number</label>
      <input type="int" class="form-control" id="customer_no" placeholder="Enter customer number" name="customer_no">
    </div>


   
    <button type="submit" name = "submit">Submit</button>
  </form>
</div>

<!-- DISPLAY -->

<head>
  <title>Customer Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Customer Table</h2>
  <p>Data of all the customers.</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Customer Name</th>
        <th>Customer Address</th>
        <th>Customer Number</th>
      </tr>
    </thead>
    <?php

    
        //JUNE 27TH DATA DISPLAY 

        $sql = "SELECT cname, caddress, customer_no from CUSTOMER";
        $result = $conn -> query ($sql);
        if ($result -> num_rows > 0)
        {
            while ($row = $result -> fetch_assoc())
            {
                echo "<tr><td>".$row["cname"]. "</td><td>". $row["caddress"]. "</td><td>". $row["customer_no"]."</td></tr>";
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

</body>



<?php    
include 'file.php';

$sql = "SELECT customer_no, caddress, cname FROM CUSTOMER";
$result = $conn->query($sql);

 
 //June 27th  FORMS

 if(isset($_POST['submit']))
 {
     if(!empty($_POST['cname']) && !empty($_POST['caddress']) && !empty($_POST['customer_no'] )){
         $cname = $_POST['cname'];
         $caddress = $_POST['caddress'];
         $customer_no = $_POST['customer_no']; 
 
         $query = "insert into CUSTOMER (cname, caddress, customer_no) values ('$cname','$caddress','$customer_no')";
 
         $run = mysqli_query($conn, $query) or die (mysqli_error());
 
         if($run)
         {
          echo "Data added successfully!";
          echo " To see the updated values, go to ORDERS and come back to this page. "; 
          echo " * do not refresh after entering values *  ";     
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

