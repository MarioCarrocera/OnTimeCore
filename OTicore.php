<?php
trait OTcore{
	function InstallCore()
	{
		if ($this->not_exist('usr')) {
			$this->ot_create('usr');
		}
		if ($this->not_exist('usr/admin')) {
			$this->ot_create('usr/admin');
		}
		
		$this->ot_array(array('nick'=>'Users','name'=>'Users Feature'), 'admin.json', TRUE,'usr');
		$this->ot_array(array('owner'=>0,'remove'=>1,'create'=>2,'change'=>3,'access'=>4,'admin'=>10,'delete'=>11,'insert'=> 12,'update'=>13,'umine'=>14,'view'=>15,'vmine'=>16), 'level.json', TRUE);

		$this->ot_array(array('active'=>0,'force'=>1), 'status.json', TRUE);

		$this->ot_addin('admin','owner','users.json');			
		$this->ot_addin('admin','owner','users.json','usr');			

			
		$this->ot_addin('error.json','file','content.json');			
		$this->ot_addin('features.json','file','content.json');			
		$this->ot_addin('container.json','file','content.json');			
		$this->ot_addin('level.json','file','content.json');			
		$this->ot_addin('status.json','file','content.json');			
		$this->ot_addin('users.json','file','content.json');			

		$this->ot_addin('usr','usr','features.json');			
	
		$this->ot_addin('usr',array('Name'=>'Users Feature','limit'=>0,'OnUse'=>0),'container.json');

		$this->ot_array(array('password'=>MD5('OT2021Free'),'status'=>'active','nick'=>'Administrator','name'=>'System Administrator','crtdat'=>$this->ot_now()), '/usr/admin/admin.json', TRUE);

		$this->ot_addin('usr','owner','features.json','usr/admin');
		$this->ot_addin('main','owner','features.json','usr/admin');

		$tmparray= [];
		$tmparray['C0010M001']='Failing read content';
		$tmparray['C0010M002']='Failing create content';
		$tmparray['C0010M003']='Failing save content';
		$tmparray['C0010M004']='Missing container';
		$tmparray['C0010M005']='Mising system content,file system corrupted';
		$tmparray['C0010M006']="Access error";
		$tmparray['C0010M007']="Record exist";
		$tmparray['C0010M008']="Record don't exist";
		$tmparray['C0010M009']="Record not avaible";
		$tmparray['C0010M010']="Record not visible";
		$tmparray['C0010M011']="Not conected";
		$tmparray['C0010M012']="Not autorized";
		$tmparray['C0010M013']="Can't change id";
		$tmparray['C0010M014']="Unkwow cointeiner";
		$tmparray['C0010M015']="Featured just for pay vertion";
		$tmparray['C0010M016']="Wrong data suply";
		$tmparray['C0010M017']="Container exist";
		$tmparray['C0010M018']="Not valid value";
		$tmparray['C0010M019']="Feature not installed";
		$tmparray['C0010M020']="Feature installed";
		$tmparray['C0010M021']="Already connected";
		$tmparray['C0010M022']="Record not active";
		$tmparray['C0010M023']="Record not autorized";
		$tmparray['C0010M024']="Unkown status";
		$tmparray['C0010M025']="Not a valid status";
		$tmparray['C0010M026']="Not a valid data";
		$tmparray['C0010M035']="Can't delete user admin";
		$tmparray['C0010M036']="Can't modify user admin";
		$this->ot_write('error.json',$tmparray);
	}
}
?>