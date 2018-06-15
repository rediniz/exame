<?php

require_once('../../config.php');
require_once(DBAPI);

if(!isset($_SESSION)) session_start();

function cadastrar_aluno() {

    if (!empty($_POST['aluno'])) {
        $aluno = $_POST['aluno'];
        save('aluno', $aluno);
    }
}

function montar_prova() {

    if(isset($_GET['prova_id'])){
        $prova_id = $_GET['prova_id'];

        $questoes = get_questoes_prova($prova_id);
        $count = 0;
        $html = "";

        foreach ($questoes as $questao) {
            $count++;
            $alternativas = get_alternativas_questao($questao["id"]);

            $alternativas_html = "<ul class='list-group'>";

            foreach ($alternativas as $alternativa) {
                $alternativas_html .= "<li class='list-group-item'><input type='checkbox' name='respostas[".$questao["id"]."]' value=".$alternativa['letra']."> <b>".$alternativa['letra']."</b> - ".$alternativa['descricao']."</li>";
            }

            $alternativas_html.= "</ul>";

            $html .= "<div id='questao".$questao["id"]."' class='questao-selecionada'>";
            $html .= "   <div class='card mb-3'>";
            $html .= "   <div class='card-header numero-questao'>Questão ".$count."</div>";
            $html .= "       <div class='card-body'>";
            $html .= "           <h5 class='card-title'>".$questao["enunciado"]."</h5>";
            $html .= "           <p class='card-text'>";
            $html .= "               ".$alternativas_html."";
            $html .= "           </p>";
            $html .= "       </div>";
            $html .= "   </div>";
            $html .= "</div>";
        }

        $html.= "<button type='submit' class='btn btn-primary'>Salvar respostas</button>";
        $html.= "<input type='hidden' name='prova_id' value=".$prova_id.">";

        print $html;
    } else {
        print "<p class='my-5'>Não foi possível exibir a prova.</p>";
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

function responder(){

    if(isset($_POST["prova_id"])){
        $aluno_id = $_SESSION["aluno_id"];
        $prova_id = $_POST["prova_id"];
        $respostas = $_POST["respostas"];

        foreach ($respostas as $questao_id => $resposta) {
            $aluno_resposta = array();
            $aluno_resposta["aluno_id"] = $aluno_id;
            $aluno_resposta["prova_id"] = $prova_id;
            $aluno_resposta["questao_id"] = $questao_id;
            $aluno_resposta["alternativa"] = $resposta;
            save("aluno_resposta", $aluno_resposta );
        }

        set_prova_respondida($aluno_id,$prova_id);
    }

}

function exibe_provas(){
    $aluno_id = $_SESSION["aluno_id"];
    $provas = get_provas_aluno($aluno_id);
    foreach ($provas as $prova) {
        $respondida = $prova["respondida"];
        if($respondida == 'N'){
            print "<p>Prova ".$prova["prova_id"]." - <a href='".BASEURL."src/aluno/responder.php?prova_id=".$prova["prova_id"]."'>Responder</a></p>";
        } else {
            print "<p>Prova ".$prova["prova_id"]." - Respondida</p>";
        }
    }

}