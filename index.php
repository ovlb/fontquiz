<?php
// Loading config
require_once('config.php');

$action = isset($_GET['action']) ? $_GET['action']:'';

switch($action) {
	case 'archive':
		archive();
		break;
	default:
		homepage();
}

function archive() {
	$results = array();
	$data = Font::getList();
	$results['fonts'] = $data['results'];
	$results['totalRows'] = $data['totalRows'];
	$results['pageTitle'] = 'Font Archive';
	require(TEMPLATE_PATH . '/overview.php');
}

function homepage() {
	require(TEMPLATE_PATH . '/main.php');
}

// Loading the parts of the site 
require_once('views/head.php'); // <head> including opening <div> #container
require_once('views/header.php'); // <header id="mainheader">
require_once('views/main.php'); // The main part <main>...</main>
require_once('views/footer.php'); // <footer> #mainfooter ... </html>
?>