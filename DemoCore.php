<?php

ini_set('display_errors', true);
error_reporting(E_ERROR | E_PARSE | E_NOTICE | E_WARNING);

$base='ontime/';
include_once($base."OnTime.php");

echo "********** <br> Main containe <br> ********** <br> <br>";

echo "Open: ";$demo=new OnTime();$demo->ot_error('basic content exist').'<br>';


echo "Id when not conected: ";echo $demo->id; echo "<br>";
echo "Conecion statust: ";
if ($demo->conected) {
	echo "True";} else {
	echo "False";}; echo "<br>";
echo "Showing Original Errors:  <br>";$demo->ot_show($demo->errtext);echo "<br>" ;
echo "Showing Original Content: <br>";$demo->ot_show($demo->content); echo "<br>";
echo "Showing Original Features  <br>";$demo->ot_show($demo->features);echo "<br>";

echo "Try conect with correct info ->Connect('admin','OT2021Free'): ";$demo->Connect('admin','OT2021Free');$demo->ot_error("Connent!!!");
if ($demo->conected) {
	echo "Id when conected: ";echo $demo->id; echo "<br>";
	echo "Showing Public Information of the user <br>";$demo->ot_show($demo->user);echo "<br>";
	echo "Showing Private Information of the user <br>";$demo->ot_show($demo->userp);echo "<br>";
	echo "Showing Safety of the user <br>";$demo->ot_show($demo->safety);echo "<br>";
}

echo "********** <br> Create User <br> ********** <br> <br>";
echo "UserAdd('admin','xxx','active','name','nick')";
$demo->UserAdd('admin','xxx','active','name','active');$demo->ot_error("Create!!!");
echo "UserAdd('Demo','12345','active','name','nick')";
$demo->UserAdd('Demo','12345','active','Demostration user ','Demito');$demo->ot_error("Create!!!");
$demo->UserAdd('Demo1','12345','active','Demostration 1 ','me');$demo->ot_error("Create!!!");
$demo->UserAdd('Demo2','12345','active','Demostration two ','you');$demo->ot_error("Create!!!");
$demo->UserAdd('Demo3','12345','active','Demostration 3 ','all');$demo->ot_error("Create!!!");
$demo->UserAdd('Demo4','12345','active','Demostration dour ','us are');$demo->ot_error("Create!!!");

echo "********** <br> Password Options <br> ********** <br> <br>";

echo "Check password PssChk('Demo','12345'): ";
$demo->PssChk('Demo','12345');$demo->ot_error(" Password Ok!");
echo "Check status UserChkStt('Demo'): ";
echo $demo->UserChkStt('Demo');$demo->ot_error(" Current Value!");
echo "Change status  UserChkStt('Demo'): ";
$demo->UserChgStt('Demo','force');$demo->ot_error(" Change is ok!");
echo "DiscConnect(): ";
$demo->DiscConnect();$demo->ot_error(" Disconected!");
echo "Try conect ->Connect('Demo','12345'): ";$demo->Connect('Demo','12345');$demo->ot_error("Connent!!!");
echo "Force change password->FrcPssChg('Demo','12345','54321'): ";$demo->FrcPssChg('Demo','12345','54321');$demo->ot_error("Changed!!!");



echo "********** <br> User Information Options <br> ********** <br> <br>";
echo "Show user  UserShwPub('admin'): ";$tmp=$demo->UserShwPbl('admin');$demo->ot_error("Readed!!!");
echo "information <br>";$demo->ot_show($tmp);echo "<br>";
echo "Try conect ->Connect('Demo','54321'): ";$demo->Connect('Demo','54321');$demo->ot_error("Connent!!!");
if ($demo->conected) {
	echo "Id when conected: ";echo $demo->id; echo "<br>";
	echo "Showing Public Information of the user <br>";$demo->ot_show($demo->user);echo "<br>";
	echo "Showing Private Information of the user <br>";$demo->ot_show($demo->userp);echo "<br>";
	echo "Showing Safety of the user <br>";$demo->ot_show($demo->safety);echo "<br>";
}

