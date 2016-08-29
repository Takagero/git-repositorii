<?php
class UserManagerController extends Controller {
	
	public function actionIndex(){
		
		$managers = UserManagerRep::getManagers();
		
		$this->render("layout/header", array('title'=>"Менеджер пользователей v1.0", 'header_text'=> __CLASS__,));
		$this->renderTemplate("managerList", $managers);
		$this->render("layout/footer", array('footer_text'=>"Footer Content",));
	}
	
	public function actionManagerEdit(){
		$id = $this->params;
		$array['managers'] = UserManagerRep::getManagersId($id);
		
		if (isset($_GET['newPass'])) {
			$newPass = $_GET['newPass'];
			$generatePAss = new GeneratePass();
			$array['passMD'] = $generatePAss->generate($newPass);
		}
		
		$this->render("layout/header", array('title'=>"Менеджер пользователей v1.0", 'header_text'=> __CLASS__,));
		$this->renderTemplate("managerEdit", $array);
		$this->render("layout/footer", array('footer_text'=>"Footer Content",));
		
		if (isset($_POST['saveEdit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['name'])) {
				$name = $_POST['name'];
			}else {
				$name = '';
			}
			if (isset($_POST['id'])) {
				$id = $_POST['id'];
			}else {
				$id = '';
			}
			if (isset($_POST['pass'])) {
				$pass = $_POST['pass'];
			}else {
				$pass = '';
			}
			if (isset($_POST['procent'])) {
				$procent = $_POST['procent'];
			}else {
				$procent = '';
			}
			if (isset($_POST['dostup'])) {
				$access = $_POST['dostup'];
			}else {
				$access = '';
			}
			
			$result['save'] = UserManagerRep::editManager($id, $name, $pass, $procent, $access);
		}
	}
	
	public function actionManagerAdd(){
		echo "OK";
		
	}
	
	public function actionManagerDelete(){
		
		
	}
	
	public function actionAppealsList(){
		
		$this->render("layout/header", array('title'=>"Менеджер пользователей v1.0", 'header_text'=> __CLASS__,));
		$this->renderTemplate("appealsList", array());
		$this->render("layout/footer", array('footer_text'=>"Footer Content",));
	}
	
}
?>