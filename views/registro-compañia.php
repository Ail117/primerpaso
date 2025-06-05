<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - Empleador</title>
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

    <main class="container">
        <header class="header">
            <h1>Registrarse</h1>
                <div class="user-type">
                    <button type="button" class="user-type-btn active" onclick="toggleUserType('empleado')">Busco empleo</button>
                    <button type="button" class="user-type-btn" onclick="toggleUserType('empleador')">Soy empleador</button>
                </div>
        </header>

        <form method="POST" action="conexion/conexion_empresa.php">
            <div class="form-row">
                <div class="form-group">
                    <label for="correo">Correo electrónico</label>
                    <input type="email" id="correo" name="correo" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" pattern="[0-9]{10}" title="Ingrese un número de 10 dígitos" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="nombre_comercial">Nombre comercial de la empresa</label>
                    <input type="text" id="nombre_comercial" name="nombre_comercial" required>
                </div>
                <div class="form-group">
                    <label for="numero_trabajadores">Número de trabajadores</label>
                    <select id="numero_trabajadores" name="numero_trabajadores" required>
                        <option value="">Seleccionar...</option>
                        <option value="1-10">1-10 empleados</option>
                        <option value="11-50">11-50 empleados</option>
                        <option value="51-100">51-100 empleados</option>
                        <option value="101-500">101-500 empleados</option>
                        <option value="500+">Más de 500 empleados</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="pais">País</label>
                    <select id="pais" name="pais" required onchange="updateCities()">
                        <option value="">Seleccionar país...</option>
                        <option value="Mexico">México</option>
                        <option value="Estados Unidos">Estados Unidos</option>
                        <option value="Canada">Canadá</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Chile">Chile</option>
                        <option value="Peru">Perú</option>
                        <option value="España">España</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ciudad">Ciudad</label>
                    <select id="ciudad" name="ciudad" required>
                        <option value="">Seleccionar ciudad...</option>
                        <option value="Guadalajara">Guadalajara</option>
                        <option value="Ciudad de México">Ciudad de México</option>
                        <option value="Monterrey">Monterrey</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Tijuana">Tijuana</option>
                        <option value="León">León</option>
                        <option value="Cancún">Cancún</option>
                    </select>
                </div>
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

            <fieldset class="checkbox-group">
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

            <button type="submit" class="submit-btn" name="registrar_empresa">Crear cuenta</button>
        </form>

        <div class="login-link">
            <span>¿Ya tienes una cuenta?</span>
            <a href="#" onclick="showLogin(); return false;">Inicia sesión aquí</a>
        </div>

        <div class="social-login">
            <p>O regístrate con</p>
            <div class="social-buttons">
                <button type="button" class="social-btn" onclick="loginWith('google')">Google</button>
                <button type="button" class="social-btn" onclick="loginWith('outlook')">Outlook</button>
            </div>
        </div>
       
    </main>

    <footer class="footer-links">
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
                window.location.href = '?page=registro-usuario';
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

        function updateCities() {
            const paisSelect = document.getElementById('pais');
            const ciudadSelect = document.getElementById('ciudad');
            const selectedCountry = paisSelect.value;
            
            // Limpiar opciones actuales
            ciudadSelect.innerHTML = '<option value="">Seleccionar ciudad...</option>';
            
            // Ciudades por país
            const cities = {
                'Mexico': ['Guadalajara', 'Ciudad de México', 'Monterrey', 'Puebla', 'Tijuana', 'León', 'Cancún'],
                'Estados Unidos': ['Nueva York', 'Los Ángeles', 'Chicago', 'Houston', 'Miami', 'San Francisco'],
                'Canada': ['Toronto', 'Vancouver', 'Montreal', 'Calgary', 'Ottawa'],
                'Colombia': ['Bogotá', 'Medellín', 'Cali', 'Barranquilla', 'Cartagena'],
                'Argentina': ['Buenos Aires', 'Córdoba', 'Rosario', 'Mendoza', 'La Plata'],
                'Chile': ['Santiago', 'Valparaíso', 'Concepción', 'Antofagasta'],
                'Peru': ['Lima', 'Arequipa', 'Trujillo', 'Chiclayo', 'Cusco'],
                'España': ['Madrid', 'Barcelona', 'Valencia', 'Sevilla', 'Bilbao']
            };
            
            if (cities[selectedCountry]) {
                cities[selectedCountry].forEach(city => {
                    const option = document.createElement('option');
                    option.value = city;
                    option.textContent = city;
                    ciudadSelect.appendChild(option);
                });
            }
        }

        document.getElementById('companyRegistrationForm').addEventListener('submit', function(e) {
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

            // Validar que todos los campos requeridos estén completos
            const requiredFields = ['correo', 'telefono', 'nombre_comercial', 'numero_trabajadores', 'pais', 'ciudad', 'password'];
            let allFieldsValid = true;

            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (!field.value.trim()) {
                    allFieldsValid = false;
                    field.style.borderColor = '#ff4444';
                } else {
                    field.style.borderColor = '';
                }
            });

            if (!allFieldsValid) {
                alert('Por favor, completa todos los campos requeridos');
                return;
            }

            alert('Cuenta de empresa creada exitosamente!');
            // Aquí puedes descomentar la siguiente línea para enviar el formulario
            // this.submit();
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