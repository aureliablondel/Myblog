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
        <!-- <p class="display-content"><?= htmlspecialchars($displayArticle['content']) ?></p>            -->
                                     
    </article> 
    <section class="intro-container">        
    <?php foreach($detailArticles as $detailArticle): ?>   
        <article class="articles-block">
            
            <div class="article-text">
                <h3><?= htmlspecialchars($detailArticle['subtitle']) ?></h3>
                <p><?= htmlspecialchars($detailArticle['subcontent']) ?></p>
            </div>
                                     
        </article>    
    <?php endforeach; ?>        
</section>   
<h2>Laissez un commentaire</h2>

<?php if(isset($_SESSION['pseudo'])): ?>
    <div class="title-signup">
        <h2><?php echo 'Bienvenue'.'<span>'.$_SESSION['pseudo'].'*</span>'; ?></h2>
    </div>
    <form class="form-comment" action="index.php?action=postComment&id=<?=$displayArticle['art_id'] ?>" method="POST">

        <textarea name="comment" id="comment" placeholder="Commentaire..."></textarea>
        
           
        <div class="btn-form">
            <input class="btn-submit" type="submit" value="Publier">
        </div>
    </form>
<?php else: ?> 
    <div class="connect-block">

    <a class="btn-connect" href="index.php?action=signUp&id=<?= $displayArticle['art_id'] ?>">Première fois ?</a>


<button id="btn-connect">Déjà inscrit ?</button>
    </div>
<?php endif; ?>

<div id="btnOneComment">Cliquez pour vous inscrire et pouvoir poster un commentaire</div>
<div id="btnTwoComment">Cliquez pour vous connecter et poster un commentaire</div>


    <form id="form-connect" class="form-signup" action="index.php?action=connectForPost&id=<?= $displayArticle['art_id'] ?>" method="POST">
        
        <input class="input-range" type="text" id="pseudo" name="pseudo" placeholder="Pseudo">       
        
        <div class="input-range">      
            <input class="input-range pass" type="password" id="password" name="password" placeholder="Mot de passe">          
            <i class="fas fa-eye pass-eye" title="Afficher"></i>
        </div>
               
        <?php if(isset($errors['login-failed'])): ?>      
            <span class="error"><?= $errors['login-failed'];?></span>
        <?php endif; ?>
         
        <div class="btn-form">
            <input class="btn-submit" type="submit" value="Envoyer">
        </div>  
         
    </form>
    


<section class="">        
    <?php foreach($getComments as $getComment): ?>   
        <p><?= htmlspecialchars($getComment['contentComment']) ?></p>
        <p>Publié le<?= $getComment['dateComment'] ?></p>           
    
    <?php endforeach; ?>        
</section>
<?php
    $content = ob_get_clean();
    require 'templates/template.php';
?>