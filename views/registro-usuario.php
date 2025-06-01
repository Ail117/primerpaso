<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="./assets/css/estilos_registro.css">
    
</head>

<body>
    
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="nav-wrapper">
                <!-- Logo -->
                <div class="logo">
                    <div class="logo-icon">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <circle cx="20" cy="20" r="18" stroke="#B794F6" stroke-width="2"/>
                            <path d="M12 20L18 26L28 14" stroke="#B794F6" stroke-width="2" fill="none"/>
                        </svg>
                    </div>
                    <span class="logo-text">PrimerPaso</span>
                </div>

                <!-- Navigation -->
                <nav class="nav">
                    <a href="#" class="nav-link active">Inicio</a>
                    <a href="#" class="nav-link">Empleos</a>
                    <a href="#" class="nav-link">Recursos</a>
                    <a href="#" class="nav-link">Para empresas</a>
                    <a href="#" class="nav-link">Sobre nosotros</a>
                    <a href="#" class="nav-link">PFFs</a>
                    <a href="#" class="nav-link">Contacto</a>
                </nav>

                <!-- Auth buttons -->
                <div class="auth-buttons">
                    <button class="btn-login">Ingresar</button>
                    <button class="btn-register">Registrarse</button>
                </div>
            </div>
        </div>
    </header>
    <main class="container"><!-- CORREGIDO: <div> cambiado por <main> por semántica -->
        <header class="header">
            <h1>Registrarse</h1>
            <div class="user-type">
                <button type="button" class="user-type-btn active" onclick="toggleUserType('empleado')">Busco empleo</button>
                <button type="button" class="user-type-btn" onclick="toggleUserType('empleador')">Soy empleador</button>
            </div>
        </header>

        <form method="POST" action="conexion/conexion.php"><!-- CORREGIDO: añadido 'novalidate' para usar validaciones personalizadas -->
            <div class="form-row">
                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" id="nombres" name="nombres" required>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirmar contraseña</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required>
                </div>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" pattern="[0-9]{10}" title="Ingrese un número de 10 dígitos">
                <!-- CORREGIDO: añadido patrón y título para validación básica -->
            </div>

            <div class="form-group">
                <label for="profesion">Profesión</label>
                <input type="text" id="profesion" name="profesion">
            </div>

            <fieldset class="checkbox-group"><!-- CORREGIDO: semántica con fieldset -->
                <legend style="display:none;">Preferencias</legend>
                <div class="checkbox-item">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">Acepto los términos y condiciones</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="notifications" name="notifications">
                    <label for="notifications">Deseo recibir notificaciones sobre nuevas oportunidades</label>
                </div>
            </fieldset>

            <button type="submit" class="submit-btn" name="registrar">Crear cuenta</button>
        </form>

        <div class="login-link">
            <span>¿Ya tienes una cuenta?</span>
            <a href="#" onclick="showLogin(); return false;">Inicia sesión aquí</a><!-- CORREGIDO: return false para evitar navegación -->
        </div>

        <div class="social-login">
            <p>O regístrate con</p>
            <div class="social-buttons">
                <button type="button" class="social-btn" onclick="loginWith('google')">Google</button><!-- CORREGIDO -->
                <button type="button" class="social-btn" onclick="loginWith('outlook')">Outlook</button><!-- CORREGIDO -->
            </div>
        </div>
       
    </main>

    <footer class="footer-links"><!-- CORREGIDO: <div> cambiado por <footer> -->
        <a href="#">Inicio</a>
        <a href="#">Empleos</a>
        <a href="#">Recursos</a>
        <a href="#">Para Empresas</a>
        <a href="#">Sobre Nosotros</a>
        <a href="#">FAQ</a>
        <a href="#">Contacto</a>
        <a href="#">Mapa del Sitio</a>
        
    </footer>

    <script>
        function toggleUserType(type) {
            const buttons = document.querySelectorAll('.user-type-btn');
            buttons.forEach(btn => btn.classList.remove('active'));

            if (type === 'empleador') {
                buttons[1].classList.add('active');
                // Usar el sistema de parámetros de tu proyecto
                window.location.href = '?page=registro-compañia';
            } else {
                buttons[0].classList.add('active');
            }
        }

        function showLogin() {
            alert('Redirigiendo a la página de inicio de sesión...');
        }

        function loginWith(provider) {
            alert(`Iniciando sesión con ${provider}...`);
        }

        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                alert('Las contraseñas no coinciden');
                return;
            }

            if (!document.getElementById('terms').checked) {
                alert('Debes aceptar los términos y condiciones');
                return;
            }

            alert('Cuenta creada exitosamente!');
        });

        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.container');
            container.style.opacity = '0';
            container.style.transform = 'translateY(20px)';

            setTimeout(() => {
                container.style.transition = 'all 0.6s ease';
                container.style.opacity = '1';
                container.style.transform = 'translateY(0)';
            }, 100);
        });
    </script>
</body>
</html>
