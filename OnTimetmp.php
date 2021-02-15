<?php
include_once("OnTimeAllways.php");
include_once("OnTimeFunctions.php");
include_once("OnTimeContent.php");
include_once("OnTimeCripto.php");
include_once("OnTimeValid.php");
include_once("OnTimeDebug.php");
include_once("OnTimeCoreA.php");
include_once("OnTimeCoreB.php");
include_once("OTicore.php");

class OnTime{
	use OTcore;
	use CoreB;
	use CoreA;
	use Functions;
	use Content;
	use Cripto;
	use Valid;
	use Debug;
	use Allways;
}

?>