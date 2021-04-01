<?php
    ob_start();
?>

<div class="principal-img">
    <img src="app\public\front\images\bureau-zen.png" alt="bureau zen">
</div>

<div class="title-block">
    
</div>
<h2 class="principal-title">Le blog pour développeuses</h2>
<section class="intro-container">        
    <?php foreach($allArticles as $allArticle): ?>   
        <article class="articles-block">
            <div class="article-img">
                <img src="<?= $allArticle['img'] ?>" alt="<?= $allArticle['titleImg'] ?>">
            </div>
            <div class="article-text">
                <h3><?= htmlspecialchars($allArticle['title']) ?></h3>
                <p><?= htmlspecialchars($allArticle['content']) ?></p>
            </div>                          
        </article>    
    <?php endforeach; ?>        
</section>

<div class="split-block">


</div>
<h2 class="split-title">Les derniers articles</h2>
<?php
    $content = ob_get_clean();
    require 'templates/template.php';
?>


