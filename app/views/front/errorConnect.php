<?php
    ob_start();
?>

<div class="color-content">

<p class="error-message">Tous les champs doivent être renseignés</p>

<a class="btn-return" href="index.php?action=logIn">Retour à la page de connexion</a>

</div>

<?php
    $content = ob_get_clean();
    require 'templates/template.php';
?>