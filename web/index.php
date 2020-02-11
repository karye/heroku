<?php
/*
 * PHP version 7
 * @category   Lånekalkylator
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
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./stylesheets/style.css">
</head>
<body>
    <div class="container">
        <h1>Testar Heroku</h1>
        <?php
        echo "<p>Testar Heroku!</p>";

        var_dump($config);

        if (!$conn) {
            echo "<p>An error occurred: </p>" . pg_last_error($dbconn);
            exit;
        } else {
            echo "<p>Connected to db!</p>";
        }

        $result = pg_query($conn, "SELECT author, email FROM authors");
        if (!$result) {
            echo "<p>An error occurred: </p>" . pg_last_error($dbconn);
            exit;
        } else {
            echo "<p>Query executed succesfully!</p>";
        }

        while ($row = pg_fetch_row($result)) {
            echo "Author: $row[0]  E-mail: $row[1]";
            echo "<br>\n";
        }
        ?>
    </div>
</body>
</html>