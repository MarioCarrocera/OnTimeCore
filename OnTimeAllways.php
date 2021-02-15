<?php
trait Allways{
	function ot_extra($user)
	{
		$this->user=$this->ot_readif('public.json','usr/'.$user);
		$this->userp=$this->ot_readif('private.json','usr/'.$user);
		$this->groups=$this->ot_readif('groups.json','usr/'.$user);
		if (!array_key_exists('grp', $this->features)) {
			$this->safety=$this->ot_readif('features.json','usr/'.$user);
		} else {
			$this->safety=$this->MySafety();						
		}
	}

	function ot_related($user)
	{
		return(TRUE);
	}

	function ot_refrerence($group)
	{
		return(TRUE);
	}


}


