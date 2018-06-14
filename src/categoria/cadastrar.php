<?php 
    require_once('functions.php'); 	  
    cadastrar();	
?>
<?php include(HEADER_TEMPLATE); ?>

<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <h1>Cadastro de categoria</h1>
            <form action="cadastrar.php" method="post">
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" name="categoria[descricao]" id="descricao" placeholder="Descrição">
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
            <br>
            <?php if (!empty($_SESSION['message'])) : ?>
                <div class="alert alert-<?php echo $_SESSION['type'];?> alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $_SESSION['message']; ?>
                </div>
                <?php clear_messages(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include(FOOTER_TEMPLATE); ?>