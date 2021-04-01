<h3>Changez votre mot de passe</h3>

<form action="index.php?action=changePassword&id=<?= $_SESSION['user_id'] ?>">    
    <!-- <label for="password">Mot de passe actuel</label> -->
    <!-- <input type="password" id="password" name="password"> -->
    <label for="newPassword">Nouveau mot de passe</label>
    <input type="password" id="newPassword" name="newPassword">
    <!-- <label for="confirmPassword">Confirmation du nouveau mot de passe</label> -->
    <!-- <input type="password" id="confirmPassword" name="confirmPassword"> -->

    <input type="submit" value="Envoyer">
</form>