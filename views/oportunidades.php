<?php 

include 'includes/header.php';


// Obtener filtros
$conexion = new mysqli('localhost', 'root', '', 'primerospasosbd');
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Obtener filtros
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
$pais = isset($_POST['pais']) ? $_POST['pais'] : '';
$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : '';
$tipo_trabajo = isset($_POST['tipo_trabajo']) ? $_POST['tipo_trabajo'] : '';
$buscar = isset($_POST['buscar']) ? $_POST['buscar'] : '';

// Construir consulta SQL
$sql = "SELECT v.* , e.*
        FROM vacantes v
        JOIN empresas e ON v.id_em = e.id_em
        WHERE 1=1";
$tipos = '';
$params = [];

// Filtros dinámicos
if (!empty($categoria)) {
    $sql .= " AND v.area = ?";
    $tipos .= 's';
    $params[] = $categoria;
}
if (!empty($pais)) {
    $sql .= " AND e.pais = ?";
    $tipos .= 's';
    $params[] = $pais;
}

if (!empty($ciudad)) {
    $sql .= " AND e.ciudad = ?";
    $tipos .= 's';
    $params[] = $ciudad;
}
if (!empty($tipo_trabajo)) {
    
    if (is_array($tipo_trabajo)) {
        $placeholders = implode(',', array_fill(0, count($tipo_trabajo), '?'));
        $sql .= " AND v.jornada_laboral IN ($placeholders)";
        $tipos .= str_repeat('s', count($tipo_trabajo));
        foreach ($tipo_trabajo as $tt) {
            $params[] = $tt;
        }
    } else {
        $sql .= " AND v.jornada_laboral = ?";
        $tipos .= 's';
        $params[] = $tipo_trabajo;
    }
}
if (!empty($buscar)) {
    $sql .= " AND (v.titulo LIKE ? OR v.descripcion LIKE ?)";
    $tipos .= 'ss';
    $params[] = "%$buscar%";
    $params[] = "%$buscar%";
}

$stmt = $conexion->prepare($sql);
if ($params) {
    $stmt->bind_param($tipos, ...$params);
}
$stmt->execute();
$resultado = $stmt->get_result();
$vacantes = $resultado->fetch_all(MYSQLI_ASSOC);

// Obtener categorías únicas para el filtro
//$categorias_stmt = $conexion->query("SELECT DISTINCT categoria FROM vacantes WHERE categoria IS NOT NULL ORDER BY categoria");
//$categorias = $categorias_stmt->fetchAll(PDO::FETCH_COLUMN);

?>