echo "Try change my name & nick  ->MyChgInf('Mario Carrocera','Marioc')";
$demo->MyChgInf('Mario Carrocera','Marioc');$demo->ot_error("Change!!!");


echo '<br>'."Try add informtion in my public info ->MyAddPbl('hobies','play & program')";$demo->MyAddPbl('hobies','play & program');$demo->ot_error("Added!!!");
echo "Showing Public Information of the user <br>";$demo->ot_show($demo->user);echo "<br>";

echo "Try add informtion in my public info ->MyAddPbl('Wife','Bety')";$demo->MyAddPbl('Wife','Bety');$demo->ot_error("Added!!!");

echo "Try add informtion in my public info ->MyAddPbl('dog','Robert')";$demo->MyAddPbl('dog','Robert');$demo->ot_error("Added!!!");

echo "Showing Public Information of the user <br>";$demo->ot_show($demo->user);echo "<br>";

echo "Try change informtion in my public info ->MychgPbl('dog','Boby')";$demo->MyChgPbl('dog','Boby');$demo->ot_error("Changed!!!");

echo "Showing Public Information of the user <br>";$demo->ot_show($demo->user);echo "<br>";

echo "Try delete informtion in my public info ->MyDltPbl('Wife')";$demo->MyDltPbl('Wife');$demo->ot_error("Deleted!!!");

echo "Showing Public Information of the user <br>";$demo->ot_show($demo->user);echo "<br>";

echo "Try add information in my private info ->>MyAddPrv('phone','Sorry private')";$demo->MyAddPrv('phone','Sorry private');$demo->ot_error("Added!!!");
echo "Showing private Information of the user <br>";$demo->ot_show($demo->userp);echo "<br>";

echo "Try add informtion in my private info ->MyAddPrv('Wife','Bety')";$demo->MyAddPrv('Wife','Bety');$demo->ot_error("Added!!!");

echo "Try add informtion in my private info ->MyAddPrv('Familiy','Robert')";$demo->MyAddPrv('Familiy','Robert');$demo->ot_error("Added!!!");

echo "Showing private Information of the user <br>";$demo->ot_show($demo->userp);echo "<br>";

echo "Try change informtion in my private info ->MychgPbl('Familiy','Boby')";$demo->MyChgPrv('Familiy','Carrocera');$demo->ot_error("Changed!!!");

echo "Showing private Information of the user <br>";$demo->ot_show($demo->userp);echo "<br>";

echo "Try delete informtion in my private info ->MyDltPbl('Familiy')";$demo->MyDltPrv('Familiy');$demo->ot_error("Deleted!!!");

echo "Showing private Information of the user <br>";$demo->ot_show($demo->userp);echo "<br>";

echo "Showing private Information of the user <br>";$demo->ot_show($demo->userp);echo "<br>";

echo "********** <br> Error Options <br> ********** <br> <br>";

$demo->DiscConnect();
$demo->Connect('admin','OT2021Free');

echo "Try Adding new error >ErrAdd('MyError','Description')";
$demo->ErrAdd('MyError','Description');
$demo->ot_error("Error Added!!!").'</br>';

echo "Try Adding existing error ErrAdd('MyError','Description'";
$demo->ErrAdd('MyError','Description');
$demo->ot_error("Error Added!!!");

echo "Showing all Errors  <br>";
$demo->ot_show($demo->errtext);

echo "Try Change unexisting error ErrChg('MyMistake','My Name')";
$demo->ErrChg('MyMistake','My Name');
$demo->ot_error("Error changed!!!");

echo "Try Change existing error ErrChg('MyError','a New description'";
$demo->ErrChg('MyError','a New description');
$demo->ot_error("Error changed!!!").'</br>';

echo "Showing all Errors  <br>";
$demo->ot_show($demo->errtext);

echo "Try delete unexisting error ->ErrDlt('MyMistake','My Name')";
$demo->ErrDlt('MyMistake','My Name');
$demo->ot_error("Error delete!!!");

