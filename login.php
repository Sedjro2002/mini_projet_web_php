
<html>
<head>
  <meta charset="utf-8">
  <title>Connexion</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">


  <?php
    // Démarrer la session
    // session_start();
    // $_SESSION['verified'] = false;

// // Chemin vers le fichier de la base de données SQLite
// $databaseFile = 'bdd.db';
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

// Récupération des informations des utilisateurs
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$users = array();
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

// Conversion des informations en JSON
$usersJSON = json_encode($users);

// Fermeture de la connexion à la base de données
$conn->close();
?>


  <script>
        function login() {
            // Récupération des informations du formulaire
            var email = document.getElementById('email').value;
            var mot_de_passe = document.getElementById('mot_de_passe').value;

            // Récupération des informations des utilisateurs depuis le JSON
            var users = <?php echo $usersJSON; ?>;

            // Vérification des informations
            var valid = false;
            for (var i = 0; i < users.length; i++) {
                if (users[i].email === email && users[i].mot_de_passe === mot_de_passe) {
                    valid = true;
                    console.log("bien");
                    break;
                }
            }

            // Affichage du résultat
            if (valid) {
                alert("Connexion réussie !");
                window.location.href = "http://localhost:3000/accueil.php"; // Redirection vers la page d'accueil
                console.log("bien2");
            } else {
                alert("Identifiants incorrects !");
            }
        }
        
    </script>
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
              <div id="stripe-login">
                <div class="field padding-bottom--24">
                  <label for="email">Email</label>
                  <input id="email" type="email" name="email" required>
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="mot_de_passe">Mot de passe</label>
                    <!-- <div class="reset-pass">
                      <a href="#">Forgot your mot_de_passe?</a>
                    </div> -->
                  </div>
                  <input id="mot_de_passe" type="password" name="mot_de_passe">
                </div>
                <!-- <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                  <label for="checkbox">
                    <input type="checkbox" name="checkbox"> Stay signed in for a week
                  </label>
                </div> -->
                <div class="field padding-bottom--24">
                <button onclick="login()">Se connecter</button>
                  <!-- <input type="button" name="button" onclick="login()" value="Continue"> -->
                </div>
                <div class="field padding-bottom--24">
                <!-- <button onclick="login()">Se connecter</button> -->
                <a href="login.php"><button type="button" >Quitter</button></a>
                </div>
                <!-- <div class="field">
                  <a class="ssolink" href="#">Use single sign-on (Google) instead</a>
                </div> -->
              </div>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            <span>Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez-vous!</a></span>
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