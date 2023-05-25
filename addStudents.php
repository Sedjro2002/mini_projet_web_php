
<html>
<head>
  <meta charset="utf-8">
  <title>Connexion</title>
  <link rel="stylesheet" type="text/css" href="css/addStudents.css">


  
</head>

<body>
<?php
    // Vérification si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupération des données du formulaire
        $nom = $_POST['nom'];
        $prenoms = $_POST['prenoms'];
        $sexe = $_POST['sexe'];
        $profession = $_POST['profession'];
        $description = $_POST['description'];
        $competences = json_encode($_POST['competences']);
        $interets = json_encode($_POST['interets']);
        $contact = $_POST['contact'];

        // echo json_encode($competences);

        // // Chemin vers le fichier de la base de données SQLite
        // $databaseFile = 'bdd.db';
        // // Tentative de connexion à la base de données
        // $conn = new SQLite3($databaseFile);

        // Connexion à la base de données
        $conn = new mysqli('localhost', 'haricrim', 'haricrim', 'testdb');
        if ($conn->connect_error) {
            die("La connexion à la base de données a échoué : " . $conn->connect_error);
            echo "echoué";
        }


        // Insertion des données de l'étudiant dans la base de données
        $sql = "INSERT INTO student (nom, prenoms, sexe, profession, description, competences, interets, contact) VALUES ('$nom', '$prenoms', '$sexe', '$profession', '$description', '$competences', '$interets', '$contact')";
        if ($conn->query($sql) === TRUE) {
            // $id_etudiant = $conn->insert_id;

            // // Insertion des compétences de l'étudiant dans la base de données
            // foreach ($competences as $competence) {
            //     $sql_competences = "INSERT INTO student_competences (id_etudiant, competence) VALUES ('$id_etudiant', '$competence')";
            //     $conn->query($sql_competences);
            // }

            // // Insertion des centres d'intérêts de l'étudiant dans la base de données
            // foreach ($interets as $interet) {
            //     $sql_interets = "INSERT INTO student_interets (id_etudiant, interet) VALUES ('$id_etudiant', '$interet')";
            //     $conn->query($sql_interets);
            // }

            echo "L'étudiant a été enregistré avec succès.";
        } else {
            echo "Erreur lors de l'enregistrement de l'étudiant : ";
        }

        // Fermeture de la connexion à la base de données
        $conn->close();
    }
    ?>

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
          <h1><a href="" rel="dofollow">Ajouter un etudiant</a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Connectez-vous</span>
              <form id="stripe-login" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="field padding-bottom--24">
                  <label for="nom">Nom</label>
                  <input id="nom" type="text" name="nom" required>
                </div>
                <div class="field padding-bottom--24">
                  <label for="prenoms">Prenoms</label>
                  <input id="prenoms" type="text" name="prenoms" required>
                </div>
                <div class=" padding-bottom--24">
                  <label>Sexe</label>
                  <input id="male" type="radio" name="sexe" value="male" required>
                  <label for="male">Male</label>
                  <input id="femelle" type="radio" name="sexe" value="femelle" required>
                  <label for="femelle">Femelle</label>
                </div>
                <div class="field padding-bottom--24">
                  <label for="profession">Profession</label>
                  <select name="profession" id="profession" required>
                    <option value="etudiant">Etudiant</option>
                    <option value="enseignant">Enseignant</option>
                    <option value="autre">Autre</option>
                  </select>
                </div>
                <div class="field padding-bottom--24">
                  <label for="description">Description</label>
                  <textarea id="description" name="description" rows="5" cols="30"></textarea>
                </div>
                <div class="field padding-bottom--24">
                  <label for="competences">Profession</label>
                  <select name="competences[]" id="competences" multiple required>
                    <option value="programmation">Programmation</option>
                    <option value="design">Design</option>
                    <option value="communication">Communication</option>
                  </select>
                </div>
                <div class=" padding-bottom--24">
                <label>Centres d'intérêts :</label>
        <input type="checkbox" id="sport" name="interets[]" value="sport">
        <label for="sport">Sport</label>
        <input type="checkbox" id="cinema" name="interets[]" value="cinema">
        <label for="cinema">Cinéma</label>
        <input type="checkbox" id="lecture" name="interets[]" value="lecture">
        <label for="lecture">Lecture</label>
        <input type="checkbox" id="voyages" name="interets[]" value="voyages">
        <label for="voyages">Voyages</label>
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                  <label for="contact">Contact :</label>
                  </div>
                  <input type="text" id="contact" name="contact" required>
                </div>
                
                <!-- <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                  <label for="checkbox">
                    <input type="checkbox" name="checkbox"> Stay signed in for a week
                  </label>
                </div> -->
                <div class="field padding-bottom--24">
                <!-- <button onclick="login()">Se connecter</button> -->
                  <input type="submit" name="submit" value="Enregistrer">
                </div>
                <div class="field padding-bottom--24">
                <input type="reset" value="Effacer">
                </div>
                <div class="field padding-bottom--24">
                <!-- <button onclick="login()">Se connecter</button> -->
                <button onclick="location.href='accueil.php'">Quitter</button>
                </div>
                <!-- <div class="field">
                  <a class="ssolink" href="#">Use single sign-on (Google) instead</a>
                </div> -->
              </form>
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

