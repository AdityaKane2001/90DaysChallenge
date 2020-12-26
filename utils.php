<?php

function fetchRows($table,$columns,$conditionVariable,$conditionValue){
  require_once 'pdo.php';
  $stmt=$pdo->prepare('SELECT :cols FROM :table WHERE :condvar=:condval');
  $stmt->execute(array(':cols'=>$columns,':table'=>'\\'.$table,':condvar'=>$conditionVariable,':condval'=>$conditionValue));
  $stmtrows=$stmt->fetchAll(PDO::FETCH_ASSOC);
  return $stmtrows;

}

echo('hi');
$rows=fetchRows('challenges','*','userid',1);
//echo 'dsf';
echo('hi');



?>
