<?php
session_start();
$titre = "Inscription";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Inscription</title>
</head>
<body>

<Section class="section_inscription">
    <h1>Inscription</h1>
    <div class="container_form_inscription">
        <form action="../controlleur/pcontrolleur.php" method="POST">
            <span>Nom</span>
            <input type="text" name="name" size="20" placeholder="Nom" required autofocus>

            <span>Prénom</span>
            <input type="text" name="firstname" size="20" placeholder="Prénom" required>

            <span>Nom d'utilisateur</span>
            <input type="text" name="username" size="20" placeholder="Nom d'utilisateur" required>

            <span>Date de naissance</span>
            <input type="date" name="date_n" size="20" placeholder="Date de naissance" required>

            <span>Mot de passe</span>
            <input type="password" name="password" size="20" placeholder="Mot de passe" required>

            <span>Confirmation de Mot de passe</span>
            <input type="password" name="cpassword" size="20" placeholder="Confirmation Mot de passe" required>

            <input type="submit" name="binscription" value="S'inscrire">

            <a href="pconnexion.php">Déjà Inscris ?</a>
        </form>
    </div>
</Section>