<!DOCTYPE html>
<html>
<head>
    <title>Form Data Display</title>
</head>
<body>
    <h3>Form Data:</h3>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : "";
        $lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $attend = isset($_POST["attend"]) ? $_POST["attend"] : array();
        $tshirt = isset($_POST["tshirt"]) ? $_POST["tshirt"] : "";
        $terms = isset($_POST["terms"]) ? $_POST["terms"] : "";

        echo "<p>First Name: $firstName</p>";
        echo "<p>Last Name: $lastName</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Events Attended: " . implode(", ", $attend) . "</p>";
        echo "<p>T-Shirt Size: $tshirt</p>";
        echo "<p>Agreed to Terms: $terms</p>";

        if (isset($_FILES["abstract"]) && $_FILES["abstract"]["error"] == UPLOAD_ERR_OK) {
        }
    }
    ?>
</body>
</html>
