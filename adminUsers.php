<?php
require_once('../includes/kbinc.php');
session_start();

//create short variable names
$username = $_POST['username'];
$password = $_POST['password'];
if (adminLogin($username, $password)) {
$_SESSION['valid_admin']=$username;
}
$id = (int)$_REQUEST['id'];
doAdminHeader();

?> 
<a href="http://ssllcwiki.com/admin.php" class="ui-btn">Home</a>


<?php 

getUser($id);
doHTMLfooter(); 
?>