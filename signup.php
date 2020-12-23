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
			

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
</head>
<body>
<div class="container">
<h1>Sign Up as a new user:</h1>

<form method="POST" action="signup.php">
<label for="username">Username</label>
<input type="text" name="username" id="username"><br/>
<label for="password">Enter Password</label>
<input type="password" name="pass" id="pass"><br/>
<label for="c_password">Confirm Password</label>
<input type="password" name="c_pass" id="c_pass"><br/>
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