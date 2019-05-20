<?php

require("./cfig/config.php");
session_start();
$action = isset($_GET['action']) ? $_GET['action'] : "";

switch($action) {
	
	//case 'properties':
	//case 'contact':
	//case 'about us':
	default: homepage();
}

function homepage() {
	$results = array();
	$properties = Property::getList(HOMEPAGE_NUM_PROPERTIES);
	$results['properties'] = $data['results'];
	$results['pageTitle'] = "CHF";
	require(TEMPLATE_PATH . "/homepage.php");
}