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

	$aApplicationList = array();
	foreach (getListOfDir(__DIR__) AS $sElement) {
		if (is_dir($sElement)) {
			if ((strpos($sElement, ".") >= 1 || strpos($sElement, ".") === false) && (strpos($sElement, "_") >= 1 || strpos($sElement, "_") === false)) {
				if ($sElement !== "README.md") {
					
					if (file_exists($sElement."/mainconfig.php")) {
						$aApplicationList[$sElement] = include ($sElement."/mainconfig.php");
					}
				}
			}
		}
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
	<style type="text/css">
		.box {
			float: left;
			margin: 25px;
			border-radius: 5px;
			-webkit-box-shadow: 0px 0px 30px 0px rgba(0,0,0,0.75);
			-moz-box-shadow: 0px 0px 30px 0px rgba(0,0,0,0.75);
			box-shadow: 0px 0px 30px 0px rgba(0,0,0,0.75);
			border: 2px solid rgba(2, 1, 1, 0.36);
			padding: 25px;
			text-align: center;
		}
		body {
			width: 700px ;
			margin-left: auto ;
			margin-right: auto ;
	  	}
	  	h2 {
	  		margin: 5px 0;
	  	}
	</style>
</head>
<body>

	<?php foreach ($aApplicationList AS $mKeyL1 => $aApplication): ?>
		<div class="box">
			<h2><?php echo $mKeyL1; ?></h2>
			<select onchange="window.location.href=this.value">
				<option value=""> - Version w&auml;len - </option>
				<?php foreach ($aApplication AS $mKeyL2 => $sValL2): ?>
					<?php if (is_array($sValL2)): ?>
						<optgroup label="<?php echo $mKeyL2; ?>">
							<?php foreach ($sValL2 AS $mKeyL3 => $sValL3): ?>
								<option value="<?php echo $sValL3; ?>"><?php echo $mKeyL3; ?></option>
							<?php endforeach; ?>
						</optgroup>
					<?php else: ?>
						<option value="<?php echo $sValL2; ?>"><?php echo $mKeyL2; ?></option>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
		</div>
	<?php endforeach; ?>
	
</body>
</html>