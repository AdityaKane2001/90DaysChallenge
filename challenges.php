<?php
session_start();
require_once "pdo.php";
$id=$_SESSION['userid'];
function loadCh($pdo,$user_id)
	{	
	  $stmt=$pdo->prepare('SELECT * FROM challenges WHERE userid=:uid');
	  $stmt->execute(array(':uid'=>$user_id));
	  $challenges=array();
	  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		  $challenges[]=$row;
	  }
	  return $challenges;
	 }
	 $challenges=loadCh($pdo,$id);
?>

<!DOCTYPE html>
<html>
<body>

<div id="demo">  
<button type="button" onclick="loadDoc()">+</button>
</div>
<div id="temp" align="center">

</div>

<?php
$n_challenges=0;
echo("Challenges :");
echo("\n");
foreach($challenges as $challenge){
	$n_challenges++;
	$cid=$challenge['cid'];
	$cname=$challenge['cname'];
	
	echo '<div id="challenge'.$cid.'">  
            <input type="button" value="'.$cname.'"> 
            </div>'; //Button for each challenge
}
?>
<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("temp").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "form.php", true);
  xhttp.send();
}
</script>
<a href="logout.php">Logout</a>
</body>
</html>