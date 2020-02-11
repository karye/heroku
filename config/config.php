<?php
error_reporting(E_ALL);
$conn = pg_connect(getenv("DATABASE_URL"));