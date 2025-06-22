<?php include "includes/header.php"; ?>
     
    <main class="registro-container">
        <header class="registrarse_header">
            <h1>Publica tu vacante</h1>
        </header>

        <form method="POST" action="conexion/conexion_vacantes.php">
            <div class="job-post-section">
                <h2 class="section-title">Datos del aviso</h2>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="titulo_vacante">Título de la vacante</label>
                        <input type="text" id="titulo_vacante" name="titulo_vacante" required placeholder="Ej: Desarrollador Frontend">
                    </div>
                    <div class="form-group">
                        <label for="area">Área</label>
                        <select id="area" name="area" required>
                            <option value="">Selecciona un área</option>
                            <option value="tecnologia">Tecnología</option>
                            <option value="marketing">Marketing</option>
                            <option value="ventas">Ventas</option>
                            <option value="recursos_humanos">Recursos Humanos</option>
                            <option value="finanzas">Finanzas</option>
                            <option value="administracion">Administración</option>
                            <option value="diseño">Diseño</option>
                            <option value="atencion_cliente">Atención al Cliente</option>
                            <option value="otros">Otros</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="descripcion_tareas">Descripción de tareas</label>
                    <textarea id="descripcion_tareas" name="descripcion_tareas" rows="4" required placeholder="Describe las principales responsabilidades y tareas del puesto..."></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="jornada_laboral">Jornada laboral</label>
                        <select id="jornada_laboral" name="jornada_laboral" required>
                            <option value="">Selecciona jornada</option>
                            <option value="Tiempo completo">Tiempo completo</option>
                            <option value="Medio tiempo">Medio tiempo</option>
                            <option value="Por horas">Por horas</option>
                            <option value="Freelance">Freelance</option>
                            <option value="Remoto">Remoto</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha_contratacion">Fecha de contratación</label>
                        <input type="date" id="fecha_contratacion" name="fecha_contratacion" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="salario">Salario</label>
                        <input type="number" id="salario" name="salario" min="0" step="0.01" placeholder="Ej: 25000">
                    </div>
                    <div class="form-group checkbox-salary">
                        <input type="checkbox" id="no_mostrar_salario" name="no_mostrar_salario">
                        <label for="no_mostrar_salario">No mostrar el salario</label>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="button" class="btn-secondary" onclick="goBack()">Anterior</button>
                <button type="submit" class="btn-primary" name="publicar_vacante">Publicar</button>
            </div>
        </form>
    </main>

    <?php include "includes/footer.php"; ?>

    <script>
        function goBack() {
            window.history.back();
        }
        
        document.getElementById('jobPostForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const titulo = document.getElementById('titulo_vacante').value;
            const area = document.getElementById('area').value;
            const descripcion = document.getElementById('descripcion_tareas').value;
            const jornada = document.getElementById('jornada_laboral').value;
            const fecha = document.getElementById('fecha_contratacion').value;

            if (!titulo || !area || !descripcion || !jornada || !fecha) {
                alert('Por favor, completa todos los campos obligatorios');
                return;
            }

            alert('Vacante publicada exitosamente!');
            // Aquí puedes enviar el formulario o hacer la petición AJAX
        });

        // Establecer fecha mínima como hoy
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('fecha_contratacion').setAttribute('min', today);

            const container = document.querySelector('.registro-container');
            container.style.opacity = '0';
            container.style.transform = 'translateY(20px)';

            setTimeout(() => {
                container.style.transition = 'all 0.6s ease';
                container.style.opacity = '1';
                container.style.transform = 'translateY(0)';
            }, 100);
        });
    </script>