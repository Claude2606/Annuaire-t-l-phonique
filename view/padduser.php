<form action="../controlleur/pcontrolleur.php" method="POST">
            <span>Nom</span>
            <input type="text" name="name" size="20" placeholder="Nom" required autofocus><br><br>

            <span>Prénom</span>
            <input type="text" name="firstname" size="20" placeholder="Prénom" required><br><br>

            <span>Nom d'utilisateur</span>
            <input type="text" name="username" size="20" placeholder="Nom d'utilisateur" required><br><br>

            <span>Date de naissance</span>
            <input type="date" name="date_n" size="20" placeholder="Date de naissance" required><br><br>

            <span>Mot de passe</span>
            <input type="password" name="password" size="20" placeholder="Mot de passe" required><br><br>

            <span>Confirmation de Mot de passe</span>
            <input type="password" name="cpassword" size="20" placeholder="Confirmation Mot de passe" required><br><br>

            <input type="submit" name="binscription" value="Ajouter un utilisateur"><br><br>

            <a href="paccueil.php">Retour</a>
        </form>