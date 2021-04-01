<?php ob_start(); ?>

<section class="new_article">
    
    <h2>Modifier l'article</h2>
    <form action="indexAdmin.php?action=updateArticle&id=<?= $articleEdited['art_id'] ?>" method="POST">
        <div class="title">        
            <label class="label_form" for="title">Titre de l'article</label>
            <input class="input_form" type="text" name="title" id="title" value="<?= htmlspecialchars($articleEdited['title']) ?>">
        </div>

        <div class="content">
            <label class="label_form" for="content">Contenu</label>      
            <textarea class="content" name="content" id="content" cols="30" rows="10"><?= htmlspecialchars($articleEdited['content']) ?></textarea>
        </div>

        <div class="img">
            <img src="<?= $articleEdited['img'] ?>" alt="<? $articleEdited['titleImg'] ?>">
        </div>

        <div>
        <a href="indexAdmin.php?action=images">Choisir une nouvelle image dans le catalogue l'image</a></div>
        <a href="indexAdmin.php?action=image">Charger une nouvelle image</a>

        <div class="btn_container btn_submit">
            <input type="submit" value="Editer" class="btn_gestion btn_blue text_submit">
        </div>
    </form>

</section>

<?php $content = ob_get_clean(); ?> <!-- fonction php pour injecter le template -->
<?php require 'templates/template.php'; ?>