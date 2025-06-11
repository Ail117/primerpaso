<?php 
include 'includes/header.php';
include 'conexion/conexion.php';

// Obtener filtros
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$ubicacion = isset($_GET['ubicacion']) ? $_GET['ubicacion'] : '';
$tipo_trabajo = isset($_GET['tipo_trabajo']) ? $_GET['tipo_trabajo'] : '';
$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';

// Construir consulta SQL con filtros
$sql = "SELECT * FROM vacantes WHERE 1=1";
$params = [];

if (!empty($categoria)) {
    $sql .= " AND categoria = ?";
    $params[] = $categoria;
}

if (!empty($ubicacion)) {
    $sql .= " AND ubicacion LIKE ?";
    $params[] = "%$ubicacion%";
}

if (!empty($tipo_trabajo)) {
    $sql .= " AND tipo_trabajo = ?";
    $params[] = $tipo_trabajo;
}

if (!empty($buscar)) {
    $sql .= " AND (titulo LIKE ? OR empresa LIKE ? OR descripcion LIKE ?)";
    $params[] = "%$buscar%";
    $params[] = "%$buscar%";
    $params[] = "%$buscar%";
}

$sql .= " ORDER BY fecha_creacion DESC";

// Ejecutar consulta
$stmt = $conexion->prepare($sql);
if (!empty($params)) {
    $stmt->execute($params);
} else {
    $stmt->execute();
}
$vacantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obtener categorías únicas para el filtro
$categorias_stmt = $conexion->query("SELECT DISTINCT categoria FROM vacantes WHERE categoria IS NOT NULL ORDER BY categoria");
$categorias = $categorias_stmt->fetchAll(PDO::FETCH_COLUMN);
?>

<section class="oportunidades-hero">
  <div class="container">
    <div class="oportunidades-header">
      <h1>Explora las <span class="primer">oportunidades</span></h1>
      <p class="oportunidades-subtitle">Encuentra prácticas profesionales, becas y empleos diseñados para estudiantes y recién egresados</p>
    </div>
    
    <!-- Filtros de búsqueda -->
    <div class="filtros-container">
      <form method="GET" action="" class="filtros-form">
        <div class="filtros-principales">
          <div class="tabs-container">
            <button type="button" class="tab-btn active" onclick="filterByType('all')">Todas</button>
            <button type="button" class="tab-btn" onclick="filterByType('practicas')">Prácticas Profesionales</button>
            <button type="button" class="tab-btn" onclick="filterByType('becas')">Becas</button>
            <button type="button" class="tab-btn" onclick="filterByType('empleos')">Empleos Sin Experiencia</button>
          </div>
          
          <div class="search-filters">
            <div class="search-input-container">
              <input type="text" name="buscar" placeholder="Buscar por título, empresa o palabra clave" 
                     value="<?php echo htmlspecialchars($buscar); ?>" class="search-input">
            </div>
            
            <div class="filter-selects">
              <select name="categoria" class="filter-select">
                <option value="">Categoría</option>
                <?php foreach($categorias as $cat): ?>
                  <option value="<?php echo htmlspecialchars($cat); ?>" 
                          <?php echo $categoria == $cat ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($cat); ?>
                  </option>
                <?php endforeach; ?>
              </select>
              
              <select name="ubicacion" class="filter-select">
                <option value="">Ubicación</option>
                <option value="remoto" <?php echo $ubicacion == 'remoto' ? 'selected' : ''; ?>>Remoto</option>
                <option value="presencial" <?php echo $ubicacion == 'presencial' ? 'selected' : ''; ?>>Presencial</option>
                <option value="hibrido" <?php echo $ubicacion == 'hibrido' ? 'selected' : ''; ?>>Híbrido</option>
              </select>
            </div>
            
            <div class="work-type-checkboxes">
              <label class="checkbox-label">
                <input type="checkbox" name="tipo_trabajo[]" value="remoto" 
                       <?php echo strpos($tipo_trabajo, 'remoto') !== false ? 'checked' : ''; ?>>
                <span class="checkbox-custom"></span>
                Remoto
              </label>
              <label class="checkbox-label">
                <input type="checkbox" name="tipo_trabajo[]" value="tiempo_completo" 
                       <?php echo strpos($tipo_trabajo, 'tiempo_completo') !== false ? 'checked' : ''; ?>>
                <span class="checkbox-custom"></span>
                Tiempo completo
              </label>
              <label class="checkbox-label">
                <input type="checkbox" name="tipo_trabajo[]" value="medio_tiempo" 
                       <?php echo strpos($tipo_trabajo, 'medio_tiempo') !== false ? 'checked' : ''; ?>>
                <span class="checkbox-custom"></span>
                Medio tiempo
              </label>
            </div>
            
            <button type="submit" class="btn btn-primary search-btn">Buscar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<section class="vacantes-section">
  <div class="container">
    <div class="vacantes-grid">
      <?php if (empty($vacantes)): ?>
        <div class="no-vacantes">
          <div class="no-vacantes-icon">📭</div>
          <h3>No se encontraron oportunidades</h3>
          <p>Intenta ajustar tus filtros de búsqueda o revisa más tarde para nuevas oportunidades.</p>
        </div>
      <?php else: ?>
        <?php foreach($vacantes as $vacante): ?>
          <div class="vacante-card" data-category="<?php echo htmlspecialchars($vacante['categoria']); ?>">
            <div class="vacante-header">
              <div class="empresa-logo">
                <?php if (!empty($vacante['logo_empresa'])): ?>
                  <img src="<?php echo htmlspecialchars($vacante['logo_empresa']); ?>" alt="Logo">
                <?php else: ?>
                  <div class="logo-placeholder"><?php echo strtoupper(substr($vacante['empresa'], 0, 2)); ?></div>
                <?php endif; ?>
              </div>
              <div class="vacante-info">
                <h3 class="vacante-titulo"><?php echo htmlspecialchars($vacante['titulo']); ?></h3>
                <p class="vacante-empresa"><?php echo htmlspecialchars($vacante['empresa']); ?></p>
                <div class="vacante-ubicacion">
                  <span class="ubicacion-icon">📍</span>
                  <?php echo htmlspecialchars($vacante['ubicacion']); ?>
                </div>
              </div>
              <div class="vacante-tipo">
                <span class="tipo-badge <?php echo strtolower(str_replace(' ', '-', $vacante['tipo_trabajo'])); ?>">
                  <?php echo htmlspecialchars($vacante['tipo_trabajo']); ?>
                </span>
              </div>
            </div>
            
            <div class="vacante-body">
              <p class="vacante-descripcion">
                <?php echo htmlspecialchars(substr($vacante['descripcion'], 0, 150)); ?>...
              </p>
              
              <div class="vacante-requisitos">
                <h4>Requisitos principales:</h4>
                <ul>
                  <?php 
                  $requisitos = explode(',', $vacante['requisitos']);
                  foreach(array_slice($requisitos, 0, 3) as $requisito): 
                  ?>
                    <li><?php echo htmlspecialchars(trim($requisito)); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
              
              <div class="vacante-beneficios">
                <?php if (!empty($vacante['salario'])): ?>
                  <span class="beneficio-item">💰 <?php echo htmlspecialchars($vacante['salario']); ?></span>
                <?php endif; ?>
                <?php if ($vacante['tipo_trabajo'] == 'remoto'): ?>
                  <span class="beneficio-item">🏠 Trabajo remoto</span>
                <?php endif; ?>
                <?php if (!empty($vacante['beneficios'])): ?>
                  <span class="beneficio-item">✨ Beneficios adicionales</span>
                <?php endif; ?>
              </div>
            </div>
            
            <div class="vacante-footer">
              <div class="vacante-fecha">
                <span>Publicado: <?php echo date('d M Y', strtotime($vacante['fecha_creacion'])); ?></span>
              </div>
              <div class="vacante-actions">
                <button class="btn btn-outline btn-sm" onclick="verDetalles(<?php echo $vacante['id']; ?>)">
                  Ver detalles
                </button>
                <button class="btn btn-primary btn-sm" onclick="postularse(<?php echo $vacante['id']; ?>)">
                  Postularse
                </button>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    
    <!-- Paginación -->
    <div class="pagination-container">
      <div class="pagination">
        <button class="page-btn active">1</button>
        <button class="page-btn">2</button>
        <button class="page-btn">3</button>
        <button class="page-btn">4</button>
        <button class="page-btn">5</button>
      </div>
    </div>
  </div>
