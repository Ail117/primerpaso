<?php include 'includes/header.php'; ?>

<section class="tutorial-section">
  <div class="container">
    <!-- Hero Section -->
    <div class="tutorial-hero">
      <h1 class="tutorial-title">Tutorial de Usuario</h1>
      <p class="tutorial-subtitle">Aprende a usar PrimerPaso paso a paso</p>
      <p class="tutorial-description">Guías completas para estudiantes y empresas</p>
    </div>

    <!-- Selector de Tipo de Usuario -->
    <div class="user-type-selector">
      <button class="type-btn active" data-type="estudiante" onclick="showTutorialType('estudiante')">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
          <path d="M6 12v5c3 3 9 3 12 0v-5"/>
        </svg>
        Estudiantes
      </button>
      <button class="type-btn" data-type="empresa" onclick="showTutorialType('empresa')">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
          <circle cx="9" cy="7" r="4"/>
          <path d="m22 21-3-3m2.5-5a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Z"/>
        </svg>
        Empresas
      </button>
    </div>

    <!-- Tutorial para Estudiantes -->
    <div id="tutorial-estudiante" class="tutorial-content active">
      <div class="tutorial-steps">
        
        <!-- Paso 1 -->
        <div class="step-card">
          <div class="step-number">1</div>
          <div class="step-content">
            <h3 class="step-title">Crear tu cuenta</h3>
            <p class="step-description">Regístrate en PrimerPaso con tu correo electrónico y crea tu perfil profesional.</p>
            <div class="step-details">
              <ul>
                <li>Haz clic en "Registrarse" en la esquina superior derecha</li>
                <li>Completa el formulario con tus datos personales</li>
                <li>Verifica tu correo electrónico</li>
                <li>Inicia sesión por primera vez</li>
              </ul>
            </div>
            <button class="step-btn" onclick="openStepModal('registro')">Ver guía detallada</button>
          </div>
        </div>

        <!-- Paso 2 -->
        <div class="step-card">
          <div class="step-number">2</div>
          <div class="step-content">
            <h3 class="step-title">Completar tu perfil</h3>
            <p class="step-description">Añade tu información académica, experiencia y habilidades para destacar.</p>
            <div class="step-details">
              <ul>
                <li>Sube una foto profesional</li>
                <li>Agrega tu información académica</li>
                <li>Incluye experiencia laboral (si tienes)</li>
                <li>Lista tus habilidades y competencias</li>
              </ul>
            </div>
            <button class="step-btn" onclick="openStepModal('perfil')">Ver guía detallada</button>
          </div>
        </div>

        <!-- Paso 3 -->
        <div class="step-card">
          <div class="step-number">3</div>
          <div class="step-content">
            <h3 class="step-title">Buscar oportunidades</h3>
            <p class="step-description">Encuentra prácticas profesionales, empleos de entrada y oportunidades de crecimiento.</p>
            <div class="step-details">
              <ul>
                <li>Usa los filtros de búsqueda</li>
                <li>Guarda oportunidades que te interesen</li>
                <li>Configura alertas de empleo</li>
                <li>Revisa regularmente nuevas ofertas</li>
              </ul>
            </div>
            <button class="step-btn" onclick="openStepModal('busqueda')">Ver guía detallada</button>
          </div>
        </div>

        <!-- Paso 4 -->
        <div class="step-card">
          <div class="step-number">4</div>
          <div class="step-content">
            <h3 class="step-title">Aplicar a empleos</h3>
            <p class="step-description">Envía aplicaciones efectivas y destaca entre otros candidatos.</p>
            <div class="step-details">
              <ul>
                <li>Lee cuidadosamente la descripción del puesto</li>
                <li>Personaliza tu carta de presentación</li>
                <li>Envía tu aplicación</li>
                <li>Haz seguimiento a tus aplicaciones</li>
              </ul>
            </div>
            <button class="step-btn" onclick="openStepModal('aplicacion')">Ver guía detallada</button>
          </div>
        </div>

        <!-- Paso 5 -->
        <div class="step-card">
          <div class="step-number">5</div>
          <div class="step-content">
            <h3 class="step-title">Prepararse para entrevistas</h3>
            <p class="step-description">Consejos y recursos para destacar en tus entrevistas de trabajo.</p>
            <div class="step-details">
              <ul>
                <li>Investiga sobre la empresa</li>
                <li>Practica preguntas comunes</li>
                <li>Prepara preguntas para el entrevistador</li>
                <li>Confirma detalles de la entrevista</li>
              </ul>
            </div>
            <button class="step-btn" onclick="openStepModal('entrevista')">Ver guía detallada</button>
          </div>
        </div>

      </div>
    </div>

    <!-- Tutorial para Empresas -->
    <div id="tutorial-empresa" class="tutorial-content">
      <div class="tutorial-steps">
        
        <!-- Paso 1 -->
        <div class="step-card">
          <div class="step-number">1</div>
          <div class="step-content">
            <h3 class="step-title">Registrar tu empresa</h3>
            <p class="step-description">Crea una cuenta corporativa y configura el perfil de tu empresa.</p>
            <div class="step-details">
              <ul>
                <li>Regístrate como empresa</li>
                <li>Verifica tu correo corporativo</li>
                <li>Completa la información de la empresa</li>
                <li>Sube tu logo y contenido visual</li>
              </ul>
            </div>
            <button class="step-btn" onclick="openStepModal('registro-empresa')">Ver guía detallada</button>
          </div>
        </div>

        <!-- Paso 2 -->
        <div class="step-card">
          <div class="step-number">2</div>
          <div class="step-content">
            <h3 class="step-title">Publicar vacantes</h3>
            <p class="step-description">Crea ofertas de trabajo atractivas para encontrar el talento ideal.</p>
            <div class="step-details">
              <ul>
                <li>Accede al panel de empleador</li>
                <li>Haz clic en "Publicar vacante"</li>
                <li>Completa la descripción del puesto</li>
                <li>Define requisitos y beneficios</li>
              </ul>
            </div>
            <button class="step-btn" onclick="openStepModal('publicar-vacante')">Ver guía detallada</button>
          </div>
        </div>

        <!-- Paso 3 -->
        <div class="step-card">
          <div class="step-number">3</div>
          <div class="step-content">
            <h3 class="step-title">Buscar candidatos</h3>
            <p class="step-description">Utiliza nuestras herramientas de búsqueda para encontrar talento proactivamente.</p>
            <div class="step-details">
              <ul>
                <li>Usa filtros avanzados</li>
                <li>Revisa perfiles de candidatos</li>
                <li>Contacta directamente a candidatos</li>
                <li>Guarda perfiles interesantes</li>
              </ul>
            </div>
            <button class="step-btn" onclick="openStepModal('buscar-candidatos')">Ver guía detallada</button>
          </div>
        </div>

        <!-- Paso 4 -->
        <div class="step-card">
          <div class="step-number">4</div>
          <div class="step-content">
            <h3 class="step-title">Gestionar aplicaciones</h3>
            <p class="step-description">Organiza y administra las aplicaciones recibidas de manera eficiente.</p>
            <div class="step-details">
              <ul>
                <li>Revisa aplicaciones recibidas</li>
                <li>Organiza candidatos por etapas</li>
                <li>Programa entrevistas</li>
                <li>Comunícate con candidatos</li>
              </ul>
            </div>
            <button class="step-btn" onclick="openStepModal('gestionar-aplicaciones')">Ver guía detallada</button>
          </div>
        </div>

        <!-- Paso 5 -->
        <div class="step-card">
          <div class="step-number">5</div>
          <div class="step-content">
            <h3 class="step-title">Contratar y onboarding</h3>
            <p class="step-description">Finaliza el proceso de contratación e integra a tu nuevo talento.</p>
            <div class="step-details">
              <ul>
                <li>Envía ofertas de trabajo</li>
                <li>Gestiona documentación legal</li>
                <li>Programa onboarding</li>
                <li>Mantén comunicación post-contratación</li>
              </ul>
            </div>
            <button class="step-btn" onclick="openStepModal('contratar')">Ver guía detallada</button>
          </div>
        </div>

      </div>
    </div>


    <!-- FAQ Rápido -->
    <div class="faq-section">
      <h2 class="faq-title">Preguntas Frecuentes</h2>
      <div class="faq-container">
        
        <div class="faq-item">
          <button class="faq-question" onclick="toggleFAQ(this)">
            ¿Cómo puedo destacar mi perfil como estudiante?
            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M6 9l6 6 6-6"/>
            </svg>
          </button>
          <div class="faq-answer">
            <p>Completa al 100% tu perfil, incluye proyectos académicos, certificaciones, y destaca tus habilidades blandas. Usa palabras clave relevantes para tu área de interés.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-question" onclick="toggleFAQ(this)">
            ¿Cuánto tiempo tarda en aprobarse una vacante?
            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M6 9l6 6 6-6"/>
            </svg>
          </button>
          <div class="faq-answer">
            <p>Las vacantes se revisan en un plazo de 24-48 horas hábiles. Asegúrate de completar toda la información requerida para acelerar el proceso.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-question" onclick="toggleFAQ(this)">
            ¿Puedo editar mi perfil después de registrarme?
            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M6 9l6 6 6-6"/>
            </svg>
          </button>
          <div class="faq-answer">
            <p>Sí, puedes editar tu perfil en cualquier momento desde tu panel de usuario. Te recomendamos mantenerlo actualizado regularmente.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-question" onclick="toggleFAQ(this)">
            ¿Cómo puedo ver el estado de mis aplicaciones?
            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M6 9l6 6 6-6"/>
            </svg>
          </button>
          <div class="faq-answer">
            <p>En tu panel de usuario, sección "Mis Aplicaciones", puedes ver el estado de cada aplicación enviada y recibir notificaciones de actualizaciones.</p>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>

