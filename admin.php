<?php
require_once('../includes/kbinc.php');
session_start();

//create short variable names
$username = $_POST['username'];
$password = $_POST['password'];
if (adminLogin($username, $password)) {
$_SESSION['valid_admin']=$username;
}

doAdminHeader();
// Put if(POST)s here, with statements to make local variables and if true, pass data to functions for insert or update 
date_default_timezone_set('America/Chicago');
if (isset($_POST['addCustomer'])) {
$cust_name = strip_tags($_POST['cust_name']);
$cust_street = $_POST['cust_street'];
$city_state_zip = strip_tags($_POST['city_state_zip']);
$contact1 = strip_tags($_POST['contact1']);
$contact1_phone = strip_tags($_POST['contact1_phone']);

	if(!get_magic_quotes_gpc()) {
	$cust_name = addslashes($cust_name);
	$cust_street = addslashes($cust_street);
	$city_state_zip = addslashes($city_state_zip);
	$contact1 = addslashes($contact1);
	$contact1_phone = addslashes($contact1_phone);
	}

addCustomer($cust_name, $cust_street, $city_state_zip, $contact1, $contact1_phone);
echo $_SESSION['com_message'];
unset($_SESSION['com_message']);
unset($_POST['addCustomer']);
}

if (isset($_POST['editCustomer'])) {
$cust_id = $_POST['cust_id'];
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
echo $_SESSION['com_message'];
unset($_SESSION['com_message']);
unset($_POST['editCustomer']);
}

if (isset($_POST['addContact'])) {
$contact_name = strip_tags($_POST['contact_name']);
$contact_company = strip_tags($_POST['contact_company']);
$street = stripslashes($_POST['street']);
$city_state_zip = stripslashes($_POST['city_state_zip']);
$contact_phone = strip_tags($_POST['contact_phone']);
$contact_email = strip_tags($_POST['contact_email']);
$contact_notes = strip_tags($_POST['contact_notes']);

	if(!get_magic_quotes_gpc()) {
	$contact_name = addslashes($contact_name);
	$contact_company = addslashes($contact_company);
	$street = addslashes($street);
	$city_state_zip = addslashes($city_state_zip);
	$contact_phone = addslashes($contact_phone);
	$contact_email = addslashes($contact_email);
	$contact_notes = addslashes($contact_notes);
	}

addContact($contact_name, $contact_company, $street, $city_state_zip, $contact_phone, $contact_email, $contact_notes);
echo $_SESSION['com_message'];
unset($_SESSION['com_message']);
unset($_POST['addContact']);
}

if (isset($_POST['editContact'])){
	$contact_id = $_POST['contact_id'];
	$contact_name = strip_tags($_POST['contact_name']);
	$contact_company = strip_tags($_POST['contact_company']);
	$street = stripslashes($_POST['street']);
	$city_state_zip = stripslashes($_POST['city_state_zip']);
	$contact_phone = strip_tags($_POST['contact_phone']);
	$contact_email = strip_tags($_POST['contact_email']);
	$contact_notes = strip_tags($_POST['contact_notes']);
updateContact($contact_id, $contact_name, $contact_company, $street, $city_state_zip, $contact_phone, $contact_email, $contact_notes);
echo $_SESSION['com_message'];
unset($_SESSION['com_message']);
unset($_POST['editContact']);
	}
	
if (isset($_POST['newIssue'])) {
$user = strip_tags($_POST['user']);
$in_time = strip_tags($_POST['in_time']);
$issue = stripslashes($_POST['issue']);
$in_time = date("Y-m-d H:i:s");

	if(!get_magic_quotes_gpc()) {
	$user = addslashes($user);
	$issue = addslashes($issue);
	}

addIssue($user, $in_time, $issue);
echo $_SESSION['com_message'];
unset($_SESSION['com_message']);
unset($_POST['newIssue']);
}
	
