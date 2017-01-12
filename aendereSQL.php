		<?php	
		$mysqli = new mysqli("localhost", "root", "", "shop");
		if ($mysqli->connect_error) {
			echo "Fehler bei der Verbindung: " . mysqli_connect_error();
			exit();
		}
		echo "Verbindung hat geklappt <br><hr>";
		
                $id = isset($_GET['id']) ? $_GET['id'] : false;
		$id = $mysqli->real_escape_string($id);
		$vorname = isset($_GET['vorname']) ? $_GET['vorname'] : false;
		$vorname = $mysqli->real_escape_string($vorname);
		$nachname = isset($_GET['nachname']) ? $_GET['nachname'] : false;
		$nachname = $mysqli->real_escape_string($nachname);
                $strasse = isset($_GET['strasse']) ? $_GET['strasse'] : false;
		$strasse = $mysqli->real_escape_string($strasse);
                $plz = isset($_GET['plz']) ? $_GET['plz'] : false;
		$plz = $mysqli->real_escape_string($plz);
                $ort = isset($_GET['ort']) ? $_GET['ort'] : false;
		$ort = $mysqli->real_escape_string($ort);

		
		$aendern = "update kunden set vorname='$vorname', nachname='$nachname', strasse='$strasse', plz='$plz', ort='$ort' WHERE id=$id";	
		$ergebnis = $mysqli->query($aendern);
		
		if($ergebnis == true)
		{
			echo "Erfolgreich geendert <br>";
                        echo "<a href='auswahlAenderungSQL.php?ID=$id'>Zurueck</a>";
		}
		else
			echo "Fehler";
		
		$mysqli->close();		
	?>