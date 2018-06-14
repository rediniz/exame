<?php

require_once('../../config.php');
require_once(DBAPI);

function cadastrar_professor() {

    if (!empty($_POST['professor'])) {
        $professor = $_POST['alternativa'];
        save('professor', $professor);
        //header('location: index.php');
    }
}