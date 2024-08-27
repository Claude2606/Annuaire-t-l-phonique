<?php
require("../model/pmodel.php");
$vueuser = voiruser($user_id);
?>

<div>

    <?php if(isset($vueuser[0])): ?>
        <p><span>User 1 :</span>&nbsp;<?php echo htmlspecialchars($vueuser[0]['username']) ?? 'Infos indisponible'; ?></p>
        <p><span>User 2 :</span>&nbsp;<?php echo htmlspecialchars($vueuser[1]['username']) ?? 'Infos indisponible'; ?></p>
    <?php else: ?>
        <p>Les informations des utilisateurs ne sont pas disponibles.</p>
    <?php endif; ?>

    <a href="paccueil.php">Retour</a>

</div>