<?php
include_once 'conn.php';

$do = isset($_GET['do']) ? trim($_GET['do']) : '';
if ($do == "register") {
	include_once 'register.php';
} elseif ($do == "admin") {
	include_once 'admin.php';
} elseif ($do == "view") {
	include_once 'view.php';
} elseif ($do == "user") {
	include_once 'user.php';
} elseif ($do == "change") {
	include_once 'change.php';
} elseif ($do == "user") {
	include_once 'user.php';
} else {
	include_once 'login.php';
}