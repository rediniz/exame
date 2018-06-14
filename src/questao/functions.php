<?php

require_once('../../config.php');
require_once(DBAPI);

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