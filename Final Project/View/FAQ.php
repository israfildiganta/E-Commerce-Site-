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
    <title>Customer</title>
		<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/*style the button*/
input[type=submit] {
    background-color: skyblue;
    border: none;
    color: white;
    padding: 12px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    
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
    align-content: center;
  

}

.left,
.middle,
.right {
  padding: 5px;
  height: 400px; /* Should be removed. Only for demonstration */
  overflow: scroll;
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

/*style the gallery*/

div.gallery {
  margin: 60px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
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
  text-align: left;
  padding: 8px;
}



th {
  background-color: #4CAF50;
  color: white;
}

</style>
</head>
<body>
    <div class="grid-container">
        <div class="header">

        <h1 style="color: #2E4053"; align="left">Customer Dashboard </h1>

        </div>

        <div  class="left" style="background-color:#D3D3D3;">

            <ul>
            <li><a href="Profile.php"> Homepage</a></li>    
            <li><a href="ViewProfile.php"> View Profile</a></li>
            <li><a href="EditProfile.php"> Edit Profile</a></li>
            <li><a href="ChangePassword.php"> Change Password</a></li>
            <li><a href="Logout.php"> Log out</a></li>

            </ul>
 
        </div>

        <div class="middle" style="background-color:#f9f9f9;">
        <fieldset>
            <legend align="center"><b>Message to Admin</b></legend>
            
            
            <form method="POST" action='../Controller/InputQuestion.php?customer_id=<?php echo $_SESSION['customer_id'];?>'>
            <table align="left">

            <tr>
            <td><textarea name="comments" id="comments" rows="10" cols="50"></textarea></td>
            </tr>

            <tr>
             <td><input type="submit" value="Submit"></td>
            </tr>
            </table>
            </form >
            </legend>
        </fieldset>
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