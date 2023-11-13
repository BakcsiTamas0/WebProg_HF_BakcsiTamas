<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["elkuldott"]) && $_POST["elkuldott"] == "true") {
    if (isset($_POST["talalgatas"]) && is_numeric($_POST["talalgatas"])) {
        $tipp = intval($_POST["talalgatas"]);
        
        if (!isset($_COOKIE["veletlen_szam"])) {
            $veletlen_szam = rand(1, 10);
            setcookie("veletlen_szam", $veletlen_szam, time() + 3600);
        } else {
            $veletlen_szam = $_COOKIE["veletlen_szam"];
        }
        
        if ($tipp == $veletlen_szam) {
            echo "Gratulálok, eltaláltad a számot!";
            setcookie("veletlen_szam", "", time() - 3600);
        } elseif ($tipp < $veletlen_szam) {
            echo "Sajnálom, a tipped túl kicsi. Próbáld újra!";
        } else {
            echo "Sajnálom, a tipped túl nagy. Próbáld újra!";
        }
    } else {
        echo "Kérlek tippelj egy érvényes számot!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hatodik Feladat</title>
</head>
<body>
    <main>
        <form method="POST" action="">
            <input type="hidden" name="elkuldott" value="true">
            Melyik számra gondoltam 1 és 10 között?
            <input name="talalgatas" type="text">
            <br>
            <br>
            <input type="submit" value="Elküld">
        </form>
    </main>
</body>
</html>
