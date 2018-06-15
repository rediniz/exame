<?php 
    require_once('functions.php'); 	  
    cadastrar();	
?>
<?php include(HEADER_TEMPLATE); ?>

<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <h1>Cadastro de prova</h1>
            <form action="cadastrar.php" method="post">
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select id="categoria_questao" class="form-control" required>
                        <?php carrega_categorias() ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="questoes">Questões</label>
                    <select name="questoes[alt1][letra]" id="questoes" class="form-control">
                    </select>
                    <br>
                    <button class="btn btn-primary" id="adicionar_questao">Adicionar</button>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
            <br>
            <?php if (!empty($_SESSION['message'])) : ?>
            <div class="alert alert-<?php echo $_SESSION['type'];?> alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo $_SESSION['message']; ?>
            </div>
            <?php clear_messages(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include(FOOTER_TEMPLATE); ?>