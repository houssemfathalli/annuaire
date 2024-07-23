<?php
require 'db.php';

$sql = "SELECT * FROM fiche";
$stmt = $conn->prepare($sql);
$stmt->execute();

$fiches = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Listes des annuaires</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <div class="container">
        <h2>Liste des annuaires</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Civilité</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse</th>
                    <th>CP</th>
                    <th>Ville</th>
                    <th>Pays</th>
                    <th>Date de Naissance</th>
                    <th>Téléphone</th>
                    <th>Fax</th>
                    <th>Email</th>
                    <th>URL</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fiches as $fiche) : ?>
                    <tr>
                        <td><?php echo $fiche['id']; ?></td>
                        <td><?php echo $fiche['gender']; ?></td>
                        <td><?php echo $fiche['lastname']; ?></td>
                        <td><?php echo $fiche['firstname']; ?></td>
                        <td><?php echo $fiche['address']; ?></td>
                        <td><?php echo $fiche['postcode']; ?></td>
                        <td><?php echo $fiche['city']; ?></td>
                        <td><?php echo $fiche['country']; ?></td>
                        <td><?php echo $fiche['birthday']; ?></td>
                        <td><?php echo $fiche['phone']; ?></td>
                        <td><?php echo $fiche['fax']; ?></td>
                        <td><?php echo $fiche['email']; ?></td>
                        <td><?php echo $fiche['url']; ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $fiche['id']; ?>">Modifier</a>
                            <!-- <a href="delete.php?id=<?php echo $fiche['id']; ?>">Supprimer</a> -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="add-new">
            <a href="add.php">Ajouter une nouvelle Annuaire</a>
        </div>
    </div>
</body>

</html>