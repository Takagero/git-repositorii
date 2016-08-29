<?php
class UserManagerRep extends Model {
	
		public static function getManagers(){
		$tablName = self::getTableName();
		return self::getConnections()->fetchAll("SELECT asu.user_id id, asu.login nameM, asu.procent procent, asu.rolle rolle 
												FROM $tablName asu");
        
	}
	
	public static function getManagersId($id){
		$tablName = self::getTableName();
		
		return self::getConnections()->fetchAll("SELECT * 
												FROM `$tablName`  
												WHERE user_id = '". $id ."' LIMIT 1 ");
        
	}
	
	public function editManager($id, $name, $pass, $procent, $access){
		$tablName = self::getTableName();
		$data_execute[] = trim($name);
		$data_execute[] = trim($pass);
		$data_execute[] = trim($procent);
		$data_execute[] = trim($access);
		$data_execute[] = $id;
		
		$query = self::getConnections()->Qprepare("UPDATE $tablName 
													SET login = ?, pass = ?, procent = ?, rolle = ? 
													WHERE user_id = ? ");
		return $query->execute(array($data_execute[0], $data_execute[1], $data_execute[2], $data_execute[3], $data_execute[4]));
		
	}
}