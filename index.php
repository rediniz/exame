<?php 
require_once 'config.php'; 
require_once DBAPI;
?>

<?php include(HEADER_TEMPLATE); ?>

<!-- Page Content -->
<div class="container">

  <!-- Jumbotron Header -->
  <header class="jumbotron my-4">
    <div class="row">
      <div class="col-8">
        <h1 class="display-3">Seja bem-vindo!</h1>
        <p class="lead">O
          <b>Exame</b> é um site que permite aos professores criarem um banco de questões e utilizá-las para montar provas e
          aplicá-las aos seus alunos de maneira fácil e rápida.</p>
        <a href="#" class="btn btn-primary btn-lg">Comece agora mesmo!</a>
      </div>
      <div class="col-4" align="center">
        <img src="<?php echo BASEURL; ?>img/livro.svg">
      </div>
    </div>
  </header>

  <!-- Page Features -->
  <div class="row text-center">

    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card">
        <div class="card-imagem m-3 align-content-center" align="center">
          <img src="<?php echo BASEURL; ?>img/201603.svg">
        </div>
        <div class="card-body">
          <h4 class="card-title">Cadastre questões</h4>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card">
        <img class="card-img-top" src="<?php echo BASEURL; ?>img/201605.svg" alt="">
        <div class="card-body">
          <h4 class="card-title">Monte sua prova</h4>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa
            natus architecto.</p>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card">
        <img class="card-img-top" src="http://placehold.it/500x325" alt="">
        <div class="card-body">
          <h4 class="card-title">Responda as provas do seu professor</h4>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card">
        <img class="card-img-top" src="http://placehold.it/500x325" alt="">
        <div class="card-body">
          <h4 class="card-title">Veja os resultados</h4>
          <p class="card-text">O professor pode avaliar as provas dos seus alunos e os alunos podem verificar o seu desempenho nas provas, visualizando
            as questões corretas e se preparando melhor para os próximos testes.</p>
        </div>
      </div>
    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

<?php include(FOOTER_TEMPLATE); ?>