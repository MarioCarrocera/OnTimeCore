<?php
trait CoreA{

	function UserAdd($key, $password, $status, $fullname='None', $Nick='None')
	{
		if ($this->ot_connect()) {
			if ($this->ot_can(1,'usr')) {
				if ($this->not_exist($key, 'usr')) {
					if ($this->ot_create($key, 'usr')) {
						$tmparray=[];
						$tmparray['password']=MD5($password);
						$tmparray['status']=$status;
						$tmparray['nick']=$Nick;
						$tmparray['name']=$fullname;
						$tmparray['crtusr']=$this->id;
						$tmparray['crtdat']=$this->ot_now();
						$tmparray['owner']=$this->id;
						$tmparray['conected']=FALSE;
						$tmparray['lstcnc']='';
						$tmparray['lstdcn']='';
						$this->ot_write('admin.json',$tmparray,'usr/'.$key);	
					}
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	

	function UserDlt($User)
	{
		if ($this->ot_can(0,'usr')) {
			if ($this->not_value($User,'main',"C0010M026")) {
				if ($this->ot_exist($User,'usr')) {
					$atmp=$this->ot_readif('features.json','usr/'.$User);
					foreach ($atmp as $iKey=> $iValue) {
						$this->ot_deletein($User, 'users.json',$iKey);
					}
					$atmp=$this->ot_readif('groups.json','usr/'.$User);
					foreach ($atmp as $iKey=> $iValue) {
						$this->ot_deletein($User, 'users.json','grp/'.$iKey);
					}
					$this->ot_related($User);					
					$this->ot_remove($User, 'usr');
				}
			}
		}
		return $this->retval;
	}	

	function UserChkStt($key)
	{
		$atmp=' ';
		if ($this->ot_connect()) {
			if ($this->ot_can(1,'usr'))
				if ($this->ot_exist($key, 'usr')) {
				$atmp=$this->ot_readif('admin.json','usr/'.$key);
				return($atmp['status']);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $atmp );
		return $atmp;
	}

	function UserChgStt($key,$Value)
	{
		if ($this->ot_connect())
			if ($this->ot_can(1,'usr'))
		if ($this->ot_exist($key, 'usr')) {
			$atmp=$this->ot_readif('admin.json','usr/'.$key);
			$atmp['status'] = $Value;
			$this->ot_write('admin.json',$atmp,'usr/'.$key);
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	
	function ErrAdd($key, $value)
	{
		if ($this->ot_can(1,'main'))
			$this->errtext=$this->ot_add($key,$value,$this->errtext,'error.json');
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}

	function ErrChg($key, $value)
	{
		if ($this->ot_can(2,'main'))
			$this->errtext=$this->ot_change($key,$value,$this->errtext,'error.json');
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}

	function ErrDlt($key)
	{
		if ($this->ot_can(0,'main'))
			$this->errtext=$this->ot_delete($key,$this->errtext,'error.json');
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	
	function UsrShwMn()
	{
		$atmp = [];
		if ($this->ot_can(2,'main')) {
			$atmp=$this->ot_readif('users.json');
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $atmp );
		return $atmp;
	}
	
	function UsrShwFtr($User)
	{
		$atmp = [];
		if ($this->ot_can(2,'main')) {
			if ($this->ot_exist($User,'usr')) {
				$atmp=$this->ot_readif('features.json','usr/'.$User);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $atmp );
		return $atmp;
	}

	function FtrShwUsr($Feature)
	{
		$atmp = [];
		if ($this->ot_can(2,'main')) {
			if ($this->ot_exist($Feature)) {
				$atmp=$this->ot_readif('users.json',$Feature);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $atmp );
		return $atmp;
	}

	function UsrAddMn($User, $level)
	{
		if ($this->ot_can(2,'main')) {
			if ($this->ot_exist($User,'usr')) {
				$atmp=$this->ot_readif('features.json','usr/'.$User);
				$this->ot_add('main',$level,$atmp,'features.json','usr/'.$User);
				$atmp=$this->ot_readif('users.json');
				$this->ot_add($User,$level,$atmp,'users.json');
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	
	function UsrAddFtr($Feature, $User, $level)
	{
		if ($this->ot_can(0,$Feature)) {
			if ($this->ot_exist($User,'usr')) {
				if ($this->ot_exist($Feature)) {
					$atmp=$this->ot_readif('features.json','usr/'.$User);
					$this->ot_add($Feature,$level,$atmp,'features.json','usr/'.$User);								$atmp=$this->ot_readif('users.json',$Feature);
					$this->ot_add($User,$level,$atmp,'users.json',$Feature);
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function UsrChgMn($User, $level)
	{
		if ($this->ot_can(2,'main')) {
			if ($this->ot_exist($User,'usr')) {
				$atmp=$this->ot_readif('features.json','usr/'.$User);
				$this->ot_change('main',$level,$atmp,'features.json','usr/'.$User);
				$atmp=$this->ot_readif('users.json');
				$this->ot_change($User,$level,$atmp,'users.json');
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}

	function UsrChgFtr($Feature, $User, $level)
	{
		if ($this->ot_can(0,$Feature)) {
			if ($this->ot_exist($User,'usr')) {
				if ($this->ot_exist($Feature)) {
					$atmp=$this->ot_readif('features.json','usr/'.$User);
					$this->ot_change($Feature,$level,$atmp,'features.json','usr/'.$User);							$atmp=$this->ot_readif('users.json',$Feature);
					$this->ot_change($User,$level,$atmp,'users.json',$Feature);
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	function UsrDltMn($User)
	{
		if ($this->ot_can(2,'main')) {
			if ($this->ot_exist($User,'usr')) {
				$atmp=$this->ot_readif('features.json','usr/'.$User);
				$this->ot_delete('main',$atmp,'features.json','usr/'.$User);
				$atmp=$this->ot_readif('users.json');
				$this->ot_delete($User,$atmp,'users.json');
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}

	function UsrDltFtr($Feature, $User)
	{
		if ($this->ot_can(0,$Feature)) {
			if ($this->ot_exist($User,'usr')) {
				if ($this->ot_exist($Feature)) {
					$atmp=$this->ot_readif('features.json','usr/'.$User);
					$this->ot_delete($Feature,$atmp,'features.json','usr/'.$User);							$atmp=$this->ot_readif('users.json',$Feature);
					$this->ot_delete($User,$atmp,'users.json',$Feature);
				}
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	
	function FtrAddPrv($feature,$key,$value)
	{
		if ($this->ot_exist($feature)) {
			if ($this->ot_can(2,$feature)) {
				$this->ot_addin($key,$value,'private.json',$feature);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	
	function FtrChgPrv($feature, $key, $value)
	{
		if ($this->ot_exist($feature)) {
			if ($this->ot_can(3,$feature)) {
				$this->ot_changein($key,$value,'private.json',$feature);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	
	function FtrDltPrv($feature, $key)
	{
		if ($this->ot_exist($feature)) {
			if ($this->ot_can(1,$feature)) {
				$this->ot_deletein($key,'private.json',$feature);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}

	function FtrAddPbl($feature, $key, $value)
	{
		if ($this->ot_exist($feature)) {
			if ($this->ot_can(2,$feature)) {
				$this->ot_addin($key,$value,'public.json',$feature);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}

	function FtrChgPbl($feature, $key, $value)
	{
		if ($this->ot_exist($feature)) {
			if ($this->ot_can(3,$feature)) {
				$this->ot_changein($key,$value,'public.json',$feature);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}

	function FtrDltPbl($feature, $key)
	{
		if ($this->ot_exist($feature)) {
			if ($this->ot_can(0,$feature)) {
				$this->ot_deletein($key,'public.json',$feature);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
}
?>