echo "Try delete existing error ->ErrDlt('MyError','a New description')";
$demo->ErrDlt('MyError','a New description');
$demo->ot_error("Error delete!!!");

echo "Showing all Errors  <br>";
$demo->ot_show($demo->errtext);

echo "********** <br> User list Options <br> ********** <br> <br>";
echo "On Line  <br>";
$demo->ot_show($demo->UsrShwNln());

echo "<br> All User  <br>";
$demo->ot_show($demo->UsrShwAll());

echo "********** <br> Feature list Options <br> ********** <br> <br>";
echo "All  <br>";
$demo->ot_show($demo->FrtShwAll());


echo "********** <br>  Feature Options <br> ********** <br> <br>";
echo "Try add user to main feature  UsrAddMn('Demo', 3)";
$demo->UsrAddMn('Demo', 3);
$demo->ot_error("User added!!!").'<br>';
echo "Try add user to main feature  UsrAddMn('Demo', 3)";
$demo->UsrAddMn('Demo', 3);
$demo->ot_error("User added!!!").'<br>';
$demo->UsrAddMn('Demo1', 0);
$demo->UsrAddMn('Demo2', 1);
$demo->UsrAddMn('Demo3', 2);
echo "Try add user to a feature  UsrAddFtr('usr'.'Demo', 1)";
$demo->UsrAddFtr('usr','Demo', 1);
$demo->ot_error("User added!!!").'<br>';
$demo->UsrAddFtr('usr','Demo1', 1);
echo "show main feature users ->ShwMn()".'<br>';
$demo->ot_show($demo->UsrShwMn()).'<br>';
echo "show features of an user UsrShwFtr('Demo')".'<br>';
$demo->ot_show($demo->UsrShwFtr('Demo')).'<br>';
echo "show users of an feature FtrShwUsr('usr')".'<br>';
$demo->ot_show($demo->FtrShwUsr('usr')).'<br>';
echo "Try change user level user to main feature  UsrAddMn('Demo', 4)";
$demo->UsrChgMn('Demo', 4).'<br>';
$demo->ot_error("level change!!!").'<br>';
echo "Try change user level to a feature  UsrAddFtr('usr'.'Demo', 4)";
$demo->UsrChgFtr('usr','Demo', 4).'<br>';
$demo->ot_error("level change!!!").'<br>';
echo "show main feature users ->ShwMn()".'<br>';
$demo->ot_show($demo->UsrShwMn()).'<br>';
echo "show features of an user UsrShwFtr('Demo')".'<br>';
$demo->ot_show($demo->UsrShwFtr('Demo')).'<br>';
echo "show users of an feature FtrShwUsr('usr')".'<br>';
$demo->ot_show($demo->FtrShwUsr('usr')).'<br>';
echo "Try change user level user to main feature  UsrAddMn('Demo')";
$demo->UsrDltMn('Demo').'<br>';
$demo->ot_error("level change!!!").'<br>';
echo "Try change user level to a feature  UsrAddFtr('usr'.'Demo')";
$demo->UsrDltFtr('usr','Demo').'<br>';
$demo->ot_error("level change!!!").'<br>';
echo "show main feature users ->ShwMn()".'<br>';
$demo->ot_show($demo->UsrShwMn()).'<br>';
echo "show features of an user UsrShwFtr('Demo')".'<br>';
$demo->ot_show($demo->UsrShwFtr('Demo')).'<br>';
echo "show users of an feature FtrShwUsr('usr')".'<br>';
$demo->ot_show($demo->FtrShwUsr('usr')).'<br>';

