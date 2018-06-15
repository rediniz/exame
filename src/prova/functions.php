<?php

require_once('../../config.php');
require_once(DBAPI);

function carrega_categorias(){
    $categorias = get_categorias();
    foreach ($categorias as $categoria) {
        print "<option value=".$categoria["id"].">".$categoria["descricao"]."</option>";
    }
}

if(isset($_POST['get_questoes_categoria'])){

    $categoria_id = $_POST['categoria_id'];
    $questoes = get_questoes_categoria($categoria_id);

    foreach ($questoes as $questao) {
        print "<option value=".$questao["id"].">".$questao["enunciado"]."</option>";
    }
}

if(isset($_POST['carregar_alternativas_questao'])){

    $questao_id = $_POST['questao_id'];
    $alternativas = get_alternativas_questao($questao_id);

    print "<ul>";
    foreach ($alternativas as $alternativa) {
        print "<li>".$alternativa["letra"]." - ".$alternativa["descricao"]."</li>";
    }
    print "</ul>";
}

function cadastrar() {

    if (!empty($_POST['questoes'])) {
        $prova = array();
        $prova["id_professor"] = $_SESSION["professor_id"];
        $data = date_create('now', new DateTimeZone('America/Sao_Paulo'));
        $prova["data_criacao"] = $data->format("Y-m-d H:i:s");
        $questoes = $_POST['questoes'];

        $prova_id = save('prova', $prova);
        
        foreach ($questoes as $questao) {
            $prova_questao["prova_id"] = $prova_id;
            $prova_questao["questao_id"] = $questao["id"];
            save('prova_questao', $prova_questao);
        }
    }
}