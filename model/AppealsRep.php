<?php
class AppealsRep extends Model {
	
	public static function getAppeals(){
		
		return self::getConnections()->fetchAll("SELECT a.id, a.type types FROM appealsType as a");
	}
	
	public static function getPurpose($id){
		
		return self::getConnections()->fetchAll("SELECT * FROM appealsPurpose as ap
												RIGHT JOIN appealsTP as tp
												ON tp.purpose_id = ap.id 
												WHERE tp.type_id = '". $id ."' ");
	}
	
	public static function getCategori($id){
		
		return self::getConnections()->fetchAll("SELECT * FROM appealsCatigory as ac
												RIGHT JOIN appealsPC as pc
												ON pc.categori_id = ac.id 
												WHERE pc.purpose_id = '". $id ."' ");
	}
	
	public static function getResults($id){
		
		return self::getConnections()->fetchAll("SELECT * FROM appealsResults as ar
												RIGHT JOIN appealsCR as cr
												ON cr.results_id = ar.id 
												WHERE cr.categori_id = '". $id ."' ");
	}
}

?>