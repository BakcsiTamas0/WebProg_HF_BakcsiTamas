<?php
session_start();

if (isset($_SESSION["username"])) {
    if (isset($_POST["submit"])) {
        $nev = $_POST["nev"];
        $szak = $_POST["szak"];
        $atlag = $_POST["atlag"];

        $conn = new mysqli("localhost", "root", "", "egyetem");

        $sql = "DELETE FROM hallgatok WHERE nev = '$nev'";
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            echo "Record deleted successfully";
            echo "<a href='adatbazis.php'>Back to table</a>" . "<br>";
            echo "<a href='adatbazis_feltoltes.php'>Add a new student</a>" . "<br>";
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    header("Location: login.php");
    exit();
}
?>

<form method="POST">
    <label for="nev">Név:</label>
    <input type="text" id="nev" name="nev">
    <label for="szak">Szak:</label>
    <input type="text" id="szak" name="szak">
    <label for="atlag">Atlag:</label>
    <input type="text" id="atlag" name="atlag">
    <input type="submit" name="submit" value="Torles">
</form>
