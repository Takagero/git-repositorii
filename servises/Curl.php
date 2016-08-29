<?php
class Curl {
	
	public function get_curl($url, $data = null){
	$headers = array("Content-Type: application/json; charset=utf-8");
	//Инициализируем библиотеку
	$curl = curl_init();
	
	//Установка параметров
//	$cookie = dirname(_DIR_)."/cookie.txt";
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1); //обратиться к странице и вернуть контент
	curl_setopt($curl,CURLOPT_FOLLOWLOCATION, 1); // переход по редиректам
	curl_setopt($curl,CURLOPT_URL, $url . $data); // передаем сам урл
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false); // для обращения к https
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, false); // для обращения к https
//	curl_setopt($curl,CURLOPT_COOKIEFILE, $cookie); //для записи куки с сайта и помещать их в файл
//	curl_setopt($curl,CURLOPT_COOKIEJAR, $cookie); //для записи куки с сайта и помещать их в файл
	$response = curl_exec($curl); // для выполнения инструкций
	$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	
	curl_close($curl);
	
	return array("code"=>$code,"response"=>$response);
	}
}
?>