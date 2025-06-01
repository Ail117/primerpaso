<?php
$conexion = mysqli_connect("localhost", "root", "", "primerospasosbd");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$contraseña = null;
$correo = null;
$usuario_encontrado = false;
$datos_usuario = null;

if (isset($_POST['iniciar_sesion'])) {
    
    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo "Complete los campos requeridos";
    } else {
        $correo = trim($_POST['email']);
        $contraseña = trim($_POST['password']);

        // MÉTODO 1: Buscar primero en tabla usuarios
        $sql_usuarios = "SELECT * FROM usuarios WHERE email = ? AND contraseña = ?";
        $stmt1 = mysqli_prepare($conexion, $sql_usuarios);
        
        if ($stmt1) {
            mysqli_stmt_bind_param($stmt1, "ss", $correo, $contraseña);
            mysqli_stmt_execute($stmt1);
            $resultado1 = mysqli_stmt_get_result($stmt1);
            
            if (mysqli_num_rows($resultado1) > 0) {
                $datos_usuario = mysqli_fetch_assoc($resultado1);
                $datos_usuario['tipo_cuenta'] = 'usuario';
                $usuario_encontrado = true;
            }
            mysqli_stmt_close($stmt1);
        }
        
        // Si no se encontró en usuarios, buscar en empresas
        if (!$usuario_encontrado) {
            $sql_empresas = "SELECT * FROM empresas WHERE email = ? AND contraseña = ?";
            $stmt2 = mysqli_prepare($conexion, $sql_empresas);
            
            if ($stmt2) {
                mysqli_stmt_bind_param($stmt2, "ss", $correo, $contraseña);
                mysqli_stmt_execute($stmt2);
                $resultado2 = mysqli_stmt_get_result($stmt2);
                
                if (mysqli_num_rows($resultado2) > 0) {
                    $datos_usuario = mysqli_fetch_assoc($resultado2);
                    $datos_usuario['tipo_cuenta'] = 'empresa';
                    $usuario_encontrado = true;
                }
                mysqli_stmt_close($stmt2);
            }
        }
        
        // Procesar resultado
        if ($usuario_encontrado) {
            session_start();
            $_SESSION['usuario_id'] = $datos_usuario['id']; // Ajusta según tu BD
            
            $_SESSION['usuario_nombre'] = $datos_usuario['nombre_comercial'];
            $_SESSION['tipo_cuenta'] = $datos_usuario['tipo_cuenta'];
            
            //echo "Inicio de sesión exitoso. Bienvenido " . $datos_usuario['nombre'];
            echo " (Tipo: " . $datos_usuario['tipo_cuenta'] . ") \n";
            
            // Redirigir según el tipo
            if ($datos_usuario['tipo_cuenta'] == 'usuario') {
                $_SESSION['usuario_nombre'] = $datos_usuario['nombre'];
                echo "Inicio de sesión exitoso. Bienvenido " . $datos_usuario['nombre'];
                echo "<br>Redirigiendo al panel de usuario...";
                // header("Location: panel_usuario.php");
            } else {
                $_SESSION['usuario_nombre'] = $datos_usuario['nombre_comercial'];
                echo "Inicio de sesión exitoso. Bienvenido " . $datos_usuario['nombre_comercial'];
                echo "<br>Redirigiendo al panel de empresa...";
                // header("Location: panel_empresa.php");
            } 
            
        } else {
            echo "Credenciales incorrectas. Verifique su usuario y contraseña.";
        }
    }
}

mysqli_close($conexion);