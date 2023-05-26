
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


<?php include '../Controller/CustomerInfo.php'?>

<?php
    
    $present = fetchCustomer($_SESSION['customer_id']);
   // echo var_dump($_SESSION['customer_id']);

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
  background-color:  #cbd5f0;
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
  height: 300px; /* Should be removed. Only for demonstration */
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
  background-color:  #cbd5f0;
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
<div class="left" style="background-color: #D3D3D3;">
  <ul>

        <li><a href="Profile.php">Homepage</a></li>
        <li><a href="ViewProfile.php"> View Profile</a></li>
        <li><a href="EditProfile.php"> Edit Profile</a></li>
        <li><a href="Logout.php"> Log out</a></li>

</ul>  
  </div>
<div class="middle" style="background-color:#f9f9f9;">
<fieldset align="center">

	<legend><b> Change Password</b></legend>
  <script>  

    let x=0;  
		var st1,st2,st3,st4,st5,st6,st7,st8,st9,st10;
		function checkName() {
			if (document.getElementById("customer_name").value == "") {
			  	document.getElementById("nameBlank").innerHTML = "Name can't be blank.";
			  	document.getElementById("customer_name").style.borderColor = "red";
          st1="a";;
			}
      else{
          str1="";
			  	document.getElementById("nameBlank").innerHTML = "";
			  	document.getElementById("customer_name").style.borderColor = "black";

			}
      var str=document.getElementById("customer_name").value ;
      if(str.split(" ").length<2)
      {
          document.getElementById("nameWordCnt").innerHTML = "Name must be 2 words.";
			  	document.getElementById("customer_name").style.borderColor = "red";
          st2="a";

      }
      else 
      {
          str2="";
          document.getElementById("nameWordCnt").innerHTML = "";
			  	document.getElementById("customer_name").style.borderColor = "black";

      }
      if(!(str[0]>='a' && str[0]<='z') && !(str[0]>='A' && str[0]<='Z'))
      {
          str3="a";
          document.getElementById("nameStart").innerHTML = "Name Must start with a-z or A-Z.";
			  	document.getElementById("customer_namet").style.borderColor = "red";

      }
      else 
      {
         str3="";
          document.getElementById("nameStart").innerHTML = "";
			  	document.getElementById("customer_name").style.borderColor = "black";
      }
      
   }



   function checkPhone()
   {
      var str=document.getElementById("customer_phone").value ;
      if(str=="")
      {
        str5="a";
        document.getElementById("phoneBlank").innerHTML = "Phone must be fill up.";
			  document.getElementById("customer_phone").style.borderColor = "red";

      }
      else 
      {
        str5="";
        document.getElementById("phoneBlank").innerHTML = "";
			  document.getElementById("customer_phone").style.borderColor = "black";

      }

   }
   function checkAddress()
   {
      var str=document.getElementById("customer_address").value ;
      if(str=="")
      {
        str5="a";
        document.getElementById("addressBlank").innerHTML = "Address must be fill up.";
			  document.getElementById("customer_address").style.borderColor = "red";

      }
      else 
      {
        str5="";
        document.getElementById("addressBlank").innerHTML = "";
			  document.getElementById("customer_address").style.borderColor = "black";

      }

   }
   
   function checkQuantity()
   {
    
      var str1=document.getElementById("quantity").value ;
      
        
     
      if(str1=="1" || str1=="2" || str1=="3" || str1=="4" || str1=="5")
      {
        str5="";
        document.getElementById("quantityErr").innerHTML = "";
			  document.getElementById("quantity").style.borderColor = "black";
        
        

      }
      else 
      {
        document.getElementById("quantityErr").innerHTML = "Quantity must be between 1 to 5.";
			  document.getElementById("quantity").style.borderColor = "red";
       
        
      }

   }


   
   function validateForm()
   {
    let x = document.forms["myForm"]["customer_name"].value;
			let k=true;
  			if(x==""){
    			document.getElementById("customer_name").style.borderColor="red";
				document.getElementById("nameBlank").innerHTML="Name Can't Be Empty";
				k&=false;
  			}
			else if(x.split(' ').length<2){
				document.getElementById("customer_name").style.borderColor="red";
				document.getElementById("nameWordCnt").innerHTML="Name Must Be Of Atleast 2 words";
				k&=false;
			}
      else if(!(str[0]>='a' && str[0]<='z') && !(str[0]>='A' && str[0]<='Z'))
      {
          str3="a";
          document.getElementById("nameStart").innerHTML = "Name Must start with a-z or A-Z.";
			  	document.getElementById("customer_name").style.borderColor = "red";

      }
      else{
				document.getElementById("customer_name").style.borderColor="black";
        document.getElementById("nameBlank").innerHTML="";
        document.getElementById("nameWordCnt").innerHTML="";
        document.getElementById("nameStart").innerHTML = "";
				k&=true;
			}
      
     
      x = document.forms["myForm"]["customer_phone"].value;
      if(x=="")
      {

				document.getElementById("customer_phone").style.borderColor="red";
				document.getElementById("addressBlank").innerHTML="Must input the number.";
				k&=false;
			}			
			else
       {
				document.getElementById("customer_phone").style.borderColor="black";
				document.getElementById("addressBlank").innerHTML="";
				k&=true;
			}
      str1 = document.forms["myForm"]["quantity"].value;

      if(str1=="1" || str1=="2" || str1=="3" || str1=="4" || str1=="5")
      {
        k&=true;
        str5="";
        document.getElementById("quantityErr").innerHTML = "";
			  document.getElementById("quantity").style.borderColor = "black";

      }
      else 
      {
        k&=false;
        document.getElementById("quantityErr").innerHTML = "Quantity must be between 1 to 5.";
			  document.getElementById("quantity").style.borderColor = "red";
       
        
      }
      str= document.forms["myForm"]["customer_address"].value;
      if(str=="")
      {
        str5="a";
        document.getElementById("addressBlank").innerHTML = "Address must be fill up.";
			  document.getElementById("customer_address").style.borderColor = "red";

      }
      else 
      {
        str5="";
        document.getElementById("addressBlank").innerHTML = "";
			  document.getElementById("customer_address").style.borderColor = "black";

      }

  





      if(k==1)return true;
			return false;

   }



        
       
</script> 

<form method="POST" action='../Controller/UpdatePassword.php?customer_id=<?php echo $present['customer_id'];?>'  enctype="multipart/form-data">
<table align="left">
  <tr>
  <td> Current Password: </td>
  <td><input value="" type="password" id="current_password" name="current_password"></td>
  </tr>

  <tr>
  <td>New Password:</td>
  <td><input value="" type="password" id="new_password" name="new_password"></td>
  </tr>

  <tr>
  <td>Retype Password:</td>
  <td><input value="" type="password" id="repeat_password" name="repeat_password"></td>
  </tr>
  
  <tr>
  <td></td>

  <td><input type="submit" name = "updatePassword" value="Update"></td>
</tr>
</table>
</form> 
</fieldset>
</div>

<div class="footer">
    <p>Copyright © Israfil Diganta</p>
</div>

</div>
</body>

 <html>

 <?php

	}else{
		echo "Please login in first";
		header('location: Login.php');
	}

?>