if (isset($_POST['updateUser'])) {
$id = (int)$_POST['id'];
$username = strip_tags($_POST['username']);
$password = stripslashes($_POST['password']);
$first_name = stripslashes($_POST['first_name']);
$last_name = stripslashes($_POST['last_name']);
$email = stripslashes($_POST['email']);


	if(!get_magic_quotes_gpc()) {
	$username = addslashes($username);
	$password = addslashes($password);
	$first_name = addslashes($first_name);
	$last_name = addslashes($last_name);
	$email = addslashes($email);
	}

updateUser($id, $username, $password, $first_name, $last_name, $email);
echo $_SESSION['com_message'];
unset($_SESSION['com_message']);
unset($_POST['updateUser']);
}

if (isset($_POST['addUser']) && mb_strlen($password) < 4) {
echo "Your password is too short";
unset($_POST['addUser']);
}

if (isset($_POST['addUser']) && mb_strlen($password) >= 4) {
$username = strip_tags($_POST['username']);
$password = stripslashes($_POST['password']);
$first_name = stripslashes($_POST['first_name']);
$last_name = stripslashes($_POST['last_name']);
$email = stripslashes($_POST['email']);


	if(!get_magic_quotes_gpc()) {
	$username = addslashes($username);
	$password = addslashes($password);
	$first_name = addslashes($first_name);
	$last_name = addslashes($last_name);
	$email = addslashes($email);
	}

addUser($username, $password, $first_name, $last_name, $email);
echo $_SESSION['com_message'];
unset($_SESSION['com_message']);
unset($_POST['addUser']);

}

if(isset($_POST['addComment'])) { // comes from updateIssue.php > getIssue()
	$issue_id =  (int)$_POST['issue_id'];
	$update = stripslashes($_POST['update']);
	$user = $_SESSION['valid_admin'];

if(!get_magic_quotes_gpc()) {
	$update = addslashes($update);
	}
	$date_time = date("Y-m-d H:i:s");
	addComment($issue_id, $user, $update, $date_time);
	echo $_SESSION['com_message'];
	unset($_SESSION['com_message']);
	unset($_POST['addComment']);	
}
	
if(isset($_POST['complete'])) {
	 $out_time = date("Y-m-d H:i:s");
	 updateIssue($issue_id, $out_time);
	 echo $_SESSION['com_message'];
	 unset($_SESSION['com_message']);
	 unset($_POST['complete']);
	} 
?> 
<div data-role="header">
    <a href="admin.php" class="ui-btn-left ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-left ui-icon-delete">Home</a>
<h1>Contacts</h1>
    <a href="logout.php" class="ui-btn-right ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-icon-gear">Logout</a>
</div>


<div data-role="collapsible"> <!-- Begin Issues -->
   <h3>Issue Tracker</h3>
	<ul data-role="listview" data-theme="a">
	<li><a href="adminNewIssue.php">Report A New Issue</a></li>
   		</ul>
			<ul data-role="listview" data-filter="true" data-theme="a" data-divider-theme="a">
<?php getIssues(); ?>
	</ul>
</div>  <!-- End Issues -->
<div data-role="collapsible"> <!-- Begin Users -->
	<h3>User Maintenance</h3>
	<ul data-role="listview" data-theme="a">
	<li><a href="addUser.php">Add A New User</a></li>
   		</ul>
			<ul data-role="listview" data-filter="true" data-theme="a" data-divider-theme="a">
<?php getUsers(); ?>
	</ul>
</div>  <!-- End Users -->
<!--<a href="http://ssllcwiki.com/adminUsers.php" class="ui-btn">User Maintenance</a> -->
<!-- Begin Main Content -->
<div data-role="collapsible"> <!-- Begin Customers -->
   <h3>Customers</h3>
	<ul data-role="listview" data-theme="a">
	<li><a href="adminAddCust.php">Add A New Customer</a></li>
   		</ul>
			<ul data-role="listview" data-filter="true" data-theme="a" data-divider-theme="a">
	<?php adminCustomers(); ?>	
	</ul>
</div> <!-- End Customers -->

<div data-role="collapsible"> <!-- Begin Contacts -->
   <h3>Contacts</h3>
   		<ul data-role="listview" data-mini="true">
   		<li><a href="adminAddContact.php">Add A New Contact</a></li>
   		</ul>
			<ul data-role="listview" data-filter="true" data-theme="a" data-divider-theme="a">
	<?php adminContacts(); ?>
		
	</ul>
</div> <!-- End Contacts -->

		
<?php doHTMLfooter(); ?>