<section class="oportunidades-hero">
  <div class="container">
    <div class="oportunidades-header">
      <h1>Explora las <span class="primer">oportunidades</span></h1>
      <p class="oportunidades-subtitle">Encuentra prácticas profesionales, becas y empleos diseñados para estudiantes y recién egresados</p>
    </div>
    
    <!-- Filtros de búsqueda -->
    <div class="filtros-container">
      <form method="POST" action="" class="filtros-form">
        <div class="filtros-principales">
         
          
          <div class="search-filters">
            <div class="search-input-container">
              <input type="text" name="buscar" placeholder="Buscar por título, empresa o palabra clave" 
                     value="<?php echo htmlspecialchars($buscar); ?>" class="search-input">
            </div>
            
            <div class="filter-selects">
              <select name="categoria" class="filter-select">
                <option value="">Categorías</option>                
                <option value="tecnologia" <?php echo ($categoria == 'tecnologia') ? 'selected' : ''; ?>>Tecnología</option>
                <option value="marketing" <?php echo ($categoria == 'marketing') ? 'selected' : ''; ?>>Marketing</option>
                <option value="ventas" <?php echo ($categoria == 'ventas') ? 'selected' : ''; ?>>Ventas</option>
                <option value="recursos_humanos" <?php echo ($categoria == 'recursos_humanos') ? 'selected' : ''; ?>>Recursos Humanos</option>
                <option value="finanzas" <?php echo ($categoria == 'finanzas') ? 'selected' : ''; ?>>Finanzas</option>
                <option value="administracion" <?php echo ($categoria == 'administracion') ? 'selected' : ''; ?>>Administración</option>
                <option value="diseño" <?php echo ($categoria == 'diseño') ? 'selected' : ''; ?>>Diseño</option>
                <option value="atencion_cliente" <?php echo ($categoria == 'atencion_cliente') ? 'selected' : ''; ?>>Atención al Cliente</option>
                <option value="otros" <?php echo ($categoria == 'otros') ? 'selected' : ''; ?>>Otros</option>
                
              </select>
              
              <select id="pais" name="pais" class="filter-select" onchange="updateCities()">
                <option value="">Seleccionar país...</option>
                <option value="Mexico" <?php echo ($pais == 'Mexico') ? 'selected' : ''; ?>>México</option>
                <option value="Estados Unidos" <?php echo ($pais == 'Estados Unidos') ? 'selected' : ''; ?>>Estados Unidos</option>
                <option value="Canada" <?php echo ($pais == 'Canada') ? 'selected' : ''; ?>>Canadá</option>
                <option value="Colombia" <?php echo ($pais == 'Colombia') ? 'selected' : ''; ?>>Colombia</option>
                <option value="Argentina" <?php echo ($pais == 'Argentina') ? 'selected' : ''; ?>>Argentina</option>
                <option value="Chile" <?php echo ($pais == 'Chile') ? 'selected' : ''; ?>>Chile</option>
                <option value="Peru" <?php echo ($pais == 'Peru') ? 'selected' : ''; ?>>Perú</option>
                <option value="España" <?php echo ($pais == 'España') ? 'selected' : ''; ?>>España</option>
              </select>
              
              <select id="ciudad" name="ciudad" class="filter-select">
                <option value="">Seleccionar ciudad...</option>
                <option value="Guadalajara" <?php echo ($ciudad == 'Guadalajara') ? 'selected' : ''; ?>>Guadalajara</option>
                <option value="Ciudad de México" <?php echo ($ciudad == 'Ciudad de México') ? 'selected' : ''; ?>>Ciudad de México</option>
                <option value="Monterrey" <?php echo ($ciudad == 'Monterrey') ? 'selected' : ''; ?>>Monterrey</option>
                <option value="Puebla" <?php echo ($ciudad == 'Puebla') ? 'selected' : ''; ?>>Puebla</option>
                <option value="Tijuana" <?php echo ($ciudad == 'Tijuana') ? 'selected' : ''; ?>>Tijuana</option>
                <option value="León" <?php echo ($ciudad == 'León') ? 'selected' : ''; ?>>León</option>
                <option value="Cancún" <?php echo ($ciudad == 'Cancún') ? 'selected' : ''; ?>>Cancún</option>
              </select>
            </div>
            
            <div class="work-type-checkboxes">
              <label class="checkbox-label">
                <input type="checkbox" name="tipo_trabajo[]" value="Remoto" 
                       <?php echo (is_array($tipo_trabajo) && in_array('Remoto', $tipo_trabajo)) ? 'checked' : ''; ?>>
                <span class="checkbox-custom"></span>
                Remoto
              </label>
              <label class="checkbox-label">
                <input type="checkbox" name="tipo_trabajo[]" value="Tiempo completo" 
                       <?php echo (is_array($tipo_trabajo) && in_array('Tiempo completo', $tipo_trabajo)) ? 'checked' : ''; ?>>
                <span class="checkbox-custom"></span>
                Tiempo completo
              </label>
              <label class="checkbox-label">
                <input type="checkbox" name="tipo_trabajo[]" value="Medio tiempo" 
                       <?php echo (is_array($tipo_trabajo) && in_array('Medio tiempo', $tipo_trabajo)) ? 'checked' : ''; ?>>
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
          <div class="vacante-card" data-category="<?php echo htmlspecialchars($vacante['area']); ?>">
            <div class="vacante-header">
              <div class="empresa-logo">
                <?php if (!empty($vacante['logo_empresa'])): ?>
                  <img src="<?php echo htmlspecialchars($vacante['logo_empresa']); ?>" alt="Logo">
                <?php else: ?>
                  <div class="logo-placeholder"><?php echo strtoupper(substr($vacante['nombre_comercial'] ?? '', 0, 2)); ?></div>
                <?php endif; ?>
              </div>
              <div class="vacante-info">
                <h3 class="vacante-titulo"><?php echo htmlspecialchars($vacante['titulo']); ?></h3>
                <p class="vacante-empresa"><?php echo htmlspecialchars($vacante['nombre_comercial']); ?></p>
                <div class="vacante-ubicacion">
                  <span class="ubicacion-icon">📍</span>
                  <?php echo htmlspecialchars($vacante['ciudad']); ?>
                </div>
              </div>
              <div class="vacante-tipo">
                <span class="tipo-badge <?php echo strtolower(str_replace(' ', '-', $vacante['jornada_laboral'])); ?>">
                  <?php echo htmlspecialchars($vacante['jornada_laboral']); ?>
                </span>
              </div>
            </div>
            
            <div class="vacante-body">
              <p class="vacante-descripcion">
                <?php echo htmlspecialchars(substr($vacante['descripcion'], 0, 15)); ?>...
              </p>
              
              
              
              <div class="vacante-beneficios">
                <?php if (!($vacante['no_mostrar_salario'])): ?>
                  <span class="beneficio-item">💰 <?php echo htmlspecialchars($vacante['salario']); ?></span>
                <?php endif; ?>
                <?php if ($vacante['jornada_laboral'] == 'Remoto'): ?>
                  <span class="beneficio-item">🏠 Trabajo remoto</span>
                <?php endif; ?>                
              </div>
            </div>
            
            <div class="vacante-footer">
              <div class="vacante-fecha">
                <span>Publicado: <?php echo date('d M Y', strtotime($vacante['fecha_creacion'])); ?></span>
              </div>
              <div class="vacante-actions">
                <button class="btn btn-outline btn-sm" onclick="verDetalles(<?php echo $vacante['id_va']; ?>)">
                  Ver detalles
                </button>
                <button class="btn btn-primary btn-sm" onclick="postularse(<?php echo $vacante['id_va']; ?>)">
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