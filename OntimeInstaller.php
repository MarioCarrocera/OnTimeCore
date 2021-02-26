<?php 
ini_set('display_errors',true);
error_reporting(E_ERROR | E_PARSE | E_NOTICE | E_WARNING);
function nf($file,$to) {
	if(file_exists($file)){
	if(file_exists($to.'/'.$file)){
		echo $file." deleted"."<br>";
		unlink($to.'/'.$file);}
		if(rename($file,$to.'/'.$file))
		{
			echo $file." created"."<br>";
			return(TRUE);
		}
		else
		{
			echo 'Move Fail'."<br>";
			return(FALSE);
		}
	}
	else
	{
		echo $file." not found"."<br>";
		echo 'File not found'."<br>";
		return(FALSE);
	}
}
$files= array('OnTime.php','OnTimetmp.php','OnTimeAllways.php','OnTimeCoreA.php','OnTimeCoreB.php','OTicore.php','OnTimeFunctions.php','OnTimeContent.php','OnTimeCripto.php','OnTimeDebug.php');
$base = 'ontime';
if(!file_exists($base)){
	if(mkdir($base,0777)){
		echo "container created"."<br>";
		$back = TRUE;
		foreach($files as $x){
			if(!nf($x,$base)){
				$back = FALSE;
			}
		}
		if($back){
			include_once($base."/OnTimetmp.php");
			$install = new OnTime();
			$install->InstallCore();
			unlink($base."/OnTimetmp.php");
			unlink($base."/OTicore.php");
echo "**********+++++++++++ <br> Core Install Finish<br> **********+++++++++++ <br> <br>";
			unlink(basename($_SERVER['PHP_SELF']));
		}
		else
		{
			rmdir($base);
		}
	}
	else
	{
		echo "can't create container"."<br>";
	}
}
else
{
	echo "Allready instaled"."<br>";
}
?>