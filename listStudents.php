<!DOCTYPE html>
<html>
<head>
    <title>Liste des étudiants</title>
    <link rel="stylesheet" type="text/css" href="css/addStudents.css">


    <style>
        /* table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        } */

        * {
  font-family: sans-serif; /* Change your font family */
}

table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

table th,
table td {
  padding: 12px 15px;
}

table tbody tr {
  border-bottom: 1px solid #dddddd;
}

table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}


        
    </style>
</head>
<body>
    <h1>Liste des étudiants</h1>

    <?php
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


    // Récupération des étudiants depuis la base de données
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Affichage du tableau avec les données des étudiants
        echo "<table class='content-table'>";
        echo "<tr><th>Nom</th><th>Prénoms</th><th>Sexe</th><th>Profession</th><th>Competences</th><th>Centres d'interets</th><th>Description</th>
        
        <th>Contact</th></tr>";

        while ($row = $result->fetch_assoc()) {

            echo "<tr>";
            echo "<td>".$row['nom']."</td>";
            echo "<td>".$row['prenoms']."</td>";
            echo "<td>".$row['sexe']."</td>";
            echo "<td>".$row['profession']."</td>";
            echo "<td>".implode(", ",json_decode($row['competences']))."</td>";
            echo "<td>".implode(", ",json_decode($row['interets']))."</td>";
            echo "<td>".$row['description']."</td>";
            echo "<td>".$row['contact']."</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Aucun étudiant trouvé.";
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
    ?>

    <br>
    <button onclick="location.href='accueil.php'">Retour à l'accueil</button>
    <button onclick="location.href='addStudents.php'">Ajouter un etudiant</button>

</body>
</html>
