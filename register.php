<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datenbankverbindung herstellen (ersetze die Platzhalter mit den tatsächlichen Daten)
    $mysqli = new mysqli("localhost", "g19", "or49cos", "g19");

    // Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
    if ($mysqli->connect_error) {
        die("Verbindung fehlgeschlagen: " . $mysqli->connect_error);
    }

    // Daten aus dem Formular abrufen
	// name from input of formular
    //$email = $_POST["email"];
    //$neuerBestand = $_POST["product.Lagerbestand"];
	//$password = $_POST["password"];
	$email = $mysqli->real_escape_string($_POST["email"]); // Schutz vor SQL-Injektion
    $password = $mysqli->real_escape_string($_POST["password"]); // Schutz vor SQL-Injektion
	

    // SQL-Abfrage erstellen und ausführen (Beispiel: Einfügen in eine Tabelle "benutzer")
    $sql = "INSERT INTO kunden VALUES ('$email', '$password');";

    if ($mysqli->query($sql) === TRUE) {
         echo "Registrierung erfolgreich. Nutzen Sie den folgenden Link um zum Shop zurückzukehren:";
		 
	}
	else {
		echo "Fehler entsteht";
	}
    // Verbindung schließen
    $mysqli->close();
}
?>
<a href="https://ivm108.informatik.htw-dresden.de/ewa/g19/beleg/beleg.html">Zurück zum Shop</a>