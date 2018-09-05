<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="../css/style_pizza.css" rel="stylesheet" media="all" type="text/css">
    <title>Liste de clients</title>
  </head>
  <body>
  <br><br>
<center><h1>Gestion des clients</h1></center>
<center><a href="ajout_client.html">Ajout</a> | <a href="../index.html">Retour à l'accueil</a></center>
<br><br>

<center>
<table width="700px">
<th align="left">NOM</th>
<th align="left">Prénom</th>
<th align="left">Ville</th>
<th align="left">Age</th>

  <?php

require_once __DIR__ . '/../src/functions.php';
$dbh = ConnectToBDD(); //Connexion a la BDD

listClient($dbh);

?>
</body>

</table>
</center>
</html>
