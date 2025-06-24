<?php 
// Iniciar sesión
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Simulación de datos del usuario (reemplazar con consulta a base de datos)
$user_data = [
    'id' => $_SESSION['user_id'],
    'nombre' => $_SESSION['user_name'] ?? 'Usuario',
    'email' => $_SESSION['user_email'] ?? 'usuario@example.com',
    'tipo' => $_SESSION['user_type'] ?? 'estudiante', // admin, empresa, estudiante
    'foto' => $_SESSION['user_photo'] ?? 'default-avatar.png',
    'telefono' => '555-0123',
    'ubicacion' => 'Ciudad, País',
    'fecha_registro' => '2024-01-15',
    'perfil_completado' => 75
];

include 'includes/header.php'; 
?>

<section class="profile-section">
    <div class="container">
        <!-- Sidebar del perfil -->
        <div class="profile-sidebar">
            <!-- Información básica del usuario -->
            <div class="profile-card">
                <div class="profile-avatar">
                    <img src="assets/images/users/<?php echo $user_data['foto']; ?>" alt="Foto de perfil" id="profileImage">
                    <div class="avatar-overlay">
                        <label for="avatarUpload" class="avatar-upload-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                                <circle cx="12" cy="13" r="4"/>
                            </svg>
                        </label>
                        <input type="file" id="avatarUpload" accept="image/*" style="display: none;">
                    </div>
                </div>
                
                <div class="profile-info">
                    <h2 class="profile-name"><?php echo htmlspecialchars($user_data['nombre']); ?></h2>
                    <p class="profile-email"><?php echo htmlspecialchars($user_data['email']); ?></p>
                    <div class="profile-badge">
                        <?php if ($user_data['tipo'] === 'admin'): ?>
                            <span class="badge admin">Administrador</span>
                        <?php elseif ($user_data['tipo'] === 'empresa'): ?>
                            <span class="badge empresa">Empresa</span>
                        <?php else: ?>
                            <span class="badge estudiante">Estudiante</span>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Progreso del perfil -->
                <div class="profile-progress">
                    <div class="progress-header">
                        <span>Perfil completado</span>
                        <span class="progress-percentage"><?php echo $user_data['perfil_completado']; ?>%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: <?php echo $user_data['perfil_completado']; ?>%"></div>
                    </div>
                </div>
            </div>

            <!-- Menú de navegación -->
            <nav class="profile-nav">
                <ul>
                    <li><a href="#" class="nav-link active" data-tab="configuracion">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                        Configuración del perfil
                    </a></li>
                    
                    <?php if ($user_data['tipo'] === 'estudiante'): ?>
                    <li><a href="#" class="nav-link" data-tab="postulaciones">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14,2 14,8 20,8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                            <polyline points="10,9 9,9 8,9"/>
                        </svg>
                        Mis Postulaciones
                    </a></li>
                    
                    <li><a href="#" class="nav-link" data-tab="cv">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/>
                            <polyline points="13,2 13,9 20,9"/>
                        </svg>
                        Mi CV
                    </a></li>
                    <?php endif; ?>

                    <?php if ($user_data['tipo'] === 'empresa'): ?>
                    <li><a href="#" class="nav-link" data-tab="vacantes">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/>
                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"/>
                        </svg>
                        Mis Vacantes
                    </a></li>
                    
                    <li><a href="#" class="nav-link" data-tab="candidatos">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="m22 21-3-3m2.5-5a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Z"/>
                        </svg>
                        Candidatos
                    </a></li>
                    <?php endif; ?>

                    <?php if ($user_data['tipo'] === 'admin'): ?>
                    <li><a href="#" class="nav-link" data-tab="usuarios">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                        Gestión de Usuarios
                    </a></li>
                    
                    <li><a href="#" class="nav-link" data-tab="estadisticas">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="20" x2="18" y2="10"/>
                            <line x1="12" y1="20" x2="12" y2="4"/>
                            <line x1="6" y1="20" x2="6" y2="14"/>
                        </svg>
                        Estadísticas
                    </a></li>
                    <?php endif; ?>

                    <li><a href="#" class="nav-link" data-tab="seguridad">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <circle cx="12" cy="16" r="1"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                        Seguridad
                    </a></li>
                </ul>
            </nav>

            <!-- Mapa del sitio -->
            <div class="site-map">
                <h3>Mapa del sitio</h3>
                <div class="site-map-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                        <line x1="9" y1="9" x2="15" y2="15"/>
                        <line x1="15" y1="9" x2="9" y2="15"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Contenido principal -->
        <div class="profile-main">
            <!-- Configuración del perfil -->
            <div id="configuracion-tab" class="tab-content active">
                <div class="tab-header">
                    <h1>Configuración del perfil</h1>
                    <p>Gestiona tu información personal y preferencias</p>
                </div>

                <div class="profile-form-container">
                    <form class="profile-form" id="profileForm">
                        <div class="form-section">
                            <h3>Información Personal</h3>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="nombre">Nombre completo</label>
                                    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($user_data['nombre']); ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">Correo electrónico</label>
                                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user_data['email']); ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <input type="tel" id="telefono" name="telefono" value="<?php echo htmlspecialchars($user_data['telefono']); ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="ubicacion">Ubicación</label>
                                    <input type="text" id="ubicacion" name="ubicacion" value="<?php echo htmlspecialchars($user_data['ubicacion']); ?>">
                                </div>
                            </div>
                        </div>

                        <?php if ($user_data['tipo'] === 'estudiante'): ?>
                        <div class="form-section">
                            <h3>Información Académica</h3>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="universidad">Universidad/Institución</label>
                                    <input type="text" id="universidad" name="universidad" placeholder="Nombre de tu institución">
                                </div>
                                
                                <div class="form-group">
                                    <label for="carrera">Carrera</label>
                                    <input type="text" id="carrera" name="carrera" placeholder="Tu carrera o programa de estudios">
                                </div>
                                
                                <div class="form-group">
                                    <label for="nivel">Nivel de estudios</label>
                                    <select id="nivel" name="nivel">
                                        <option value="">Seleccionar nivel</option>
                                        <option value="tecnico">Técnico</option>
                                        <option value="licenciatura">Licenciatura</option>
                                        <option value="ingenieria">Ingeniería</option>
                                        <option value="maestria">Maestría</option>
                                        <option value="doctorado">Doctorado</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="semestre">Semestre actual</label>
                                    <select id="semestre" name="semestre">
                                        <option value="">Seleccionar semestre</option>
                                        <?php for($i = 1; $i <= 12; $i++): ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?>° Semestre</option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($user_data['tipo'] === 'empresa'): ?>
                        <div class="form-section">
                            <h3>Información de la Empresa</h3>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="empresa_nombre">Nombre de la empresa</label>
                                    <input type="text" id="empresa_nombre" name="empresa_nombre" placeholder="Nombre oficial de la empresa">
                                </div>
                                
                                <div class="form-group">
                                    <label for="rfc">RFC</label>
                                    <input type="text" id="rfc" name="rfc" placeholder="RFC de la empresa">
                                </div>
                                
                                <div class="form-group">
                                    <label for="industria">Industria</label>
                                    <select id="industria" name="industria">
                                        <option value="">Seleccionar industria</option>
                                        <option value="tecnologia">Tecnología</option>
                                        <option value="salud">Salud</option>
                                        <option value="educacion">Educación</option>
                                        <option value="finanzas">Finanzas</option>
                                        <option value="manufactura">Manufactura</option>
                                        <option value="servicios">Servicios</option>
                                        <option value="comercio">Comercio</option>
                                        <option value="construccion">Construcción</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="tamano">Tamaño de la empresa</label>
                                    <select id="tamano" name="tamano">
                                        <option value="">Seleccionar tamaño</option>
                                        <option value="startup">Startup (1-10 empleados)</option>
                                        <option value="pequena">Pequeña (11-50 empleados)</option>
                                        <option value="mediana">Mediana (51-200 empleados)</option>
                                        <option value="grande">Grande (200+ empleados)</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="descripcion_empresa">Descripción de la empresa</label>
                                <textarea id="descripcion_empresa" name="descripcion_empresa" rows="4" placeholder="Describe brevemente tu empresa, su misión y valores..."></textarea>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            <button type="button" class="btn btn-secondary">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php if ($user_data['tipo'] === 'estudiante'): ?>
            <!-- Mis Postulaciones -->
            <div id="postulaciones-tab" class="tab-content">
                <div class="tab-header">
                    <h1>Mis Postulaciones</h1>
                    <p>Seguimiento de tus aplicaciones a empleos</p>
                </div>

                <div class="applications-container">
                    <!-- Filtros -->
                    <div class="applications-filters">
                        <select class="filter-select">
                            <option value="">Todos los estados</option>
                            <option value="enviada">Enviada</option>
                            <option value="revisando">En revisión</option>
                            <option value="entrevista">Entrevista</option>
                            <option value="aceptada">Aceptada</option>
                            <option value="rechazada">Rechazada</option>
                        </select>
                        
                        <select class="filter-select">
                            <option value="">Todas las fechas</option>
                            <option value="ultima_semana">Última semana</option>
                            <option value="ultimo_mes">Último mes</option>
                            <option value="ultimos_3_meses">Últimos 3 meses</option>
                        </select>
                    </div>

                    <!-- Lista de postulaciones -->
                    <div class="applications-list">
                        <!-- Ejemplo de postulación -->
                        <div class="application-card">
                            <div class="application-info">
                                <div class="company-logo">
                                    <img src="assets/images/companies/company1.png" alt="Logo empresa">
                                </div>
                                <div class="application-details">
                                    <h4>Desarrollador Frontend Jr.</h4>
                                    <p class="company-name">TechCorp México</p>
                                    <p class="application-date">Aplicado el 15 de Marzo, 2024</p>
                                </div>
                            </div>
                            <div class="application-status">
                                <span class="status-badge revisando">En revisión</span>
                                <div class="application-actions">
                                    <button class="btn-action" title="Ver detalles">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </button>
                                    <button class="btn-action" title="Eliminar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="3,6 5,6 21,6"/>
                                            <path d="M19,6v14a2,2,0,0,1-2,2H7a2,2,0,0,1-2-2V6m3,0V4a2,2,0,0,1,2-2h4a2,2,0,0,1,2,2V6"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Más postulaciones... -->
                        <div class="application-card">
                            <div class="application-info">
                                <div class="company-logo">
                                    <img src="assets/images/companies/company2.png" alt="Logo empresa">
                                </div>
                                <div class="application-details">
                                    <h4>Practicante de Marketing</h4>
                                    <p class="company-name">Marketing Solutions</p>
                                    <p class="application-date">Aplicado el 10 de Marzo, 2024</p>
                                </div>
                            </div>
                            <div class="application-status">
                                <span class="status-badge entrevista">Entrevista programada</span>
                                <div class="application-actions">
                                    <button class="btn-action" title="Ver detalles">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mi CV -->
            <div id="cv-tab" class="tab-content">
                <div class="tab-header">
                    <h1>Mi CV</h1>
                    <p>Gestiona tu currículum vitae</p>
                </div>

                <div class="cv-container">
                    <div class="cv-upload-section">
                        <div class="cv-current" id="cvCurrent" style="display: none;">
                            <h3>CV Actual</h3>
                            <div class="cv-file-info">
                                <div class="file-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/>
                                        <polyline points="13,2 13,9 20,9"/>
                                    </svg>
                                </div>
                                <div class="file-details">
                                    <p class="file-name" id="fileName">Mi_CV.pdf</p>
                                    <p class="file-date">Subido el 15 de Marzo, 2024</p>
                                </div>
                                <div class="file-actions">
                                    <button class="btn btn-outline" onclick="downloadCV()">Descargar</button>
                                    <button class="btn btn-outline" onclick="viewCV()">Ver</button>
                                    <button class="btn btn-danger" onclick="deleteCV()">Eliminar</button>
                                </div>
                            </div>
                        </div>

                        <div class="cv-upload" id="cvUpload">
                            <div class="upload-area" onclick="document.getElementById('cvFile').click()">
                                <div class="upload-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                        <polyline points="17,8 12,3 7,8"/>
                                        <line x1="12" y1="3" x2="12" y2="15"/>
                                    </svg>
                                </div>
                                <h3>Sube tu CV</h3>
                                <p>Arrastra y suelta tu archivo aquí o haz clic para seleccionar</p>
                                <p class="upload-formats">Formatos permitidos: PDF, DOC, DOCX (máx. 5MB)</p>
                            </div>
                            <input type="file" id="cvFile" accept=".pdf,.doc,.docx" style="display: none;">
                        </div>
                    </div>

                    <div class="cv-tips">
                        <h3>Consejos para tu CV</h3>
                        <ul class="tips-list">
                            <li>Mantén tu CV actualizado con tu experiencia más reciente</li>
                            <li>Usa un formato profesional y fácil de leer</li>
                            <li>Incluye palabras clave relevantes para tu área</li>
                            <li>Limita tu CV a máximo 2 páginas</li>
                            <li>Revisa la ortografía y gramática antes de subirlo</li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($user_data['tipo'] === 'empresa'): ?>
            <!-- Mis Vacantes -->
            <div id="vacantes-tab" class="tab-content">
                <div class="tab-header">
                    <h1>Mis Vacantes</h1>
                    <p>Gestiona las ofertas de trabajo publicadas</p>
                    <button class="btn btn-primary" onclick="openModal('nuevaVacante')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Nueva Vacante
                    </button>
                </div>

                <div class="vacantes-container">
                    <!-- Filtros -->
                    <div class="vacantes-filters">
                        <select class="filter-select">
                            <option value="">Todos los estados</option>
                            <option value="activa">Activa</option>
                            <option value="pausada">Pausada</option>
                            <option value="cerrada">Cerrada</option>
                        </select>
                        
                        <input type="text" class="filter-input" placeholder="Buscar por título...">
                    </div>

                    <!-- Lista de vacantes -->
                    <div class="vacantes-list">
                        <!-- Ejemplo de vacante -->
                        <div class="vacante-card">
                            <div class="vacante-header">
                                <div class="vacante-info">
                                    <h4>Desarrollador Full Stack</h4>
                                    <p class="vacante-company"><?php echo htmlspecialchars($user_data['nombre']); ?></p>
                                    <p class="vacante-date">Publicada el 20 de Marzo, 2024</p>
                                </div>
                                <div class="vacante-status">
                                    <span class="status-badge activa">Activa</span>
                                </div>
                            </div>
                            <div class="vacante-details">
                                <p><strong>Ubicación:</strong> Ciudad de México</p>
                                <p><strong>Aplicaciones:</strong> 15 candidatos</p>
                                <p><strong>Vencimiento:</strong> 30 de Abril, 2024</p>
                            </div>
                            <div class="vacante-actions">
                                <button class="btn btn-outline">Ver aplicaciones</button>
                                <button class="btn btn-secondary">Editar</button>
                                <button class="btn btn-danger">Eliminar</button>
                            </div>
                        </div>

                        <!-- Más vacantes... -->
                        <div class="vacante-card">
                            <div class="vacante-header">
                                <div class="vacante-info">
                                    <h4>Diseñador UX/UI</h4>
                                    <p class="vacante-company"><?php echo htmlspecialchars($user_data['nombre']); ?></p>
                                    <p class="vacante-date">Publicada el 18 de Marzo, 2024</p>
                                </div>
                                <div class="vacante-status">
                                    <span class="status-badge pausada">Pausada</span>
                                </div>
                            </div>
                            <div class="vacante-details">
                                <p><strong>Ubicación:</strong> Remoto</p>
                                <p><strong>Aplicaciones:</strong> 8 candidatos</p>
                                <p><strong>Vencimiento:</strong> 25 de Abril, 2024</p>
                            </div>
                            <div class="vacante-actions">
                                <button class="btn btn-outline">Ver aplicaciones</button>
                                <button class="btn btn-secondary">Editar</button>
                                <button class="btn btn-primary">Activar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Candidatos -->
            <div id="candidatos-tab" class="tab-content">
                <div class="tab-header">
                    <h1>Candidatos</h1>
                    <p>Revisa los perfiles de candidatos interesados</p>
                </div>

                <div class="candidatos-container">
                    <!-- Filtros -->
                    <div class="candidatos-filters">
                        <select class="filter-select">
                            <option value="">Todas las vacantes</option>
                            <option value="desarrollador">Desarrollador Full Stack</option>
                            <option value="disenador">Diseñador UX/UI</option>
                        </select>
                        
                        <select class="filter-select">
                            <option value="">Todos los estados</option>
                            <option value="nuevo">Nuevo</option>
                            <option value="revisado">Revisado</option>
                            <option value="entrevista">En entrevista</option>
                            <option value="seleccionado">Seleccionado</option>
                            <option value="rechazado">Rechazado</option>
                        </select>
                    </div>

                    <!-- Lista de candidatos -->
                    <div class="candidatos-list">
                        <!-- Ejemplo de candidato -->
                        <div class="candidato-card">
                            <div class="candidato-avatar">
                                <img src="assets/images/users/user1.jpg" alt="Candidato">
                            </div>
                            <div class="candidato-info">
                                <h4>María García López</h4>
                                <p class="candidato-carrera">Ingeniería en Sistemas</p>
                                <p class="candidato-universidad">Universidad Nacional</p>
                                <p class="candidato-aplicacion">Aplicó a: Desarrollador Full Stack</p>
                                <p class="candidato-fecha">Hace 2 días</p>
                            </div>
                            <div class="candidato-status">
                                <span class="status-badge nuevo">Nuevo</span>
                            </div>
                            <div class="candidato-actions">
                                <button class="btn btn-outline">Ver CV</button>
                                <button class="btn btn-primary">Contactar</button>
                                <button class="btn btn-secondary">Entrevista</button>
                            </div>
                        </div>

                        <!-- Más candidatos... -->
                        <div class="candidato-card">
                            <div class="candidato-avatar">
                                <img src="assets/images/users/user2.jpg" alt="Candidato">
                            </div>
                            <div class="candidato-info">
                                <h4>Carlos Rodríguez</h4>
                                <p class="candidato-carrera">Diseño Gráfico</p>
                                <p class="candidato-universidad">Instituto Tecnológico</p>
                                <p class="candidato-aplicacion">Aplicó a: Diseñador UX/UI</p>
                                <p class="candidato-fecha">Hace 5 días</p>
                            </div>
                            <div class="candidato-status">
                                <span class="status-badge revisado">Revisado</span>
                            </div>
                            <div class="candidato-actions">
                                <button class="btn btn-outline">Ver CV</button>
                                <button class="btn btn-primary">Contactar</button>
                                <button class="btn btn-success">Seleccionar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($user_data['tipo'] === 'admin'): ?>
            <!-- Gestión de Usuarios -->
            <div id="usuarios-tab" class="tab-content">
                <div class="tab-header">
                    <h1>Gestión de Usuarios</h1>
                    <p>Administra los usuarios de la plataforma</p>
                </div>

                <div class="usuarios-container">
                    <!-- Estadísticas rápidas -->
                    <div class="usuarios-stats">
                        <div class="stat-card">
                            <div class="stat-icon estudiante">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                                    <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                                </svg>
                            </div>
                            <div class="stat-info">
                                <h3>1,234</h3>
                                <p>Estudiantes</p>
                            </div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-icon empresa">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 21h18"/>
                                    <path d="M5 21V7l8-4v18"/>
                                    <path d="M19 21V11l-6-4"/>
                                    <path d="M9 9v.01"/>
                                    <path d="M9 12v.01"/>
                                    <path d="M9 15v.01"/>
                                    <path d="M13 9v.01"/>
                                    <path d="M13 12v.01"/>
                                    <path d="M13 15v.01"/>
                                </svg>
                            </div>
                            <div class="stat-info">
                                <h3>89</h3>
                                <p>Empresas</p>
                            </div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-icon admin">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                </svg>
                            </div>
                            <div class="stat-info">
                                <h3>5</h3>
                                <p>Administradores</p>
                            </div>
                        </div>
                    </div>

                    <!-- Filtros -->
                    <div class="usuarios-filters">
                        <select class="filter-select">
                            <option value="">Todos los tipos</option>
                            <option value="estudiante">Estudiantes</option>
                            <option value="empresa">Empresas</option>
                            <option value="admin">Administradores</option>
                        </select>
                        
                        <select class="filter-select">
                            <option value="">Todos los estados</option>
                            <option value="activo">Activos</option>
                            <option value="inactivo">Inactivos</option>
                            <option value="bloqueado">Bloqueados</option>
                        </select>
                        
                        <input type="text" class="filter-input" placeholder="Buscar usuario...">
                    </div>

                    <!-- Lista de usuarios -->
                    <div class="usuarios-list">
                        <!-- Ejemplo de usuario -->
                        <div class="usuario-card">
                            <div class="usuario-avatar">
                                <img src="assets/images/users/user3.jpg" alt="Usuario">
                            </div>
                            <div class="usuario-info">
                                <h4>Ana Martínez</h4>
                                <p class="usuario-email">ana.martinez@email.com</p>
                                <p class="usuario-tipo">Estudiante</p>
                                <p class="usuario-fecha">Registrado: 15 Mar 2024</p>
                            </div>
                            <div class="usuario-status">
                                <span class="status-badge activo">Activo</span>
                            </div>
                            <div class="usuario-actions">
                                <button class="btn btn-outline">Ver perfil</button>
                                <button class="btn btn-secondary">Editar</button>
                                <button class="btn btn-danger">Bloquear</button>
                            </div>
                        </div>

                        <!-- Más usuarios... -->
                        <div class="usuario-card">
                            <div class="usuario-avatar">
                                <img src="assets/images/users/company3.jpg" alt="Empresa">
                            </div>
                            <div class="usuario-info">
                                <h4>TechSolutions S.A.</h4>
                                <p class="usuario-email">contacto@techsolutions.com</p>
                                <p class="usuario-tipo">Empresa</p>
                                <p class="usuario-fecha">Registrado: 10 Mar 2024</p>
                            </div>
                            <div class="usuario-status">
                                <span class="status-badge activo">Activo</span>
                            </div>
                            <div class="usuario-actions">
                                <button class="btn btn-outline">Ver perfil</button>
                                <button class="btn btn-secondary">Editar</button>
                                <button class="btn btn-warning">Suspender</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estadísticas -->
            <div id="estadisticas-tab" class="tab-content">
                <div class="tab-header">
                    <h1>Estadísticas</h1>
                    <p>Métricas y análisis de la plataforma</p>
                </div>

                <div class="estadisticas-container">
                    <!-- Métricas principales -->
                    <div class="metricas-principales">
                        <div class="metrica-card">
                            <div class="metrica-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"/>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                </svg>
                            </div>
                            <div class="metrica-info">
                                <h3>1,328</h3>
                                <p>Total Usuarios</p>
                                <span class="metrica-cambio positivo">+12% este mes</span>
                            </div>
                        </div>

                        <div class="metrica-card">
                            <div class="metrica-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
                                    <line x1="8" y1="21" x2="16" y2="21"/>
                                    <line x1="12" y1="17" x2="12" y2="21"/>
                                </svg>
                            </div>
                            <div class="metrica-info">
                                <h3>245</h3>
                                <p>Vacantes Activas</p>
                                <span class="metrica-cambio positivo">+8% este mes</span>
                            </div>
                        </div>

                        <div class="metrica-card">
                            <div class="metrica-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14,2 14,8 20,8"/>
                                    <line x1="16" y1="13" x2="8" y2="13"/>
                                    <line x1="16" y1="17" x2="8" y2="17"/>
                                </svg>
                            </div>
                            <div class="metrica-info">
                                <h3>3,567</h3>
                                <p>Aplicaciones</p>
                                <span class="metrica-cambio positivo">+15% este mes</span>
                            </div>
                        </div>

                        <div class="metrica-card">
                            <div class="metrica-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="22,12 18,12 15,21 9,3 6,12 2,12"/>
                                </svg>
                            </div>
                            <div class="metrica-info">
                                <h3>87%</h3>
                                <p>Tasa de Éxito</p>
                                <span class="metrica-cambio positivo">+3% este mes</span>
                            </div>
                        </div>
                    </div>

                    <!-- Gráficos -->
                    <div class="graficos-container">
                        <div class="grafico-card">
                            <h3>Registros por Mes</h3>
                            <div class="grafico-placeholder">
                                <p>Aquí iría el gráfico de registros mensuales</p>
                            </div>
                        </div>

                        <div class="grafico-card">
                            <h3>Distribución de Usuarios</h3>
                            <div class="grafico-placeholder">
                                <p>Aquí iría el gráfico circular de tipos de usuarios</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Seguridad -->
            <div id="seguridad-tab" class="tab-content">
                <div class="tab-header">
                    <h1>Seguridad</h1>
                    <p>Administra la seguridad de tu cuenta</p>
                </div>

                <div class="seguridad-container">
                    <!-- Cambiar contraseña -->
                    <div class="seguridad-section">
                        <h3>Cambiar Contraseña</h3>
                        <form class="password-form">
                            <div class="form-group">
                                <label for="current_password">Contraseña actual</label>
                                <input type="password" id="current_password" name="current_password" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="new_password">Nueva contraseña</label>
                                <input type="password" id="new_password" name="new_password" required>
                                <small class="form-help">Mínimo 8 caracteres, incluye mayúsculas, minúsculas y números</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="confirm_password">Confirmar nueva contraseña</label>
                                <input type="password" id="confirm_password" name="confirm_password" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                        </form>
                    </div>

                    <!-- Autenticación de dos factores -->
                    <div class="seguridad-section">
                        <h3>Autenticación de Dos Factores</h3>
                        <p>Agrega una capa extra de seguridad a tu cuenta</p>
                        
                        <div class="two-factor-status">
                            <div class="status-indicator">
                                <span class="status-dot inactive"></span>
                                <span>Desactivada</span>
                            </div>
                            <button class="btn btn-primary">Activar 2FA</button>
                        </div>
                    </div>

                    <!-- Sesiones activas -->
                    <div class="seguridad-section">
                        <h3>Sesiones Activas</h3>
                        <p>Gestiona dónde has iniciado sesión</p>
                        
                        <div class="sessions-list">
                            <div class="session-item current">
                                <div class="session-info">
                                    <div class="session-device">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
                                            <line x1="8" y1="21" x2="16" y2="21"/>
                                            <line x1="12" y1="17" x2="12" y2="21"/>
                                        </svg>
                                        <span>Windows - Chrome</span>
                                    </div>
                                    <p class="session-location">Ciudad de México, México</p>
                                    <p class="session-time">Sesión actual</p>
                                </div>
                                <span class="session-current">Actual</span>
                            </div>

                            <div class="session-item">
                                <div class="session-info">
                                    <div class="session-device">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
                                            <line x1="8" y1="21" x2="16" y2="21"/>
                                            <line x1="12" y1="17" x2="12" y2="21"/>
                                        </svg>
                                        <span>Android - Mobile</span>
                                    </div>
                                    <p class="session-location">Ciudad de México, México</p>
                                    <p class="session-time">Hace 2 horas</p>
                                </div>
                                <button class="btn btn-danger btn-sm">Cerrar</button>
                            </div>
                        </div>
                        
                        <button class="btn btn-danger btn-outline mt-3">Cerrar todas las sesiones</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modales -->
