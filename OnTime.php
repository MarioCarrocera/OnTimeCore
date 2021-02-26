<?php
include_once("OnTimeAllways.php");
include_once("OnTimeFunctions.php");
include_once("OnTimeContent.php");
include_once("OnTimeCripto.php");
include_once("OnTimeDebug.php");
include_once("OnTimeCoreA.php");
include_once("OnTimeCoreB.php");
class OnTime{
	use CoreA;
	use CoreB;
	use Allways;
	use Functions;
	use Content;
	use Cripto;
	use Debug;
}?>