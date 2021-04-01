<?php ob_start(); ?>

<h2>Création d'un nouvel article</h2>

<section class="new_article">
    <form action="indexAdmin.php?action=logArticle" method="POST">   
        <div class="title">
            <label class="label_form" for="title">Titre</label>
            <input class="input_form" type="text" name="title" id="title">
        </div>

        <div class="content">
            <label class="label_form" for="content">Contenu</label>
            <textarea class="input_form" name="content" id="content"></textarea>
        </div>

        <h3 class="label_form">Sélection de l'image</h3>
        
        <div class="all_images">
            <?php foreach($getImages as $getImage): ?>
                <div class="box_img">
                    <div class="img_art">
                        <img src="<?= $getImage['img'] ?>" alt="<?= $getImage['titleImg'] ?>">                              
                    </div>
                    <input class="selectedImg" type="checkbox" id="selectImg" name="selectImg" value="<?= $getImage['img_id'] ?>">
                </div>
            <?php endforeach; ?>
        </div> 
               
        <div class="btn_container">
            <div class="btn_submit">
                <input type="submit" name="submit" value="Enregistrer" class="btn_gestion btn_blue text_submit">        
                <input type="reset" value="Annuler" class="btn_gestion btn_red text_submit">
            </div>            
        </div>
    </form>
    
    <div class="btn_return">
        <a href="indexAdmin.php?action=articles">Retour aux articles</a>
    </div>
</section>

<?php $content = ob_get_clean(); ?> <!-- fonction php pour injecter le template -->
<?php require 'templates/template.php'; ?>