<?php
require_once('config.php');

session_start();

$action = isset($_GET['action']) ? $_GET['action'] : '';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

if ($action != 'login' && $action != 'logout' && !$username) {
	login();
	exit;
}

switch ($action) {
	case 'login':
		login();
		break;
	case 'logout':
		logout();
		break;
	case 'newFont':
		newFont();
		break;
	case 'editFont':
		editFont();
		break;
	case 'deleteFont':
		deleteFont();
		break;
	default:
		listFonts();
}

function login() {
	$results = array();
	$results['pageTitle'] = 'Login';
	
	// Try to log the user in
	// Or just display the login form
	if (isset($_POST['login'])) {
		// Check credentials 
		// Create a session and display the admin menu if login attempt succeeds 
		// Otherwise ask the user to try again
		if ($_POST['username'] == ADMIN_USERNAME && $_POST['password'] == ADMIN_PASSWORD) {
			$_SESSION['username'];
			header('Location: admin.php');
		} else {
			$results['errorMessage'] = 'The username and/or the password were wrong. Would you mind trying again?';
			require(TEMPLATE_PATH . '/admin/login.php');
		}
	} else {
		require(TEMPLATE_PATH . '/admin/login.php');
	}
}

// On logout, kill the session and load admin.php
function logout() {
	unset $_SESSION['username'];
	header('Location: admin.php)';
}

function newFont() {
	$results = array();
	$results['pageTitle'] = 'Upload new font';
	$results['formAction'] = 'newFont';
	
	if (isset($_POST['saveChanges'])) {
		
	}
}