<?php ob_start(); ?>

<h2>Liste des articles</h2>

<section class="all_articles"> 
    <div class="articles">
        <?php foreach($allArticles as $allArticle): ?>
            <article class="article">
                <div class="card_article">
                    <div class="imgOfArticle">
                        <img src="<?= $allArticle['img'] ?>" alt="<?= $allArticle['titleImg'] ?>">
                    </div>
                    <h3><?= htmlspecialchars($allArticle['title']) ?></h3>
                    <p><?= htmlspecialchars($allArticle['content']) ?></p>                
                </div>

                <div class="btn">                   
                    <div class="btn_gestion btn_blue">
                        <a href="indexAdmin.php?action=editArticle&id=<?= $allArticle['art_id'] ?>">Modifier</a> <!-- on recupere l'id de l'article-->
                    </div>
                            
                    <div class="btn_gestion btn_red">
                        <a href="indexAdmin.php?action=deleteArticle&id=<?= $allArticle['art_id'] ?>">Supprimer</a> <!-- on recupere l'id de l'article-->
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

    <div class="btn_gestion btn_grey">
        <a href="indexAdmin.php?action=createArticle">Nouvel article</a>
    </div>
</section>

<?php $content = ob_get_clean(); ?> <!-- fonction php pour injecter le template -->
<?php require 'templates/template.php'; ?>