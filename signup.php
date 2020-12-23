<?php
session_start();
require_once "pdo.php";

$salt = 'XyZzy12*_';
if ( isset($_POST['username']) &&  isset($_POST['pass']) && $_POST['pass']==$_POST['c_pass']){
	
	$check = hash('md5', $salt.$_POST['pass']);

	$stmt = $pdo->prepare('INSERT into users(username,password) VALUES (:username,:password)');

	$stmt->execute(array(  ':username'=>$_POST['username'],':password' => $check));

	header("Location: index.php");
	return;
			
//margin: 0 0 22px 0;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
<style>
label{
	position:absolute;
	left:469px;
}
input[type=text], input[type=password] {
 
  width: 30%;
  padding: 10px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
input[type=submit]{
  background-color:#D3D3D3;
  color: black;
  padding: 12px 10px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
  opacity: 0.9;
}

</style>

</head>
<body>
<div class="container" align="center">
<h1>Sign Up as a new user:</h1>

<form method="POST" action="signup.php">

<label for="username"><b>Username:</b></label><br>
<input type="text"  name="username" id="username"></br>

<label for="pass"><b>Enter Password:</b></label><br>
<input type="password"  name="pass" id="pass"></br>

<label for="c_pass"><b>Confirm Password:</b></label><br>
<input type="password"  name="c_pass" id="c_pass"></br>
<p>Already a User ? ,Please <a href="login.php">Log in</a></p>
<input type="submit" onclick="return doValidate();" value="Sign Up">
<input type="submit" name="cancel" value="Cancel">
</form>

<script>
function doValidate() {
    console.log('Validating...');
    try {
        username = document.getElementById('username').value;
        pw = document.getElementById('pass').value;
		c_pw = document.getElementById('c_pass').value;
        console.log("Validating username="+username+" pw="+pw);
        if (username == null || username == "" || pw == null || pw == "") {
            alert("All fields must be filled out");
            return false;
        }
        if ( c_pw!=pw ) {
            alert("Passwords not matching");
            return false;
        }
        return true;
    } catch(e) {
        return false;
    }
    return false;
}
</script>
</div>
</body>