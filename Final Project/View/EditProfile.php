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
   $reg="/^[a-zA-Z\s\.-]+$/";
   $name_empty=$name_word_cnt=$name_must_contain=$name_start="";
   $email_validation=$email_empty="";
   $phone_empty="";
   $user_name_empty="";
   $DOB_empty="";
   $current_password_empty=$password_len_error=$password_must_contain="";
   $password_match="";
   $gender_empty="";
   $blood_empty="";
   $file_exits="";
   $person_exist="";
   $message="";
   $dateErr="";
   $DateBegin = date('Y-m-d', strtotime("01/01/1900"));
   $DateEnd = date('Y-m-d', strtotime("01/01/2010"));
   $iot="";
   $already="";


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
input[type=submit]{
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
        <li><a href="Profile.php"> Homepage</a></li>
        <li><a href="ChangePassword.php"> Change Password</a></li>
        <li><a href="Logout.php"> Log out</a></li>


</ul>
</div>
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
			  	document.getElementById("customer_name").style.borderColor = "red";

      }
      else 
      {
         str3="";
          document.getElementById("nameStart").innerHTML = "";
			  	document.getElementById("customer_name").style.borderColor = "black";
      }
      
   }

   function checkEmail()
   {
      var str=document.getElementById("customer_email").value ;

      
     

      let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
			if(document.getElementById("customer_email").value.match(validRegex)){
				document.getElementById("customer_email").style.borderColor="black";
				document.getElementById("emailValid").innerHTML="";
			}
			else{
				document.getElementById("customer_email").style.borderColor="red";
				document.getElementById("emailValid").innerHTML="Invalid Email Format";
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

   function checkUserName()
   {
      var str=document.getElementById("customer_user_name").value ;

      
      if(str=="")
      {
        str6="a";
        document.getElementById("user_nameBlank").innerHTML = "User name  must be fill up.";
			  document.getElementById("customer_user_name").style.borderColor = "red";

      }
      else 
      {
        str6="";
        document.getElementById("user_nameBlank").innerHTML = "";
			  document.getElementById("customer_user_name").style.borderColor = "black";

      }

   }

   function checkpPass()
   {
      var str=document.getElementById("current_password").value ;

      
      if(str=="")
      {
        str7="a";
        document.getElementById("current_passwordBlank").innerHTML = "Password  must be fill up.";
			  document.getElementById("current_password").style.borderColor = "red";

      }
      else 
      {
        str7="";
        document.getElementById("current_passwordBlank").innerHTML = "";
			  document.getElementById("current_password").style.borderColor = "black";

      }

   }
   function checkpPass2()
   {
      var str=document.getElementById("confirm_password").value ;
      var str2=document.getElementById("current_password").value ;

      
      if(str=="")
      {
        str8="a";
        document.getElementById("confirm_passwordBlank").innerHTML = "Confirm Password  must be fill up.";
			  document.getElementById("confirm_password").style.borderColor = "red";

      }
      else 
      {
        str8="";
        document.getElementById("confirm_passwordBlank").innerHTML = "";
			  document.getElementById("confirm_password").style.borderColor = "black";

      }
      if(str!=str2)
      {
        document.getElementById("mismatch").innerHTML = "Password don't match.";
			  document.getElementById("confirm_password").style.borderColor = "red";
      }
      else 
      {
        document.getElementById("mismatch").innerHTML = "";
        document.getElementById("confirm_password").style.borderColor = "black";

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
      
      x = document.forms["myForm"]["customer_user_name"].value;
			if(x==""){
				document.getElementById("customer_user_name").style.borderColor="red";
				document.getElementById("user_nameBlank").innerHTML="Username Can't Be Empty";
				k&=false;
			}
			
			else{
				document.getElementById("customer_user_name").style.borderColor="black";
				document.getElementById("user_nameBlank").innerHTML="";
				k&=true;
			}

      x = document.forms["myForm"]["customer_email"].value;
			let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
			if(x.match(validRegex)){
				document.getElementById("customer_email").style.borderColor="black";
				document.getElementById("emailValid").innerHTML="";
				k&=true;
			}
			else{
				document.getElementById("customer_email").style.borderColor="red";
				document.getElementById("emailValid").innerHTML="Invalid Email Format";
				k&=false;
			}

      x = document.forms["myForm"]["customer_phone"].value;
      if(x=="")
      {

				document.getElementById("customer_phone").style.borderColor="red";
				document.getElementById("phoneBlank").innerHTML="Must input the number.";
				k&=false;
			}			
			else
       {
				document.getElementById("customer_phone").style.borderColor="black";
				document.getElementById("phoneBlank").innerHTML="";
				k&=true;
			}

  





      if(k==1)return true;
			return false;

   }



        
       
</script>  


<div class="middle" style="background-color:#f9f9f9;">

<fieldset align="center">

		<legend><b>Edit Profile</b></legend>

<form method="POST" action='../Controller/UpdateProfile.php?customer_id=<?php echo $present['customer_id'];?>'   onsubmit="return validateForm()" enctype="multipart/form-data" name="myForm">

<table align="left">
  

<tr>
<td>Customer Name:</td>
<td><input value="<?php echo $present['customer_name'] ?>" type="text" id="customer_name" name="customer_name"onblur="checkName()" onkeyup="checkName()"></td>
<td><h4 id="nameBlank"></h4></td>
<td><h4 id="nameWordCnt"></h4></td>
<td><h4 id="nameStart"></h4></td>
</tr>

<tr>
  <td>Customer Email:</td>
  <td><input value="<?php echo $present['customer_email'] ?>" type="email" id="customer_email" name="customer_email"onblur="checkEmail()" onkeyup="checkEmail()"></td>
   <td><h4 id= "emailValid" ></h4></td>
</tr>

<tr>
  <td>Customer Phone:</td>
  <td><input value="<?php echo $present['customer_phone'] ?>" type="text" id="customer_phone" name="customer_phone"onblur="checkPhone()" onkeyup="checkPhone()"></td>
  <td><h4 id="phoneBlank"></h4></td>
</tr>

<tr>
<td>Customer User Name:</td>
<td><input value="<?php echo $present['customer_user_name'] ?>" type="text" id="customer_user_name" name="customer_user_name"onblur="checkUserName()" onkeyup="checkUserName()"></td>
<td><h4 id="user_nameBlank"></h4></td>
</tr>

  <tr>
       <td>Gender</td>
        <td>
       <input name="customer_gender" id="male" type="radio" value="male"<?php if($present['customer_gender']=='male'){echo('checked="checked"');}?>>
        <label for="male">Male</label>

        <input name="customer_gender" id="female" type="radio" value="female"<?php if($present['customer_gender']=='female'){echo('checked="checked"');}?>>
        <label for="female">Female</label>

        <input name="customer_gender" id="other" type="radio" value="other"<?php if($present['customer_gender']=='other'){echo('checked="checked"');}?>>
        <label for="other">Other</label>

      </td>
</tr>

  <tr>
       <td>Blood Group</td>
       <td>
       <select id="customer_bg" name ="customer_bg">

            <option value=""<?php if($present['customer_bg']== ''){echo('selected="selected"');}?>></option>
            <option value="AB+"<?php if($present['customer_bg']== 'AB+'){echo('selected="selected"');}?>>AB+</option>
            <option value="B+"<?php if($present['customer_bg']== 'B+'){echo('selected="selected"');}?>>B+</option>
            <option value="O+"<?php if($present['customer_bg']== 'O+'){echo('selected="selected"');}?>>O+</option>
            <option value="O-"<?php if($present['customer_bg']== 'O-'){echo('selected="selected"');}?>>O-</option>
            <option value="AB-"<?php if($present['customer_bg']== 'AB-'){echo('selected="selected"');}?>>AB-</option>
            <option value="B-"<?php if($present['customer_bg']== 'B-'){echo('selected="selected"');}?>>B-</option>
            <option value="A+"<?php if($present['customer_bg']== 'A+'){echo('selected="selected"');}?>>A+</option>
            <option value="A-"<?php if($present['customer_bg']== 'A-'){echo('selected="selected"');}?>>A-</option>
        </select>
      </td>
  </tr>

  <tr>
       <td>Date of Birth</td>
       <td><input type="date" name="customer_DOB" id="customer_DOB" value="<?php echo $present['customer_DOB']?>"></td>

  </tr>


<tr>
<td></td>

<td><input type="submit" name = "updateCustomer" value="Update"></td>
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

</html>

 <?php

	}else{
		echo "Please login in first";
		header('location: Login.php');
	}

?>
