<!DOCTYPE html>
<html>
<head>
    <title>Online Conference Registration</title>
</head>
<body>
    <main>
    <h3>Online conference registration</h3>
        <form method="post" action="" enctype="multipart/form-data">
            <label for="fname">First name:
                <input type="text" name="firstName">
            </label>
            <br><br>
            <label for="lname">Last name:
                <input type="text" name="lastName">
            </label>
            <br><br>
            <label for="email">E-mail:
                <input type="text" name="email">
            </label>
            <br><br>
            <label for="attend">I will attend:<br>
                <input type="checkbox" name="attend[]" value="Event1">Event 1<br>
                <input type="checkbox" name="attend[]" value="Event2">Event 2<br>
                <input type="checkbox" name="attend[]" value="Event3">Event 3<br>
                <input type="checkbox" name="attend[]" value="Event4">Event 4<br>
            </label>
            <br><br>
            <label for="tshirt">What's your T-Shirt size?<br>
                <select name="tshirt">
                    <option value="P">Please select</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
            </label>
            <br><br>
            <label for="abstract">Upload your abstract<br>
                <input type="file" name="abstract"/>
            </label>
            <br><br>
            <input type="checkbox" name="terms" value="agreed">I agree to terms & conditions.<br>
            <br><br>
            <input type="submit" name="submit" value="Send registration"/>
        </form>
    </main>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["firstName"]) && $_POST["firstName"] != "") {
            $firstName = $_POST["firstName"];
        } else {
            echo "Please enter your first name!<br>";
        }

        if (isset($_POST["lastName"]) && $_POST["lastName"] != "") {
            $lastName = $_POST["lastName"];
        } else {
            echo "Please enter your last name!<br>";
        }

        if (isset($_POST["email"]) && $_POST["email"] != "") {
            if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $email = $_POST["email"];
            } else {
                echo "Please enter a valid email address!<br>";
            }
        } else {
            echo "Please enter your email address!<br>";
        }

        if (isset($_POST["attend"])) {
            $minimumEventAttendance = 1;
            $currentlyAttended = 0;
            foreach ($_POST['attend'] as $attend) {
                if ($attend == "Event1" || $attend == "Event2" || $attend == "Event3" || $attend == "Event4") {
                    $currentlyAttended++;
                }
            }
            if ($currentlyAttended < $minimumEventAttendance) {
                echo "You must attend a minimum of one event!<br>";
            }
        } else {
            echo "Please select at least one event to attend!<br>";
        }

        if (isset($_FILES["abstract"]) && $_FILES["abstract"]["error"] == UPLOAD_ERR_OK) {
            $file_name = $_FILES["abstract"]["name"];
            $temp_file_name = $_FILES["abstract"]["tmp_name"];
            $file_size = $_FILES["abstract"]["size"];
            $file_type = $_FILES["abstract"]["type"];
        
            $allowed_file_types = ["application/pdf"];
        
            if (in_array($file_type, $allowed_file_types)) {
                if ($file_size <= 3 * 1024 * 1024) {
                    $upload_directory = "uploads/";
                    if (!file_exists($upload_directory)) {
                        mkdir($upload_directory, 0755, true);
                    }
                    
                    $upload_path = $upload_directory . basename($_FILES["abstract"]["name"]);
        
                    if (move_uploaded_file($temp_file_name, $upload_path)) {
                        echo "Upload successful!<br>";
                    } else {
                        echo "Upload failed!<br>";
                    }
                } else {
                    echo "The size of the file is too big!<br>";
                }
            } else {
                echo "Only PDF format files are accepted!<br>";
            }
        } else {
            echo "Error during the upload of the file!<br>";
        }
    }
    ?>
</body>
</html>
