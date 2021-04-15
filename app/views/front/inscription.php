<?php
    ob_start();
?>

<div class="color-content">

    <div class="title-signup">
        <h2>S'inscrire</h2>
        <p>Pour poster des commentaires, vous devez vous inscrire.</p>
        <p>Vos données ne seront pas utilisées à des fins commerciales. </p>       
    </div>
    
    <form class="form-signup" action="index.php?action=registerUser&id=<?= $_GET['id'] ?>" method="POST">
        <input class="input-range" type="text" id="pseudo" name="pseudo" placeholder="Pseudo" value="<?php if(isset($_POST['pseudo'])){ echo $_POST['pseudo']; } ?>">           
            <?php if(isset($errors['pseudo-empty'])): ?>        
            <span class="error"><?= $errors['pseudo-empty'];?></span>
            <?php endif; ?>        
        <input class="input-range"type="email" id="mail" name="mail" placeholder="Email" value="<?php if(isset($_POST['mail'])){ echo $_POST['mail']; } ?>">
            <?php if(isset($errors['mail-empty'])): ?>        
            <span class="error"><?= $errors['mail-empty'];?></span>
            <?php endif; ?>
        <div class="input-range">      
            <input class="input-range pass" type="password" id="password" name="password" placeholder="Mot de passe">          
            <i class="fas fa-eye pass-eye" title="Afficher"></i>
        </div>
        <?php if(isset($errors['password-empty'])): ?>      
            <span class="error"><?= $errors['password-empty'];?></span>
            <?php endif; ?>
            <?php if(isset($errors['password-tooshort'])): ?>      
            <span class="error"><?= $errors['password-tooshort'];?></span>
            <?php endif; ?>
        <p>8 caractères minimum</p>
        <div class="input-range">  
            <input class="input-range pass" type="password" id="confirm-password" name="confirm-password" placeholder="Confirmer le mot de passe">
            <i class="fas fa-eye pass-eye" title="Afficher"></i>
        </div>
            <?php if (isset($errors['confirm-empty'])): ?>      
            <span class="error"><?= $errors['confirm-empty'];?></span>
            <?php endif; ?>
            <?php if (isset($errors['password-notconfirmed'])): ?>        
            <span class="error"><?= $errors['password-notconfirmed'];?></span>
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
