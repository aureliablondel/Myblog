<?php
    ob_start();    
?>

<div class="title-signup">
    <h2><?= 'Bienvenue'.'<span>'.$_SESSION['pseudo'].'*</span>'; ?></h2>
</div>
    
<div class="color-content">

    <h3 class="title-dashboard">Liste de vos commentaires</h3>    

    <?php foreach($userComments as $userComment): ?>
        <article class="comment-block">                   
            <p class="content-comment"><?= htmlspecialchars($userComment['contentComment']) ?></p>                
            <p>Publié le <?= $userComment['dateComment'] ?></p>        
            <div class="btn-block">                
                <a href="index.php?action=updateComment&id=<?= $userComment['comment_id'] ?>" class="btn-link">Modifier</a>                    
                <a href="index.php?action=deleteComment&id=<?= $userComment['comment_id'] ?>" class="btn-link">Supprimer</a>
            </div>
        </article> 
    <?php endforeach; ?>

    <h3 class="title-dashboard">Pour changer votre mot de passe</h3>

    <form class="form-signup" action="index.php?action=changePassword&id=<?= $_SESSION['user_id']; ?>" method="POST">
    
        <div class="input-range">      
            <input class="input-range pass" type="password" id="oldpassword" name="oldpassword" placeholder="Mot de passe" value="<?php if(isset($_POST['oldpassword'])){ echo $_POST['oldpassword']; } ?>">          
            <i class="fas fa-eye pass-eye" title="Afficher"></i>
        </div>
            
            <?php if(isset($errors['pass-invalid'])): ?>      
                <span class="error"><?= $errors['pass-invalid'];?></span>
            <?php endif; ?>

        <div class="input-range">      
            <input class="input-range pass" type="password" id="newpassword" name="newpassword" placeholder="Nouveau mot de passe" value="<?php if(isset($_POST['newpassword'])){ echo $_POST['newpassword']; } ?>">          
            <i class="fas fa-eye pass-eye" title="Afficher"></i>
        </div>
            

        <p>8 caractères minimum</p>       
               
        <div class="btn-form">
            <input class="btn-submit" type="submit" value="Envoyer">
        </div>  

    </form>

</div>
<?php
    $content = ob_get_clean();
    require 'templates/template.php';
?>

