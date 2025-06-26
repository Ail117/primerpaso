<?php
session_start();

$conexion = mysqli_connect("localhost", "root", "", "primerpaso");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['iniciar_sesion'])) {
    $correo = trim($_POST['email'] ?? '');
    $contraseña = $_POST['password'] ?? '';

    if (empty($correo) || empty($contraseña)) {
        echo "Complete los campos requeridos";
        exit;
    }

    // Buscar usuario en tabla usuarios
    $sql_usuarios = "SELECT * FROM usuarios WHERE email = ?";
    $stmt1 = mysqli_prepare($conexion, $sql_usuarios);
    mysqli_stmt_bind_param($stmt1, "s", $correo);
    mysqli_stmt_execute($stmt1);
    $resultado1 = mysqli_stmt_get_result($stmt1);

    if ($usuario = mysqli_fetch_assoc($resultado1)) {
        // Verificar contraseña con password_verify (si la tienes hasheada)
        if ($contraseña === $usuario['contraseña']) {
            $_SESSION['usuario_id'] = $usuario['id_u'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            $_SESSION['tipo_cuenta'] = 'usuario';

            header("Location: /primerpaso/index.php?page=oportunidades");
            exit;
        } else {
            echo "<script>
                alert('Contraseña incorrecta.');
                window.location.href = '/primerpaso/index.php?page=login';
                </script>";    
            exit;
        }
    }

    // Si no está en usuarios, buscar en empresas
    $sql_empresas = "SELECT * FROM empresas WHERE email = ?";
    $stmt2 = mysqli_prepare($conexion, $sql_empresas);
    mysqli_stmt_bind_param($stmt2, "s", $correo);
    mysqli_stmt_execute($stmt2);
    $resultado2 = mysqli_stmt_get_result($stmt2);

    if ($empresa = mysqli_fetch_assoc($resultado2)) {
        if ($contraseña === $empresa['contraseña']) {
            $_SESSION['usuario_id'] = $empresa['id_em'];
            $_SESSION['usuario_nombre'] = $empresa['nombre_comercial'];
            $_SESSION['tipo_cuenta'] = 'empresa';
            
            header("Location: /primerpaso/index.php?page=post-trab");

            exit;
        } else {
            echo "<script>
                alert('Contraseña incorrecta.');
                window.location.href = '/primerpaso/index.php?page=login';
                </script>";            
            exit;
        }
    }

    echo "Credenciales incorrectas. Verifique su usuario y contraseña.";
}

mysqli_close($conexion);
