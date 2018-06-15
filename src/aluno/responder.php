<?php 
    require_once('functions.php'); 
?>
<?php include(HEADER_TEMPLATE); ?>

<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <h1>Responder prova</h1>
            <form action="responder.php" method="post" id="form_cadastro_prova">
                <?php montar_prova(); ?>
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