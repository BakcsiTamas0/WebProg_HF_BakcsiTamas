<!DOCTYPE html>
<html>
<head>
    <title>Display User Data</title>
</head>
<body>
    <h1>User Registration Data</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        $dateOfBirth = $_POST["dateOfBirth"];
        $country = isset($_POST["country"]) ? $_POST["country"] : "";
        $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
        $hobbies = isset($_POST["hobbies"]) ? $_POST["hobbies"] : array();

        echo "<p>First Name: $firstName</p>";
        echo "<p>Last Name: $lastName</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Date of Birth: $dateOfBirth</p>";
        echo "<p>Country: $country</p>";
        echo "<p>Gender: $gender</p>";
        if (is_array($hobbies)) {
            echo "<p>Hobbies: " . implode(", ", $hobbies) . "</p>";
        } else {
            echo "<p>No hobbies selected.</p>";
        }
    } else {
        echo "<p>No data to display.</p>";
    }
    ?>
</body>
</html>
