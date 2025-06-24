<?php include 'includes/header.php'; ?>

<section class="contacto-section">
  <div class="container">
    <!-- Hero Section -->
    <div class="contacto-hero">
      <h1 class="contacto-title">Contáctanos</h1>
      <p class="contacto-subtitle">Estamos para apoyarte</p>
    </div>

    <!-- Opciones de contacto -->
    <div class="contacto-opciones">
      
      <!-- Soporte Empresa -->
      <div class="contacto-card">
        <div class="card-content">
          <div class="card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
              <circle cx="9" cy="7" r="4"/>
              <path d="m22 21-3-3m2.5-5a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Z"/>
            </svg>
          </div>
          <h3 class="card-title">soporte empresa</h3>
          <p class="card-description">Ayuda especializada para empresas que buscan talento joven</p>
          <a href="#" class="card-btn" onclick="openContactModal('empresa')">Ir</a>
        </div>
      </div>

      <!-- Soporte Estudiante -->
      <div class="contacto-card">
        <div class="card-content">
          <div class="card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
              <path d="M6 12v5c3 3 9 3 12 0v-5"/>
            </svg>
          </div>
          <h3 class="card-title">soporte estudiante</h3>
          <p class="card-description">Apoyo personalizado para estudiantes y recién graduados</p>
          <a href="#" class="card-btn" onclick="openContactModal('estudiante')">Ir</a>
        </div>
      </div>

      <!-- Tutorial de Usuario -->
      <div class="contacto-card">
        <div class="card-content">
          <div class="card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"/>
              <path d="M12 6v6l4 2"/>
            </svg>
          </div>
          <h3 class="card-title">Tutorial de usuario</h3>
          <p class="card-description">Guías paso a paso para aprovechar al máximo la plataforma</p>
          <a href="?page=tutorial" class="card-btn">Ir</a>
        </div>
      </div>

    </div>

    <!-- Métodos de contacto adicionales -->
    <div class="contacto-metodos">
      
      <!-- Chat Online -->
      <div class="metodo-card">
        <div class="metodo-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v5Z"/>
            <path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1"/>
          </svg>
        </div>
        <h3 class="metodo-title">Chat online</h3>
        <p class="metodo-subtitle">De</p>
        <p class="metodo-horario">Lunes a Viernes<br>9:00 AM - 6:00 PM</p>
        <button class="metodo-btn" onclick="openChat()">Iniciar Chat</button>
      </div>

      <!-- Vía Email -->
      <div class="metodo-card">
        <div class="metodo-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
            <polyline points="22,6 12,13 2,6"/>
          </svg>
        </div>
        <h3 class="metodo-title">Vía email</h3>
        <p class="metodo-subtitle">Escríbenos ahora:</p>
        <p class="metodo-email">soporte@primerpaso.com</p>
        <button class="metodo-btn" onclick="window.location.href='mailto:soporte@primerpaso.com'">Enviar Email</button>
      </div>

    </div>

  </div>
</section>

