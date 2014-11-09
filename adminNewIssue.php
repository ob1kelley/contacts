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
?>
<a href="admin.php" class="ui-btn">Home</a>

<form action="admin.php" method="post">
<label for="user">Your Name:</label>
<input type="text" name="user" id="user" data-mini="true" />

<label for="issue">Describe The Issue:</label>
<input type="text" name="issue" id="issue" data-mini="true" />
<input type="hidden" name="newIssue" id="newIssue"/>
<button type="submit" name="submit" value="submit" data-theme="a">Submit</button>
</form>
<?php doHTMLfooter(); ?>