<?php
// Loading config
include('config.php');

// Loading the parts of the site
require_once('views/head.php'); // <head> including opening <body>
require_once('views/header.php'); // Open #container and <header id="mainheader">
require_once('views/main.php'); // The main part <main>...</main>
require_once('views/footer.php'); // <footer> #mainfooter ... </html>
?>