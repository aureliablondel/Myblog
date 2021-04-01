<?php
    ob_start();
?>

<div class="display-container">       
            
   <article class="display-article">         
   <div class="display-img">
                <img src="<?= $displayArticle['img'] ?>" alt="<?= $displayArticle['titleImg'] ?>">
                
            </div>
            <p class="date-edit">Publié le <?= htmlspecialchars($displayArticle['dateEdit']) ?></p>
        <h2><?= htmlspecialchars($displayArticle['title']) ?></h2>                
        <p class="display-content"><?= htmlspecialchars($displayArticle['content']) ?></p>           
                                     
    </article>    




<form class="form-comment" action="index.php?action=postComment&id=<?=$displayArticle['art_id'] ?>" method="POST">
<h3>Laissez un commentaire</h3>
    
        <textarea name="comment" id="comment" placeholder="Commentaire..."></textarea>
        <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo">
        <input type="email" id="mail" name="mail" placeholder="Email">   
        <div class="btn-form">
            <input class="btn-submit" type="submit" value="Publier">
        </div>
        
    </form>
</div>

<section>
<?php foreach($getComments as $getComment):?>
    <p><?= htmlspecialchars($getComment['contentComment']) ?></p>
    <?php endforeach ?>
</section>
<?php
    $content = ob_get_clean();
    require 'templates/template.php';
?>