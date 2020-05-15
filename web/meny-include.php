<?php
$sida = basename($_SERVER['PHP_SELF'], ".php");
?>
<ul class="nav nav-tabs">
    <li class="nav-item"><a class="nav-link <?= ($sida == 'index') ? 'active' : ''; ?>" href="./index.php">Läsa</a></li>
    <li class="nav-item"><a class="nav-link <?= ($sida == 'insert') ? 'active' : ''; ?>" href="./insert.php">Skriva</a></li>
    <li class="nav-item"><a class="nav-link <?= ($sida == 'table') ? 'active' : ''; ?>" href="./table.php">Skapa tabell</a></li>
    <li class="nav-item"><a class="nav-link <?= ($sida == 'fill') ? 'active' : ''; ?>" href="./table.php">Fylla tabell</a></li>
    <li class="nav-item"><a class="nav-link <?= ($sida == 'drop') ? 'active' : ''; ?>" href="./table.php">Radera tabell</a></li>
    <li class="nav-item"><a class="nav-link <?= ($sida == 'test') ? 'active' : ''; ?>" href="./test.php">Test</a></li>
</ul>