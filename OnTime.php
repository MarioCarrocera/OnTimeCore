<?php
include_once("OnTimeAllways.php");
$usat = 'use Allways';
if (file_exists($base."OnTimeContent.php")) {
	include_once("OnTimeContent.php");
	$usat .= ',Content';
}
if (file_exists($base."OnTimeConvert.php")) {
	include_once("OnTimeConvert.php");
	$usat .= ',Convert';
}
if (file_exists($base."OnTimeCripto.php")) {
	include_once("OnTimeCripto.php");
	$usat .= ',Cripto';
}
if (file_exists($base."OnTimeDateA.php")) {
	include_once("OnTimeDateA.php");	
	$usat .= ',DateA';
}
if (file_exists($base."OnTimeDateB.php")) {
	include_once("OnTimeDateB.php");
	$usat .= ',DateB';
}
if (file_exists($base."OnTimeDebugB.php")) {
	include_once("OnTimeDebugB.php");
	$usat .= ',Debug';
} else {
	if (file_exists($base."OnTimeDateB.php")) {
		include_once("OnTimeDebug.php");
		$usat .= ',Debug';
	}
}
if (file_exists($base."OnTimeFunctions.php")) {
	include_once("OnTimeFunctions.php");
	$usat .= ',Functions';
}
if (file_exists($base."OnTimeValid.php")) {
	include_once("OnTimeValid.php");
	$usat .= ',Valid';
}
if (file_exists($base."OnTimeCoreA.php")) {
	include_once("OnTimeCoreA.php");
	$usat .= ',CoreA';
}
if (file_exists($base."OnTimeCoreB.php")) {
	include_once("OnTimeCoreB.php");
	$usat .= ',CoreB';
}
if (file_exists($base."OnTimeCoreD.php")) {
	include_once("OnTimeCoreD.php");
	$usat .= ',CoreD';
}
if (file_exists($base."OnTimeCoreP.php")) {
	include_once("OnTimeCoreP.php");	
	$usat .= ',CoreP';
}
if (file_exists($base."OnTimeGrpsA.php")) {
	include_once("OnTimeGrpsA.php");
	$usat .= ',GrpsA';
}
if (file_exists($base."OnTimeGrpsB.php")) {
	include_once("OnTimeGrpsB.php");
	$usat .= ',GrpsB';
}
if (file_exists($base."OnTimeGrpsD.php")) {
	include_once("OnTimeGrpsD.php");
	$usat .= ',GrpsD';
}
if (file_exists($base."OnTimeBasicA.php")) {
	include_once("OnTimeBasicA.php");
	$usat .= ',BasicA';
}
if (file_exists($base."OnTimeBasicB.php")) {
	include_once("OnTimeBasicB.php");
	$usat .= ',BasicB';
}
if (file_exists($base."OnTimeBasicD.php")) {
	include_once("OnTimeBasicD.php");
	$usat .= ',BasicD';
}
if (file_exists($base."OnTimeDDD.php")) {
	include_once("OnTimeDDD.php");
	$usat .= ',DtDc';
}
if (file_exists($base."OnTimeRecord.php")) {
	include_once("OnTimeRecord.php");
	$usat .= ',Record';
}
if (file_exists($base."OnTimeTableA.php")) {
	include_once("OnTimeTableA.php");
	$usat .= ',TableA';
}
if (file_exists($base."OnTimeTableB.php")) {
	include_once("OnTimeTableB.php");
	$usat .= ',TableB';
}
if (file_exists($base."OnTimePageB.php")) {
	include_once("OnTimePageB.php");
	$usat .= ',PageB';
}
if (file_exists($base."OnTimeDebugP.php")) {
	include_once("OnTimeDebugP.php");
	$usat .= ',DebugP';
}
$usat ='class OnTime{'.$usat.';}';
eval($usat);
?>