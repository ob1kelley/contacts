<?php
// include function files for this application
require_once('../../includes/kbLogin.php'); 
require_once('../../includes/kbinc.php');
session_start();

doHTMLheader();

$post_id = (int)$_POST['post_id'];
$post = strip_tags($_POST['post']);

	if(!get_magic_quotes_gpc()) {
	$post = addslashes($post);
	}

updateCustomerPost($post_id, $post);

editCustomerPosts($post_id);

doHTMLfooter(); ?>