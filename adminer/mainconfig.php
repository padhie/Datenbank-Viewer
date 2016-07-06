<?php

$aAdminerList = array();
foreach (array_reverse(getListOfDir(__DIR__)) AS $sVersion) {
	if (!strpos($sVersion, ".php") && !strpos($sVersion, ".html") && !strpos($sVersion, ".css")) {
		$sDisplayVersion = "Version ".str_replace("_", ".", $sVersion);
		$aAdminerList[$sDisplayVersion]["default"] = "/adminer/index.php?version=".$sVersion;
		
		if (!isset($aAdminerList[$sDisplayVersion])) {
			$aAdminerList[$sDisplayVersion] = array();
		}
		foreach (getListOfDir(__DIR__."/" . $sVersion . "/css") AS $sFiles) {
			$sFiles = str_replace(".css", "", $sFiles);
			$aAdminerList[$sDisplayVersion][$sFiles] = "/adminer/index.php?version=".$sVersion."&css=".$sFiles;
		}
	}
}

return $aAdminerList;