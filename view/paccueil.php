<?php
    session_start();
    if(isset($_SESSION['user'])){  
        if ($_SESSION['user']['role'] == 1) { //si l'user à le role 1 (admin) on affiche
            echo '<div><a href="padmin.php">Page admin</a></div>';
        }
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" type="annuaire téléphonique" href="../assets/icon.png">
    <title>Accueil</title>
</head>
<body>
<header>
    <div class="header_accueil">
        <div class="header_container">
            <div class="deco">
                <form action="pdeco.php" method="POST">
                    <input type="submit" name="bConnexion" Value="Deconnexion">
                </form>
            </div>

            <div class="nav">
                <nav>
                    <ul>
                        <li><a href="paddcontact.php"><i class="fa-solid fa-plus fa-2x"></i><i class="fa-solid fa-address-book fa-2x"></i><br/>Ajout Contact</li></a>
                        <p>|</p>
                        <li><a href="pprofil.php"><i class="fa-solid fa-user fa-2x"></i><br/>Profil</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

<Section class="section_accueil">
        <h1 class="titre_accueil">Restez en Contact !</h1>
</Section>

<footer class="footer">
    <p>Copyright &copy; Claude Peltier 2024</p>
</footer>

<?php
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
<header>
    <h1>Admin</h1>
    <div class="header_container">
        <div class="deco">
            <form action="pdeco.php" method="POST">
                <input type="submit" name="bConnexion" Value="Deconnexion">
            </form>
        </div>
    </div>
</header>

<section>
    <a href="padduser.php">Ajouter un utilisateur</a><br><br>
    <a href="pmodifuser.php">Modifier un utilisateur</a><br><br>
    <a href="pdeleteuser.php">Supprimer un utilisateur</a>
</section>

</body>
<?php
}
?>