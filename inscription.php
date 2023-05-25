
<html>
<head>
  <meta charset="utf-8">
  <title>Connexion</title>
  <link rel="stylesheet" type="text/css" href="css/inscription.css">

  <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Récupération des données du formulaire
$nom = $_POST['nom'];
$prenoms = $_POST['prenoms'];
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];
$confirmPassword = $_POST['confirm_mot_de_passe'];

// Vérification des mots de passe
if ($mot_de_passe !== $confirmPassword) {
    echo 'Les mots de passe ne correspondent pas.';
    exit;
}

// Insertion des informations dans la base de données (exemple basique)
// Vous devez adapter cette partie en fonction de votre base de données
// et de la méthode d'insertion que vous utilisez (PDO, MySQLi, etc.)

// Exemple avec sqlite
// $servername = 'localhost'; // Remplacez par votre nom de serveur
// $username = 'votre_utilisateur'; // Remplacez par votre nom d'utilisateur
// $mot_de_passe = 'votre_mot_de_passe'; // Remplacez par votre mot de passe
// $dbname = 'votre_base_de_donnees'; // Remplacez par le nom de votre base de données

// // Chemin vers le fichier de la base de données SQLite
// $databaseFile = '/home/haricrim/Bureau/Projets/projet_web_php/bdd.db';
// // Tentative de connexion à la base de données
// $conn = new SQLite3($databaseFile);

// // Vérification de la connexion
// if (!$conn) {
//     die('La connexion à la base de données a échoué.');
// }

// Connexion à la base de données
$conn = new mysqli('localhost', 'haricrim', 'haricrim', 'testdb');
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
    echo "echoué";
}

// Préparer et exécuter la requête d'insertion
$sql = "INSERT INTO users (nom, prenoms, email, mot_de_passe) VALUES ('$nom', '$prenoms', '$email', '$mot_de_passe')";

if ($conn->query($sql) === TRUE) {
    echo 'Inscription réussie.';
    header('Location: login.php'); // Redirection vers la page de connexion
    exit;
} else {
    echo 'Erreur lors de l\'inscription : ';
}

$conn->close();
}
?>
  
</head>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a href="" rel="dofollow">CONNEXION</a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Connectez-vous</span>
              <form id="stripe-login" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="field padding-bottom--24">
                  <label for="nom">Email</label>
                  <input id="nom" type="text" name="nom" required>
                </div>
                <div class="field padding-bottom--24">
                  <label for="prenoms">Email</label>
                  <input id="prenoms" type="text" name="prenoms" required>
                </div>
                <div class="field padding-bottom--24">
                  <label for="email">Email</label>
                  <input id="email" type="email" name="email" required>
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="mot_de_passe">Mot de passe</label>
                  </div>
                  <input id="mot_de_passe" type="password" name="mot_de_passe">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="confirm_mot_de_passe">Confirmer mpd</label>
                  </div>
                  <input id="confirm_mot_de_passe" type="password" name="confirm_mot_de_passe" required>
                </div>
                <!-- <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                  <label for="checkbox">
                    <input type="checkbox" name="checkbox"> Stay signed in for a week
                  </label>
                </div> -->
                <div class="field padding-bottom--24">
                <!-- <button onclick="login()">Se connecter</button> -->
                  <input type="submit" name="submit" value="S'inscrire">
                </div>
                <div class="field padding-bottom--24">
                <!-- <button onclick="login()">Se connecter</button> -->
                <button onclick="location.href='login.php'">Quitter</button>
                </div>
                <!-- <div class="field">
                  <a class="ssolink" href="#">Use single sign-on (Google) instead</a>
                </div> -->
              </form>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            <span>Vous avez deja compte ? <a href="login.php">Connectez-vous!</a></span>
            <!-- <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
              <span><a href="#">© Stackfindover</a></span>
              <span><a href="#">Contact</a></span>
              <span><a href="#">Privacy & terms</a></span>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

