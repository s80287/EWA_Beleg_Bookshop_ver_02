<?php
    $mysqli = new mysqli("localhost", "g19", "or49cos", "g19");
    if ($mysqli->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $mysqli->connect_error);
    }
    $query = "SELECT ProduktID, Produkttitel, Autorname, PreisBrutto, Lagerbestand FROM buecher";
    $result = $mysqli->query($query)
    or die("Anfrage fehlgeschlagen: " . mysql_error());
    $data_array = array();
    while($row=mysqli_fetch_assoc($result))
    {
        $data_array[] = $row;
    }
     // Daten in JSON umwandeln
    $json_data = json_encode($data_array, JSON_PRETTY_PRINT);
	
	echo $json_data;
    
    $mysqli->close();
	
?>

