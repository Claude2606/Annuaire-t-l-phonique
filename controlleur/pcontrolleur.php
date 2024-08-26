<?php
session_start();
require("../model/pmodel.php");
$error_code = "";

if(isset($_POST['binscription'])){
    $name = htmlspecialchars(strtolower(trim($_POST['name'])));
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $username = htmlspecialchars(trim($_POST['username']));
    $date_n = htmlspecialchars(trim($_POST['date_n']));
    $password = htmlspecialchars(trim($_POST['password']));
    $cpassword = htmlspecialchars(trim($_POST['cpassword']));

    if(!preg_match('/\d/', $password)) { 
        $error_code = "err_chiffre";
    }
    elseif (strlen($password) < 8) {
        $error_code = "err_taille";
    }
    elseif($password!=$cpassword){
        $error_code = "err_confirm";
    }

    switch ($error_code) {
        case "err_chiffre":
            echo "<script>alert('Le mot de passe doit contenir au moins un chiffre. Inscription échouée !');</script>";
            echo "<script>window.location.href = '../view/pinscription.php';</script>";
            break;
        case "err_taille":
            echo "<script>alert('Le mot de passe doit contenir au moins 8 caractères. Inscription échouée !');</script>";
            echo "<script>window.location.href = '../view/pinscription.php';</script>";
            break;
        case "err_confirm":
            echo "<script>alert('Confirmation de mot de passe incorrecte. Inscription échouée !');</script>";
            echo "<script>window.location.href = '../view/pinscription.php';</script>";
            break;
        default:
            session_destroy();
            $password = password_hash($password, PASSWORD_DEFAULT);
            inscription_db($name, $firstname, $username, $date_n, $password);
            echo "<script>alert('Inscription réussie !');</script>";
            echo "<script>window.location.href = '../view/pconnexion.php';</script>";
            break;
    }
}

if(isset($_POST['bconnexion'])){
    $username = htmlspecialchars(strtolower(trim($_POST['username'])));
    $password = htmlspecialchars(trim($_POST['password']));

    if (login($username, $password)) {
        header("location: ../view/paccueil.php");
        exit();
    } else {
        // Alerte erreur de connexion avant la redirection
        echo "<script>alert('Nom d\'utilisateur ou mot de passe incorrect !');</script>";
        // Redirection vers page de connexion
        echo "<script>window.location.href = '../view/pconnexion.php';</script>";
        exit();
    }
}

if(isset($_POST['valid_new_password'])){
    $new_password = htmlspecialchars(trim($_POST['new_password']));
    $new_cpassword = htmlspecialchars(trim($_POST['new_cpassword']));
    if($new_password === $new_cpassword){
        header("Location: ../view/pconnexion.php");
        exit();
    } else {
        header("Location: ../view/pmodifpassword.php");
    }
}


// Créer un contact

if(isset($_POST['bcontact_create'])) {   
    $contact_name = htmlspecialchars(strtolower(trim($_POST['contact_name'])));
    $contact_firstname = htmlspecialchars(trim($_POST['contact_firstname']));
    $contact_num = htmlspecialchars(trim($_POST['contact_num']));
    $contact_adresse = htmlspecialchars(trim($_POST['contact_adresse']));
    $genre = htmlspecialchars(trim($_POST['genre']));

    create_contact($contact_name, $contact_firstname, $contact_num, $contact_adresse, $genre);
    header("Location: ../view/paccueil.php");
}


// Modifier Données du profil (nom, prénom, date de naissance)

if(isset($_POST['bmodif_profil'])) {
    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $new_name = !empty($_POST['new_name']) ? htmlspecialchars(trim($_POST['new_name'])) : null;
        $new_firstname = !empty($_POST['new_firstname']) ? htmlspecialchars(trim($_POST['new_firstname'])) : null;
        $new_date_n = !empty($_POST['new_date_n']) ? htmlspecialchars(trim($_POST['new_date_n'])) : null;

        if ($new_name !== null || $new_firstname !== null || $new_date_n) {
            update_profil($user_id, $new_name, $new_firstname, $new_date_n);
        }
        header("Location: ../view/pprofil.php");
    }
    else {
        header("Location: ../view/pconnexion.php");
        exit;
    }
}


// Modifier le mot de passe

if(isset($_POST['bmodif_password'])){
    if(isset($_SESSION['user'])){
        $new_password = !empty($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : null;
        $new_cpassword = !empty($_POST['cpassword']) ? htmlspecialchars(trim($_POST['cpassword'])) : null;
        $error_code2 = null;

        if ($new_password !== null) {
            if (!preg_match('/\d/', $new_password)) {
                $error_code2 = "err_chiffre";
            } elseif (strlen($new_password) < 8) {
                $error_code2 = "err_taille";
            } elseif ($new_password!=$new_cpassword) {
                $error_code2 = "err_confirm";
            }
        }

        switch ($error_code2) {
            case "err_chiffre":
                $_SESSION['Erreurpsw'] = "Le mot de passe doit contenir au moins un chiffre.";
                header("Location: ../view/pmodifpassword.php");
                exit(); 
            case "err_taille":
                $_SESSION['Erreurpsw'] = "Mot de passe trop court.";
                header("Location: ../view/pmodifpassword.php");
                exit(); 
            case "err_confirm":
                $_SESSION['Erreurpsw'] = "Confirmation incorrecte";
                header("Location: ../view/pmodifpassword.php");
                exit(); 
            default: 
                if ($new_password !== null) {
                    // Hachage mot de passe avant de le stocker
                    $new_password = password_hash($new_password, PASSWORD_DEFAULT);
                    update_password($new_password);
                }
                header("Location: ../view/pconnexion.php");
                exit();
        }
    }
}
?>