<?php 
    require_once('functions.php'); 
    cadastrar();	
?>
<?php include(HEADER_TEMPLATE); ?>

<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <h1>Cadastro de prova</h1>
            <form action="cadastrar.php" method="post" id="form_cadastro_prova">
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select id="categoria_questao" class="form-control" required>
                        <?php carrega_categorias() ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="questoes">Questões</label>
                    <select id="questoes" class="form-control">
                    </select>
                    <br>
                    <button type="button" class="btn btn-primary" id="adicionar_questao">Adicionar</button>
                </div>
                <div id="div_questoes" class="mb-5"></div>
                <button type="submit" class="btn btn-primary">Cadastrar prova</button>
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
<script src="<?php echo BASEURL; ?>js/prova.js"></script>

<?php include(FOOTER_TEMPLATE); ?>