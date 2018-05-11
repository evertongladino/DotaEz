<?php

include_once ('../dotaserver/model/request.php');
include_once ('../dotaserver/database/db_manager.php');

class ResourceController
{	
 	private $METHODMAP = ['GET' => 'search' , 'POST' => 'create' , 'PUT' => 'update', 'DELETE' => 'remove' ];
	
	public function treat_request($request) {
		if($request->getMethod() == "POST" && $request->getOperation() == "login")
		{
			return $this->login($request);
		}
		return $this->{$this->METHODMAP[$request->getMethod()]}($request);
	
	}

	private function search($request) {
		$query = 'SELECT * FROM '.$request->getResource().' WHERE '.self::queryParams($request->getParameters());
		return self::selection_query($query);

	}

	public function login($request) {
		$query = 'SELECT * FROM '.$request->getResource().' WHERE '.self::bodyParams($request->getBody());
		return self::selection_query($query);
		
	}	

	private function selection_query($query) {
		try{
		$conn = (new DBConnector())->query($query);
		$results = $conn->fetchAll(PDO::FETCH_ASSOC);

		return $results;

		}catch(PDOException $e)
		{
			echo "Error: ".$e->getMessage();
		}
	}
	
	private function queryParams($params) {
		$query = "";		
		foreach($params as $key => $value) {
			$query .= $key.' = '."'".$value."'".' AND ';	
		}
		$query = substr($query,0,-5);
		if($query==null) {
			$query.=1;
		}
		return $query;
	}

	private function bodyParams($json)
	{
		$criteria = "";
                	$array = json_decode($json, true);
                	foreach($array as $key => $value)
                	{
                                $criteria .= $key." = '".$value."' AND ";
                	}
                return substr($criteria, 0, -5);
	}


	private function update($request) {
               $body = $request->getBody();
               $resource = $request->getResource();
               $query = 'UPDATE '.$resource.' SET '. $this->getUpdateCriteria($body);
		//var_dump($query);
		//die();
		return self::execution_query($query);
        }

	private function create($request) {		
		$body = $request->getBody();
		$resource = $request->getResource();		
		$query = 'INSERT INTO '.$resource.' ('.$this->getColumns($body).') VALUES ('.$this->getValues($body).')';
		return self::execution_query($query);

	}


	private function execution_query($query) {
		$conn = (new DBConnector());
		if ($conn->query($query) == TRUE) {
    			echo "New record created successfully!";
		} else {
    			echo "Error: " . $query . "<br>";
		}
	}

	private function getUpdateCriteria($json)
	{
		$criteria = "";
		$where = " WHERE ";
		$array = json_decode($json, true);
		foreach($array as $key => $value) {
			if($key != 'idt')
				$criteria .= $key." = '".$value."',";
			
		}
		return substr($criteria, 0, -1).$where." idt = '".$array['idt']."'";
	}

	private function getColumns($json) 
	{
		$array = json_decode($json, true);
		$keys = array_keys($array);
		return implode(",", $keys);
	
	}

	private function getValues($json)
        {
                $array = json_decode($json, true);
                $values = array_values($array);
                $string = implode("','", $values);
		return "'".$string."'";
        
        }

}




