<?php
trait Valid{
	
	protected function ot_valid()
	{
		if (!$this->validate) {
			$this->err='C0010M026';	
		}
		$retval=$this->validate;
		return $retval;
	}
	
	protected function ot_record($data, $record)
	{
		return TRUE;
	}

	
}	
