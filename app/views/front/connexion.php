<?php
    ob_start();
?>

<div class="color-content">

    <div class="title-signup">
        <h2>Se connecter</h2>
        <p>Accédez à votre espace pour gérer vos commentaires et votre profil.</p>
    </div>

    <form class="form-signup" action="index.php?action=connectUser" method="POST">
        <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo">
        <input type="password" id="password" name="password" placeholder="Mot de passe">
        <div class="btn-form">
            <input class="btn-submit" type="submit" value="Envoyer">
        </div>        
    </form>

</div>

<?php
    $content = ob_get_clean();
    require 'templates/template.php';
?>
