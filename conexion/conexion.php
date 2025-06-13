<?php
// conexion/conexion.php
$conection = mysqli_connect("localhost", "root", "", "primerospasosbd");

if (!$conection) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (isset($_POST['registrar'])) {
    // Verificar que los campos no estén vacíos
    if (empty($_POST['nombres']) || 
        empty($_POST['apellidos']) || 
        empty($_POST['email']) || 
        empty($_POST['password'])) {
        
        echo "<p style='color: red;'>❌ Por favor completa todos los campos requeridos</p>";
    } 
    elseif ($_POST['password'] !== $_POST['confirmPassword']) {
        echo "<p style='color: red;'>❌ Las contraseñas no coinciden</p>";
    }
    else {
        $nombre = trim($_POST['nombres']);
        $apellidos = trim($_POST['apellidos']);
        $email = trim(strtolower($_POST['email']));
        $password = $_POST['password'];
        $telefono = trim($_POST['telefono']);
        $profesion = trim($_POST['profesion']);

        $consulta_verificar = "SELECT id FROM usuarios WHERE email = ?";
        
        $stmt_verificar = mysqli_prepare($conection, $consulta_verificar);

        if (!$stmt_verificar) {
            echo "<p style='color: red;'>❌ Error en la preparación de consulta: " . mysqli_error($conection) . "</p>";
            exit;
        }

        mysqli_stmt_bind_param($stmt_verificar, "s", $email);
        mysqli_stmt_execute($stmt_verificar);
        $resultado_verificar = mysqli_stmt_get_result($stmt_verificar);

        if (mysqli_num_rows($resultado_verificar) > 0) {
            echo "<p style='color: red;'>❌ Este email ya está registrado</p>";
            mysqli_stmt_close($stmt_verificar);
            exit;
        }
        mysqli_stmt_close($stmt_verificar);
        
        
        // CORREGIDO: usar mysqli_query, no mysqli_connect
        $consulta = "INSERT INTO usuarios (nombre, apellido, email, contraseña, telefono, profesion) VALUES ('$nombre', '$apellidos', '$email', '$password', '$telefono', '$profesion')";
        
        $resultado = mysqli_query($conection, $consulta);
        
        if ($resultado) {
            echo "<p style='color: green;'>✅ Usuario registrado exitosamente</p>";
        } else {
            echo "<p style='color: red;'>❌ Error al registrar: " . mysqli_error($conection) . "</p>";
        }
    }
}
mysqli_close($conection);
?>