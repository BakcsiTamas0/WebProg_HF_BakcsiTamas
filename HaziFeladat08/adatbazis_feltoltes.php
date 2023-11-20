<?php
session_start();

include("adatbazis_kapcsolodas.php");

if (isset($_SESSION["username"])) {
    if (isset($_POST["submit"])) {
        $nev = $_POST["nev"];
        $szak = $_POST["szak"];
        $atlag = $_POST["atlag"];

        $sql = "INSERT INTO hallgatok (nev, szak, atlag) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nev, $szak, $atlag);
        $stmt->execute();
        $stmt->close();
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
    <label for="atlag">Átlag:</label>
    <input type="text" id="atlag" name="atlag">
    <input type="submit" name="submit" value="Hozzáad">
</form>
