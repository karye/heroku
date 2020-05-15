<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
$conn = pg_connect(getenv('DATABASE_URL'));

if (!$conn) {
    echo '<p>Kunde ej ansluta till databasen: </p>' .
        pg_last_error($conn);
    exit();
} else {
    echo '<p>Ansluten till databasen.</p>';
}