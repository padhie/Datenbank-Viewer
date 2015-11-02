<?php
	function getListOfDir($sDir) {
		$aFiles = scandir($sDir);
		$aReturnFile = array();
		for ($i=0; $i<count($aFiles); $i++) {
			if ($aFiles[$i] !== "." && $aFiles[$i] !== "..") {
				array_push($aReturnFile, $aFiles[$i]);
			}
		}
		unset($aFiles);
		return $aReturnFile;
	}

	$aPmaList = array();
	foreach (array_reverse(getListOfDir("pma/")) AS $sEntry) {
		if (!strpos($sEntry, ".php") && !strpos($sEntry, ".html") && !strpos($sEntry, ".css")) {
			$sGroup = substr($sEntry, 0, strpos($sEntry, "_"));
			if (!isset($aPmaList[$sGroup])) {
				$aPmaList[$sGroup] = array();
			}
			array_push($aPmaList[$sGroup], $sEntry);
		}
	}

	$aAdminerList = array();
	foreach (array_reverse(getListOfDir("adminer/")) AS $sVersion) {
		if (!strpos($sVersion, ".php") && !strpos($sVersion, ".html") && !strpos($sVersion, ".css")) {
			if (!isset($aAdminerList[$sVersion])) {
				$aAdminerList[$sVersion] = array();
			}
			foreach (getListOfDir("adminer/" . $sVersion . "/css") AS $sFiles) {
				$sFiles = str_replace(".css", "", $sFiles);
				array_push($aAdminerList[$sVersion], $sFiles);
			}
		}
	}
?>
<html>
<head>
	<title>Datenbank-View Collection</title>
</head>
<body>
	<div style="float:left;">
		<h2>phpMyAdmin</h2>
		<select onchange="window.location.href='pma/'+this.value">
			<option value=""> - Version w&auml;len - </option>
			<?php foreach ($aPmaList AS $sVersion => $aEntrys) : ?>
				<optgroup label="Version <?php echo $sVersion; ?>.x">
					<?php foreach ($aEntrys AS $sDir) : ?>
						<option value="<?php echo $sDir; ?>"><?php echo str_replace("_", ".",$sDir); ?></option>
					<?php endforeach; ?>
				</optgroup>
			<?php endforeach; ?>


		</select>
	</div>

	<div style="float:left; width:10px;">&nbsp;</div>
	
	<div style="float:left;">
		<h2>adminer</h2>
		<select onchange="window.location.href='adminer/index.php?'+this.value">
			<option value=""> - Version w&auml;len - </option>
			<?php foreach ($aAdminerList AS $sVersion => $aEntrys) : ?>
				<optgroup label="Version <?php echo str_replace("_", ".",$sVersion); ?>">
					<option value="css=<?php echo $sFile; ?>&version=<?php echo $sVersion; ?>"><?php echo $sFile; ?></option>
					<?php foreach ($aEntrys AS $sFile) : ?>
						<option value="css=<?php echo $sFile; ?>&version=<?php echo $sVersion; ?>"><?php echo $sFile; ?></option>
					<?php endforeach; ?>
				</optgroup>
			<?php endforeach; ?>
		</select>
	</div>
</body>
</html>