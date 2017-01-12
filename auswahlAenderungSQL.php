	<?php	
		$mysqli = new mysqli("localhost", "root", "", "shop");
		if ($mysqli->connect_error) {
			echo "Fehler bei der Verbindung: " . mysqli_connect_error();
			exit();
		}
		echo "Verbindung hat geklappt <br><hr>";
		
		$id = isset($_GET['ID']) ? $_GET['ID'] : false;
		$id = $mysqli->real_escape_string($id);
		
		setcookie("id", $id, 5);
		
		$suchen = "Select * FROM kunden where ID = $id";	
		$ergebnis = $mysqli->query($suchen);
		$zeile = $ergebnis->fetch_array();
	?>
	
			<form action="aendereSQL.php" method="get">
				<table border='1'>
                                    <tr style="font-weight:bold"><td>id</td><td>Anrede</td><td>Vorname</td><td>Nachname</td><td>Strasse</td><td>PLZ</td><td>Ort</td></tr>
					<td>
                                            <input type='text' name='id' value="<?php echo htmlspecialchars($zeile['ID']); ?>" />
					</td>
					<td>
						<?php
							if($anrede = $zeile['anrede'] == 'Herr')
								echo "<input type='radio' name='anrede' value='Herr' checked='checked'/> Herr";
							else
								echo "<input type='radio' name='anrede' value='Herr' /> Herr";
							
							if($anrede = $zeile['anrede'] == 'Frau')
								echo "<input type='radio' name='anrede' value='Frau' checked='checked'/> Frau";
							else
								echo "<input type='radio' name='anrede' value='Frau' /> Frau";
							
							if($anrede = $zeile['anrede'] == 'Firma')
								echo "<input type='radio' name='anrede' value='Firma' checked='checked'/> Firma";
							else
								echo "<input type='radio' name='anrede' value='Firma' /> Firma";
						?>					
					</td>
					<td>
                                            <input type='text' name='vorname' size='20' maxlength='30' value="<?php echo htmlspecialchars($zeile['vorname']); ?>" />
					</td>
					<td>
                                            <input type='text' name='nachname' size='20' maxlength='30' value="<?php echo htmlspecialchars($zeile['nachname']); ?>" />
					</td>
                                        <td>
                                            <input type='text' name='strasse' size='20' maxlength='30' value="<?php echo htmlspecialchars($zeile['strasse']); ?>" />
					</td>
                                        <td>
                                            <input type='text' name='plz' size='20' maxlength='30' value="<?php echo htmlspecialchars($zeile['plz']); ?>" />
					</td>
                                        <td>
                                            <input type='text' name='ort' size='20' maxlength='30' value="<?php echo htmlspecialchars($zeile['ort']); ?>" />
					</td>
				<table />
				<br /><input type="submit" value="Aendern" />
			</form>
        <?php             
                        echo "<br /><a href='verarbeitungSQL.php?nachname=$zeile[3]'>Zurueck</a>";	
                        
		$mysqli->close();	
	?>



			
