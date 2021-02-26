<?php
trait CoreA{	
	function CrtUsr($key, $password, $status, $fullname='None', $Nick='None'){
		if ($this->ot_connect()) {
			if ($this->ot_can('create','usr')) {
				if ($this->not_exist($key, 'usr')) {
					if ($this->ot_create($key, 'usr')) {
						$this->ot_array(array('password'=>MD5($password),'status'=>$status,'nick'=>$Nick,'name'=>$fullname,'crtdat'=>$this->ot_now()), 'admin.json', TRUE,'usr/'.$key);
					}
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function UsrChgInf($user,$name, $nick){
		if ($this->ot_connect()) {
			if ($this->ot_can('change','usr')) {
				if ($this->ot_exist($user,'usr')) {
					$atmp=$this->ot_readif('admin.json','usr/'.$user);
					$atmp['name']=$name;
					$atmp['nick']=$nick;
					$this->ot_write('admin.json',$atmp,'usr/'.$user);
					$this->retval=TRUE;
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}	
	function UserChkStt($key){
		$atmp['status']=' ';
		if ($this->ot_connect()) {
			if ($this->ot_can('change','usr')){
				if ($this->ot_exist($key, 'usr')) {
					$atmp=$this->ot_readif('admin.json','usr/'.$key);
					return($atmp['status']);
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $atmp['status'] );
		return $atmp['status'];
	}	
	function UserChgStt($user,$Value){
		if ($this->ot_connect()){
			if ($this->ot_can('change','usr')){
				if ($this->ot_exist($user, 'usr')) {
					if ($this->ot_in($Value,$this->status)) {
						$atmp=$this->ot_changein('status',$Value,'admin.json','usr/'.$user);
					}
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function ErrAdd($key, $value){
		if ($this->ot_can('create','main')){
			$this->errtext=$this->ot_add($key,$value,$this->errtext,'error.json');
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}	
	function ErrChg($key, $value){
		if ($this->ot_can('change','main')){
			$this->errtext=$this->ot_change($key,$value,$this->errtext,'error.json');
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}	
	function ErrDlt($key){
		if ($this->ot_can('remove','main')){
			$this->errtext=$this->ot_delete($key,$this->errtext,'error.json');
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function UsrAddMn($User, $level){
		if ($this->ot_can('create','main')) {
			if ($this->ot_exist($User,'usr')) {
				if ($this->ot_in($level,$this->level)) {
					$this->ot_addin('main',$level,'features.json','usr/'.$User);
					$this->ot_addin($User,$level,'users.json');
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function UsrChgMn($User, $level){
		if ($this->ot_can('change','main')) {
			if ($this->ot_exist($User,'usr')) {
				if ($this->ot_in($level,$this->level)) {
					if ($this->not_value($User,'admin','C0010M036')) {				
						$this->ot_changein('main',$level,'features.json','usr/'.$User);
						$this->ot_changein($User,$level,'users.json');
					}
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}	
	function UsrDltMn($User){
		if ($this->ot_can('remove','main')) {
			if ($this->ot_exist($User,'usr')) {
				if ($this->not_value($User,'admin','C0010M036')) {				
					$this->ot_deletein('main','features.json','usr/'.$User);
					$this->ot_deletein($User,'users.json');
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}	
	function UsrShwFtr($User){
		$atmp = [];
		if ($this->ot_can('access','main')) {
			if ($this->ot_exist($User,'usr')) {
				$atmp=$this->ot_readif('features.json','usr/'.$User);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $atmp );
		return $atmp;
	}	
	function FtrShwUsr($Feature){
		$atmp = [];
		if ($this->ot_can('access','main')) {
			if ($this->ot_exist($Feature)) {
				$atmp=$this->ot_readif('users.json',$Feature);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $atmp );
		return $atmp;
	}	
	function UsrAddFtr($Feature, $User, $level){
		if ($this->ot_can('create',$Feature)) {
			if ($this->ot_exist($User,'usr')) {
				if ($this->ot_exist($Feature)) {
					if ($this->ot_in($level,$this->level)) {
						$this->ot_addin($Feature,$level,'features.json','usr/'.$User);								$this->ot_addin($User,$level,'users.json',$Feature);	
					}
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function UsrChgFtr($Feature, $User, $level){
		if ($this->ot_can('change',$Feature)) {
			if ($this->ot_exist($User,'usr')) {
				if ($this->ot_exist($Feature)) {
					if ($this->ot_in($level,$this->level)) {
						if ($this->not_value($User,'admin','C0010M036')) {				
							$this->ot_changein($Feature,$level,'features.json','usr/'.$User);		
							$this->ot_changein($User,$level,'users.json',$Feature);
						}
					}
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function UsrDltFtr($Feature, $User){
		if ($this->ot_can('remove',$Feature)) {
			if ($this->ot_exist($User,'usr')) {
				if ($this->ot_exist($Feature)) {
					if ($this->not_value($User,'admin','C0010M036')) {				
						$this->ot_deletein($Feature,'features.json','usr/'.$User);		
						$this->ot_deletein($User,'users.json',$Feature);
					}
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function FtrAddPrv($feature,$key,$value){
		if ($this->ot_exist($feature)) {
			if ($this->ot_can('change',$feature)) {
				$this->ot_addin($key,$value,'private.json',$feature);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function FtrChgPrv($feature, $key, $value){
		if ($this->ot_exist($feature)) {
			if ($this->ot_can('change',$feature)) {
				$this->ot_changein($key,$value,'private.json',$feature);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function FtrDltPrv($feature, $key){
		if ($this->ot_exist($feature)) {
			if ($this->ot_can('change',$feature)) {
				$this->ot_deletein($key,'private.json',$feature);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}	
	function FtrAddPbl($feature, $key, $value){
		if ($this->ot_exist($feature)) {
			if ($this->ot_can('change',$feature)) {
				$this->ot_addin($key,$value,'public.json',$feature);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}	
	function FtrChgPbl($feature, $key, $value){
		if ($this->ot_exist($feature)) {
			if ($this->ot_can('change',$feature)) {
				$this->ot_changein($key,$value,'public.json',$feature);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}	
	function FtrDltPbl($feature, $key){
		if ($this->ot_exist($feature)) {
			if ($this->ot_can('change',$feature)) {
				$this->ot_deletein($key,'public.json',$feature);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
}
?>