<?php ob_start(); ?>

<h2>Catalogue des images</h2>

<section class="images"> 
    <div class="all_images">   
        <?php foreach($getImages as $getImage):?>        
            <div class="box_img">
                <div class="img_art">
                    <img src="<?= $getImage['img'] ?>" alt="<?= $getImage['titleImg'] ?>">
                </div>
            
                <div class="btn_img">
                    <a href="indexAdmin.php?action=deletImg&id=<?= $getImage['img_id'] ?>">Supprimer</a>
                </div>
            </div>        
        <?php endforeach ?>
    </div>

    <div class="btn_gestion btn_grey">
        <a href="indexAdmin.php?action=image">Nouvelle image</a>
    </div>
</section>

<?php $content = ob_get_clean(); ?> <!-- fonction php pour injecter le template -->
<?php require 'templates/template.php'; ?>