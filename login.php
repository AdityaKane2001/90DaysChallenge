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
		else if ( $row2 != false ) {
      $_SESSION['username'] = $row2['username'];
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
</head>
<body>
<div class="container">
<h1>Please Log In</h1>
<?php
if (isset ($_SESSION['error_login'])){
echo('<p style="color:red">'.htmlentities($_SESSION['error_login'])."<p>\n");
unset ($_SESSION['error_login']);
}
?>
<form method="POST" action="login.php">
<label for="username">Username</label>
<input type="text" name="username" id="username"><br/>
<label for="pass">Password</label>
<input type="password" name="pass" id="pass"><br/>
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
