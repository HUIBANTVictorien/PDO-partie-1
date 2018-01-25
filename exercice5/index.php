<!DOCTYPE HTML>
<html lang="fr">
  <head>
    <title>Exercice 5 PDO partie1</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
      <?php
      // Connexion à la base de donnée.
      try {
          $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8;', 'usr_pdo1', 'pdo1');
          $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (Exception $ex) {
          die('Erreur : ' . $ex->getMessage());
      }
      $reqClientsM = 'SELECT lastName, firstName FROM clients WHERE lastName LIKE \'M%\' ORDER BY lastName';
      $clientsM = $bdd->query($reqClientsM);
      $finalClientsM = $clientsM->fetchAll(PDO::FETCH_OBJ);
      foreach ($finalClientsM as $clientListM) {
          ?>
        <p style="font-size:25px;">Nom : <?php echo $clientListM->lastName; ?></p>
        <p style="font-size:25px;"> Prénom : <?php echo $clientListM->firstName; ?></p>
        <?php
    }
    ?>
  </body>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="projet.js"></script>
</html>