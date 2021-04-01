<?php
    ob_start();
?>

<div class="color-content">
    <div class="title-signup">
        <h2><?php echo 'Bienvenue'.'<span>'.$_SESSION['pseudo'].'*</span>'; ?></h2>
    </div>

    <h3 class="title-dashboard">Postez votre commentaire</h3>

    <form class="form-signup" action="index.php?action=postComment" method="POST">
        <textarea name="comment" id="comment"></textarea>        
        <div class="btn-form">
            <input class="btn-submit" type="submit" value="Envoyer">
        </div>
    </form>

</div>
<?php
    $content = ob_get_clean();
    require 'templates/template.php';
?>