echo "<br><br><br><br>********** <br> Features Info<br> ********** <br> <br>";
echo "show private information of an feature FtrShwPrv('usr')".'<br>';
$demo->ot_show($demo->FtrShwPrv('usr')).'<br>';
echo "Add private information of an feature FtrAddPrv('usr','administratos','me')".'<br>';
$demo->FtrAddPrv('usr','administratos','me');
$demo->ot_error("Added!!!").'<br>';
echo "Add private information of an feature FtrAddPrv('usr','wha','today')".'<br>';
$demo->FtrAddPrv('usr','when','today');
$demo->ot_error("Added!!!").'<br>';
echo "Add private information of an feature FtrAddPrv('usr','where','here')".'<br>';
$demo->FtrAddPrv('usr','where','here');
$demo->ot_error("Added!!!").'<br>';
echo "show private information of an feature FtrShwPrv('usr')".'<br>';
$demo->ot_show($demo->FtrShwPrv('usr')).'<br>';
echo "Change private information of an feature FtrChgPrv('usr','where','here')".'<br>';
$demo->FtrChgPrv('usr','where','any place');
$demo->ot_error("Changed!!!").'<br>';
echo "show private information of an feature FtrShwPrv('usr')".'<br>';
$demo->ot_show($demo->FtrShwPrv('usr')).'<br>';
echo "Delete private information of an feature FtrDltPrv('usr','where')".'<br>';
$demo->FtrDltPrv('usr','where');
echo "Delete private information of an feature FtrDltPrv('usr','administratos')".'<br>';
$demo->FtrDltPrv('usr','administratos');
echo "show private information of an feature FtrShwPrv('usr')".'<br>';
$demo->ot_show($demo->FtrShwPrv('usr')).'<br>';

echo "show public information of an feature FtrShwPbl('usr')".'<br>';
$demo->ot_show($demo->FtrShwPbl('usr')).'<br>';


echo "Add public information of an feature FtrAddPbl('usr','admin','me')".'<br>';
$demo->FtrAddPbl('usr','admin','me');
$demo->ot_error("Added!!!").'<br>';
echo "Add public information of an feature FtrAddPbl('usr','when','yesterday')".'<br>';
$demo->FtrAddPbl('usr','when','yesterday');
$demo->ot_error("Added!!!").'<br>';
echo "Add public information of an feature FtrAddPbl('usr','what','no idea')".'<br>';
$demo->FtrAddPbl('usr','what','no idea');
$demo->ot_error("Added!!!").'<br>';
echo "show public information of an feature FtrShwPbl('usr')".'<br>';
$demo->ot_show($demo->FtrShwPbl('usr')).'<br>';
echo "Change public information of an feature FtrChgPbl('usr','what','here')".'<br>';
$demo->FtrChgPbl('usr','what','any place');
$demo->ot_error("Changed!!!").'<br>';
echo "show public information of an feature FtrShwPbl('usr')".'<br>';
$demo->ot_show($demo->FtrShwPbl('usr')).'<br>';
echo "Delete public information of an feature FtrDltPbl('usr','what')".'<br>';
$demo->FtrDltPbl('usr','what');
echo "Delete public information of an feature FtrDltPbl('usr','admin')".'<br>';
$demo->FtrDltPbl('usr','admin');
echo "show public information of an feature FtrShwPbl('usr')".'<br>';
$demo->ot_show($demo->FtrShwPbl('usr')).'<br>';




echo "<br><br><br><br>********** <br> Deleting Record<br> ********** <br> <br>";

echo "DiscConnect(): ";
$demo->DiscConnect();$demo->ot_error(" Disconected!");


echo "Try conect with correct info ->Connect('admin','OT2021Free'): ";$demo->Connect('admin','OT2021Free');$demo->ot_error("Connent!!!");

echo "Deleting ->UserDlt('Demo'): ";$demo->UserDlt('Demo');$demo->ot_error("Deleted!!!");
echo "Deleting ->UserDlt('Demo1'): ";$demo->UserDlt('Demo1');$demo->ot_error("Deleted!!!");
echo "Deleting ->UserDlt('Demo2'): ";$demo->UserDlt('Demo2');$demo->ot_error("Deleted!!!");
echo "Deleting ->UserDlt('Demo3'): ";$demo->UserDlt('Demo3');$demo->ot_error("Deleted!!!");
echo "Deleting ->UserDlt('Demo4'): ";$demo->UserDlt('Demo4');$demo->ot_error("Deleted!!!");

echo 'Demo Finish';
?>