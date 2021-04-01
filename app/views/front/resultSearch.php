<?php ob_start(); ?>

<h2>Résultats de la recherche</h2>

<section class="list_articles">

    <div class="all_articles">        
        <?php foreach($selectSearchs as $selectSearch): ?>   
            <div class="article">                
                <h3><?= htmlspecialchars($selectSearch['title']) ?></h3>
                <p><?= htmlspecialchars($selectSearch['content']) ?></p>                          
            </div>    
        <?php endforeach; ?>        
    </div>

</section>

<?php
    $content = ob_get_clean();
    require 'templates/template.php';
?>