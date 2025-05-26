<?php
$page = $_GET['page'] ?? 'home';
$path = "views/$page.php";

include 'includes/header.php';
include 'includes/navbar.php';

if (file_exists($path)) {
    include $path;
} else {
    echo "<h2>Página no encontrada</h2>";
}

include 'includes/footer.php';