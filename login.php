<?php
session_start();
require_once "pdo.php";

$salt = 'XyZzy12*_';
if ( isset($_POST['username']) &&  isset($_POST['pass'])){

	$check = hash('md5', $salt.$_POST['pass']);

	$stmt = $pdo->prepare('SELECT userid FROM users WHERE username = :un');//To check Existence of username
	$stmt2 = $pdo->prepare('SELECT userid, username FROM users WHERE username = :un AND password = :pw');//To check for correct password

	$stmt->execute(array( ':un' => $_POST['username']));
	$stmt2->execute(array( ':un' => $_POST['username'], ':pw' => $check));

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$row2= $stmt2->fetch(PDO::FETCH_ASSOC);

		if($row==false)
		{
			$_SESSION['error_login']="Such username does not exist";
			header("Location: login.php");
			return;
		}
<<<<<<< HEAD
		else if ( $row2 != false ) {
      $_SESSION['username'] = $row2['username'];
=======
		else if ( $row2 !== false ) {
            $_SESSION['username'] = $row2['username'];
>>>>>>> 5bc2e7fe4a518a0d92d0fb8534c8eeabb7198181
			$_SESSION['userid'] = $row['userid'];

			header("Location: index.php");
			return;


		}
		else{
			$_SESSION['error_login']="Incorrect Password ";
			header("Location: login.php");
			return;
		}

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
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
<h1>Please Log In</h1>
<?php
if (isset ($_SESSION['error_login'])){
echo('<p style="color:red">'.htmlentities($_SESSION['error_login'])."<p>\n");
unset ($_SESSION['error_login']);
}
?>
<form method="POST" action="login.php">

<label for="username">Username</label><br>
<input type="text" name="username" id="username"></br>

<label for="pass">Password</label><br>
<input type="password" name="pass" id="pass"></br>
<p>Not a User ? ,Please <a href="signup.php">Sign up</a></p>
<input type="submit" onclick="return doValidate();" value="Log In">
<input type="submit" name="cancel" value="Cancel">
</form>

<script>
function doValidate() {
    console.log('Validating...');
    try {
        username = document.getElementById('username').value;
        pw = document.getElementById('pass').value;
        console.log("Validating username="+username+" pw="+pw);
        if (username == null || username == "" || pw == null || pw == "") {
            alert("Both fields must be filled out");
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
