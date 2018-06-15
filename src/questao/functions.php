<?php

require_once('../../config.php');
require_once(DBAPI);

if(!isset($_SESSION)) session_start();

function carrega_categorias(){
    $categorias = get_categorias();
    foreach ($categorias as $categoria) {
        print "<option value=".$categoria["id"].">".$categoria["descricao"]."</option>";
    }
}

function cadastrar() {

    if (!empty($_POST['questao'])) {
        $questao = $_POST['questao'];
        $alternativas = $_POST['alternativas'];

        $questao_id = save('questao', $questao);
        
        foreach ($alternativas as $alternativa) {
            $alternativa["questao_id"] = $questao_id;
            save('alternativa', $alternativa);
        }
        
    }
}