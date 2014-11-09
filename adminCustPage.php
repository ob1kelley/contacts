<?php
require_once('../includes/kbinc.php');
session_start();

//create short variable names
$username = $_POST['username'];
$password = $_POST['password'];
if (adminLogin($username, $password)) {
$_SESSION['valid_admin']=$username;
}
$cust_id = $_REQUEST['cust_id'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php getCustomerName($cust_id); ?></title>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.js"></script>

</head> 
<body>
	
<div data-role="page">
<a href="admin.php" class="ui-btn">Home</a>
	
	<div role="main" class="ui-content">

<?php check_valid_admin(); ?>


<?php
$page = fetchPage($cust_id);
$paragraph1 = $_POST['paragraph1'];
$paragraph2 = $_POST['paragraph2'];
$paragraph3 = $_POST['paragraph3'];
$title = strip_tags($_POST['title']);
$newPage = $page."<div data-role=\"collapsible\"><h3>".$title."</h3>
<p>".$paragraph1."</p><p>".$paragraph2."</p><p>".$paragraph3."</p></div>";


if ($_POST['submitted']) {
updateCustomerPost($cust_id, $newPage);
echo($_SESSION['com_message']);
unset($_POST['submitted']);
}
getCustomerInfo($cust_id);
adminGetCustPage($cust_id);

?> </div></div> <?php
doHTMLfooter(); 
?>