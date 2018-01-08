<!DOCTYPE HTML>
<html lang="fr">
  <head>
    <title>Exercice 7 PDO partie1</title>
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
          $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (Exception $ex) {
          die('Erreur : ' . $ex->getMessage());
      }
      $reqClients = 'SELECT lastName, firstName, DATE_FORMAT(birthDate,\'%d/%m/%Y\')AS birthDate, REPLACE(REPLACE(card, 1, \'OUI\'), 0, \'NON\') AS card, cardNumber FROM clients';
      $clients = $bdd->query($reqClients);
      $result = $clients->fetchAll(PDO::FETCH_OBJ);
      foreach ($result as $showClientsList) {
          ?>
        <p style="font-size:25px;">Nom : <?php echo $showClientsList->lastName ?></p>
        <p style="font-size:25px;">Prénom : <?php echo $showClientsList->firstName ?></p>
        <p style="font-size:25px;">Date de naissance : <?php echo $showClientsList->birthDate ?></p>
        <p style="font-size:25px;">Carte de fidélité : <?php echo $showClientsList->card ?></p>
        <p style="font-size:25px;"><?php
          if ($showClientsList->cardNumber == NULL) {
              echo '';
          } else {
              echo 'Numéro de carte : ' . $showClientsList->cardNumber;
          }
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