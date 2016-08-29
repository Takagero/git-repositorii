<?php
class ApiPec {
	
	protected $UrlGetTown = "http://www.pecom.ru/ru/calc/towns.php"; // url для запроса городов
	protected $urlCalcPec = "http://calc.pecom.ru/bitrix/components/pecom/calc/ajax.php";
	
	public function getTown($rgs){
		
		$curl = new Curl();
		$townsJson = $curl->get_curl($this->UrlGetTown);
		$townsObject = json_decode($townsJson['response']);
		
		$convert = new ConvertateObject();
		$townsArray = $convert->stdClass($townsObject); // Отправляем объект на конвертацию в массив

		foreach ($townsArray as $towns => $citys){
//			var_dump($citys);
//			if ($towns = ) {
//				
//			}
//			if ($towns == $rgs) {
				foreach ($citys as $keyC => $cityN) {
					if (preg_match_all("[$rgs]", $cityN, $matches) == true) {
						$data[] = $keyC;
//						$data['city'] = $cityN;
					}
				}
//			}
		}
		return $data;
	}
	
	public function infoDelivery($args){
		
		$curl = new Curl();
		$pecJson = $curl->get_curl($this->urlCalcPec, $args);
		
		echo $pecJson['response'];
	}
}
?>