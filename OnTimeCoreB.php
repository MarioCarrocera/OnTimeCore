<?php
trait CoreB{
	
	public $conected=FALSE;
	public $id='Anonimus';
	public $user=array();
	public $userp=array();
	public $name;
	public $nick;
	public $safety=array();
	public $features=array();
	public $content=array();
	public $groups=array();
	public $err;
	public $errtext=array();
	private $retval=TRUE;
	private $tmp=array();

	function Connect($User, $Password)
	{
		if ($this->check()) {
			if ($this->ot_connect(FALSE)) {
				$this->retval=$this->conected;
				if ($this->ot_exist($User,'usr')) {
					$atmp=$this->ot_read('admin.json','usr/'.$User);
					if ($this->ot_value($atmp['password'],MD5($Password),"C0010M012")) {
						if ($this->ot_value($atmp['status'],'active',"C0010M022")) {
							$this->id=$User;
							$this->nick=$atmp['nick'];
							$this->name=$atmp['name'];
							$this->ot_extra($User);
							$this->ot_addchangein($this->id, $this->ot_now(), 'online.json');
						}
					}
				}
				$this->conected=$this->retval;
			}
		}
		return $this->conected;
	}

	function DiscConnect()
	{
		if ($this->ot_connect()) {
			$this->conected=FALSE;
			$this->ot_deletein($this->id, 'online.json');
			$this->nick='';
			$this->name='';
			$this->user=[];
			$this->userp=[];
			$this->safety=[];
			$this->id='Anonimus';
		}
		return !$this->conected;
	}

	function Check()
	{
		$retval=TRUE;
		$this->err="0";
		if ($this->ot_qexist('content.json')) {
			$atmp = $this->ot_readif('content.json');
			foreach ($atmp as $iKey=> $iValue) if (!$this->ot_qexist($iKey)) $retval=false;
			if ($this->ot_qexist('features.json')) {
				$atmp = $this->ot_readif('features.json');
				foreach ($atmp as $iKey=> $iValue)
					if (!$this->ot_qexist($iKey)) $retval=false;
			} else {
				$retval=FALSE;
			}
			} else {
			$retval=FALSE;
		}
		if (!$retval) {
			$this->err="C0010M005";
			$this->errtext["C0010M005"]="Mising system file";
		}
		return $retval;
	}

	function PssChk($User, $Password)
	{
		if ($this->ot_exist($User,'usr')) {
			$atmp=$this->ot_read('admin.json','usr/'.$User);
			if ($this->ot_value($atmp['password'],MD5($Password),"C0010M012"))
				if ($this->ot_value($atmp['status'],'active',"C0010M022")) {}
			}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}

	function MyPssChg($old, $new)
	{
		if ($this->ot_connect())
		if ($this->ot_exist($this->id,'usr')){
			$atmp=$this->ot_read('admin.json','usr/'.$this->id);
			if ($this->ot_value($atmp['password'],MD5($old),"C0010M012"))
				if ($this->ot_value($atmp['status'],'active',"C0010M022")) {
				$atmp['password']=MD5($new);
				$this->ot_write('admin.json',$atmp,'usr/'.$this->id);
				$this->retval=TRUE;
			}
		}	
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}

	function FrcPssChg($user,$old, $new)
	{
		if ($this->ot_exist($user,'usr')) {
			$atmp=$this->ot_read('admin.json','usr/'.$user);
			if ($this->ot_value($atmp['password'],MD5($old),"C0010M012"))
				if ($this->ot_value($atmp['status'],'force',"C0010M025")) {
				$atmp['password']=MD5($new);
				$atmp['status']='active';
				$this->ot_write('admin.json',$atmp,'usr/'.$user);
				$this->retval=TRUE;
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}

	function MyChgInf($name, $nick)
	{
		if ($this->ot_connect()) {
			if ($this->ot_exist($this->id,'usr')) {
				$atmp=$this->ot_readif('admin.json','usr/'.$this->id);
				$atmp['name']=$name;
				$atmp['nick']=$nick;
				$this->ot_write('admin.json',$atmp,'usr/'.$this->id);
				$this->retval=TRUE;
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	
	function __construct($container='ontime')
	{
		$this->container=$container;
		$this->container='ontime';
		if ($this->Check())
		$this->content=$this->ot_readif('content.json');
		$this->errtext=$this->ot_readif('error.json');
		$this->features=$this->ot_readif('features.json');
	}
	
	function UserShwPbl($User)
	{
		$atmp=[];
		if ($this->ot_connect()) {
			if ($this->ot_exist($User,'usr')) {
				$atmp=$this->ot_readif('public.json','usr/'.$User);
				$atmp2=$this->ot_readif('admin.json','usr/'.$User);
				$atmp['name']=$atmp2['name'];
				$atmp['nick']=$atmp2['nick'];
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $atmp );
		return $atmp;
	}

	function MyAddPbl($key, $value)
	{
		if ($this->ot_connect()) {
			$this->user=$this->ot_add($key,$value,$this->user,'public.json','usr/'.$this->id);
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}

	function MyChgPbl($key, $value)
	{
		if ($this->ot_connect()) {
			$this->user=$this->ot_change($key,$value,$this->user,'public.json','usr/'.$this->id);
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}

	function MyDltPbl($key)
	{
		if ($this->ot_connect()) {
			$this->user=$this->ot_delete($key,$this->user,'public.json','usr/'.$this->id);
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}

	function MyAddPrv($key, $value)
	{
		if ($this->ot_connect()) {
			$this->userp=$this->ot_add($key,$value,$this->userp,'private.json','usr/'.$this->id);
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}

	function MyChgPrv($key, $value)
	{

		if ($this->ot_connect()) {
			$this->userp=$this->ot_change($key,$value,$this->userp,'private.json','usr/'.$this->id);
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}

	function MyDltPrv($key)
	{
		
		if ($this->ot_connect()) {
			$this->userp=$this->ot_delete($key,$this->userp,'private.json','usr/'.$this->id);
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}

	function FtrShwPbl($feature)
	{
		$this->retval=[];
		$this->retval=$this->ot_readif('public.json',$feature);;
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}
	
	function FtrShwPrv($feature)
	{
		$this->retval=[];
		if ($this->ot_can(9,$feature)) {
			if ($this->ot_exist($feature)) {
				$this->retval=$this->ot_readif('private.json',$feature);
			}
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $this->retval );
		return $this->retval;
	}

	function UsrShwNln()
	{
		$tmp=$this->ot_readif('online.json');
		$value=[];
		foreach ($tmp as $iKey=> $iValue) {
			$value[$iKey]=$this->ot_name('usr',$iKey);
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $value );
		return $value;
	}
	
	function UsrShwAll()
	{
		$tmp=$this->ot_getin('ontime/usr');
		$value=[];
		foreach ($tmp as $iKey=> $iValue) {
			$value[$iKey]=$this->ot_name('usr',$iKey);
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $value );
		return $value;
	}
	
	function FrtShwAll()
	{
		$tmp=$this->ot_getin('ontime');
		$value=[];
		foreach ($tmp as $iKey=> $iValue) {
			$value[$iKey]=$this->ot_name($iKey);
		}
		$this->ot_log( __METHOD__ , __FUNCTION__ , func_get_args() , $value );
		return $value;
	}

}
?>