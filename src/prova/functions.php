<?php

require_once('../../config.php');
require_once(DBAPI);

function carrega_categorias(){
    $categorias = get_categorias();
    foreach ($categorias as $categoria) {
        print "<option value=".$categoria["id"].">".$categoria["descricao"]."</option>";
    }
}

if(!empty($_POST['get_questoes_categoria'])){

    $categoria_id = $_POST['categoria_id'];
    get_questoes_categoria($categoria_id);
}

if(isset($_POST['carregar_alternativas_questao'])){

    $questao_id = $_POST['questao_id'];
    get_alternativas_questao($questao_id);
}

function cadastrar() {

    if (!empty($_POST['prova'])) {
        $prova = $_POST['prova'];
        $questoes = $_POST['questoes'];

        $prova_id = save('questao', $questao);
        
        foreach ($alternativas as $alternativa) {
            $alternativa["questao_id"] = $questao_id;
            save('alternativa', $alternativa);
        }
    }
}