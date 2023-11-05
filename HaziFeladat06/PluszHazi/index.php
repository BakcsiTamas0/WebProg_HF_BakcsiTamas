<!DOCTYPE html>
<html>
    <head>
        <title>Registration Form</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .form-container {
                width: 400px;
                padding: 20px;
                background-color: #f5f5f5;
                border: 1px solid #ccc;
                border-radius: 5px;
                text-align: center;
            }
            .container {
                display: flex;
                flex-direction: row;
                align-items: left;
                margin: 10px 0;
            }
            .container > label {
                min-width: 150px;
                text-align: left;
                padding-right: 10px;
            }
            .container > input,
            .container > select {
                flex: 1;
            }
            input[type="submit"],
            input[type="button"] {
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class="form-container">
            <h1>Registration Form</h1>
            <form action="result.php" method="POST">
                <div class="container">
                    <label for="firstName">First Name:</label>
                    <input id="firstName" type="text" name="firstName" placeholder="Enter your first name">
                </div>
                <div class="container">
                    <label for="lastName">Last Name:</label>
                    <input id="lastName" type="text" name="lastName" placeholder="Enter your last name">
                </div>
                <div class="container">
                    <label for="email">Email Address:</label>
                    <input id="email" type="email" name="email" placeholder="Enter your email address here">
                </div>
                <div class="container">
                    <label for="password">Password:</label>
                    <input id="password" type="password" name="password" placeholder="Enter your password here">
                </div>
                <div class="container">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input id="confirmPassword" type="password" name="confirmPassword" placeholder="Confirm your password here">
                </div>
                <div class="container">
                    <label for="dateOfBirth">Date of Birth:</label>
                    <input id="dateOfBirth" type="date" name="dateOfBirth">
                </div>
                <div class="container">
                    <label for="country">Country:</label>
                    <select id="country" name="country">
                        <option value="hungary">Hungary</option>
                        <option value="romaina">Romania</option>
                        <option value="usa">USA</option>
                        <option value="uk">UK</option>
                    </select>
                </div>
                <div class="container">
                    <label>Gender:</label>
                    <input id="gender" type="radio" name="gender" value="male">Male
                    <input id="gender" type="radio" name="gender" value="female">Female
                    <input id="gender" type="radio" name="gender" value="other">Other
                </div>
                <div class="container">
                    <label>Hobbies:</label>
                    <input id="hobbies" type="checkbox" name="hobbies[]" value="music">Music
                    <input id="hobbies" type="checkbox" name="hobbies[]" value="movies">Movies
                    <input id="hobbies" type="checkbox" name="hobbies[]" value="sports">Sports
                    <input id="hobbies" type="checkbox" name="hobbies[]" value="science">Science
                </div>
                <input type="submit" value="Submit">
                <input type="button" value="Clear">
            </form>
        </div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $passwordw = $_POST["password"];
            $confirmPassword = $_POST["confirmPassword"];
            $dateOfBirth = $_POST["dateOfBirth"];
            $country = $_POST["country"];
            $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
            $hobbies = isset($_POST["hobbies"]) ? $_POST["hobbies"] : array();


            if (empty($firstName)){
                echo "First name field cannot be empty". "<br>";
            }

            if (empty($lastName)){
                echo "First name field cannot be empty". "<br>";
            }

            if (isset($_POST[$email]) && $_POST[$email] != "")
            {
                if (filter_var($_POST[$email], FILTER_VALIDATE_EMAIL)){
                    $email = $_POST[$email];
                }
            }

            if (isset($_POST[$passwordw]) && $_POST[$passwordw] != "") {
                $passwordw = $_POST[$passwordw];
            
                if (strlen($passwordw) >= 8) {
                    if (preg_match("/[A-Z]/", $passwordw)) {
                        if (preg_match("/[a-z]/", $passwordw)) {
                            if (preg_match("/[0-9]/", $passwordw)) {
                                if (preg_match("/[^a-zA-Z0-9]/", $passwordw)) {
                                } else {
                                    echo "Password must contain at least one special character.";
                                }
                            } else {
                                echo "Password must contain at least one number.";
                            }
                        } else {
                            echo "Password must contain at least one lowercase letter.";
                        }
                    } else {
                        echo "Password must contain at least one uppercase letter.";
                    }
                } else {
                    echo "Password must be at least 8 characters long.";
                }
            }

            if (isset($_POST["passwordConfirm"]) && $_POST["passwordConfirm"] != "") {
                $passwordConfirm = $_POST["passwordConfirm"];
            
                if ($passwordConfirm == $passwordw) {
                    return true;
                } else {
                    echo "Passwords do not match.";
                }
            }

            if (strtotime($dateOfBirth) === false){
                echo "Date of birth must be a valid date.";
            }

            if (isset($_POST["country"]) && $_POST["country"] != ""){
                $country = $_POST["country"];
            }

            if (isset($_POST["gender"]) && $_POST["gender"] != ""){
                $gender = $_POST["gender"];
            }
        }
        ?>
    </body>
</html>
