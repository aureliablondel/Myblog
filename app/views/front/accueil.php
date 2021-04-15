<?php
    ob_start();
?>

<div class="principal-img">
    <img src="app\public\front\images\Bureau-zen.png" alt="bureau zen">
</div>

<div class="title-block">
    <h2 class="principal-title">Mon blog de (futur)développeuse</h2>
</div>

<div class="welcome-title">    
    <h3>Bonjour, je m'appelle Aurelia et je vous souhaite la bienvenue sur mon site.</h3>
</div>

<section class="intro-container">        
    <?php foreach($introArticles as $introArticle): ?>   
        <article class="articles-block">
            <div class="article-img">
                <img src="<?= $introArticle['img'] ?>" alt="<?= $introArticle['titleImg'] ?>">
            </div>
            <div class="article-text">
                <h3><?= htmlspecialchars($introArticle['title']) ?></h3>
                <p><?= htmlspecialchars($introArticle['content']) ?></p>
            </div>                          
        </article>    
    <?php endforeach; ?>        
</section>

<div class="split-block">
    <h2 class="split-title">Mon profil</h2>
</div>

<section class="intro-container">     
    <article class="articles-block">
        <div class="article-img">
            <img src="<?= $profilArticle['img'] ?>" alt="<?= $profilArticle['titleImg'] ?>">
        </div>
        <div class="article-text">
            <h3><?= htmlspecialchars($profilArticle['title']) ?></h3>
            <p><?= htmlspecialchars($profilArticle['content']) ?></p>
        </div>                                
    </article>              
</section>

<div class="split-block">
    <h2 class="split-title">Mes derniers articles</h2>
</div>

<section class="intro-container">        
    <?php foreach($lastArticles as $lastArticle): ?>   
        <article class="articles-block">
            <div class="article-img">
                <img src="<?= $lastArticle['img'] ?>" alt="<?= $lastArticle['titleImg'] ?>">                
            </div>
            <p class="date-edit">Publié le <?= htmlspecialchars($lastArticle['dateEdit']) ?></p>
            <div class="article-text">
                <h3><?= htmlspecialchars($lastArticle['title']) ?></h3>
                <p><?= htmlspecialchars($lastArticle['content']) ?></p>
            </div>
            <a class="link-article" href="index.php?action=readNext&id=<?= $lastArticle['art_id'] ?>">Lire l'article</a>                         
        </article>    
    <?php endforeach; ?>        
</section>

<?php
    $content = ob_get_clean();
    require 'templates/template.php';
?>


