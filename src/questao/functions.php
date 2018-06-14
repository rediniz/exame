<?php

require_once('../../config.php');
require_once(DBAPI);

function cadastrar() {

    if (!empty($_POST['questao'])) {
        $questao = $_POST['questao'];
        $alternativas = $_POST['alternativas'];
        
        foreach ($alternativas as $alternativa) {
            echo $alternativa["letra"];
            echo $alternativa["descricao"];
        }
        //$alternativas = $questao
        //print_r($questao);
        //save('professor', $professor);
        //header('location: index.php');
    }
}