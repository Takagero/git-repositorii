<?php
class PecController extends Controller {
	
	protected $ampersand = "&";
	protected $places = "places[0][]="; // Заготовка
	protected $kg = "places[0][]=35"; // Заготовка
	protected $negabarit = "places[0][]=1"; // Отметка о негабаритности груза
	protected $ju = "places[0][]=1"; // Отметка о жесткой упаковке
	protected $tebt = "take[tent]=0"; // 
	protected $takeTown = "take[town]=-457"; //Город отправления Москва
	protected $deliveryTown = "deliver[town]=";
	
	public function actionIndex(){
		
		$this->render("layout/header", array('title'=>"Калькулятор доставки ПЭК v1.0", 'header_text'=> __CLASS__,));
		$this->renderTemplate("pec", array());
		$this->render("layout/footer", array('footer_text'=>"Footer Content",));
	}
	
	public function actionBuildUrl(){
		
		if (isset($_POST['gorod'])) {
			$deliveryTown = $_POST['gorod'];
		}else {
			$deliveryTown = '';
		}
		
		if (isset($_POST['dlina'])) {
			$dlina = $_POST['dlina'];
		}else {
			$dlina = '';
		}
		
		if (isset($_POST['shirina'])) {
			$shirina = $_POST['shirina'];
		}else {
			$shirina = '';
		}
		
		if (isset($_POST['visota'])) {
			$visota = $_POST['visota'];
		}else {
			$visota = '';
		}
		
		$apiPec = new ApiPec();
		$townKey = $apiPec->getTown($deliveryTown);
		
		if (!$townKey) {
			return false;
		}
		
		$calculate = new Calculate();
		$obiem = $calculate->volumeCalculation($dlina, $shirina, $visota);
		$obiem = $this->places . $obiem;
		
		$urlBildRequest = "?" . $this->places . $dlina . $this->ampersand . $this->places . $shirina . $this->ampersand . $this->places . $visota . $this->ampersand . $this->places . $obiem . $this->ampersand . $this->kg . $this->ampersand . $this->negabarit . $this->ampersand . $this->ju . $this->ampersand . $this->takeTown . $this->ampersand . $this->deliveryTown . $townKey[0];
		
		$infoDelivrey = $apiPec->infoDelivery($urlBildRequest);
	}
	
	public function actionGetTown(){
		
		if (isset($_POST['str'])) {
			$str = $_POST['str'];
		}else {
			$str = '';
		}
		
		$apiPec = new ApiPec();
		$apiPec->getTown($str);
	}
}
?>