<?php ob_start(); ?>

<h2>Tableau de bord</h2>

<section class="card_gestion">

    <div class="card_tb">
        <a href="indexAdmin.php?action=articles"><h3>Mes articles</h3></a>     
    </div>

    <div class="card_tb">
        <h3><a href="indexAdmin.php?action=images">Mes images</a></h3>        
    </div>
    
</section>

<?php $content = ob_get_clean(); ?> <!-- fonction php pour injecter le template -->
<?php require 'templates/template.php'; ?>