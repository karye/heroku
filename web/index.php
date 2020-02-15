<?php
/*
 * PHP version 7
 * @category   Blogg i databas
 * @author     Karim Ryde <karye.webb@gmail.com>
 * @license    PHP CC
 */

include_once "../config/config.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Heroku PHP och db</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./stylesheets/style.css">
</head>
<body>
    <div class="container">
        <h1 class="display-4">Bloggen</h1>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" href="./index.php">Läsa</a></li>
                <li class="nav-item"><a class="nav-link" href="./insert.php">Skriva</a></li>
                <li class="nav-item"><a class="nav-link" href="./table.php">Skapa tabell</a></li>
                <li class="nav-item"><a class="nav-link" href="./test.php">Test</a></li>
            </ul>
        </nav>
        <main>
            <?php
            if (!$conn) {
                echo "<p>Kunde ej ansluta till databasen: </p>" . pg_last_error($conn);
                exit;
            } else {
                echo "<p>Ansluten till databasen.</p>";
            }

            $sql = "SELECT * FROM blogg ORDER BY id DESC";
            $result = pg_query($conn, $sql);
            if (!$result) {
                echo "<p>Något blev fel med SQL: </p>" . pg_last_error($conn);
                exit;
            } else {
                echo "<p>Data har hämtats från tabellen blogg.</p>";
            }

            while ($row = pg_fetch_assoc($result)) {
                echo "<article>";
                echo "<h4>" . $row['rubrik'] . "</h4>";
                echo "<h5>" . date("d/m/Y H:i:s", strtotime($row['tidstampel'])) . "</h5>";
                echo "<p>" . $row['inlagg'] . "</p>";
                echo "</article>";
            }
            /* Stäng ned databasanslutningen */
            pg_close($conn);
            ?>
        </main>
    </div>
</body>
</html>