<!-- Modal de Contacto Empresa -->
<div id="contactModalEmpresa" class="modal-overlay" style="display: none;">
  <div class="modal-content">
    <div class="modal-header">
      <h2>Soporte para Empresas</h2>
      <button class="modal-close" onclick="closeContactModal('empresa')">&times;</button>
    </div>
    <div class="modal-body">
      <form id="contactFormEmpresa" class="contact-form">
        <div class="form-row">
          <div class="form-group">
            <label for="nombreEmpresa">Nombre de la empresa</label>
            <input type="text" id="nombreEmpresa" name="nombreEmpresa" required>
          </div>
          <div class="form-group">
            <label for="sectorEmpresa">Sector/Industria</label>
            <select id="sectorEmpresa" name="sectorEmpresa" required>
              <option value="">Selecciona un sector</option>
              <option value="tecnologia">Tecnología</option>
              <option value="finanzas">Finanzas</option>
              <option value="salud">Salud</option>
              <option value="educacion">Educación</option>
              <option value="retail">Retail/Comercio</option>
              <option value="manufactura">Manufactura</option>
              <option value="servicios">Servicios</option>
              <option value="otro">Otro</option>
            </select>
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group">
            <label for="contactoEmpresa">Persona de contacto</label>
            <input type="text" id="contactoEmpresa" name="contactoEmpresa" required>
          </div>
          <div class="form-group">
            <label for="cargoEmpresa">Cargo</label>
            <input type="text" id="cargoEmpresa" name="cargoEmpresa" placeholder="ej. Gerente de RRHH">
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group">
            <label for="emailEmpresa">Correo electrónico corporativo</label>
            <input type="email" id="emailEmpresa" name="emailEmpresa" required>
          </div>
          <div class="form-group">
            <label for="telefonoEmpresa">Teléfono</label>
            <input type="tel" id="telefonoEmpresa" name="telefonoEmpresa" required>
          </div>
        </div>

        <div class="form-group">
          <label for="tamanoEmpresa">Tamaño de la empresa</label>
          <select id="tamanoEmpresa" name="tamanoEmpresa" required>
            <option value="">Selecciona el tamaño</option>
            <option value="startup">Startup (1-10 empleados)</option>
            <option value="pequena">Pequeña (11-50 empleados)</option>
            <option value="mediana">Mediana (51-200 empleados)</option>
            <option value="grande">Grande (201-1000 empleados)</option>
            <option value="corporacion">Corporación (1000+ empleados)</option>
          </select>
        </div>
        
        <div class="form-group">
          <label for="tipoSolicitudEmpresa">Tipo de solicitud</label>
          <select id="tipoSolicitudEmpresa" name="tipoSolicitudEmpresa" required>
            <option value="">Selecciona el tipo de solicitud</option>
            <option value="publicar-vacante">Publicar vacante</option>
            <option value="busqueda-talento">Búsqueda de talento especializado</option>
            <option value="plan-corporativo">Información sobre plan corporativo</option>
            <option value="integracion-ats">Integración con ATS</option>
            <option value="capacitacion">Capacitación para mi equipo</option>
            <option value="soporte-tecnico">Soporte técnico</option>
            <option value="facturacion">Consulta de facturación</option>
            <option value="otro">Otro</option>
          </select>
        </div>

        <div class="form-group">
          <label for="presupuestoEmpresa">Presupuesto aproximado (opcional)</label>
          <select id="presupuestoEmpresa" name="presupuestoEmpresa">
            <option value="">Selecciona un rango</option>
            <option value="menos-5k">Menos de $5,000 MXN</option>
            <option value="5k-15k">$5,000 - $15,000 MXN</option>
            <option value="15k-30k">$15,000 - $30,000 MXN</option>
            <option value="30k-50k">$30,000 - $50,000 MXN</option>
            <option value="mas-50k">Más de $50,000 MXN</option>
          </select>
        </div>
        
        <div class="form-group">
          <label for="mensajeEmpresa">Describe tu necesidad</label>
          <textarea id="mensajeEmpresa" name="mensajeEmpresa" rows="4" required placeholder="Cuéntanos qué tipo de perfiles buscas, cuántas vacantes tienes, plazos, etc."></textarea>
        </div>
        
        <div class="form-actions">
          <button type="button" class="btn-secondary" onclick="closeContactModal('empresa')">Cancelar</button>
          <button type="submit" class="btn-primary">Enviar Solicitud</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal de Contacto Estudiante -->
<div id="contactModalEstudiante" class="modal-overlay" style="display: none;">
  <div class="modal-content">
    <div class="modal-header">
      <h2>Soporte para Estudiantes</h2>
      <button class="modal-close" onclick="closeContactModal('estudiante')">&times;</button>
    </div>
    <div class="modal-body">
      <form id="contactFormEstudiante" class="contact-form">
        <div class="form-row">
          <div class="form-group">
            <label for="nombreEstudiante">Nombre completo</label>
            <input type="text" id="nombreEstudiante" name="nombreEstudiante" required>
          </div>
          <div class="form-group">
            <label for="edadEstudiante">Edad</label>
            <input type="number" id="edadEstudiante" name="edadEstudiante" min="16" max="35" required>
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group">
            <label for="emailEstudiante">Correo electrónico</label>
            <input type="email" id="emailEstudiante" name="emailEstudiante" required>
          </div>
          <div class="form-group">
            <label for="telefonoEstudiante">Teléfono</label>
            <input type="tel" id="telefonoEstudiante" name="telefonoEstudiante">
          </div>
        </div>

        <div class="form-group">
          <label for="estatusEstudiante">Estatus actual</label>
          <select id="estatusEstudiante" name="estatusEstudiante" required>
            <option value="">Selecciona tu estatus</option>
            <option value="estudiante-activo">Estudiante activo</option>
            <option value="recien-graduado">Recién graduado (menos de 1 año)</option>
            <option value="graduado-1-2">Graduado (1-2 años de experiencia)</option>
            <option value="graduado-2-5">Graduado (2-5 años de experiencia)</option>
            <option value="cambio-carrera">Buscando cambio de carrera</option>
          </select>
        </div>
        
        <div class="form-row">
          <div class="form-group">
            <label for="carreraEstudiante">Carrera/Área de estudio</label>
            <input type="text" id="carreraEstudiante" name="carreraEstudiante" required placeholder="ej. Ingeniería en Sistemas">
          </div>
          <div class="form-group">
            <label for="institucionEstudiante">Institución educativa</label>
            <input type="text" id="institucionEstudiante" name="institucionEstudiante" placeholder="ej. UNAM, TEC, etc.">
          </div>
        </div>

        <div class="form-group">
          <label for="areaInteresEstudiante">Área de interés laboral</label>
          <select id="areaInteresEstudiante" name="areaInteresEstudiante" required>
            <option value="">Selecciona un área</option>
            <option value="tecnologia">Tecnología</option>
            <option value="diseno">Diseño</option>
            <option value="marketing">Marketing Digital</option>
            <option value="finanzas">Finanzas</option>
            <option value="recursos-humanos">Recursos Humanos</option>
            <option value="ventas">Ventas</option>
            <option value="operaciones">Operaciones</option>
            <option value="consultoria">Consultoría</option>
            <option value="educacion">Educación</option>
            <option value="salud">Salud</option>
            <option value="otro">Otro</option>
          </select>
        </div>
        
        <div class="form-group">
          <label for="tipoSolicitudEstudiante">¿En qué te podemos ayudar?</label>
          <select id="tipoSolicitudEstudiante" name="tipoSolicitudEstudiante" required>
            <option value="">Selecciona una opción</option>
            <option value="crear-perfil">Ayuda para crear mi perfil</option>
            <option value="optimizar-cv">Optimizar mi CV</option>
            <option value="buscar-oportunidades">Encontrar oportunidades</option>
            <option value="preparar-entrevistas">Preparación para entrevistas</option>
            <option value="networking">Consejos de networking</option>
            <option value="desarrollo-habilidades">Desarrollo de habilidades</option>
            <option value="orientacion-carrera">Orientación profesional</option>
            <option value="soporte-tecnico">Soporte técnico de la plataforma</option>
            <option value="otro">Otro</option>
          </select>
        </div>

        <div class="form-group">
          <label for="experienciaEstudiante">Experiencia laboral previa</label>
          <select id="experienciaEstudiante" name="experienciaEstudiante">
            <option value="">Selecciona tu experiencia</option>
            <option value="sin-experiencia">Sin experiencia laboral</option>
            <option value="practicas">Solo prácticas profesionales</option>
            <option value="trabajos-temporales">Trabajos temporales/de medio tiempo</option>
            <option value="menos-1-ano">Menos de 1 año</option>
            <option value="1-2-anos">1-2 años</option>
            <option value="mas-2-anos">Más de 2 años</option>
          </select>
        </div>
        
        <div class="form-group">
          <label for="mensajeEstudiante">Cuéntanos más sobre tu situación</label>
          <textarea id="mensajeEstudiante" name="mensajeEstudiante" rows="4" required placeholder="Describe tu situación actual, qué tipo de oportunidades buscas, cuáles son tus principales retos, etc."></textarea>
        </div>
        
        <div class="form-actions">
          <button type="button" class="btn-secondary" onclick="closeContactModal('estudiante')">Cancelar</button>
          <button type="submit" class="btn-primary">Enviar Solicitud</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
