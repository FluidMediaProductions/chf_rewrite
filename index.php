<?php

require("./cfig/config.php");
require("./cfig/const.php");
session_start();
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];
$action = isset($_GET['action']) ? $_GET['action'] : "";

switch($action) {
	
	//case 'properties':
	//case 'contact':
	//case 'about us':
	default: homepage();
}

function homepage() {
	$results = array();
	//$properties = Property::getList(HOMEPAGE_NUM_PROPERTIES);
	//$results['properties'] = $data['results'];
	$results['pageTitle'] = "CHF";
	$results['msg'] = "";
	
	require(TEMPLATE_PATH . "/homepage.php");
}
?>