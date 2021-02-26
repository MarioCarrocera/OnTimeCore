<?php
trait Debug{
	function ot_show($trac, $level=1){
		echo "<br>";
		if(is_array($trac)){
			foreach ($trac as $clave=> $valor){
				if (is_array($valor)){
					echo str_repeat (' ', 5*($level-1) ).($level).".- $clave :" ."<br>";
					$this->ot_show($valor,($level+1));
				} else{
					echo str_repeat (' ', 5*($level-1) ).($level)."D.- {$clave}=>{$valor}"."<br>";
				}
			}
		} else {
				echo "Empty"."<br>";			
		}
	}	
	function ot_error($retval=''){
		if ($this->err=="0") {
			echo $retval.'<br>';
		} else{
			echo '<br>';
			if (array_key_exists($this->err, $this->errtext)) {
				echo ($this->err.'.-'.$this->errtext[$this->err]).'<br>';
			} else{
				echo ($this->err.'.-Error not defined').'<br>';
			}
		}
	}
	function ot_func($in,$from,$parameters){
		$this->err='0';
		$this->retval=FALSE;
	}
	function ot_funct($in,$from,$parameters){
		$this->err='0';
		$this->retval=TRUE;
	}
	function ot_log($in,$from,$parameters,$ret){
		return(TRUE);
	}
}