<!-- Modal Nueva Vacante -->
<div id="nuevaVacante" class="modal-overlay" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Nueva Vacante</h2>
            <button class="modal-close" onclick="closeModal('nuevaVacante')">&times;</button>
        </div>
        <div class="modal-body">
            <form class="vacante-form">
                <div class="form-group">
                    <label for="vacante_titulo">Título de la vacante</label>
                    <input type="text" id="vacante_titulo" name="vacante_titulo" required>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="vacante_ubicacion">Ubicación</label>
                        <input type="text" id="vacante_ubicacion" name="vacante_ubicacion" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="vacante_tipo">Tipo de empleo</label>
                        <select id="vacante_tipo" name="vacante_tipo" required>
                            <option value="">Seleccionar tipo</option>
                            <option value="tiempo_completo">Tiempo completo</option>
                            <option value="medio_tiempo">Medio tiempo</option>
                            <option value="practicas">Prácticas</option>
                            <option value="freelance">Freelance</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="vacante_descripcion">Descripción</label>
                    <textarea id="vacante_descripcion" name="vacante_descripcion" rows="4" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="vacante_requisitos">Requisitos</label>
                    <textarea id="vacante_requisitos" name="vacante_requisitos" rows="3"></textarea>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="vacante_salario">Salario (opcional)</label>
                        <input type="text" id="vacante_salario" name="vacante_salario">
                    </div>
                    
                    <div class="form-group">
                        <label for="vacante_vencimiento">Fecha de vencimiento</label>
                        <input type="date" id="vacante_vencimiento" name="vacante_vencimiento">
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Publicar Vacante</button>
                    <button type="button" class="btn btn-secondary" onclick="closeModal('nuevaVacante')">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// JavaScript para el perfil
