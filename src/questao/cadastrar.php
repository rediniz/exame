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
                    <textarea class="form-control" name="questao[enunciado]" id="enunciado" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select class="form-control" name="questao[categoria_id]" id="categoria" required>
                        <?php carrega_categorias(); ?>
                    </select>
                </div>
                <div id="alternativas">
                    <div class="row">
                        <div class="col-1">
                        <div class="form-group">
                            <select name="alternativas[alt1][letra]" id="alternativa" class="form-control">
                                <option value="A" selected >A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-8">
                            <textarea class="form-control" name="alternativas[alt1][descricao]" id="descricao" rows="1" placeholder="Descrição"></textarea>
                        </div>
                        <div class="col-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="alternativas[alt1][correta]" value="S">
                                <label class="form-check-label">Correta</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                        <div class="form-group">
                            <select name="alternativas[alt2][letra]" id="alternativa" class="form-control">
                                <option value="A">A</option>
                                <option value="B" selected>B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-8">
                            <textarea class="form-control" name="alternativas[alt2][descricao]" id="descricao" rows="1" placeholder="Descrição"></textarea>
                        </div>
                        <div class="col-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="alternativas[alt2][correta]" value="S">
                                <label class="form-check-label">Correta</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                        <div class="form-group">
                            <select name="alternativas[alt3][letra]" id="alternativa" class="form-control">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C" selected>C</option>
                                <option value="D">D</option>

                            </select>
                        </div>
                        </div>
                        <div class="col-8">
                            <textarea class="form-control" name="alternativas[alt3][descricao]" id="descricao" rows="1" placeholder="Descrição"></textarea>
                        </div>
                        <div class="col-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="alternativas[alt3][correta]" value="S">
                                <label class="form-check-label">Correta</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                        <div class="form-group">
                            <select name="alternativas[alt4][letra]" id="alternativa" class="form-control">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D" selected>D</option>
        
                            </select>
                        </div>
                        </div>
                        <div class="col-8">
                            <textarea class="form-control" name="alternativas[alt4][descricao]" id="descricao" rows="1" placeholder="Descrição"></textarea>
                        </div>
                        <div class="col-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="alternativas[alt4][correta]" value="S">
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