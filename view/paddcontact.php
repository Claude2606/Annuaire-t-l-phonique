<?php
session_start();
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
    <title>Ajout de contact</title>
</head>
<body>
    <header>
        <div class="header_addcontact">
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

    <section class="section_addcontact">
        <h1>Ajouter un contact</h1>
        <div class="container_form_addcontact">
            <form action="../controlleur/pcontrolleur.php" method="POST">

            <span>Nom du contact :</span>
            <input type="text" name="contact_name" size="20" placeholder="Nom du contact" required autofocus>

            <span>Prénom du contact :</span>
            <input type="text" name="contact_firstname" size="20" placeholder="Prénom du contact" required >

            <span>Numéro du contact :</span>
            <input type="text" name="contact_num" size="20" placeholder="Numéro du contact" required >

            <span>Adresse du contact :</span>
            <input type="text" name="contact_adresse" size="20" placeholder="Adresse du contact" required >

            <div class="genre">
                <label class="titre_genre" for="genre">Sexe du contact :</label>
                <input type="radio" id="male" name="genre" value="male" required>
                <label for="genre">Homme</label>
                <input type="radio" id="female" name="genre" value="female" required>
                <label for="genre">Femme</label>
            </div>



            <input type="submit" name="bcontact_create" value="Ajouter un contact">

            </form>
        </div>
    </section>
</body>