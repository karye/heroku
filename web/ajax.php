<?php
/*
 * PHP version 7
 * @category   Blogg i databas
 * @author     Karim Ryde <karye.webb@gmail.com>
 * @license    PHP CC
 */

include_once "../config/config.php";

/* Ta emot text från formuläret och spara ned i en textfil. */
$rubrik = filter_input(INPUT_POST, 'rubrik', FILTER_SANITIZE_STRING);
$inlagg = filter_input(INPUT_POST, 'inlagg', FILTER_SANITIZE_STRING);

/* Om data finns.. */
if ($rubrik && $inlagg) {

    if (!$conn) {
        echo "Kunde ej ansluta till databasen: " . pg_last_error($conn) . "\n";
        exit;
    } else {
        echo "Ansluten till databasen.\n";
    }

    $sql = "INSERT INTO blogg (rubrik, inlagg) VALUES ('$rubrik', '$inlagg')";
    $result = pg_query($conn, $sql);
    if (!$result) {
        echo "Något blev fel med SQL: " . pg_last_error($conn) . "\n";
        exit;
    } else {
        echo "Data har registrerats i tabellen blogg.\n";
    }

    /* Stäng ned databasanslutningen */
    $conn->close();
} else {
    echo "Data saknas.\n"
}