
<?php 
  if(!isset($_SESSION)) session_start();
  $tipo = null;
  if(isset($_SESSION["professor_id"])){
    $tipo = "p";
  } else if (isset($_SESSION["aluno_id"])){
    $tipo = "a";
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Exame</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo BASEURL; ?>node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo BASEURL; ?>node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo BASEURL; ?>css/estilo.css" rel="stylesheet">

  <script src="<?php echo BASEURL; ?>node_modules/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo BASEURL; ?>node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?php echo BASEURL; ?>node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand logo" href="<?php echo BASEURL; ?>">EXAME</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASEURL; ?>"><i class="fa fa-home" aria-hidden="true"></i> Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php if($tipo == null): ?> 
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASEURL; ?>login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login
            </a>
          </li>
          <?php else:?>
          <?php if($tipo == "p"): ?> 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <i class="fa fa-question-circle" aria-hidden="true"></i> Questões
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?php echo BASEURL; ?>src/questao/cadastrar.php">Cadastrar</a>
              <a class="dropdown-item" href="<?php echo BASEURL; ?>src/categoria/cadastrar.php">Cadastrar Categoria</a>
          </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <i class="fa fa-question-circle" aria-hidden="true"></i> Provas
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?php echo BASEURL; ?>src/prova/cadastrar.php">Cadastrar</a>
          </li>
          <?php else:?>
          <li class="nav-item">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <i class="fa fa-graduation-cap" aria-hidden="true"></i> Aluno
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?php echo BASEURL; ?>src/aluno/provas.php">Minhas provas</a>
              </div>
          </li>
          </li>
          <?php endif;?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASEURL; ?>logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a>
          </li>
          <?php endif;?>
        </ul>
      </div>
    </div>
  </nav>
  <div class="conteudo my-6">