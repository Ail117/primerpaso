<?php
// Enrutador principal del proyecto

// Incluir archivo de rutas si lo estás usando (opcional)
// require_once 'router.php'; // puedes quitarlo si no lo necesitas

// Obtener la página desde la URL (por defecto: home)
$page = $_GET['page'] ?? 'home';

// Lista de vistas válidas
$allowed_pages = ['home','contacto','tutorial', 'PFFS', 'empleos', 'recursos', 'post-trab', 'sobre-nosotros', 'contacto', 'login', 'registro-usuario', 'registro-compañia','logout','candidatos','trabajos','oportunidades','formulario_post'];

// Si no es una vista válida, mostrar home
if (!in_array($page, $allowed_pages)) {
    $page = 'home';
}


// Incluir vista correspondiente
$view_file = "views/{$page}.php";
if (file_exists($view_file)) {
    include $view_file;
} else {
    include 'views/home.php';
}

?>
