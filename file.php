<html>   
<head>   

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</form>
<?php    
$dbhost = 'localhost';         
$dbuser = 'root';         
$dbpass = 'root';         
$dbname = 'Orders';         
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);         
if(! $conn ) {            
die('Could not connect: ' . mysqli_error());         
}

$sql = "SELECT customer_no, caddress, cname FROM CUSTOMER";
$result = $conn->query($sql);

echo "CUSTOMER"."<br>"."<br>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "    cname:" . $row["cname"]. "<br>"."<br>";
    }
  } else {
    echo "0 results";
  }
  
 

// Q2

    print("<form method=\"post\" action=\"$_SERVER[PHP_SELF]\">");
    print("Enter customer number: <input type=\"text\" name=\"customer_no\">");
    print("<br/>");
    print("<input type=\"submit\" value=\"Submit number\">");
    print("</form>");
    
    if ($_POST['customer_no'])
    {
        $id = $_POST['customer_no'];
    
    $stmt = $conn->prepare("SELECT * FROM CUSTOMER WHERE customer_no = ?"); 
    

    $ok = $stmt->bind_param( "i", $id);  
    if (!$ok) 
    { 
        die("Bind param error"); 
    }
      $ok=$stmt->execute();  
    if (!$ok) 
    { 
        die("Exec error"); 
    }  
    $result = $stmt->get_result();


  }

while($row = $result->fetch_assoc()) {
    if ($row["customer_no"] == $id) {
         echo "cname: " . $row["cname"]. "<br>\n";
         echo "caddress: " . $row["caddress"]. "<br>\n";
         echo "customer_no " . $row["customer_no"]. "<br>\n";
         
    }
  }
  $conn->close();
?>
</body>
</html>

