<?php
// Je crée une variable query dans laquelle je mets ma requête SQL
$query = 'SELECT `id`, `lastName`, `firstName`, DATE_FORMAT(`birthDate`, \'%d/%m/%Y\') AS birthDate, `card`, `cardNumber` FROM `clients`;';
// On fait un try catch pour être sûr que la connexion à mysql se fasse
try {
    // On instancie un objet PDO. Le host est l'adresse locale sur laquelle on se connecte. dbname correspond au nom de la base de données.
    $db = new PDO('mysql:host=127.0.0.1;dbname=colyseum;charset=utf8', 'usr_pdo1', 'pdo1');
} catch (Exception $ex) { // On attrape l'exception, qui est une erreur de PHP
    // Die arrête le script PHP en cas d'erreur et affiche ce qu'on lui met en paramètre
    die('Erreur : ' . $ex->getMessage());
}
// Gràce à ->query($query) on éxécute la requête SQL et on récupère un objet PDO Statement
$customersResult = $db->query($query);
/* fetchAll() va retourner le résultat sous la forme du paramètre demandé
 * PDO::FETCH_ASSOC est le paramètre qui permet d'avoir un tableau associatif. Les clés sont les noms des colonnes de la table
 */
$customersList = $customersResult->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Exercice 1 Correction</title>
  </head>
  <body>
    <h1>Correction de l'exercice</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Date de naissance</th>
          <th>Carte</th>
          <th>Numéro de carte</th>
        </tr>
      </thead>
      <tbody>
          <?php foreach ($customersList AS $customers) { ?>
            <tr>
              <td><?= $customers['id']; ?></td>
              <td><?= $customers['lastName']; ?></td>
              <td><?= $customers['firstName']; ?></td>
              <td><?= $customers['birthDate']; ?></td>
              <td><?= $customers['card']; ?></td>
              <td><?= $customers['cardNumber']; ?></td>
            </tr>
        <?php } ?>
      </tbody>
    </table>

  </body>
</html>