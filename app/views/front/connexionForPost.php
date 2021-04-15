<?php
    ob_start();
?>

<div class="color-content">

    <div class="title-signup">
        <h2>Se connecter</h2>
        <p>Accédez à votre espace pour gérer vos commentaires et votre profil.</p>
    </div>

    <form class="form-signup" action="index.php?action=connectForPost" method="POST">
        
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

</div>

<?php
    $content = ob_get_clean();
    require 'templates/template.php';
?>