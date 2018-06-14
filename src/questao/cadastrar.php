<?php 
    require_once('functions.php'); 	  
    cadastrar();	
?>
<?php include(HEADER_TEMPLATE); ?>

<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <h1>Cadastro de questão</h1>
            <form action="cadastrar.php" method="post">
                <div class="form-group">
                    <label for="enunciado">Enunciado</label>
                    <textarea class="form-control" name="questao[enunciado]" id="enunciado" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select class="form-control" name="questa[categoria]" id="categoria">
                        <option>História</option>
                        <option>Geografia</option>
                        <option>Matemática</option>
                        <option>Ciências</option>
                        <option>Biologia</option>
                    </select>
                </div>
                <div id="alternativas">
                    <div class="row">
                        <div class="col-1">
                        <div class="form-group">
                            <select name="alternativas[alt1][letra]" id="alternativa" class="form-control">
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                                <option>D</option>
                                <option>E</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-8">
                            <textarea class="form-control" name="alternativas[alt1][descricao]" id="descricao" rows="1" placeholder="Descrição"></textarea>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="alternativas[alt1][correta]">
                                <label class="form-check-label">Correta</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                        <div class="form-group">
                            <select name="alternativas[alt2][letra]" id="alternativa" class="form-control">
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                                <option>D</option>
                                <option>E</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-8">
                            <textarea class="form-control" name="alternativas[alt2][descricao]" id="descricao" rows="1" placeholder="Descrição"></textarea>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="alternativas[alt2][correta]">
                                <label class="form-check-label">Correta</label>
                            </div>
                        </div>
                    </div>
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