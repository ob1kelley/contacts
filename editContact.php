<?php
require_once('../includes/kbinc.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
if (adminLogin($username, $password)) {
$_SESSION['valid_admin']=$username;
}

doAdminHeader();
?>
<a href="http://ssllcwiki.com/admin.php" class="ui-btn">Home</a>
<?php
$contact_id = $_REQUEST['contact_id'];

	
editContact($contact_id);

doHTMLfooter(); ?>