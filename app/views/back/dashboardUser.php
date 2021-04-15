<?php
    ob_start();
?>

<h2>votre compte</h2>

<h3>Postez votre commentaire</h3>

<form action="index.php?action=postComment"></form>
    <textarea name="" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="Envoyer">
</form>

<h3>Changez votre mot de passe</h3>

<form action="index.php?action=changePassword&id=<?= $userPass['user_id'] ?>">    
    <label for="password">Mot de passe actuel</label>
    <input type="password" id="password" name="password">
    <label for="newPassword">Nouveau mot de passe</label>
    <input type="password" id="newPassword" name="newPassword">
    <label for="confirmPassword">Confirmation du nouveau mot de passe</label>
    <input type="password" id="confirmPassword" name="confirmPassword">

    <input type="submit" value="Envoyer">
</form>

