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

<div class="container">
  <h2>Customer Entry Form</h2>
  <form action="customer.php" method= "post">
    <div class="form-group">
      <label for="cname">Customer Name:</label>
      <input type="text" class="form-control" id="cname" placeholder="Text of 0-20 characters" name="cname">
    </div>
    <div class="form-group">
      <label for="caddress">Customer Address</label>
      <input type="text" class="form-control" id="caddress" placeholder="Text of 0-20 characters" name="caddress">
    </div>
    <div class="form-group">
      <label for="customer_no">Customer Number</label>
      <input type="int" class="form-control" id="customer_no" placeholder="Integer between 0-30 digits" name="customer_no">
    </div>


   
    <button type="submit" name = "submit">Submit</button>
  </form>
</div>

<!-- DISPLAY -->

<head>
  <title>Bootstrap Example</title>
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

    $dbhost = 'localhost';         
    $dbuser = 'root';         
    $dbpass = 'root';         
    $dbname = 'Orders';         
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);         
    if(! $conn ) 
    {            
    die('Could not connect: ' . mysqli_error());         
    }
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
$dbhost = 'localhost';         
$dbuser = 'root';         
$dbpass = 'root';         
$dbname = 'Orders';         
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);         
if(! $conn ) 
{            
die('Could not connect: ' . mysqli_error());         
}

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
