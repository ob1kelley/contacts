<?php
require_once('../includes/kbinc.php');
session_start();
// I moved this functionality to admin.php, this may not be needed.
//create short variable names
$username = $_POST['username'];
$password = $_POST['password'];
if (adminLogin($username, $password)) {
$_SESSION['valid_admin']=$username;
}

doAdminHeader();
// admin comes here from admin.php to get a list of links to issues (call to getIssues())
// The links send issue.id to updateIssue.php via GET
// Since I made a table for comments, I only need this to complete an issue, then one to add a comment
date_default_timezone_set('America/Chicago');
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
<a href="admin.php" class="ui-btn">Home</a>
<!-- Begin Main Content -->
<div data-role="collapsible" data-collapsed="false"> <!-- Begin Customers -->
   <h3>Issue Tracker</h3>
	<ul data-role="listview" data-theme="a">
	<li><a href="adminNewIssue.php">Report A New Issue</a></li>
   		</ul>
			<ul data-role="listview" data-filter="true" data-theme="a" data-divider-theme="a">
<?php 
getIssues();
doHTMLfooter(); 
?>