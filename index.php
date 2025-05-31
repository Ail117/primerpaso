<?php
// Enrutador principal del proyecto

// Obtener la página desde la URL (por defecto: home)
$page = $_GET['page'] ?? 'home';

// Lista de vistas válidas
$allowed_pages = ['home', 'empleos', 'recursos', 'para-empresas', 'sobre-nosotros', 'contacto', 'login', 'registro'];

// Si no es una vista válida, mostrar home
if (!in_array($page, $allowed_pages)) {
    $page = 'home';
}

// Incluir header antes de la vista
include 'includes/header.php';

// Incluir vista correspondiente
$view_file = "views/{$page}.php";
if (file_exists($view_file)) {
    include $view_file;
} else {
    include 'views/home.php';
}

// Incluir footer después de la vista
include 'includes/footer.php';
?>