// Funcionalidad del modal
function openContactModal(tipo) {
    if (tipo === 'empresa') {
        document.getElementById('contactModalEmpresa').style.display = 'flex';
    } else if (tipo === 'estudiante') {
        document.getElementById('contactModalEstudiante').style.display = 'flex';
    }
    document.body.style.overflow = 'hidden';
}

function closeContactModal(tipo) {
    if (tipo === 'empresa') {
        document.getElementById('contactModalEmpresa').style.display = 'none';
    } else if (tipo === 'estudiante') {
        document.getElementById('contactModalEstudiante').style.display = 'none';
    }
    document.body.style.overflow = 'auto';
}

// Cerrar modal al hacer clic fuera
document.getElementById('contactModalEmpresa').addEventListener('click', function(e) {
    if (e.target === this) {
        closeContactModal('empresa');
    }
});

document.getElementById('contactModalEstudiante').addEventListener('click', function(e) {
    if (e.target === this) {
        closeContactModal('estudiante');
    }
});

// Funcionalidad del chat
function openChat() {
    // Aquí puedes integrar tu sistema de chat en vivo
    alert('Iniciando chat en vivo...');
}

// Manejo del formulario empresa
document.getElementById('contactFormEmpresa').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    // Aquí puedes agregar la lógica para enviar el formulario
    // Por ejemplo, enviar via AJAX a un endpoint PHP
    
    alert('Solicitud enviada correctamente. Un especialista en empresas te contactará pronto.');
    closeContactModal('empresa');
    this.reset();
});

// Manejo del formulario estudiante
document.getElementById('contactFormEstudiante').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    // Aquí puedes agregar la lógica para enviar el formulario
    // Por ejemplo, enviar via AJAX a un endpoint PHP
    
    alert('Solicitud enviada correctamente. Un mentor te contactará pronto para ayudarte.');
    closeContactModal('estudiante');
    this.reset();
});

// Validación en tiempo real
function setupRealTimeValidation() {
    const requiredFields = document.querySelectorAll('input[required], select[required], textarea[required]');
    
    requiredFields.forEach(field => {
        field.addEventListener('blur', function() {
            if (this.value.trim() === '') {
                this.style.borderColor = '#ef4444';
            } else {
                this.style.borderColor = '#c084fc';
            }
        });
        
        field.addEventListener('input', function() {
            if (this.value.trim() !== '') {
                this.style.borderColor = '#c084fc';
            }
        });
    });
}

// Animaciones al cargar
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.contacto-card, .metodo-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.2}s`;
    });
    
    setupRealTimeValidation();
});

// Cerrar modal con tecla Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeContactModal('empresa');
        closeContactModal('estudiante');
    }
});
</script>

<?php include 'includes/footer.php'; ?>