

<html>
<head>
    <title>Customer Registration Page</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<div class="topnav">
  <a href="First.php">Home</a>
  <a href="Login.php">Login</a>
  <a href="Registration.php">Registration</a>
</div>

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

<?php include '../Controller/RegistrationValid.php'?>




<body style="background-color:#FFFFFF">
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
   function checkPass2()
   {
      var str=document.getElementById("confirm_password").value ;
      var str2=document.getElementById("current_password").value ;

      
     
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
   function checkDate()
   {
    var str=document.getElementById("customer_DOB").value ;
    if(str=="")
      {
        str7="a";
        document.getElementById("customer_DOB").innerHTML = "date must be fill up.";
			  document.getElementById("customer_DOB").style.borderColor = "red";

      }
      else 
      {
        str7="";
        document.getElementById("customer_DOB").innerHTML = "";
			  document.getElementById("customer_DOB").style.borderColor = "black";

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

      x = document.forms["myForm"]["current_password"].value;
			if(x==""){
				document.getElementById("current_password").style.borderColor="red";
				document.getElementById("current_passwordBlank").innerHTML="Password Can't Be Empty";
				k&=false;
			}
			else{
				document.getElementById("current_password").style.borderColor="black";
				document.getElementById("current_passwordBlank").innerHTML="";
				k&=true;
			}
			x = document.forms["myForm"]["confirm_password"].value;
			if(document.getElementById("current_password").value===x &&x.length>0){
				document.getElementById("current_password").style.borderColor="black";
				document.getElementById("mismatch").innerHTML="";
				k&=true;
			}
			else{
				k&=false;
				document.getElementById("confirm_password").style.borderColor="red";
				document.getElementById("mismatch").innerHTML="Passwords didn't match";
			}
			





      if(k==1)return true;
			return false;

   }



        
       
</script>  


<div class>
<h1 style="text-align: center">Registration</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  onsubmit="return validateForm()" name="myForm">
        <table align="center">
      <tr>
      <td>Customer Name</td>
      <td> <input type="text" name="customer_name" id="customer_name" onblur="checkName()" onkeyup="checkName()"> </td>
      <td> <span style="color:red">*<?php echo $name_empty ?> <?php echo $name_word_cnt ?> <?php echo $name_must_contain ?> <?php echo $name_start?></span></td>
      <td><h4 id="nameBlank"></h4></td>
      <td><h4 id="nameWordCnt"></h4></td>
      <td><h4 id="nameStart"></h4></td>
     </tr>

      <tr>
       <td>Email</td>
      <td><input type="email" name="customer_email" id="customer_email" onblur="checkEmail()" onkeyup="checkEmail()"></td>
      <td><span style="color:red">*<?php echo $email_validation ?> <?php echo $email_empty?> </span></td>
      <td><h4 id="emailValid"></h4></td>
      
    </tr>
      <tr>
       <td>Phone</td>
      <td> <input type="text" name="customer_phone" id="customer_phone" onblur="checkPhone()" onkeyup="checkPhone()"></td>
       <td><span style="color:red">* <?php echo $phone_empty?> </span></td>
       <td><h4 id="phoneBlank"></h4></td>
     </tr>

      <tr>
       <td>User Name</td>
       <td><input type="text" name="customer_user_name" id="customer_user_name"onblur="checkUserName()" onkeyup="checkUserName()"></td>
       <td><span style="color:red">* <?php echo $user_name_empty ?> </span></td>
       <td><h4 id="user_nameBlank"></h4></td>
     </tr>

       <tr>
      <td>Password</td>
     <td><input type="password" name="current_password" id="current_password" onblur="checkPass()" onkeyup="checkPass()"></td>
     <td><span style="color:red">* <?php echo $current_password_empty ?>  <?php echo $password_must_contain ?>  <?php echo $password_len_error ?> </span></td>
     <td><h4 id="current_passwordBlank"></h4></td>
     </tr>

     <tr>
       <td>Confirm Password</td>
       <td><input type="password" name="confirm_password" id="confirm_password"onblur="checkPass2()" onkeyup="checkPass2()"></td>
       <td><span style="color:red">* <?php echo $password_match ?> </span></td>
       <td><h4 id="mismatch"></h4></td>
     </tr>



       <tr>
       <td>Gender</td>
       <td>
       <input name="customer_gender" id="male" type="radio" value="male" checked="checked">Male

        <input name="customer_gender" id="female" type="radio" value="female">Female


        <input name="customer_gender" id="other" type="radio" value="other">Other

        <td><span style="color:red">* <?php echo $gender_empty ?> </span></td>
      </td>
      </tr>


      <tr>
       <td>Blood Group</td>
       <td>
       <select id="customer_bg" name ="customer_bg">
            <option value=""></option>
            <option value="B+">B+</option>
            <option value="AB+" selected="selected">AB+</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB-">AB-</option>
            <option value="B-">B-</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
        </select>
      </td>
      <td><span style="color:red">* <?php echo $blood_empty ?> </span></td>
   </tr>

   <tr>
       <td>Date of Birth</td>
       <td><input type="date" name="customer_DOB" id="customer_DOB" </td>
       <td><h4 id="DateBlank"></h4></td>
       <td><span style="color:red">* <?php echo $DOB_empty ?><?php echo $dateErr ?> </span></td>
   </tr>
   <tr>
     <td>

     </td>
     
   <td>
    <input type="submit" name="Submit" id="Submit">
   <input type="reset" value="Reset"></td>
  </td>
 </tr>
</table>
</form>
</div>

<div class="footer">
  <p>Copyright © Israfil Diganta</p>
</div>
 <?php echo $person_exist ?>
 <?php echo $file_exits ?>
 <?php echo $message ?>
 <?php echo $iot ?>




</body>


</html>
