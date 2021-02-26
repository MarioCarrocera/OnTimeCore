<?php
trait Functions{
	protected function ot_connect($value=TRUE){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		$retval = TRUE;
		if ($value){
			if (!$this->conected){
				$retval=FALSE;
				$this->err='C0010M011';
			}
		}else{
			if ($this->conected){
				$retval=FALSE;
				$this->err='C0010M021';
			}
		}
		$this->retval=$retval;
		return $retval;
	}	
	protected function ot_qexist($file, $inside='no'){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		if($inside=='no'){
			return(file_exists($this->container.'/'.$file));
		}else{
			return(file_exists($this->container.'/'.$inside. '/'.$file));
		}
	}	
	protected function ot_exist($file, $inside='no'){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		$this->err="C0010M008";
		$retval=FALSE;
		if ($inside=='no'){
			if (file_exists($this->container.'/'.$file)){
				$retval = TRUE;
				$this->err="0";
			};
		} else{
			if (file_exists($this->container.'/'.$inside. '/'.$file)){
				$retval = TRUE;
				$this->err="0";
			}
		}
		$this->retval=$retval;
		return $retval;
	}	
	protected function not_exist($file, $inside='no'){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		$retval=FALSE;
		$this->err="C0010M007";
		if ($inside=='no') {
			if (!file_exists($this->container.'/'.$file)) {
				$retval = TRUE;
				$this->err="0";
			};
		} else {
			if (!file_exists($this->container.'/'.$inside. '/'.$file)) {
				$retval = TRUE;
				$this->err="0";
			}
		}
		$this->retval=$retval;
		return $retval;
	}	
	protected function ot_can($can, $safety){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		if($this->conected){
			if(array_key_exists($safety, $this->safety)){
				$value1 = $this->level[$this->safety[$safety]];
				$value2 = $this->level[$can];
				if($value1>$value2){
					$this->err="C0010M012";
				}else{
					$this->retval=TRUE;
				}
			}else{
				$this->err="C0010M012";
			}
		}else{
			$this->err='C0010M011';
		}
		return $this->retval;
	}	
	protected function ot_group($can, $group){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		if($this->conected){
			if(array_key_exists($group, $this->groups)){
				$value1 = $this->level[$this->groups[$group]];
				$value2 = $this->level[$can];
				if($value1>$value2){
					$this->err="C0010M012";
				}else{
					$this->retval=TRUE;
				}
			}else{
				$this->err="C0010M012";
			}
		}else{
			$this->err='C0010M011';
		}
		return $this->retval;
	}	
	protected function ot_remove($content, $inside='no'){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		if($inside=='no'){
			$content=$this->container.'/'.$content;
		}else{
			$content=$this->container.'/'.$inside. '/'.$content;
		}
		if(file_exists($content)){
			$this->ot_destroy($content);
		}else{
			$this->err="C0010M008";
		}
		return $this->err;
	}	
	protected function ot_deleteinside($content, $inside='no'){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		if($inside=='no'){
			$content=$this->container.'/'.$content;
		}else{
			$content=$this->container.'/'.$inside. '/'.$content;
		}
		if(file_exists($content)){
			unlink($content);
		}else{
			$this->err="C0010M008";
		}
		return $this->err;
	}	
	protected function ot_create($content, $inside='no'){
		$this->ot_funct( __METHOD__ , __FUNCTION__ , func_get_args() );
		if($inside=='no'){
			$content=$this->container.'/'.$content;
		}else{
			$content=$this->container.'/'.$inside. '/'.$content;
		}		if(! mkdir($content , 0777)){
			$this->err="C0010M012";
			$this->retval=FALSE;
		}
		return $this->retval;
	}	
	protected function ot_destroy($what){
		$this->ot_funct( __METHOD__ , __FUNCTION__ , func_get_args() );
		foreach(glob($what . "/*")as $eachone){
			if(is_dir($eachone)){
				ot_destroy($eachone);
			}else{
				unlink($eachone);
			}
		}
		rmdir($what);
	}	
	protected function ot_getin($what){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		$retval=[];
		foreach (glob($what . "/*")as $eachone) {
			if (is_dir($eachone)) {
				$eachone = str_replace ( $what."/" , '',  $eachone);
				$retval[$eachone]=$eachone;
			}
		}
		return $retval;
	}
	protected function ot_now($how='Y-m-d H:i:s'){
		$now=new DateTime();
		$fecha=$now->format($how);
		return $fecha;
	}	
	protected function ot_RandomString($large){
		$characters='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randstring='X';
		for ($i=0;$i<$large;$i++){
			$randstring=$randstring.$characters[rand(0,strlen($characters)-1)];}
		return $randstring;
	}	
	protected function ot_clean($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}	
	protected function ot_value($data,$value,$error){
		$this->ot_funct( __METHOD__ , __FUNCTION__ , func_get_args() );
		if ($data!=$value) {
			$this->retval=FALSE;
			$this->err=$error;
		}
		return $this->retval;
	}	
	protected function not_value($data, $value, $error){
		$this->ot_funct( __METHOD__ , __FUNCTION__ , func_get_args() );
		if ($data==$value) {
			$this->retval=FALSE;
			$this->err=$error;
		}
		return $this->retval;
	}
	protected function ot_name($inside, $name='no'){
		$retval='Not exist';
		if ($name=='no') {
			$tmp=$this->ot_read('admin.json',$inside);
		} else {
			$tmp=$this->ot_read('admin.json',$inside.'/'.$name);
		}
		$retval = $tmp['name'].'('.$tmp['nick'].')';
		return $retval;
	}
	protected function ot_maxvalue($data, $value, $error){
		$this->ot_funct( __METHOD__ , __FUNCTION__ , func_get_args() );
		if ($data>$value) {
			$this->retval=FALSE;
			$this->err=$error;
		}
		return $this->retval;
	}	
	protected function ot_in($value, $data, $error='C0010M008'){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		$retval = -1;
		if (is_array($data)){
			if (array_key_exists($value, $data)){
				$this->retval=TRUE;
				$retval = $data[$value];
			} else {
				$this->err=$error;						
			}
		} else {
			$this->err='C0010M016';			
		}
		return $retval;
	}	
	protected function ot_in_mygroup($data, $error='C0010M008'){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		$retval = 100;
		if (is_array($data)){
			foreach ($this->groups as $clave => $valor) {
				if (array_key_exists($clave, $data)){
					$this->retval=TRUE;
					if ($retval > $data[$value]){
						$retval = $data[$value];
					}
				} else {
					$this->err=$error;						
				}
			}
		} else {
			$this->err='C0010M016';			
		}
		return $retval;
	}	
	protected function ot_in_group($data, $user ,$error='C0010M008'){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		$retval = 100;
		if (is_array($data)){
		 	$tmp=$this->ot_readif('groups.json','usr/'.$user);
			foreach ($tmp as $clave => $valor) {
				if (array_key_exists($clave, $data)){
					$this->retval=TRUE;
					if ($retval > $data[$value]){
						$retval = $data[$value];
					}
				} else {
					$this->err=$error;						
				}
			}
		} else {
			$this->err='C0010M016';			
		}
		return $retval;
	}	
	protected function not_in($value, $data, $error='C0010M007'){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		if (is_array($data)){
			if (array_key_exists($value, $data)){
				$this->err=$error;						
			} else {
				$this->retval=TRUE;
			}
		} else {
			$this->err='C0010M016';			
		}
		return $this->retval;
	}	
	protected function ot_inside($value, $data, $back, $error= 'C0010M026'){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		$retval = '';
		if (is_array($data)){
			if (array_key_exists($value, $data)){
				$record = $data[$value];
				if (is_array($data)){
					if (array_key_exists($back, $record)){
						$this->retval=TRUE;
						$retval = $record[$back];
					} else {
						$this->err=$error;											
					}
				} else {
					$this->err='C0010M016';						
				}
			} else {
				$this->err='C0010M008';						
			}
		} else {
			$this->err='C0010M016';			
		}
		return $retval;
	}	
	protected function ot_isopen($level){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		if ($this->opent==TRUE){
			if ($this->levelt<=$level){
				$this->retval=TRUE;
			} else {
				$this->err='C0010M030';				
			}
		} else {
			$this->err='C0010M032';
		}
		return $this->retval;
	}	
	protected function ot_getlike($what,$in){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		$retval=[];
		foreach (glob($what . "/*")as $eachone) {
			if (is_dir($eachone)) {
				$eachone = str_replace ( $what."/" , '',  $eachone);
				$retval[$eachone]=$eachone;
			}
		}
		return $retval;
	}	
	protected function ot_feature($feature){
		$this->ot_func( __METHOD__ , __FUNCTION__ , func_get_args() );
		if (array_key_exists($feature, $this->features)){
			$this->err='0';						
			$this->retval = TRUE;			
		} else {
			$this->err='C0010M019';						
			$this->retval = FALSE;			
		}
		return $this->retval;
	}
}	
