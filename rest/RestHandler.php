<?php
require_once("Rest.php");
require_once("RestPDO.php");

class RestHandler extends Rest {

	function getAllData() {	
		//Create a new record
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$this->create();
		} else {
			//Get all data
			$db = new RestPDO();
			$rawData = $db->getData();
			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'No found!');		
			} else {
				$statusCode = 200;
			}

			$requestContentType = 'application/json';
			$response = $this->setHttpHeaders($requestContentType, $statusCode, $rawData);
					
			if(strpos($requestContentType,'application/json') !== false){
				$response = $this->encodeJson($response);
				echo $response;
			}
		}
	}
	
	public function getById($id) {
		$db = new RestPDO();
		$rawData = $db->getDataById($id);

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';
		$response = $this->setHttpHeaders($requestContentType, $statusCode, $rawData);
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($response);
			echo $response;
		}
	}

	public function search($id) {
		$db = new RestPDO();
		$rawData = $db->search($id);

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';
		$response = $this->setHttpHeaders($requestContentType, $statusCode, $rawData);
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($response);
			echo $response;
		}
	}

	public function create()
	{
		$name = $_POST['name'];
		$phone = $_POST['phone_number'];
		$result = false;
		if (isset($name) && isset($phone)) {
			$db = new RestPDO();
			$result = $db->create($name, $phone);
		}
			
		if(!$result) {
			$statusCode = 400;
			$result = array('error' => 'Connection problems or variable was not transferred');		
		} else {
			$statusCode = 200;
			$result = $name . ' and ' . $phone . ' have been recorded in the data base';
		}

		$requestContentType = 'application/json';
		$response = $this->setHttpHeaders($requestContentType, $statusCode, $result);
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($response);
			echo $response;
		}
	}

	public function update($id)
	{
		if ($_SERVER['REQUEST_METHOD'] == "PUT") {
			$test = file_get_contents('php://input');
			$tes = explode('&', $test);

			foreach ($tes as  $value) {
				$var[] = explode('=', $value);
			}

			$name = $var[0][1];
			$phone = $var[1][1];
			$result = false;

			if (isset($name) && isset($phone)) {
				$db = new RestPDO();
				$result = $db->update($id, $name, $phone);
			}
			if (!$result) {
				$statusCode = 400;
				$result = array('error' => 'Connection problems or variable was not transferred');		
			} else {
				$statusCode = 200;
				$result = 'data has been updated';
			}

			$requestContentType = 'application/json';
			$response = $this->setHttpHeaders($requestContentType, $statusCode, $result);
					
			if(strpos($requestContentType,'application/json') !== false){
				$response = $this->encodeJson($response);
				echo $response;
			}
		}
	}

	public function delete($id)
	{
		$db = new RestPDO();
		$result = $db->delete($id);
		
		if(!$result) {
			$statusCode = 400;
			$result = array('error' => 'Connection problems');	
		} else {
			$statusCode = 200;
			$result = 'have been deleted';
		}

		$requestContentType = 'application/json';
		$response = $this->setHttpHeaders($requestContentType, $statusCode, $result);
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($response);
			echo $response;
		}
	}

	public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;
	}
}
