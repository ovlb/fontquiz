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
	if ( isset($_POST['login']) ) {
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

// On logout, unset the session and load admin.php
function logout() {
	unset $_SESSION['username'];
	header('Location: admin.php)';
}

function newFont() {
	$results = array();
	$results['pageTitle'] = 'Upload new font';
	$results['formAction'] = 'newFont';
	
	if ( isset($_POST['saveChanges']) ) { // The user wants to save changes
		$article = new Font;
		$article->storeFormValues($_POST);
		$article->insert();
		header('Location: admin.php?status=changesSaved');
	} elseif ( isset($_POST['cancel']) ) { // The user wants to cancel and delete the input
		header('Location: admin.php');
	} else {
		$results['article'] = new Font;
		require(TEMPLATE_PATH . '/admin/edit.php');
	}
}


funtion editFont() {
	$results = array();
	$results['pageTitle'] = 'Edit Font';
	$results['formAction'] = 'editFont';
	
	if (isset($_POST['saveChanges'])) { // The user wants to save changes
		if (!$article = Font::getById( (int)$_POST['fontId'] )) { // Return an error message if the ID does not exist
			header('Location: admin.php?error=fontNotFound')
			return;
		}
		
		// Save changes if everything is fine
		$article->storeFormValues($_POST);
		$article->update();
		header('Location: admin.php?status=changesSaved');
		
	} elseif ( isset($_POST['cancel']) ) {
		header('location: admin.php');
	} else {
		$results['article'] = Font::getById( int()$_GET['fontId'] );
		require(TEMPLATE_PATH . '/admin/edit.php');
	}
}

funtion deleteFont() {
	if (!$article = Font::getById( (int)$_POST['fontId'] )) { // Return an error message if the ID does not exist
			header('Location: admin.php?error=fontNotFound')
			return;
	}
	
	$article->delete();
	header('Location: admin.php?status=fontDeleted');
}

function listFonts() {
	$results = array();
	$data = Font::getList();
	$results['articles'] = $data['results'];
	$results['totalRows'] = $data['totalRows'];
	$results['pageTitle'] = 'All Fonts'; 
	
	if ( isset( $_GET['error'] ) ) {
		if ( $_GET['error'] == "articleNotFound" ) $results['errorMessage'] = "Error: Article not found.";
	}
 
	if ( isset( $_GET['status'] ) ) {
		if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Your changes have been saved.";
		if ( $_GET['status'] == "articleDeleted" ) $results['statusMessage'] = "Article deleted.";
	}
 
	require( TEMPLATE_PATH . "/admin/listArticles.php" );
}
?>