<?php

include "adatbazis_kapcsolodas.php";

$sql = "SELECT id, nev, szak, atlag FROM hallgatok";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<a href='adatbazis_feltoltes.php'>Uj hallgato hozzaadasa</a>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Név</th>
                <th>Szak</th>
                <th>Átlag</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nev"] . "</td>
                <td>" . $row["szak"] . "</td>
                <td>" . $row["atlag"] . "</td>
                <td><a href='adatbazis_frissites.php'>Frissítés</a></td>
                <td><a href='adatbazis_torles.php'>Törlés</a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Database is empty!";
    echo "<a href='adatbazis_feltoltes.php'>Uj hallgato hozzaadasa</a>";
}

$conn->close();
?>
