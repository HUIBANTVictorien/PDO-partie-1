<!DOCTYPE HTML>
<html lang="fr">
  <head>
    <title>Exercice 2 PDO partie1</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
      <?php
      // Connexion à la base de donnée.
      try {
          $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8;', 'root', 'c2004v2307');
      } catch (Exception $ex) {
          die('Erreur : ' . $ex->getMessage());
      }
      $reqTypes = 'SELECT genre FROM genres';
      $types = $bdd->query($reqTypes);
      foreach ($types as $typesList) {
          ?>
        <p style="font-size:25px;">
          <?php
          echo ($typesList['genre']);
          ?></p>
        <?php
    }
    ?>
  </body>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="projet.js"></script>
</html>