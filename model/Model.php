<?
include_once("Tinstance.php");

abstract class Model {
	
	use Tinstance;
	
	public static function getTableName(){
		
		return "a_sd_users";
	}
	
	public static function getArticles(){
		
		$tableName = self::getTableName();
		
		return self::getConnections()->fetchAll(
		"SELECT * FROM {$tableName}"
		);
	}
	
	public static function getArticleId($id){
		
		$tableName = self::getTableName();
		return self::getConnections()->fetchObj(
		"SELECT * FROM {$tableName} WHERE id = {$id}", __CLASS__
		);
	}
}
?>