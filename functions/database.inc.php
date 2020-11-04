<?php

use mysqli;

/**
 * Copyright 2020 Miguel Ferreira (github.com/esfoliante)
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

function db_connect($information) {
	
	$connection = new mysqli($information['hostname'], $information['username'], $information['password'], $information['database']);
	
	if ($connection->connect_error) {

		return $connection->connect_error;
	}

	$connection->set_charset("utf8");


	return $connection;

}

function db_query($connection, $sql) {	

    
    $result = $connection->query($sql);
    
	if(is_bool($result)) {
		if($id = $connection->insert_id)
			return $id;
        
		return $result ? true : false;
	} elseif($result) { 

		$query = $result->fetch_all(MYSQLI_ASSOC);
		return $query;

    }
	
	return false;

}

function db_close($connection) {

	return $connection->close();

}
