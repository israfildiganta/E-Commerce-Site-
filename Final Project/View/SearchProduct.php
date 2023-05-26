
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

<!Doctype html>
<html>
<head>

  <script>  
  function showResult( str )
  {
    if(str==""){
      document.getElementById("result").innerHTML="";
      return;
    }
    else{
     
      var xhttp = new XMLHttpRequest();
      xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("result").innerHTML = this.responseText;
            }
        };
      
    }
   
    
    xhttp.open("GET", "getAns.php?product_name="+str, true);
    xhttp.send();
    
    
  }
</script> 
<form action="">
        <input type="text"  onkeyup="showResult(this.value)">
  </form>
  <div id="result">All Users Info Will be Shown Here</div>






</body>
</html>






<?php

	}else{
		echo "Please login in first";
		header('location: Login.php');
	}

?>