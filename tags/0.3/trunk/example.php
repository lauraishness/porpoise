<?php

/*
 * PorPOISe
 * Copyright 2009 SURFnet BV
 * Released under a permissive license (see LICENSE)
 */

/**
 * Example server configuration
 *
 * @package PorPOISe
 */

/**
 * Required
 */
require_once("poiserver.class.php");

// layers defined in flat files
$flatLayers = array(
	"example" => "example.tab"
);

// layers defined in XML files
$xmlLayers = array(
	"example" => "example.xml"
);

// layars defined in a database
$dbLayers = array(
	"example" => array("dsn" => "mysql:dbname=example;host=localhost", "username" => "", "password" => "")
);

// start of server
error_reporting(E_ALL | E_STRICT);
header("Content-Type: text/plain");

// developer info goes here
define("DEVELOPER_ID", 12345);
define("DEVELOPER_KEY", "your key here");

// create factory
$factory = new LayarPOIServerFactory(DEVELOPER_ID, DEVELOPER_KEY);

// create server
$server = $factory->createLayarPOIServerFromFlatFiles($flatLayers);
//$server = $factory->createLayarPOIServerFromXMLFiles($xmlLayers);
//$server = $factory->createLayarPOIServerFromDatabase($dbLayers);

// handle the request, and that's the end of it
$server->handleRequest();