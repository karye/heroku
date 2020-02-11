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

        //var_dump($config);

        if (!$conn) {
            echo "<p>29: An error occurred: </p>" . pg_last_error($conn);
            exit;
        } else {
            echo "<p>Connected to db!</p>";
        }

        $sql = "CREATE TABLE IF NOT EXISTS blogg (
            id SERIAL PRIMARY KEY,
            rubrik varchar(100),
            inlagg text NOT NULL,
            tidstampel timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
          )";

        $result = pg_query($conn, $sql);
        if (!$result) {
            echo "<p>45: An error occurred: </p>" . pg_last_error($conn);
            exit;
        } else {
            echo "<p>Query executed succesfully!</p>";
        }

        $sql = "SELECT * FROM blogg";
        $result = pg_query($conn, $sql);
        if (!$result) {
            echo "<p>54: An error occurred: </p>" . pg_last_error($conn);
            exit;
        } else {
            echo "<p>Query executed succesfully!</p>";
        }

        while ($row = pg_fetch_assoc($result)) {
            echo "<p>" . $row['rubrik']. "</p>"; 
            echo "<p>" . $row['inlagg'] . "</p>";
        }
        ?>
    </div>
</body>
</html>