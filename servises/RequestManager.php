<?php
class RequestManager{
	
//	use Tinstance;
	
	protected $requestUri;
	
	protected $defaultController = "UserManager";
	protected $defaultAction = "Index";
	
	protected $controller;
	protected $action;
	protected $params;
	
	protected $rules = array(
//		"pattern" => '#^(?P<controller>\w+)/(?P<action>\w+)[/]?(?P<params>.*)#u',
		"pattern" => "#^(/)#",
		"explod" => "/"
	);
	
	public function __construct(){
		
//		$rule = "#^(\w+)/(\w+)[/]?(.*)#u";
		$this->requestUri = preg_replace($this->rules['pattern'], '', $_SERVER['REQUEST_URI']);
		$result = explode("/", $this->requestUri);
		
		$defaultController = $this->defaultController;
		$defaultAction = $this->defaultAction;
//		var_dump($result);
		
		if (empty($result[1])) {
			
			$this->setAction($defaultAction);
			$this->setController($defaultController);
			$this->setParams('');
		}else{
			$this->controller = $result[1];
			$this->action = $result[2];
//			$this->params = $result[3];
		}
	}
	
	public function getRequestUri(){
		
		return $this->requestUri;
	}
	
	public function getController(){
		
		return $this->controller;
	}
	
	public function getActoin(){
		
		return $this->action;
	}
	
	public function getParams(){
		
		return $this->params;
	}
	
	public function setController($var){
		
		$this->controller = $var;
		return true;
	}
	
	public function setAction($var){

		$this->action = $var;
		return true;
	}
	
	public function setParams($var){

		$this->params = $var;
		return true;
	}
}

?>