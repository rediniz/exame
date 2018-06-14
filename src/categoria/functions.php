<?php

require_once('../../config.php');
require_once(DBAPI);

function cadastrar() {

    if (!empty($_POST['categoria'])) {
        $categoria = $_POST['categoria'];
        save('categoria', $categoria);
    }
}