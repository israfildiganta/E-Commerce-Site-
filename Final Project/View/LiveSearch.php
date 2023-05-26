
<html>
    <body>

<script>  

function showResult()
{
    var id=document.getElementById("id").value;
   
    if(id.length==0 )
    {
        document.getElementById("result").innerHTML="";
    }
    else
    {
        if(allnumber(id)==false)
        {
            document.getElementById("result").innerHTML="<b>Must be letter<b>";
            return;
        }
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                document.getElementById("result").innerHTML = this.responseText;
            }
            else
            {
                document.getElementById("result").innerHTML = this.status;
            }
        };
        xhttp.open("POST", "../control/admin_search_control.php", true);
        xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhttp.send("id="+id);
    }
}
</script> 

<form method="post">
                <table>
                    <tr>
                        <td>Search Product</td>
                        <td><input type="text" name="id" id="id" onkeyup="showResult()"></td>
                    </tr>
                 
                </table>
                <p id="msg">Searching..</p>
                <p id="result"></p>
    </from> 

</body>
</html>
    