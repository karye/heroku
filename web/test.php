<?php
/*
 * PHP version 7
 * @category   Blogg i databas
 * @author     Karim Ryde <karye.webb@gmail.com>
 * @license    PHP CC
 */

include_once '../config/config.php';

$cookie_name = 'user';
$cookie_value = 'John Doe';
setcookie($cookie_name, $cookie_value, time() + 86400 * 30, '/');

// 86400 = 1 day
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
    <div class="kontainer">
        <h1 class="display-4">Bloggen</h1>
        <nav>
            <?php include "./meny-include.php" ?>
        </nav>
        <main>
            <?php if (!isset($_COOKIE['user'])) {
                echo "Cookie named 'user' is not set!";
            } else {
                echo "Cookie 'user' is set!<br>";
                echo "Value is: " . $_COOKIE['user'];
            } ?>
        </main>
    </div>
</body>

</html>