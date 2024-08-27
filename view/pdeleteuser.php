<?php
require("../model/pmodel.php");
if(isset($_SESSION['user'])) {
    $user_id = $_SESSION['user_id'];
    $vueuser = voiruser($user_id);
}
?>

<div>

    <?php if(isset($vueuser[0])): ?>
        <p><span>User 1 :</span>&nbsp;<?php echo htmlspecialchars($vueuser[0]['username']) ?? 'Infos indisponible'; ?></p>
        <p><span>User 2 :</span>&nbsp;<?php echo htmlspecialchars($vueuser[1]['username']) ?? 'Infos indisponible'; ?></p>
    <?php else: ?>
        <br>
        <p>Les informations des utilisateurs ne sont pas disponibles.</p><br>
    <?php endif; ?>

    <a href="paccueil.php">Retour</a>

</div>