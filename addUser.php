<?php
require_once('../includes/kbinc.php');
session_start();

//create short variable names
$username = $_POST['username'];
$password = $_POST['password'];
if (adminLogin($username, $password)) {
$_SESSION['valid_admin']=$username;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="J.Lloyd Kelley/Helpingbee.com">
	<title>Contacts Admin</title>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>

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
	
<div data-role="page">

	
	<div role="main" class="ui-content">
<?php check_valid_admin(); ?>

 

<a href="http://ssllcwiki.com/admin.php" class="ui-btn">Home</a>
<form action="admin.php" id="addUser" method="post">
			<label for="username">Username:</label>
<input type="text" name="username" id="username" data-mini="true" class="required" title="That username is already in use." placeholder="Username is required"/>

<label for="password">Password (at least 4 characters):</label>
<input type="password" name="password" id="password" data-mini="true" class="required"/>

<label for="first_name">First Name:</label>
<input type="text" name="first_name" id="first_name" data-mini="true"  class="required" placeholder="First name is required"/>

<label for="last_name">Last Name:</label>
<input type="text" name="last_name" id="last_name" data-mini="true"  class="required" placeholder="Yes, they need a last name too!"/>

<label for="email">Email:</label>
<input type="text" name="email" id="email" data-mini="true"  class="email" />
<input type="hidden" name="addUser" id="addUser"/>
<button type="submit" name="submit" value="submit" data-theme="a">Submit</button>
			</form>
<script type="text/javascript">
		$("#addUser").validate({
  rules: {
    username: {
    required: true,
    remote: "checkUsername.php"
    },
    password: {
      required: true,
      minlength: 4
    }
  },
  messages: {
    username: {
    	required: "Please specify a username",
    	remote: "That name is taken"
    	},
    password: {
      required: "You must have a password",
      minlength: "Your password must be at least 4 characters"
    }
  }
});


</script>
<?php 
doHTMLfooter(); 
?>