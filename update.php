<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = [];

    $id = $_POST['id'];
    $gender = trim($_POST['gender']);
    $lastname = trim($_POST['lastname']);
    $firstname = trim($_POST['firstname']);
    $address = trim($_POST['address']);
    $postcode = trim($_POST['postcode']);
    $city = trim($_POST['city']);
    $country = trim($_POST['country']);
    $birthday = trim($_POST['birthday']);
    $phone = trim($_POST['phone']);
    $fax = trim($_POST['fax']);
    $email = trim($_POST['email']);
    $url = trim($_POST['url']);

    // validate email and url field
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format";
    if (!empty($url) && !filter_var($url, FILTER_VALIDATE_URL)) $errors[] = "Invalid URL format";
    if (empty($errors)) {
        $sql = "UPDATE fiche SET gender=:gender, lastname=:lastname, firstname=:firstname, address=:address, postcode=:postcode, city=:city, country=:country, birthday=:birthday, phone=:phone, fax=:fax, email=:email, url=:url WHERE id=:id";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':gender' => $gender,
                ':lastname' => $lastname,
                ':firstname' => $firstname,
                ':address' => $address,
                ':postcode' => $postcode,
                ':city' => $city,
                ':country' => $country,
                ':birthday' => $birthday,
                ':phone' => $phone,
                ':fax' => $fax,
                ':email' => $email,
                ':url' => $url,
                ':id' => $id
            ]);
            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
} else {
    $id = $_GET['id'];

    $sql = "SELECT * FROM fiche WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Aucun Enregistrement Trouvé";
        exit;
    }
}
// print_r($row);
// die;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Modifier une fiche annuaire</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="js/script.js"></script>
</head>

<body>
    <div class="container">
        <h2>Modifier une fiche annuaire</h2>
        <form method="post" action="" onsubmit="return validateForm()">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="gender">Civilité:</label>
            <input type="text" id="gender" name="gender" value="<?php echo $row['gender']; ?>">

            <label for="lastname">Nom:</label>
            <input type="text" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>">

            <label for="firstname">Prénom:</label>
            <input type="text" id="firstname" name="firstname" value="<?php echo $row['firstname']; ?>">

            <label for="address">Adresse:</label>
            <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>">

            <label for="postcode">Code Postal:</label>
            <input type="text" id="postcode" name="postcode" value="<?php echo $row['postcode']; ?>">

            <label for="city">Ville:</label>
            <input type="text" id="city" name="city" value="<?php echo $row['city']; ?>">

            <label for="country">Pays:</label>
            <input type="text" id="country" name="country" value="<?php echo $row['country']; ?>">

            <label for="birthday">Date de Naissance:</label>
            <input type="date" id="birthday" name="birthday" value="<?php echo $row['birthday']; ?>">

            <label for="phone">Téléphone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>">

            <label for="fax">Fax:</label>
            <input type="text" id="fax" name="fax" value="<?php echo $row['fax']; ?>">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>">

            <label for="url">URL:</label>
            <input type="url" id="url" name="url" value="<?php echo $row['url']; ?>">

            <input type="submit" value="Enregistrer">
        </form>
    </div>
</body>

</html>