</section>

<!-- Modal para detalles de vacante -->
<div id="modalDetalles" class="modal" style="display: none;">
  <div class="modal-content">
    <span class="close-btn" onclick="cerrarModal()">&times;</span>
    <div id="modalBody">
      <!-- Contenido del modal se carga aquí -->
    </div>
  </div>
</div>

<script>
function filterByType(type) {
  // Actualizar botones activos
  document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
  event.target.classList.add('active');
  
  // Filtrar tarjetas
  const cards = document.querySelectorAll('.vacante-card');
  cards.forEach(card => {
    if (type === 'all') {
      card.style.display = 'block';
    } else {
      const category = card.dataset.category.toLowerCase();
      if (category.includes(type) || 
          (type === 'practicas' && category.includes('práctica')) ||
          (type === 'empleos' && category.includes('empleo'))) {
        card.style.display = 'block';
      } else {
        card.style.display = 'none';
      }
    }
  });
}

function verDetalles(id) {
  // Cargar detalles de la vacante via AJAX
  fetch(`get_vacante_details.php?id=${id}`)
    .then(response => response.text())
    .then(data => {
      document.getElementById('modalBody').innerHTML = data;
      document.getElementById('modalDetalles').style.display = 'block';
    });
}

function postularse(id) {
  // Verificar si el usuario está logueado
  <?php if (!isset($_SESSION['usuario_id'])): ?>
    alert('Debes iniciar sesión para postularte a esta oportunidad');
    window.location.href = '?page=login';
    return;
  <?php endif; ?>
  
  // Procesar postulación
  if (confirm('¿Estás seguro de que quieres postularte a esta oportunidad?')) {
    fetch('procesar_postulacion.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        vacante_id: id,
        usuario_id: <?php echo isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : 'null'; ?>
      })
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert('¡Postulación enviada exitosamente!');
      } else {
        alert('Error al enviar la postulación: ' + data.message);
      }
    });
  }
}

function cerrarModal() {
  document.getElementById('modalDetalles').style.display = 'none';
}

// Cerrar modal al hacer clic fuera
window.onclick = function(event) {
  const modal = document.getElementById('modalDetalles');
  if (event.target === modal) {
    modal.style.display = 'none';
  }
}
</script>

<?php include 'includes/footer.php'; ?>