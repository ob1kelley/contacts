<?php
require_once('../includes/kbinc.php');
session_start();

//create short variable names
$username = $_POST['username'];
$password = $_POST['password'];
if (login($username, $password)) {
$_SESSION['valid_user']=$username;
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
<style>.ui-listview > li p {
	white-space: pre-line;
} 
.ui-footer .ui-title {
	font-size: .7em;
	padding: .3em 0;
	margin: 0 1em;
}</style>
</head> 
<body>
	
<div data-role="page" data-theme="a">
<div role="main" class="ui-content">
<ul data-role="listview" data-inset="true" data-mini="true">
<li>
<a href="index.php">Contacts</a>
</li></ul>

<h1><?php echo getCustomerName($cust_id); ?>  </h1>

	
	

<?php check_valid_user(); ?>


<?php
$page = fetchPage($cust_id);
$paragraph1 = strip_tags($_POST['paragraph1']);
$paragraph2 = strip_tags($_POST['paragraph2']);
$paragraph3 = strip_tags($_POST['paragraph3']);

$newPage = $page."<p>".$paragraph1."</p>";
if($paragraph2) {
$newPage = $newPage."<p>".$paragraph2."</p>";
}
if($paragraph3) {
$newPage = $newPage."<p>".$paragraph3."</p>";
}


if ($_POST['submitted']) {
updateCustomerPost($cust_id, $newPage);
echo($_SESSION['com_message']);
unset($_POST['submitted']);
}
getCustomerInfo($cust_id);
getCustomerPage($cust_id);

?> </div> <?php
doHTMLfooter(); 
?>