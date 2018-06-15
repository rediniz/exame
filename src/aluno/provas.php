<?php 
    require_once('functions.php'); 
?>
<?php include(HEADER_TEMPLATE); ?>

<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <h1>Minhas provas</h1>
            <?php  exibe_provas(); ?>
        </div>
    </div>
</div>
<script src="<?php echo BASEURL; ?>js/prova.js"></script>

<?php include(FOOTER_TEMPLATE); ?>