<?php include "includes/header.php"; 
$conexion = new mysqli('localhost', 'root', '', 'primerpaso');
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

function getCandidatos() {
    $conexion = new mysqli('localhost', 'root', '', 'primerpaso');
    
    $candidatos = [];
    if ($conexion->connect_error) {
        die('Error de conexión: ' . $conexion->connect_error);
    }
            $sql = "SELECT u.*, p.fecha_postulacion, v.titulo AS titulo
            FROM postulaciones p
            JOIN usuarios u ON p.usuario_id = u.id_u
            JOIN vacantes v ON p.vacante_id = v.id_va
            WHERE v.id_em = ?";
           

            if (isset($_SESSION['usuario_id'])) {
                $empresa_id = $_SESSION['usuario_id'];
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param('i', $empresa_id);
                $stmt->execute();
                $resultado = $stmt->get_result();

                // obtener el nombre
                while ($row = $resultado->fetch_assoc()) {
                    $candidatos[] = $row;
                }
            }else{
                echo "<script>alert('No tienes permisos para ver los candidatos.');</script>";
                return [];
            }

            
    return $candidatos;
    }
    $candidatos = getCandidatos();
?> 
<section class="oportunidades-hero">
  <div class="container">
    <div class="oportunidades-header">
      <h1><span class="primer">Candidatos</span></h1>
      <p>Visualiza a tus candidatos y consulta su CV</p>
      <p><?php echo count($candidatos); ?> candidatos encontrados.</p>
    </div>
  </div>
</section>

<section class="vacantes-section">
  <div class="container">
    <div class="vacantes-grid">
    <?php foreach($candidatos = getCandidatos() as $usuario): ?>
        <div class="vacante-card postulante-card">
            <div class="vacante-header">
            <div class="empresa-logo">
                <div class="logo-placeholder">
                <?php echo strtoupper(substr($usuario['nombre'], 0, 2)); ?>
                </div>
            </div>
            <div class="vacante-info">
                <h3 class="vacante-titulo"><?php echo htmlspecialchars($usuario['nombre']); ?> <?php echo htmlspecialchars($usuario['apellido']); ?></h3>
                <p class="vacante-empresa"><?php echo htmlspecialchars($usuario['email']); ?></p>
                <div class="vacante-ubicacion">
                <span class="ubicacion-icon">📞</span>
                <?php echo htmlspecialchars($usuario['telefono']); ?>
                </div>
            </div>
            <div class="vacante-tipo">
                <span class="tipo-badge">
                <?php echo htmlspecialchars($usuario['titulo']); ?>
                </span>
            </div>
            </div>
            <div class="vacante-footer">
            <div class="vacante-fecha">
                <span>Postulado: <?php echo date('d M Y', strtotime($usuario['fecha_postulacion'])); ?></span>
            </div>
            <!-- Puedes agregar botones para ver CV, contactar, etc. -->
            </div>
        </div>
    <?php endforeach; ?>
    </div>
  </div>
</section>
    
<?php include "includes/footer.php"; ?>