<?php

// Connexion à une base MySQL avec l'invocation de pilote
function ConnectToBDD() {
  try {
$dsn = 'mysql:dbname=pizzeria;host=127.0.0.1;charset=UTF8';//on peut aussi mettre localhost
$user = 'root';//utilisateur de la base, root par défaut
$password = '';//pas de mot de passe
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $pdo;
      }
catch (PDOException $e) {
    echo 'Y a un problème mon pote : '. $e->getMessage();
  }
}
// Fonction lister les Pizzas dans un tableau
function listClient($dbh)
{
    try {
        $stmt = $dbh->prepare("
        SELECT nom, prenom, ville, age
         FROM client;
        ");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            echo '<tr>';
            echo '<td>'. $row['nom'].'</td><td>'.$row['prenom'].'</td><td>'.$row['ville'].'</td><td>'.$row['age'].'</td>';
            echo '</tr>';
        }
    }
    catch (PDOException $e)
        {
        echo $e->getMessage();
        }
}

// Fonction ajouter une Nouvel Pizza
function ajoutClient($dbh)
{
    try {
        $stmt = $dbh->prepare("
        INSERT INTO client (nom, prenom, ville, age)
        VALUES (:nom, :prenom, :ville, :age);
        ");
        $stmt->execute(['nom' => ($_POST['nom']), 'prenom' => ($_POST['prenom']), 'ville' => ($_POST['ville']), 'age' => ($_POST['age'])]);
        echo '<h1>Bravo !</h1>';
        echo 'Votre client fait désomais partie de la liste !';
        echo '<br><br>';
        echo '<a href="ajout_client.html">Retourner à la liste des Pizzas</a>';
         }
    catch (PDOException $e)
        {
        echo $e->getMessage();
        }
}

function listPizza($dbh)
{
    try {
        $stmt = $dbh->prepare("
        SELECT id, libelle, reference, prix, url_image
        FROM pizza;
        ");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            echo '<tr>';
            echo '<td>'.$row['id'].'</td><td>'. $row['libelle'].'</td><td>'.$row['reference'].'</td><td>'.$row['prix'].'</td><td>'.'<img src="images/'.$row['url_image'].'" width="200px"></td>';
            echo '</tr>';
        }
    }
    catch (PDOException $e)
        {
        echo $e->getMessage();
        }
}

// Fonction ajouter une Nouvel Pizza
function ajoutPizza($dbh)
{
    try {
      $stmt = $pdo->prepare("
            INSERT INTO pizza (libelle, reference, prix, url_image)
            VALUES (:libelle, :reference, :prix, :url_image);
            ");
            $stmt->execute(['libelle' => ($_POST['libelle']), 'reference' => ($_POST['reference']), 'prix' => ($_POST['prix']), 'url_image' => ($_POST['url_image'])]);
            echo '<h1>Bravo !</h1>';
            echo 'Votre Pizza fait désomais partie de la liste !';
            echo '<br><br>';
            echo '<a href="pizzas.php">Retourner à la liste des Pizzas</a>';
             } 
    catch (PDOException $e)
        {
        echo $e->getMessage();
        }
}

?>
