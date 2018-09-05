<?php

// Connexion à la base de données
function ConnectToBDD() {
    try {
        $dsn = 'mysql:dbname=pizzeria;host=localhost';
        $user = 'root';
        $password = '';
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
        }
    catch (PDOException $e) {
        echo 'Unable to connect :' .$e->getMessage();
        }
}

// Fonction lister les Pizzas dans un tableau
function listPizza($dbh)
{
    try {
        $stmt = $dbh->prepare("
        SELECT id, libelle, reference, prix, url_image FROM pizza;
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
        $stmt = $dbh->prepare("
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
