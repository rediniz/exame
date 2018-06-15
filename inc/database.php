<?php

mysqli_report(MYSQLI_REPORT_STRICT);

function open_database() {
	try {
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		return $conn;
	} catch (Exception $e) {
		echo $e->getMessage();
		return null;
	}
}

function close_database($conn) {
	try {
		mysqli_close($conn);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

/**
*  Insere um registro no BD
*/
function save($table = null, $data = null) {

	$database = open_database();
  
	$columns = null;
	$values = null;
	$id_inserido = null;
  
	foreach ($data as $key => $value) {
	  $columns .= trim($key, "'") . ",";
	  $values .= "'$value',";
	}
  
	// remove a ultima virgula
	$columns = rtrim($columns, ',');
	$values = rtrim($values, ',');
	
	$sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";
  
	try {
		$database->query($sql);
		
		$id_inserido = mysqli_insert_id($database);
  
	  $_SESSION['message'] = 'Registro cadastrado com sucesso.';
	  $_SESSION['type'] = 'success';
	
	} catch (Exception $e) { 
	
	  $_SESSION['message'] = 'Não foi possível realizar a operação.';
	  $_SESSION['type'] = 'danger';
	  
	} 
  
	close_database($database);

	return $id_inserido;
	}
	
/**
 *  Pesquisa categorias
 */
function get_categorias() {
  
	$database = open_database();
	$categorias = [];

	try {
		$sql = "SELECT * FROM categoria";
		$result = $database->query($sql);
		
		while ($row = $result->fetch_assoc()) {
			array_push($categorias, $row);
		} 
	
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($database);

	return $categorias;
}

/**
 *  Pesquisa questões baseado na categoria
 */
function get_questoes_categoria($categoria_id) {
  
	$database = open_database();
	$questoes = [];

	try {
	  if ($categoria_id) {
	    $sql = "SELECT * FROM questao WHERE categoria_id = " . $categoria_id;
	    $result = $database->query($sql);
	    
	    while ($row = $result->fetch_assoc()) {
				array_push($questoes, $row);
			} 
	    
	  }
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($database);

	return $questoes;
}

/**
 *  Pesquisa alternativas de uma questão
 */
function get_alternativas_questao($questao_id) {
  
	$database = open_database();
	$alternativas = [];

	try {
		$sql = "SELECT * FROM alternativa WHERE questao_id = ".$questao_id;
		$result = $database->query($sql);
		
		while ($row = $result->fetch_assoc()) {
			array_push($alternativas, $row);
		} 
	
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($database);

	return $alternativas;
}

/**
 *  Pesquisa as questões de uma prova
 */
function get_questoes_prova($prova_id) {
  
	$database = open_database();
	$questoes = [];

	try {
		$sql = "SELECT questao.id, questao.enunciado, questao.categoria_id FROM prova_questao JOIN questao WHERE prova_id = ".$prova_id;
		$result = $database->query($sql);
		
		while ($row = $result->fetch_assoc()) {
			array_push($questoes, $row);
		} 
	
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($database);

	return $questoes;
}


function clear_messages(){
	unset($_SESSION['message']);
	unset($_SESSION['type']);
}