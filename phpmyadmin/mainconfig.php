<?php

$aPmaList = array();
foreach (array_reverse(getListOfDir(__DIR__)) AS $sEntry) {
	if (!strpos($sEntry, ".php") && !strpos($sEntry, ".html") && !strpos($sEntry, ".css")) {
		$sGroup = "Version ".substr($sEntry, 0, strpos($sEntry, "_")).".x";
		if (!isset($aPmaList[$sGroup])) {
			$aPmaList[$sGroup] = array();
		}
		$sDisplayName = str_replace("_", ".", $sEntry);
		$aPmaList[$sGroup][$sDisplayName] = "/pma/".$sEntry."/";
	}
}

return $aPmaList;