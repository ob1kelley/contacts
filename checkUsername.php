<?php
require_once('../includes/kbinc.php');
$user=isset($_GET['username']) ? $_GET['username'] : $_POST['username'];
  $conn = db_connect();

  // check if username is unique
  $result = $conn->query("select * from users
                         where username ='".$user."'");

  if ($result->num_rows==0) {
  
     echo "true";
	} else {
	echo "false";
	}
// checkUsername($_POST['username']);


?>