<?php
session_start();
include 'includes/header.php'; // Asegúrate que aquí se cargue estilos.css
?>

<section class="perfil-section">
  <div class="perfil-header">
    <h1 class="perfil-title">Mi Perfil</h1>
    <button class="btn" id="btn-abrir-cv">Hacer CV</button>
    <button class="btn btn-editar">Editar Perfil</button>
  </div>

  <!-- Información principal del usuario -->
  <div class="perfil-info">
    <p><strong>Nombre completo:</strong> Juan Pérez</p>
    <p><strong>Correo electrónico:</strong> juanperez@example.com</p>
    <p><strong>Rol:</strong> Estudiante</p>
  </div>

  <!-- Información adicional -->
  <div class="perfil-adicional">
    <h2 class="subtitulo">Información adicional</h2>
    <p><strong>Biografía:</strong> Estudiante de Ingeniería en Sistemas apasionado por el desarrollo web y la inteligencia artificial.</p>
    <p><strong>Ubicación:</strong> Ciudad de México</p>
    <p><strong>Redes sociales:</strong>
      <a href="https://linkedin.com/in/juanperez" target="_blank">LinkedIn</a> |
      <a href="https://github.com/juanperez" target="_blank">GitHub</a>
    </p>
  </div>

  <!-- Modal para hacer CV -->
  <div class="modal-cv" id="modal-cv">
    <div class="modal-content">
      <span class="cerrar-modal" id="cerrar-cv">&times;</span>
      <h2>Completa tu CV</h2>
      <form action="#" method="POST" class="form-cv">
        <input type="text" placeholder="Nombre completo" required>
        <input type="email" placeholder="Correo electrónico" required>
        <input type="text" placeholder="Profesión" required>
        <textarea placeholder="Resumen profesional"></textarea>
        <button type="submit" class="btn">Guardar CV</button>
      </form>
    </div>
  </div>

  <!-- Historial de postulaciones -->
  <div class="postulaciones-container">
    <h2 class="subtitulo">Mis Postulaciones</h2>
    <div class="postulaciones-grid">
      <div class="postulacion-card alta-probabilidad">
        <h3>Desarrollador Backend</h3>
        <p>Empresa: TechSoft</p>
        <p>Probabilidad: Alta</p>
      </div>
      <div class="postulacion-card media-probabilidad">
        <h3>Diseñador UX/UI</h3>
        <p>Empresa: CreativaStudio</p>
        <p>Probabilidad: Media</p>
      </div>
      <div class="postulacion-card baja-probabilidad">
        <h3>Analista de Datos</h3>
        <p>Empresa: DataCorp</p>
        <p>Probabilidad: Baja</p>
      </div>
    </div>
  </div>
</section>

<script>
  const abrirBtn = document.getElementById('btn-abrir-cv');
  const modal = document.getElementById('modal-cv');
  const cerrarBtn = document.getElementById('cerrar-cv');

  abrirBtn.onclick = () => modal.style.display = 'flex';
  cerrarBtn.onclick = () => modal.style.display = 'none';
  window.onclick = e => { if (e.target == modal) modal.style.display = 'none'; };
</script>

<?php include 'includes/footer.php'; ?>
