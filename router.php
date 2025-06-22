<?php
$page = $_GET['page'] ?? 'home';

switch ($page) {
  case 'home':
    include 'views/home.php';
    break;
  case 'login':
    include 'views/login.php';
    break;
  case 'registro-usuario':
    include 'views/registro-usuario.php';
    break;
  case 'registro-compañia':
    include 'views/registro-compañia.php';
    break;
  case 'post-trab':
    include 'views/post-trab.php';
    break;
  case 'oportinidades':
    include 'views/oportunidades.php';
    break;
  case 'formulario_post':
    include 'views/formulario_post.php';
    break;
  case 'sobre-nosotros':
    include 'views/sobre-nosotros.php';
    break;
  case 'PFFS':
    include 'views/PFFS.php';
    break;
  // agrega más páginas aquí...
  default:
    include 'views/404.php';
    break;
}
