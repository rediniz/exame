<?php 
    require_once('functions.php'); 
?>
<?php include(HEADER_TEMPLATE); ?>

<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <h1>Gabarito da prova</h1>
            <div class='alert alert-info'>
                Você acertou <b><?php qtd_acertos() ?></b> questões.
            </div>
            <form action="respostas.php?prova_id=<?php print $_GET["prova_id"]?>" method="post">
                <br>
                <?php montar_gabarito(); ?>
                <input type='hidden' name="prova_id" value="<?php print $_GET["prova_id"];?>">
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
<!-- <script src="<?php echo BASEURL; ?>js/responder.js"></script> -->

<?php include(FOOTER_TEMPLATE); ?>