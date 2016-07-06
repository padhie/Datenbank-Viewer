<?php

$aList = array();
foreach (array_reverse(getListOfDir(__DIR__)) AS $sEntry) {
	if (!strpos($sEntry, ".php") && !strpos($sEntry, ".html") && !strpos($sEntry, ".css")) {
		$sGroup = "Version ".substr($sEntry, 0, strpos($sEntry, "_")).".x";
		if (!isset($aList[$sGroup])) {
			$aList[$sGroup] = array();
		}
		$sDisplayName = str_replace("_", ".", $sEntry);
		$aList[$sGroup][$sDisplayName] = "/chive/".$sEntry."/";
	}
}

return $aList;
