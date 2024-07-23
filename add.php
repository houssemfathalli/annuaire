<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = [];

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
        $sql = "INSERT INTO fiche (gender, lastname, firstname, address, postcode, city, country, birthday, phone, fax, email, url) 
            VALUES (:gender, :lastname, :firstname, :address, :postcode, :city, :country, :birthday, :phone, :fax, :email, :url)";

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
                ':url' => $url
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
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ajouter une fiche annuaire</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="js/script.js"></script>
</head>

<body>
    <div class="container">
        <h2>Ajouter une fiche annuaire</h2>
        <form method="post" action="" onsubmit="return validateForm()">
            <label for="gender">Civilité:</label>
            <input type="text" id="gender" name="gender">

            <label for="lastname">Nom:</label>
            <input type="text" id="lastname" name="lastname">

            <label for="firstname">Prénom:</label>
            <input type="text" id="firstname" name="firstname">

            <label for="address">Adresse:</label>
            <input type="text" id="address" name="address">

            <label for="postcode">Code Postal:</label>
            <input type="text" id="postcode" name="postcode">

            <label for="city">Ville:</label>
            <input type="text" id="city" name="city">

            <label for="country">Pays:</label>
            <input type="text" id="country" name="country">

            <label for="birthday">Date de Naissance:</label>
            <input type="date" id="birthday" name="birthday">

            <label for="phone">Téléphone:</label>
            <input type="text" id="phone" name="phone">

            <label for="fax">Fax:</label>
            <input type="text" id="fax" name="fax">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email">

            <label for="url">URL:</label>
            <input type="url" id="url" name="url">

            <input type="submit" value="Enregistrer">
        </form>
    </div>
</body>

</html>