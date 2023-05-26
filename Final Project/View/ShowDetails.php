
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
require_once '../Controller/productInfo.php';

$product = fetchProduct($_GET['product_id']);
?>
<!DOCTYPE html>
<html>
<head>
<style>

* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
.header {
  grid-area: header;
  background-color: #cbd5f0;
  padding: 30px;
  text-align: center;
  font-size: 35px;
}

/* The grid container */
.grid-container {
  display: grid;
  grid-template-areas:
    'header header header header header header'
    'left middle middle middle middle middle'
    'footer footer footer footer footer footer';
  /* grid-column-gap: 10px; - if you want gap between the columns */
}

.left,
.middle,
.right {
  padding: 10px;
  height: 400px; /* Should be removed. Only for demonstration */
}

/* Style the left column */
.left {
  grid-area: left;
}

/* Style the middle column */
.middle {
  grid-area: middle;
}

/* Style the right column */
.right {
  grid-area: right;
}

/* Style the footer */
.footer {
  grid-area: footer;
  background-color: #cbd5f0;
  padding: 10px;
  text-align: center;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {text-align: left;}
tr:hover {background-color:#f5f5f5;}
</style>
</head>
<body>

<div class="grid-container">

        <div class="header">
            <h1 style="color: #2E4053"; align="left">Customer Dashboard </h1>
        </div>

		

	<div class="left" style="background-color:#D3D3D3;">
  		<ul>

        <li><a href="ViewProfile.php"> View Profile</a></li>
        <li><a href="EditProfile.php"> Edit Profile</a></li>
        <li><a href="ChangePassword.php"> Change Password</a></li>
        <li><a href="Profile.php">Homepage</a></li>
        <li><a href="Logout.php"> Log out</a></li>
        


		</ul>
	</div>
		
<div class="middle" style="background-color:#f9f9f9;"><?php
    $present=$_SESSION['customer_name'];
    echo "<h3>Welcome $present</h3>";
    ?>

	<table border='1' cellpadding='8'>
	<tr>
		<th>Product Name</th>
		<th>Product Cost</th>
		<th>About</th>
		<th>Company Name</th>
		
	</tr>
	<tr>
		<td><?php echo $product['product_name'] ?></a></td>
		<td><?php echo $product['product_cost'] ?></td>
		<td><?php echo $product['about'] ?></td>
		<td><?php echo $product['company_name'] ?></td>
        
	</tr>
	</table>
</div>

<div class="footer">
	    <p>Copyright © Israfil Diganta</p>
    </div>
 </div>
</body>
</html>

<?php

}else{
    echo "Please login in first";
    header('location: Login.php');
}

?>