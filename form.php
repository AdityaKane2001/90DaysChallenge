<?php
session_start();                          //To add a new challenge
require_once "pdo.php";
      
if ( isset($_POST['name']) &&  isset($_POST['days'])){
	
	$id=$_SESSION['userid'];
	$stmt = $pdo->prepare('INSERT into challenges(userid,cname,day) VALUES (:uid,:name,:days)');
	$stmt->execute(array( ':uid'=>$id,':name'=>$_POST['name'],':days' => $_POST['days']));
	header("Location: challenges.php");
	return;
}
?>
<html>
<head>
<title>Add challenge</title>
</head>
<body>
<div name="form" id="new_challenge">
<form method="POST" action="form.php">

<label for="name"><b>Name</b></label><br>
<input type="text"  name="name" id="name"></br>

<label for="days"><b>No. Of days:</b></label><br>
<input type="text"  name="days" id="days"></br>

<input type="submit" onclick="loadDoc();return doValidate();" value="Add">
<input type="submit" name="cancel" value="Cancel">

</form>
</div>
<body>
</html>
<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "challenges.php", true);
  xhttp.send();
}
</script>
<script>
function doValidate() {
    console.log('Validating...');
    try {
        name = document.getElementById('name').value;
        days = document.getElementById('days').value;
        console.log("Validating name="+name+" days="+days);
        if (name == null || name == "" || days == null || days == "") {
            alert("All fields must be filled out");
            return false;
        }
        
        return true;
    } catch(e) {
        return false;
    }
    return false;
}
</script>
