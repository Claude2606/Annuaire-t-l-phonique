<?php
require("../model/pmodel.php");
session_start();
if(isset($_SESSION['user'])) {
    $user_id = $_SESSION['user_id'];
    $infos = recupinfo($user_id);
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../css/style.css">
        <title>Votre Profil</title>
    </head>
    <body>
    <header>
        <div class="header_profil">
            <div class="header_container">
                <div class="deco">
                    <form action="pdeco.php" method="POST">
                        <input type="submit" name="bConnexion" Value="Deconnexion">
                    </form>
                </div>

                <div class="tel">

                </div>

                <div class="nav">
                    <nav>
                        <ul>
                            <li><a href="paccueil.php"><i class="fa-solid fa-house fa-2x"></i><br/>Accueil</a></li>
                            <p>|</p>
                            <li><a href="paddcontact.php"><i class="fa-solid fa-plus fa-2x"></i><i class="fa-solid fa-address-book fa-2x"></i><br/>Ajout Contact</li></a></li>
                            <p>|</p>
                            <li><a href="pviewcontact.php"><i class="fa-solid fa-eye fa-2x"></i><i class="fa-solid fa-address-book fa-2x"></i><br/>Voir Contact</a></li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>

    </header>

    <section class="section_profil">
    <h1>Votre Profil</h1>
        <div class="profil_container">
            <div class="infos">
                <p><span>Nom :</span>&nbsp;<?php echo htmlspecialchars($infos[0]['nom']); ?></p>
                <p><span>Prénom :</span>&nbsp;<?php echo htmlspecialchars($infos[0]['prenom']); ?></p>
                <p><span>Date de Naissance :</span>&nbsp;<?php echo htmlspecialchars($infos[0]['date_n']); ?></p>
            </div>
            <a href="pmodifprofil.php">Modifier Profil</a>
        </div>
    </section>

    </body>