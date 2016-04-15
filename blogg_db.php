<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php

    $host = 'localhost';
        $user = 'jalabi_user';
        $pass = 'jalabi_pass';
        $database = 'jalabi_db';

        //Anslut till databasen
        $conn = new mysqli($host, $user, $pass, $database);

        //Om någonting går fel. Avsluta med ett felmeddelande
        if ($conn->connect_error)
            die("Någonting blev fel" . $conn->connect_error);

        $sql = "SELECT * FROM bloggen";

        $result = $conn->query($sql);

        if (!$result)
            die ("Kunde inte hämta inlägg" . $conn->error);
        echo "<h2>Alla inlägg i bloggen</h2>";

        echo "<p>Hittat" . $result->num_rows . " inlägg</p>";

        while ($row = $result->fetch_assoc()) {
            echo "<article>";
            echo "<h3>" . $row['rubrik'] . "</h3>";
            echo "<h4>" . $row['tidstampel'] . "</h4>";
            echo "<p>" . $row['inlagg'] . "</p>";
            echo "</article>";
        }

        //stäng databasanslutningen
        $result->free();
        $conn->close();
        ?>
    </body>
</html>
