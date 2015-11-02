<?php
/**
 * File: index.php
 * Project: dbv
 *
 * Hier wird die CSS des Adminers ausgetauscht
 *
 * @copyright (c) 2015, nitramIT GmbH
 * @author Patrick Zemke <pz@nitramit.de>
 * @package dbv
 *
 * @changelog:
 * 02.11.2015 - Patrick Zemke - Datei erstellt
 */

if (isset($_GET["version"])) {

	if (file_exists($_GET["version"]."/adminer.css")) {
		unlink($_GET["version"]."/adminer.css");
	}

	if (isset($_GET["css"]) && file_exists($_GET["version"]."/css/".$_GET["css"].".css")) {
		copy($_GET["version"]."/css/".$_GET["css"].".css", $_GET["version"]."/adminer.css");
	}

	header("Location: /adminer/".$_GET["version"]."/adminer.php");
} else {
	echo "Invalid Or Missing Parameter";
}