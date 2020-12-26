<?php
require_once 'pdo.php';
require_once 'utils.php';

session_start();

if(isset($_POST['name'])){
  $rows=fetchRows('challenges','*','userid',$_SESSION['userid']);

  if($rows==false){



  }
  else{

  }

}


?>
