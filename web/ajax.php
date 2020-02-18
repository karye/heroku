<?php
/*
 * PHP version 7
 * @category   Blogg i databas
 * @author     Karim Ryde <karye.webb@gmail.com>
 * @license    PHP CC
 */

header('Access-Control-Allow-Origin: *');
include_once '../config/config.php';

/* Ta emot text från formuläret och spara ned i en textfil. */
$rubrik = filter_input(INPUT_POST, 'rubrik', FILTER_SANITIZE_STRING);
$inlagg = filter_input(INPUT_POST, 'inlagg', FILTER_SANITIZE_STRING);

/* Om data finns.. */
if ($rubrik && $inlagg) {
    if (!$conn) {
        echo "\nKunde ej ansluta till databasen: " . pg_last_error($conn);
        exit();
    } else {
        echo "\nAnsluten till databasen.";
    }

    $sql = "INSERT INTO blogg (rubrik, inlagg) VALUES ('$rubrik', '$inlagg')";
    $result = pg_query($conn, $sql);
    if (!$result) {
        echo "\nNågot blev fel med SQL: " . pg_last_error($conn);
        exit();
    } else {
        echo "\nData har registrerats i tabellen blogg.";
    }

    /* Stäng ned databasanslutningen */
    pg_close($conn);
} else {
    echo "\nData saknas.";
}
