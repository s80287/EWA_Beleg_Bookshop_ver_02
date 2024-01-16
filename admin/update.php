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
    $produktID = $_POST["bookID"];
    //$neuerBestand = $_POST["product.Lagerbestand"];
	$neuerBestand = $_POST["quantity"];
	
	

    // SQL-Abfrage erstellen und ausführen (Beispiel: Einfügen in eine Tabelle "benutzer")
    $sql = "UPDATE buecher SET Lagerbestand = $neuerBestand WHERE ProduktID = $produktID";

    if ($mysqli->query($sql) === TRUE) {
         header('Location: admin.html');
		exit();
	}
    // Verbindung schließen
    $mysqli->close();
}
?>
