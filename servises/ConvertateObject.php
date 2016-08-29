<?php
class ConvertateObject {
	
	public function stdClass($obj){
		
		$array = (array)$obj;
		
		foreach($array as $key => &$field){
			
			if(is_object($field))$field = $this->stdClass($field);
		}
		return $array;
	}
}