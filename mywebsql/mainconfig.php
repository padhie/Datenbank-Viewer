<?php

$aList = array();
foreach (array_reverse(getListOfDir(__DIR__)) AS $sEntry) {
     if (!strpos($sEntry, ".php") && !strpos($sEntry, ".html") && !strpos($sEntry, ".css")) {
         $sGroup = substr($sEntry, 0, strpos($sEntry, "_"));
         $sDisplayName = "Version ".$sGroup.".x";
         if (!isset($aList[$sDisplayName])) {
         	$aList[$sDisplayName] = array();
         }
         $aList[$sDisplayName][$sEntry] = "/mywebsql/".$sEntry."/";
     }
}

return $aList;