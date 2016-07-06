<?php

$aList = array();

foreach (array_reverse(getListOfDir(__DIR__)) AS $sEntry) {
	if (!strpos($sEntry, ".php") && !strpos($sEntry, ".html") && !strpos($sEntry, ".css")) {
		$sDisplayName = "Version ".substr($sEntry, 0, strpos($sEntry, "_")).".x";
		if (!isset($aList[$sDisplayName])) {
			$aList[$sDisplayName] = array();
		}
		$sVersion = str_replace("_", ".", $sEntry);
		$aList[$sDisplayName][$sVersion]	= "/phpminiadmin/".$sEntry."/phpminiadmin.php";
	}
}

return $aList;