

<?php
	session_start();

	if(isset($_COOKIE['customer_user_name']))
	{
        $_SESSION['customer_name']=$_COOKIE['customer_name'];
        $_SESSION['customer_email'] = $_COOKIE["customer_email"];
        $_SESSION['customer_phone'] = $_COOKIE["customer_phone"];
        $_SESSION['customer_user_name'] =$_COOKIE["customer_user_name"];
        $_SESSION['current_password'] = $_COOKIE["current_password"];
        $_SESSION['customer_gender'] = $_COOKIE["customer_gender"];
        $_SESSION['customer_bg'] = $_COOKIE["customer_bg"];
        $_SESSION['customer_DOB'] = $_COOKIE["customer_DOB"];
        $_SESSION['customer_id'] = $_COOKIE["customer_id"];
       // echo var_dump($_SESSION['current_password']) ;
      


?>
<?php
 require_once '../Controller/trasnactionInfo.php';
 $result = fetchAlltransactions($_SESSION['customer_id']);
 
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
echo "<table border='1' cellpadding='8'>
<tr>
 		<th>Customer Name</th>
        <th>Customer Phone</th>
        <th>Customer Address</th>
        <th>Quantity</th>
        <th>Product Cost</th>
        <th>Total Cost</th>
        <th>Time</th>
        <th>Product Name</th>
        
       
</tr>";


?>

<?php
while($row = mysqli_fetch_array($result)) {
echo "<tr>";
    
	echo "<td>".$row['customer_name']."</td>";
    echo "<td>".$row['customer_phone']."</td>";
    echo "<td>".$row['customer_address']."</td>";
    echo "<td>".$row['quantity']."</td>";
    echo "<td>".$row['product_cost']."</td>";
    echo "<td>".$row['total_cost']."</td>";
    echo "<td>".$row['time']."</td>";
    echo "<td>".$row['product_name']."</td>";
    
    echo "</tr>";

}
echo "</table>";


?>
</body>
</html>



<?php

	}else{
		echo "Please login in first";
		header('location: Login.php');
	}

?>
