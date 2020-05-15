<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

/* Heroku PostgreSQL */
if (getenv('DATABASE_URL')) {
    $conn = pg_connect(getenv('DATABASE_URL'));
} else {
    $conn = pg_connect("host=localhost dbname=karim user=karim password=3f>UjJUhikzZ");
}

if (!$conn) {
    echo '<p>Kunde ej ansluta till databasen: </p>' .
        pg_last_error($conn);
    exit();
} else {
    //echo '<p>Ansluten till databasen.</p>';
}