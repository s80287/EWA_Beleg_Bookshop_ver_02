<!DOCTYPE html>
<html>
<head>
    <title>Bücherkatalog</title>
</head>
<body>
    <h1>Bücherkatalog</h1>

    <?php
    // Verbindung zur MySQL-Datenbank herstellen
    $mysqli = new mysqli("localhost", "g19", "or49cos", "g19");

    if ($mysqli->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $mysqli->connect_error);
    }

    // SQL-Abfrage in einen String packen
    $query = "SELECT Produkttitel, Autorname FROM buecher";

    // Abfrage ausführen
    $result = $mysqli->query($query);

    // Tabelle für die Anzeige der Bücher erstellen
    echo "<table border='1'>";
    echo "<tr><th>Titel</th><th>Autor</th></tr>";

    // Daten aus der Abfrage auslesen und in die Tabelle einfügen
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['Produkttitel'] . "</td><td>" . $row['Autorname'] . "</td></tr>";
    }

    echo "</table>";

    // Verbindung schließen
    $mysqli->close();
    ?>
</body>
</html>