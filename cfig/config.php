<?php
ini_set("display_errors", true);

date_default_timezone_set("Europe/London");

//define("DB_DSN", "mysql:host=<HOSTNAME>;dbname=<DBNAME>");
//define("DB_USERNAME", "<USERNAME>");
//define("DB_PASSWORD", "<PASSWORD>");
define("CLASS_PATH", "classes"); //Directory to the classes
define("HOMEPAGE_NUM_PROPERTIES", 4); //Number of properties to be shown on the front page.
define("TEMPLATE_PATH", "templates"); // Directory to the page templates.
define("IMAGE_PATH", "images/media"); // Directory to the images displayed.

//require(CLASS_PATH . "/property.php"); 

function handleException($exception) {
	echo "Whoops! An error occured. Please get in touch!";
	echo ($exception->getMessage() );
}
set_exception_handler('handleException'); //Handle errors so they don't crash my server :<
?>