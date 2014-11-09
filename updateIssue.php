<?php
require_once('../includes/kbinc.php');
session_start();

//create short variable names
$username = $_POST['username'];
$password = $_POST['password'];
if (login($username, $password)) {
$_SESSION['valid_user']=$username;
}
$issue_id = $_REQUEST['issue_id'];

doAdminHeader();
// gets issue_id from adminIssues via GET, calls getIssue, which displays a single issue in a form, why?
// Form action is to adminIssues.php, now it's only purpose is to complete the issue.
// TODO: make form in get issue simpler, and if statement in adminIssues simpler, all it needs is issue_id and is it complete? Then have getIssue() call getComments() and have form for adding a comment.
?>
<a href="http://ssllcwiki.com/admin.php" class="ui-btn">Home</a>
<?php
getIssue($issue_id);

doHTMLfooter(); 
?>