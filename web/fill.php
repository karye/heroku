<?php
/*
 * PHP version 7
 * @category   Blogg i databas
 * @author     Karim Ryde <karye.webb@gmail.com>
 * @license    PHP CC
 */

include_once '../config/config.php'; ?>
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
    <div class="kontainer">
        <h1 class="display-4">Bloggen</h1>
        <nav>
            <?php include "./meny-include.php" ?>
        </nav>
        <main>
            <?php
            $sql = "INSERT INTO blogg (rubrik, inlagg) VALUES
            ('Besök av rektor','Ingrid tittar på en webblektion idag'),
            ('Tränat hämta från databas','Idag har vi tränat att hämta data frånn en tabell.\r\nSamma 4 steg som tidigare. Sen SQL satsen &#34;SELECT * FROM blog&#34;.'),
            ('Fredag','Idag ska vi implementera en fritextsökning.'),
            ('Fredag','Idag ska vi också implementera ett lösenordsskydd på admin! ')";
            $result = pg_query($conn, $sql);
            if (!$result) {
                echo '<p>Något blev fel med SQL: </p>' . pg_last_error($conn);
                exit();
            } else {
                echo '<p>Data har registrerats i tabellen blogg.</p>';
            }

            /* Stäng ned databasanslutningen */
            pg_close($conn);
            ?>
        </main>
    </div>
</body>

</html>