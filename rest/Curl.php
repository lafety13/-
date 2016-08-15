<?php

class Curl 
{
	public function get()
	{
		$curl = new Curl();	
		$url = 'http://localhost/rest/api/users/';
	    $ch = curl_init($url);  
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    //get response from resource
	    $response = curl_exec($ch);
	    //decode
	    $phonebook = json_decode($response); 
	    curl_close ($ch);
		return $phonebook;
	}

	public function search()
	{
		if (isset($_POST['search_sub'])) {
			$search = $_POST['search'];
			$url = "http://localhost/rest/api/users/search/$search/";
	        $ch = curl_init($url);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        //get response from resource
	        $response = curl_exec($ch);
	        //decode
	        $phonebook = json_decode($response);
	        curl_close ($ch);

			return $phonebook;
		}
	}

	public function delete($id)
	{
		$url = "http://localhost/rest/api/users/delete/$id/"; 
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
		$response = curl_exec($ch);
		curl_close($ch);
		header('location: /phonebook');
		return $response;
	}

	public function updateData($id)
	{
		$url = "http://localhost/rest/api/users/getid/$id/";
	    $client = curl_init($url);
	    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
	    //get response from resource
	    $response = curl_exec($client);
	    //decode
	    $phonebook = json_decode($response);
		$phonebook = $phonebook->data[0];
		curl_close($client); 

		return $phonebook;
	}

	public function update($id)
	{
		if (isset($_POST['edit_sub'])) {
			if (empty($_POST['name']) || empty($_POST['phone_number'])) {
				return false;
			}
			$url = "http://localhost/rest/api/users/$id/";
	        $data = $_POST;
		    $ch = curl_init($url);

		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		    
		    $response = curl_exec($ch);
		    curl_close ($ch);
		    header('location: /phonebook');
		    return $response;
		}
	}

	public function create()
	{
		if (isset($_POST['create_sub'])) {
			if (empty($_POST['name']) || empty($_POST['phone_number'])) {
				return false;
			}
			$data = $_POST;
			$url = "http://localhost/rest/api/users/";  
			  
			$ch = curl_init();  
			  
			curl_setopt($ch, CURLOPT_URL, $url);  
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
			curl_setopt($ch, CURLOPT_POST, 1);  
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  
			  
			$response = curl_exec($ch);  
			curl_close($ch);  
			
			header('location: /phonebook');
			return $response; 
		}
	}

}