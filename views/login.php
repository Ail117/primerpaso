<?php


function validateLogin($email, $password) {
    // Aquí implementarías la validación real contra tu base de datos
    // Este es solo un ejemplo básico
    return !empty($email) && !empty($password);
}
?>

<?php include 'includes/header.php' ; ?>


    <div class="login-container">
        <h1 class="title">Iniciar Sesión</h1>
        
        <?php if (isset($error_message)): ?>
            <div class="error-message">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="conexion/conexion_login.php">
            <div class="form-group">
                <label class="form-label" for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" class="form-input" 
                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" 
                       required>
            </div>
            
            <div class="form-group">
                <label class="form-label" for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-input" required>
            </div>
            
            <div class="forgot-password">
                <a href="forgot-password.php">¿Olvidaste tu contraseña?</a>
            </div>
            
            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember" class="checkbox-input">
                <label for="remember" class="checkbox-label">
                    <span class="checkbox-custom"></span>
                    Recordarme
                </label>
            </div>
            
            <button type="submit" class="login-btn" name = "iniciar_sesion">Iniciar sesión</button>
        </form>
        
        <div class="divider">
            <span>O inicia sesión con:</span>
        </div>
        
        <div class="social-buttons">
            <a href="auth/google.php" class="social-btn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                </svg>
                Google
            </a>
            <a href="auth/outlook.php" class="social-btn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M7.462 3.282c2.446-1.06 5.298-1.06 7.744 0l6.088 2.638c.773.335 1.27 1.088 1.27 1.926v8.308c0 .838-.497 1.591-1.27 1.926l-6.088 2.638c-2.446 1.06-5.298 1.06-7.744 0L1.374 17.08c-.773-.335-1.27-1.088-1.27-1.926V7.846c0-.838.497-1.591 1.27-1.926L7.462 3.282z"/>
                    <path d="M12 8.615c-1.933 0-3.5 1.567-3.5 3.5s1.567 3.5 3.5 3.5 3.5-1.567 3.5-3.5-1.567-3.5-3.5-3.5z" fill="white"/>
                </svg>
                Outlook
            </a>
        </div>
        
        <div class="register-link">
            ¿No tienes una cuenta? <a href="?page=registro-usuario">Regístrate aquí</a>
        </div>
    </div>

    <script src="script_login.js"></script>

<?php include 'includes/footer.php' ; ?>
