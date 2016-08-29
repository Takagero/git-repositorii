<?php
abstract class Controller {
	protected $templateRoot = "templates";
	protected $action;
	protected $params;
	protected $defaultAction = "index";
	protected $useLayout = true;
	
	public function setAction($action){
		$this->action = $action;
		return $this->action;
	}
	public function setParams($params){
		$this->params = $params;
		return $this->params;
	}
	
	public function run(){
		$method = 'action' . ucfirst($this->action);
		
		if (empty($this->action)) {
			$this->action = $this->defaultAction;
			$method = 'action' . ucfirst($this->action);
		}
		if (!method_exists($this, $method)) {
			throw new Exception("Method $method not found 404");
		}
		$this->$method();
	}
	
	protected function render($name, $args = null){
		if ($this->useLayout) {
			
			$this->renderTemplate($name, $args);
		}else {
			$this->renderTemplate($name, $args);
		}
	}
	
	protected function renderTemplate($name, $args = array()){
		$template = site_path . $this->templateRoot . DIRSEP . $name . ".php";
		
//		ob_start();// Буферизация
		require($template);
//		return ob_get_clean();//очищает буфер
		
	}
	
	abstract public function actionIndex();
}