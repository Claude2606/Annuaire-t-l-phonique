<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
    <title>Modification de mot de passe</title>
</head>
<body>
    <?php if(isset($_SESSION['user'])) { ?>
        <header>
            <div class="header_modifpassword">
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

        <section class="section_modifpassword_connecte">
        <h1>Modification de mot de passe</h1>
        <div class="container_form_modifpassword">
            <form action="../controlleur/pcontrolleur.php" method="POST">

                <span>Nouveau Mot de passe</span>
                <input type="password" name="new_password" placeholder="Nouveau Mot de passe" required autofocus>

                <span>Confirmation Mot de passe</span>
                <input type="password" name="new_cpassword" placeholder="Confirmation Mot de passe" required>

                <input type="submit" name="bmodif_password" value="Modifier Mot de Passe">

                <a href="pmodifprofil.php"><i class="fa-solid fa-arrow-left fa-1x"></i></a>

            </form>
        </div>
    </section>

    <footer class="footer">
        <p>Copyright &copy; Claude Peltier 2024</p>
    </footer>
        <?php
    } else { ?>
        <section class="section_modifpassword">
        <h1>Modification de mot de passe</h1>
        <div class="container_form_modifpassword">
            <form action="../controlleur/pcontrolleur.php" method="POST">

                <span>Nouveau Mot de passe</span>
                <input type="password" name="new_password" placeholder="Nouveau Mot de passe" required autofocus>

                <span>Confirmation Mot de passe</span>
                <input type="password" name="new_cpassword" placeholder="Confirmation Mot de passe" required>

                <input type="submit" name="bmodif_password" value="Modifier Mot de Passe">

                <?php if(!isset($_SESSION['user'])) {
                    ?><a href="pconnexion.php">Retour à la page de connexion</a>
                <?php
                }
                ?>
            </form>
        </div>
    </section>
    <?php
    }
    ?>
</body>