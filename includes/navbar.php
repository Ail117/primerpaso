<?php session_start(); ?>

<header>
  <div class="container">
    <nav class="navbar">
      <div class="logo-section">
        <img src="assets/imagenes/primerpaso.jpg" alt="Logo" class="logo-img">
        <div class="logo">Primer<span>paso</span></div>
      </div>
      <div class="nav-links">
        <a href="?page=home" class="active">Inicio</a>
        <?php if (isset($_SESSION['tipo_cuenta']) && $_SESSION['tipo_cuenta'] === 'usuario'): ?> 
          <a href="?page=trabajos">Oportunidades</a>
        <?php elseif (isset($_SESSION['tipo_cuenta']) && $_SESSION['tipo_cuenta'] !== 'usuario'): ?>
          <a href="?page=mis_vacantes">Mis vacantes</a>
        <?php else: ?>
          <a href="?page=oportunidades">Oportunidades</a> 
        <?php endif; ?>
        <a href="?page=recursos">Recursos</a>
        <?php if (isset($_SESSION['tipo_cuenta']) && $_SESSION['tipo_cuenta'] === 'usuario'): ?>
        <?php else: ?>
          <a href="?page=post-trab">Para Empresas</a>
        <?php endif; ?>
        <a href="?page=sobre-nosotros">Sobre Nosotros</a>
        <a href="?page=faq">PFFs</a>
        <a href="?page=contacto">Contacto</a>
      </div>  
      <div class="nav-buttons">
        <?php if (isset($_SESSION['usuario_id'])): ?> 
          <span style="margin-right: 10px;">👤 <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?></span>
          <a href="?page=logout"><button class="btn btn-outline">Cerrar Sesión</button></a>
        <?php else: ?>
          <a href="?page=login"><button class="btn btn-outline">Iniciar Sesión</button></a>
          <a href="?page=registro-usuario"><button class="btn btn-primary">Registrarse</button></a>
        <?php endif; ?>
      </div>
    </nav>
  </div>
</header>
