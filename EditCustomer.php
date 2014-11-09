<?php
require_once('../includes/kbinc.php');
session_start();

doAdminHeader();
?>
<a href="http://ssllcwiki.com/admin.php" class="ui-btn">Home</a>
<?php
//if submitted, update cust info and clear submitted
//recieve cust id from admin.php
//display current cust info in a form that submits back to this page

$cust_id = $_REQUEST['cust_id'];

if (isset($_POST['editCustomer'])) {
$cust_name = strip_tags($_POST['cust_name']);
$cust_street = $_POST['cust_street'];
$city_state_zip = strip_tags($_POST['city_state_zip']);
$contact1 = strip_tags($_POST['contact1']);
$contact1_phone = strip_tags($_POST['contact1_phone']);
$page = $_POST['page'];

	if(!get_magic_quotes_gpc()) {
	$cust_name = addslashes($cust_name);
	$cust_street = addslashes($cust_street);
	$city_state_zip = addslashes($city_state_zip);
	$contact1 = addslashes($contact1);
	$contact1_phone = addslashes($contact1_phone);
	}

adminUpdateCustomer($cust_id, $cust_name, $cust_street, $city_state_zip, $contact1, $contact1_phone, $page);

unset($_POST['editCustomer']);
}
getCustomerForm($cust_id);


doHTMLfooter(); 
?>