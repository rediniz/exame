<?php
    require_once 'config.php'; 
    require_once DBAPI;

    if(!isset($_SESSION)) session_start();

    if(!empty($_POST["matricula"])){
        $matricula = $_POST["matricula"];
        $senha  = $_POST["senha"];
        $tipo = $_POST["tipo"];
        $login = login($matricula, $senha, $tipo);
        if($login != null){
            print_r($login);
            if($login["tipo"] == "a"){
                $_SESSION["aluno_id"] = $login["id"];
            } else {
                $_SESSION["professor_id"] = $login["id"];
            }
            header('location: index.php');
        }
    }
?>

  <!-- Custom styles for this template -->
  
  <!-- Bootstrap core CSS -->
  <link href="<?php echo BASEURL; ?>node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo BASEURL; ?>node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo BASEURL; ?>css/login.css" rel="stylesheet">
  <div class='container'>
<form class="form-signin" action="login.php" method="POST">
      <h1 class="h3 mb-3 font-weight-normal text-center text-uppercase">Login</h1>
      <label for="matricula" class="sr-only">Matrícula</label>
      <input type="text" name="matricula" id="matricula" class="form-control" placeholder="Matrícula" required autofocus>
      <label for="senha" class="sr-only">Senha</label>
      <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required>
      <select class="form-control" name="tipo">
          <option value="a">Aluno</option>
          <option value="p">Professor</option>
      </select>
      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
</div>