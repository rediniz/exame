<?php

require_once('../../config.php');
require_once(DBAPI);

if(!isset($_SESSION)) session_start();

function cadastrar_professor() {

    if (!empty($_POST['professor'])) {
        $professor = $_POST['professor'];
        save('professor', $professor);
    }
}