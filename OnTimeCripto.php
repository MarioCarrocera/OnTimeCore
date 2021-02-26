<?php
trait Cripto{	
	protected function ot_read($file, $inside='no'){
		$this->ot_funct( __METHOD__ , __FUNCTION__ , func_get_args() );
		if ($inside=='no') {
			$file=$this->container.'/'.$file;
		} else {
			$file=$this->container.'/'.$inside. '/'.$file;
		}
		$vread=[];
		if (file_exists($file)) {
			$stream=fopen($file,"r");
			if ($stream) {
				$vread='';
				while (!feof($stream)) {
					$vread.=fgets($stream);
				}
				$vread=json_decode($vread,true);
				fclose($stream);
			} else {
				$this->err='C0010M001';
			}
		} else {
			$this->err='C0010M005';
		}
		return $vread;
	}	
	protected function ot_readif($file, $inside='no'){
		$this->ot_funct( __METHOD__ , __FUNCTION__ , func_get_args() );		
		if ($inside=='no') {
			$file=$this->container.'/'.$file;
		} else {
			$file=$this->container.'/'.$inside. '/'.$file;
		}
		$aread=[];
		if (file_exists($file)) {
			$stream=fopen($file,"r");
			if ($stream) {
				$vread='';
				while (!feof($stream)) {
					$vread.=fgets($stream);
				}
				$aread=json_decode($vread,true);
				fclose($stream);
			} else {
				$this->err='C0010M001';
			}
		}
		return $aread;
	}	
	protected function ot_write($file, $data, $inside="no"){
		$this->ot_funct( __METHOD__ , __FUNCTION__ , func_get_args() );
		if ( ($inside!='no' and $this->ot_exist($inside)) or ($inside=='no')) {
			if ($inside=='no') {
				$file=$this->container.'/'.$file;
			} else {
				$file=$this->container.'/'.$inside. '/'.$file;
			}
			$this->err='0';
			$stream=fopen($file, "w");
			if ($stream) {
				$save=fwrite($stream,json_encode($data,JSON_UNESCAPED_SLASHES));
				if ($save) {
					$this->retval=FALSE;
					fclose($stream);
				} else {
					$this->err='C0010M003';
				}
			} else {
				$this->err='C0010M002';
				$this->errtext['C0010M002']='Failing create content';
			}
		} else {
			$this->err='C0010M002';
			$this->errtext['C0010M002']='Failing create content';			
		}
		return $this->err;
	}
}	
