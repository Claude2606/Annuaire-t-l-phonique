<?php 
require("../model/pmodel.php");
session_start();
if(isset($_SESSION['user'])){  
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../css/style.css">
        <title>Modification de profil</title>
    </head>
    <body>
    <header>
        <div class="header_modifprofil">
            <div class="header_container">
                <div class="deco">
                    <form action="pdeco.php" method="POST">
                        <input type="submit" name="bConnexion" Value="Deconnexion">
                    </form>
                </div>

                <div class="nav">
                    <nav>
                        <ul>
                            <li><a href="paccueil.php"><i class="fa-solid fa-house fa-2x"></i><br/>Accueil</a></li>
                            <p>|</p>
                            <li><a href="pprofil.php"><i class="fa-solid fa-user fa-2x"></i><br/>Profil</a></li>
                            <p>|</p>
                            <li><a href="pviewcontact.php"><i class="fa-solid fa-eye fa-2x"></i><i class="fa-solid fa-address-book fa-2x"></i><br/>Voir Contact</a></li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </header>

    <section class="section_modif_profil">
        <h1>Modifier votre profil</h1>
        <div class="container_form_modifprofil">
            <form action="../controlleur/pcontrolleur.php" method="POST">

                <span>Nouveau Nom :</span>
                <input type="text" name="new_name" placeholder="Nouveau Nom" required autofocus>

                <span>Nouveau Prénom :</span>
                <input type="text" name="new_firstname" placeholder="Nouveau prénom" required>

                <span>Modifier date de naissance :</span>
                <input type="date" name="new_date_n">

                <input type="submit" name="bmodif_profil" value="Modifier mes données" required>
                <a href="pmodifpassword.php">Modifier le mot de passe</a>

                <a href="pprofil.php"><i class="fa-solid fa-arrow-left fa-1x"></i></a>

            </form>
        </div>
    </section>

    <footer class="footer">
        <p>Copyright &copy; Claude Peltier 2024</p>
    </footer>



    </body>
    </html>
<?php
}
?>