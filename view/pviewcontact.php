<?php
require("../model/pmodel.php");
session_start();
if(isset($_SESSION['user'])) {
    $contacts_id = $_SESSION['user_id'];
    $infos_contact = recupinfo_contact($contacts_id);
}
?>
    <!DOCTYPE html> 
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../css/style.css">
        <title>Vos Contacts</title>
    </head>

    <body>
        <header>
            <div class="header_vuecontact">
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
                                <li><a href="paddcontact.php"><i class="fa-solid fa-plus fa-2x"></i><i class="fa-solid fa-address-book fa-2x"></i><br/>Ajout Contact</li></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <Section class="vue_contact">
            <div class="contact_container">
                <div class="infos_contact">
                    <?php if(isset($infos_contact[0])): ?>
                        <p>Nom : <?php echo htmlspecialchars($infos_contact[0]['nom_contact']) ?? 'Nom indisponible'; ?></p>
                        <p>Prénom : <?php echo htmlspecialchars($infos_contact[0]['prenom_contact']) ?? 'Prénom indisponible'; ?></p>
                        <p>Numéro : <?php echo htmlspecialchars($infos_contact[0]['numero_contact'] ?? 'Numéro indisponible'); ?></p>
                        <p>Adresse : <?php echo htmlspecialchars($infos_contact[0]['adresse_contact'] ?? 'Adresse indisponible'); ?></p>
                        <p>Sexe : <?php echo htmlspecialchars($infos_contact[0]['sexe_contact'] ?? 'Sexe indisponible'); ?></p>
                    <?php else: ?>
                        <p>Les informations de contact ne sont pas disponibles.</p>
                    <?php endif; ?>
                            
                        
                </div>
            </div>
        </Section>

        <footer class="footer">
            <p>Copyright &copy; Claude Peltier 2024</p>
        </footer>

    </body>