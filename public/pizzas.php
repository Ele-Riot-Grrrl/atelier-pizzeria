<html>

<head>
<title>Pizzas</title>
<meta charset="utf-8">
</head>

<body>
<h1>Gestion des Pizzas</h1>
<a href="ajoutpizza.html">Ajouter une pizza</a> / <a href="index.html">Accueil</a>
<br>
<h1>Liste des Pizzas</h1>

<table width="700px">
<th align="left">Id.</th>
<th align="left">Libellé</th>
<th align="left">Référence</th>
<th align="left">Prix</th>
<th align="left">Image</th>
<?php

require_once __DIR__ . '/../src/functions.php';
$dbh = ConnectToBDD(); //Connexion a la BDD

listPizza($dbh);

?>

</body>

</table>

</html>
