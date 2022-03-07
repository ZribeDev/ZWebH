<html lang="en">
<head>
<meta charset="utf-8">
<style>
div {
  background-color: lightgrey;
  width: 700px;
  border: 15px black;
  padding: 50px;
  margin: 20px;
}
</style>
<title>Login</title>
<center>
<div id='login'>
    <input type="text" placeholder="Server" id="servername">
    <input type="password" placeholder="password" id="password">
    <button type="button" onclick="SubmitForm();">login</button>
</div>
</center>

    
<script>
    function SubmitForm(){
            // Selecting the input element and get its value 
        var servername = document.getElementById("servername").value;
        var passlogin = document.getElementById("password").value;
            
        window.location.href = "/loginapi.php?server=" + servername + "&password=" + passlogin;
    }
</script>