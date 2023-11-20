<?php
session_start();

if (isset($_SESSION["username"])) {
    if (isset($_POST["submit"])) {
        $nev = $_POST["nev"];
        $szak = $_POST["szak"];
        $atlag = $_POST["atlag"];

        $conn = new mysqli("localhost", "root", "", "egyetem");

        $sql = "UPDATE hallgato SET szak = ?, atlag = ? WHERE nev = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $szak, $atlag, $nev);
        
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            echo "Record updated successfully!";
            echo "<a href='adatbazis.php'>Back to table</a>";
        } else {
            echo "Error updating record: " . $stmt->error;
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
    <input type="submit" name="submit" value="Frissítés">
</form>
