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
            <form class="kol2 alert alert-info" action="#" method="post">
                <label>Rubrik</label>
                <input class="form-control" type="text" name="rubrik" required>
                <label>Inlägg</label>
                <textarea class="form-control" name="inlagg" id="inlagg" cols="30" rows="10" required></textarea>
                <button class="btn btn-primary">Spara inlägg</button>
            </form>
            <?php
            /* Ta emot text från formuläret och spara ned i en textfil. */
            $rubrik = filter_input(INPUT_POST, 'rubrik', FILTER_SANITIZE_STRING);
            $inlagg = filter_input(INPUT_POST, 'inlagg', FILTER_SANITIZE_STRING);

            /* Om data finns.. */
            if ($rubrik && $inlagg) {
                $sql = "INSERT INTO blogg (rubrik, inlagg) VALUES ('$rubrik', '$inlagg')";

                /* Kör SQL */
                $result = pg_query($conn, $sql);
                if (!$result) {
                    echo "<p class=\"alert alert-danger\">Något blev fel med SQL: " .
                        pg_last_error($conn) .
                        "</p>";
                    exit();
                } else {
                    echo "<p class=\"alert alert-success\">Data har registrerats i tabellen blogg.</p>";
                }

                /* Stäng ned databasanslutningen */
                pg_close($conn);
            }

            if (!isset($_COOKIE['user'])) {
                echo "Cookie named 'user' is not set!";
            } else {
                echo "Cookie 'user' is set!<br>";
                echo "Value is: " . $_COOKIE['user'];
            }
            ?>
        </main>
    </div>
</body>

</html>