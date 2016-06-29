<?php

$aList = array(
     "--- Version auswählen ---"
 );
foreach (array_reverse(getListOfDir(__DIR__)) AS $sEntry) {
     if (!strpos($sEntry, ".php") && !strpos($sEntry, ".html") && !strpos($sEntry, ".css")) {
         $sGroup = substr($sEntry, 0, strpos($sEntry, "_"));
         if (!isset($aList[$sGroup])) {
             $aList[$sGroup] = array();
         }
         array_push($aList[$sGroup], $sEntry);
     }
}

return $aList;