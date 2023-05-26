
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
        
    
    <form action=""> 
       <select name="product" onchange="showProduct(this.value)">
       <option value="">Select a product </option>
        <option value="laptop">Laptop</option>
        <option value="monitor">Monitor</option>
        <option value="mouse">Mouse</option>
        <option value="keyboard">Keyboard</option>
        <option value="headphone">Headphone</option>
        <option value="charger">Charger</option>
        <option value="ram">RAM</option>
        <option value="rom">ROM</option>
        <option value="ssd">SSD</option>

  
      </select>
    </form>
    <div id="txtHint"> All Products Info will be shown here</div>
    <script>
        function showProduct(str){
        var xhttp;  
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../Model/ProductInfo.php?product_name="+str, true);
        xhttp.send();
        }
    </script>

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