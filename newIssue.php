<?php
require_once('../includes/kbinc.php');
session_start();

//create short variable names
$username = $_POST['username'];
$password = $_POST['password'];
if (login($username, $password)) {
$_SESSION['valid_user']=$username;
}

doHTMLheader();

?>
<ul data-role="listview" data-inset="true" data-mini="true">
<li>
<a href="http://ssllcwiki.com/index.php">Contacts</a>
</li></ul>

<form action="index.php" method="post">
<label for="user">Your Name:</label>
<input type="text" name="user" id="user" data-mini="true" />

<label for="issue">Describe The Issue:</label>
<input type="text" name="issue" id="issue" data-mini="true" />
<input type="hidden" name="newIssue" id="newIssue"/>
<button type="submit" name="submit" value="submit" data-theme="a">Submit</button>
</form>

<?php doHTMLfooter(); ?>