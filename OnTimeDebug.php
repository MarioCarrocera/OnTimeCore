<?php
trait Debug{
	function ot_show($trac, $level=1)
	{
		if(is_array($trac)){
			foreach ($trac as $clave=> $valor){
				if (is_array($valor)){
					echo ($level).".- $clave :" ."<br>";
					$this->ot_show($valor,($level+1));
				} else{
					echo "{$clave}=>{$valor}"."<br>";
				}
			}
		} else {
				echo "Empty"."<br>";			
		}
	}

	function ot_error($retval='')
	{
		if ($this->err=="0") {
			echo $retval.'<br>';
		} else{
			if (array_key_exists($this->err, $this->errtext)) {
				echo ($this->err.'.-'.$this->errtext[$this->err]).'<br>';
			} else{
				echo ($this->err.'.-Error not defined').'<br>';
			}
		}
	}

	function ot_log($in,$from,$parameters,$ret)
	{
		return(TRUE);
	}


}


