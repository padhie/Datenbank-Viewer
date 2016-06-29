<?php

$aAdminerList = array(
	"--- Version auswählen ---"
);
foreach (array_reverse(getListOfDir(__DIR__)) AS $sVersion) {
	if (!strpos($sVersion, ".php") && !strpos($sVersion, ".html") && !strpos($sVersion, ".css")) {
		if (!isset($aAdminerList[$sVersion])) {
			$aAdminerList[$sVersion] = array();
		}
		foreach (getListOfDir(__DIR__."/" . $sVersion . "/css") AS $sFiles) {
			$sFiles = str_replace(".css", "", $sFiles);
			array_push($aAdminerList[$sVersion], $sFiles);
		}
	}
}

return $aAdminerList;