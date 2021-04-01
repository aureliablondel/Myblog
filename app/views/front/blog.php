<?php
    ob_start();
?>

<div class="principal-img">
    <img src="app\public\front\images\welcome.jpg" alt="welcome">
</div>

<h2 class="principal-title">Blog Zen</h2>

<section class="intro-container">        
    <?php foreach($blogArticles as $blogArticle): ?>   
        <article class="articles-block">
            <div class="article-img">
                <img src="<?= $blogArticle['img'] ?>" alt="<?= $blogArticle['titleImg'] ?>">
            </div>
            <div class="article-text">
                <h3><?= htmlspecialchars($blogArticle['title']) ?></h3>
                <p><?= htmlspecialchars($blogArticle['content']) ?></p>
            </div>
            <a href="index.php?action=readArticle&id=<?= $blogArticle['art_id'] ?>">Lire la suite</a>                         
        </article>    
    <?php endforeach; ?>        
</section>

<?php
    $content = ob_get_clean();
    require 'templates/template.php';
?>