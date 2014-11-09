<?php
require_once('../includes/kbinc.php');
session_start();
doAdminHeader();
unset($_SESSION['valid_admin']);
check_valid_admin();
?>