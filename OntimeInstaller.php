<?php 
ini_set('display_errors',true);
error_reporting(E_ERROR | E_PARSE | E_NOTICE | E_WARNING);
function nf($file,$to) {
	if(file_exists($file)){
	if(file_exists($to.'/'.$file)){
		unlink($to.'/'.$file);}
		if(rename($file,$to.'/'.$file))
		{
			return(TRUE);
		}
		else
		{
			echo 'Move Fail';
			return(FALSE);
		}
	}
	else
	{
		echo 'File not found';
		return(FALSE);
	}
}
$files= array('OnTime.php','OnTimeCoreA.php','OnTimeCoreB.php','OTicore.php','OnTimeFunctions.php','OnTimeContent.php','OnTimeCripto.php','OnTimeDebug.php','OnTimeValid.php');
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
			include_once($base."/OnTime.php");
			$install = new OnTime();
			$install->InstallCore();
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