<?php
class GeneratePass {
	
	public function generate($pass){
		if (empty($pass)) {
			return false;
		}
		$pass = trim($pass);
		return $passMD = md5(md5($pass));
	}
}