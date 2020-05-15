<?php
$sida = basename($_SERVER['PHP_SELF'], ".php");
?>
<ul class="nav nav-tabs">
    <li class="nav-item"><a class="nav-link <?= ($activePage == 'index') ? 'active':''; ?>" href="./index.php">Läsa</a></li>
    <li class="nav-item"><a class="nav-link <?= ($activePage == 'index') ? 'active':''; ?>" href="./insert.php">Skriva</a></li>
    <li class="nav-item"><a class="nav-link <?= ($activePage == 'index') ? 'active':''; ?>" href="./table.php">Skapa tabell</a></li>
    <li class="nav-item"><a class="nav-link <?= ($activePage == 'index') ? 'active':''; ?>" href="./test.php">Test</a></li>
</ul>