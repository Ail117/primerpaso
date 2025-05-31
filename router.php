<?php
$page = $_GET['page'] ?? 'home';

switch ($page) {
  case 'home':
    include 'views/home.php';
    break;
  case 'login':
    include 'views/login.php';
    break;
  case 'registro':
    include 'views/registro.php';
    break;
  // agrega más páginas aquí...
  default:
    include 'views/404.php';
    break;
}
