<?php
    ob_start();
?>

<div class="color-content">

    <div class="title-signup">
        <h2>S'inscrire</h2>
        <p>Pour poster des commentaires, vous devez vous inscrire.</p>
        <p>Vos données ne sont pas utilisées à des fins commerciales. </p>       
    </div>
    
    <form class="form-signup" action="index.php?action=registerUser" method="POST">
        <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo">
        <input type="email" id="mail" name="mail" placeholder="Email">
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
