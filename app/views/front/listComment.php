<?php
    ob_start();
?>
<section>
<?php foreach($getComments as $getComment): ?>
    <p><?= htmlspecialchars($getComment['contentComment']) ?></p>
<?php endforeach; ?>
</section>

<?php
    $content = ob_get_clean();
    require 'templates/template.php';
?>