<!-- Modal para Pasos Detallados -->
<div id="stepModal" class="modal-overlay" style="display: none;">
  <div class="modal-content">
    <div class="modal-header">
      <h2 id="stepModalTitle">Guía Detallada</h2>
      <button class="modal-close" onclick="closeStepModal()">&times;</button>
    </div>
    <div class="modal-body">
      <div id="stepModalContent">
        <!-- El contenido se cargará dinámicamente -->
      </div>
    </div>
  </div>
</div>

<script>
// Cambiar entre tipos de usuario
function showTutorialType(type) {
    // Actualizar botones
    document.querySelectorAll('.type-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    document.querySelector(`[data-type="${type}"]`).classList.add('active');
    
    // Mostrar contenido correspondiente
    document.querySelectorAll('.tutorial-content').forEach(content => {
        content.classList.remove('active');
    });
    document.getElementById(`tutorial-${type}`).classList.add('active');
}

// Abrir modal de paso detallado
function openStepModal(step) {
    const modal = document.getElementById('stepModal');
    const title = document.getElementById('stepModalTitle');
    const content = document.getElementById('stepModalContent');
    
    // Configurar contenido según el paso
    const stepContent = getStepContent(step);
    title.textContent = stepContent.title;
    content.innerHTML = stepContent.content;
    
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

// Cerrar modal
function closeStepModal() {
    document.getElementById('stepModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Obtener contenido detallado de cada paso
function getStepContent(step) {
    const content = {
        'registro': {
            title: 'Crear tu cuenta - Guía Detallada',
            content: `
                <div class="step-detail">
                    <h3>Paso a paso para registrarte:</h3>
                    <ol>
                        <li><strong>Ir a la página de registro:</strong> Haz clic en "Registrarse" en la esquina superior derecha</li>
                        <li><strong>Completar datos básicos:</strong> Nombre, apellido, correo electrónico y contraseña segura</li>
                        <li><strong>Verificar correo:</strong> Revisa tu bandeja de entrada y haz clic en el enlace de verificación</li>
                        <li><strong>Primer inicio de sesión:</strong> Ingresa con tus credenciales</li>
                        <li><strong>Configuración inicial:</strong> Completa tu perfil básico</li>
                    </ol>
                    <div class="tip-box">
                        <h4>💡 Consejos:</h4>
                        <ul>
                            <li>Usa un correo electrónico que revises regularmente</li>
                            <li>Crea una contraseña segura con mayúsculas, minúsculas y números</li>
                            <li>Guarda tus credenciales en un lugar seguro</li>
                        </ul>
                    </div>
                </div>
            `
        },
        'perfil': {
            title: 'Completar tu perfil - Guía Detallada',
            content: `
                <div class="step-detail">
                    <h3>Elementos clave de tu perfil:</h3>
                    <ol>
                        <li><strong>Foto profesional:</strong> Imagen clara, con buena iluminación y vestimenta formal</li>
                        <li><strong>Información personal:</strong> Datos de contacto, ubicación y resumen profesional</li>
                        <li><strong>Educación:</strong> Institución, carrera, fechas y promedio (opcional)</li>
                        <li><strong>Experiencia:</strong> Trabajos previos, prácticas, voluntariados</li>
                        <li><strong>Habilidades:</strong> Técnicas y blandas relevantes para tu área</li>
                        <li><strong>Proyectos:</strong> Trabajos académicos, personales o profesionales destacados</li>
                    </ol>
                    <div class="tip-box">
                        <h4>💡 Consejos para destacar:</h4>
                        <ul>
                            <li>Usa palabras clave de tu industria</li>
                            <li>Incluye métricas cuando sea posible</li>
                            <li>Mantén la información actualizada</li>
                            <li>Sé honesto sobre tu nivel de experiencia</li>
                        </ul>
                    </div>
                </div>
            `
        },
        // Agregar más contenido para otros pasos...
    };
    
    return content[step] || {
        title: 'Información no disponible',
        content: '<p>Esta sección está en desarrollo. Contacta a soporte para más información.</p>'
    };
}

// Toggle FAQ
function toggleFAQ(element) {
    const faqItem = element.parentElement;
    const answer = faqItem.querySelector('.faq-answer');
    const icon = element.querySelector('.faq-icon');
    
    faqItem.classList.toggle('active');
    
    if (faqItem.classList.contains('active')) {
        answer.style.maxHeight = answer.scrollHeight + 'px';
        icon.style.transform = 'rotate(180deg)';
    } else {
        answer.style.maxHeight = '0';
        icon.style.transform = 'rotate(0deg)';
    }
}

// Funciones para recursos
function openVideoModal() {
    alert('Redirigiendo a la biblioteca de videos...');
}

function downloadGuides() {
    alert('Descargando guías PDF...');
}

function downloadTemplates() {
    alert('Descargando plantillas de CV...');
}

// Cerrar modal al hacer clic fuera
document.getElementById('stepModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeStepModal();
    }
});

// Cerrar modal con Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeStepModal();
    }
});

// Animaciones al cargar
document.addEventListener('DOMContentLoaded', function() {
    // Animar tarjetas de pasos
    const stepCards = document.querySelectorAll('.step-card');
    stepCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
    });
    
    // Animar recursos
    const recursoCards = document.querySelectorAll('.recurso-card');
    recursoCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.2}s`;
    });
});
</script>

<?php include 'includes/footer.php'; ?>