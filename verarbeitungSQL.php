<?php	
    $mysqli = new mysqli("localhost", "root", "", "shop");
    if ($mysqli->connect_error) {
            echo "Fehler bei der Verbindung: " . mysqli_connect_error();
            exit();
    }
    echo "Verbindung hat geklappt <br><hr>";

    $nachname = isset($_GET['nachname']) ? $_GET['nachname'] : false;
    $nachname = $mysqli->real_escape_string($nachname);

    if(!$nachname)
    {
            echo "Geben Sie den Nachnamen an!";
            echo "<br>";
    }

    $suchen = "Select * FROM kunden where nachname = '$nachname'";	

    if($ergebnis = $mysqli->query($suchen) AND $suchen != false)
    {	
        ?>
            <table border='1'>
                <tr style="font-weight:bold"><td><strong>ID</strong></td><td>Anrede</td><td>Vorname</td><td>Nachname</td><td>Strasse</td><td>PLZ</td><td>Ort</td><td>Bronche</td><td>Thema</td><td>Aendern</tr>
        <?php
        while($zeile = $ergebnis->fetch_array())
        {
            echo "<tr>";
            for($i = 0; $i < 9; $i++)
            {
                echo "<td>{$zeile[$i]}</td>";
            }
                echo "<td><a href='auswahlAenderungSQL.php?ID=$zeile[0]'>Auswaehlen</a></td>";

            echo "</tr>";
        }			
        echo "</table>";
    }
    else
    echo "Kein Datensatz gefunden";		

    echo "<br /><a href='suchen.php'>Zurueck</a>";
    $mysqli->close();	
?>