<?php
include("../model/dbconnect.php");

function inscription_db($name, $firstname, $username, $date_n, $password){
    global $bdd;
    $role = 0;
    if(isset($message)){return $message;}
    $querysqldata = "INSERT INTO users (nom, prenom, username, date_n, role, password) VALUES (:name, :firstname, :username, :date_n, :role, :password)";
    $stmtusersinsert = $bdd->prepare($querysqldata);
    $stmtusersinsert->bindParam(":name", $name);
    $stmtusersinsert->bindParam(":firstname", $firstname);
    $stmtusersinsert->bindParam(":username", $username);
    $stmtusersinsert->bindParam(":date_n", $date_n);
    $stmtusersinsert->bindParam(":role", $role);
    $stmtusersinsert->bindParam(":password", $password);
    try{
        $stmtusersinsert->execute();
    }catch(PDOException $e) {
        $message = "Erreur d'inscription";
    }
}

function login($username, $password){
    global $bdd;
    $sqluser = "SELECT * FROM `users` where username= :username";
    $stmtusers = $bdd->prepare($sqluser);
    $stmtusers->bindParam(":username", $username);
    if(isset($message)){return $message;}
    try{
        $stmtusers->execute();
    }catch(PDOException $e){
        $message = "Erreur de connexion";
        return false;
    }
    $user = $stmtusers->fetch();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION["user"] = $user;
        $_SESSION["user_id"] = $user['users_id'];
        return true;
    }
}


// On récupére les info de l'utilisateur

function recupinfo($user_id) {
    global $bdd;
    $sqluser = "SELECT * FROM users WHERE users_id = :user_id";
    $stmt = $bdd->prepare($sqluser);
    $stmt->bindParam(":user_id",$user_id);
    $stmt->execute();

    // On récupére les résultats sous forme de tableau associatif
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


// On récupére les info du contact

function recupinfo_contact($contacts_id) {
    global $bdd;
    $sqluser = "SELECT * FROM user_contacts WHERE contacts_id = :contact_id";
    $stmt = $bdd->prepare($sqluser);
    $stmt->bindParam(":contact_id",$contacts_id);
    $stmt->execute();

    // On récupére les résultats sous forme de tableau associatif
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function update_profil($user_id, $new_name, $new_firstname, $new_date_n) {
    global $bdd;
    $sql = "UPDATE users SET ";
    $params = array();

    // On vérifie si chaque champs est null ou pas 
    if ($new_name !== null) {
        $sql .= "nom = :new_name, ";
        $params['new_name'] = $new_name;
    }

    if ($new_firstname !== null) {
        $sql .= "prenom = :new_firstname, ";
        $params['new_firstname'] = $new_firstname;
    }

    if ($new_date_n !== null) {
        $sql .= "date_n = :new_date_n, ";
        $params['new_date_n'] = $new_date_n;
    }
    
    // On supprime la virgule finale et on ajoute la clause WHERE
    $sql = rtrim($sql, ", ");
    $sql .= " WHERE users_id = :user_id";
    $params['user_id'] = $user_id;

    $stmt = $bdd->prepare($sql);
    $stmt->execute($params);
}


function update_password($new_password) {
    global $bdd;
    $sql = "UPDATE users SET ";
    $params = array();

    if ($new_password !== null) {
        $sql .= "password = :new_password, ";
        $params['new_password'] = $new_password;
    }

    $sql = rtrim($sql, ", ");
    $sql .= "WHERE users_id = :user_id";
    $params['user_id'] = $user_id;
    $stmt = $bdd->prepare($sql);
    $stmt->execute($params);
}


// Insérer un contact dans la base de données

function create_contact($contact_name, $contact_firstname, $contact_num, $contact_adresse, $genre) {
    global $bdd;
    $querysqldata = "INSERT INTO user_contacts (nom_contact, prenom_contact, numero_contact, adresse_contact, sexe_contact)
                     VALUES (:contact_name, :contact_firstname, :contact_num, :contact_adresse, :genre)";
    $stmtcontactinsert = $bdd->prepare($querysqldata);
    $stmtcontactinsert->bindParam(":contact_name", $contact_name);
    $stmtcontactinsert->bindParam(":contact_firstname", $contact_firstname);
    $stmtcontactinsert->bindParam(":contact_num", $contact_num);
    $stmtcontactinsert->bindParam(":contact_adresse", $contact_adresse);
    $stmtcontactinsert->bindParam(":genre", $genre);
    try{
        $stmtcontactinsert->execute();
    }catch(PDOException $e) {
        return "Création de contact échoué ";
    }
}


function voiruser($user_id) {
    global $bdd;
    $sqluser = "SELECT * FROM users WHERE users_id = :user_id";
    $stmt = $bdd->prepare($sqluser);
    $stmt->bindParam(":user_id",$user_id);
    $stmt->execute();

    // On récupére les résultats sous forme de tableau associatif
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>