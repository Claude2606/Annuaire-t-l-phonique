
<?php session_start();?>
    <?php
    if(isset($_SESSION['user'])){
        header("Location: ../view/paccueil.php");
        exit;
    }
    else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" type="annuaire téléphonique" href="../assets/icon.png">
    <title>Connexion</title>
</head>
<body>

<Section class="section_connexion">
    <h1>Connexion</h1>
    <div class="container_form_connexion">
        <form action="../controlleur/pcontrolleur.php" method="POST">

        <span>Nom d'utilisateur</span>
        <input type="text" name="username" size="20" placeholder="Nom d'utilisateur" required autofocus>

        <span>Mot de passe</span>
        <div class="password_input">
            <input type="password" name="password" size="20" placeholder="Mot de passe" required>
            <a href="pmodifpassword.php">Mot de passe oublié ?</a>
        </div>


        <input type="submit" name="bconnexion" value="Se connecter">


        <p>Vous n'avez pas de compte ?<a href="pinscription.php">Créer un compte !</a></p>

        <?php
        if(isset($_SESSION['erreurco'])) {
            echo $_SESSION['erreurco'];
        }
        ?>
        </form>
    </div>
</Section>

<?php
}
?>