document.addEventListener('DOMContentLoaded', function() {
    // Navegación entre pestañas
    const navLinks = document.querySelectorAll('.nav-link');
    const tabContents = document.querySelectorAll('.tab-content');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remover clase active de todos los enlaces
            navLinks.forEach(nav => nav.classList.remove('active'));
            // Remover clase active de todos los contenidos
            tabContents.forEach(tab => tab.classList.remove('active'));
            
            // Agregar clase active al enlace clickeado
            this.classList.add('active');
            
            // Mostrar el contenido correspondiente
            const tabId = this.getAttribute('data-tab');
            const targetTab = document.getElementById(tabId + '-tab');
            if (targetTab) {
                targetTab.classList.add('active');
            }
        });
    });
    
    // Subida de avatar
    const avatarUpload = document.getElementById('avatarUpload');
    const profileImage = document.getElementById('profileImage');
    
    if (avatarUpload) {
        avatarUpload.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profileImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    }
    
    // Subida de CV
    const cvFile = document.getElementById('cvFile');
    const cvUpload = document.getElementById('cvUpload');
    const cvCurrent = document.getElementById('cvCurrent');
    
    if (cvFile) {
        cvFile.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Simular subida exitosa
                setTimeout(() => {
                    cvUpload.style.display = 'none';
                    cvCurrent.style.display = 'block';
                    document.getElementById('fileName').textContent = file.name;
                }, 1000);
            }
        });
    }
    
    // Drag and drop para CV
    const uploadArea = document.querySelector('.upload-area');
    if (uploadArea) {
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('dragover');
        });
        
        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.classList.remove('dragover');
        });
        
        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('dragover');
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                cvFile.files = files;
                cvFile.dispatchEvent(new Event('change'));
            }
        });
    }
});

// Funciones para modales
function openModal(modalId) {
    document.getElementById(modalId).style.display = 'flex';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Funciones para CV
function downloadCV() {
    // Implementar descarga de CV
    alert('Descargando CV...');
}

function viewCV() {
    // Implementar visualización de CV
    alert('Abriendo CV...');
}

function deleteCV() {
    if (confirm('¿Estás seguro de que quieres eliminar tu CV?')) {
        document.getElementById('cvCurrent').style.display = 'none';
        document.getElementById('cvUpload').style.display = 'block';
    }
}

// Cerrar modal al hacer clic fuera
window.addEventListener('click', function(e) {
    if (e.target.classList.contains('modal-overlay')) {
        e.target.style.display = 'none';
    }
});
</script>

<?php include 'includes/footer.php'; ?>