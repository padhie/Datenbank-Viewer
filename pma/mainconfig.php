<?php

$aPmaList = array(
	"--- Version auswählen ---"
);
foreach (array_reverse(getListOfDir("pma/")) AS $sEntry) {
	if (!strpos($sEntry, ".php") && !strpos($sEntry, ".html") && !strpos($sEntry, ".css")) {
		$sGroup = substr($sEntry, 0, strpos($sEntry, "_"));
		if (!isset($aPmaList[$sGroup])) {
			$aPmaList[$sGroup] = array();
		}
		array_push($aPmaList[$sGroup], $sEntry);
	}
}

return $aPmaList;