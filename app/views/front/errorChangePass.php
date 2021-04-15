<?php
    ob_start();
?>

<div class="color-content">

<p class="error-message">Tous les champs doivent être renseignés</p>

<p class="title-signup">Suite à une erreur dans le changement du mot de passe votre session a été interrompue.</p>
<a class="btn-return" href="index.php?action=logIn">Retour à la page de connexion</a>

</div>

<?php
    $content = ob_get_clean();
    require 'templates/template.php';
?>