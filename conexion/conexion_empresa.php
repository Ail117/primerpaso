<?php

$conection = mysqli_connect("localhost", "root", "", "primerospasosbd");

if (!$conection) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (isset($_POST['registrar_empresa'])) {
    // Verificar que los campos no estén vacíos
    if (empty($_POST['correo']) || 
        empty($_POST['nombre_comercial']) ||        
        empty($_POST['password'])) {
        
        echo "<p style='color: red;'>❌ Por favor completa todos los campos requeridos</p>";
    } 
    elseif ($_POST['password'] !== $_POST['confirmPassword']) {
        echo "<p style='color: red;'>❌ Las contraseñas no coinciden</p>";
    }
    else {
        $nombre = trim($_POST['nombre_comercial']);       
        $email = trim(strtolower($_POST['correo']));
        $password = ($_POST['password']);
        $telefono = trim($_POST['telefono']);
        $pais = trim($_POST['pais']);
        $ciudad = trim($_POST['ciudad']);
        $trabajadores = trim($_POST['numero_trabajadores']);
        
        

        $consulta_verificar = "SELECT id FROM empresas WHERE email = ?";
        
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
        $consulta = "INSERT INTO empresas (email, nombre_comercial, numero_trabajadores, telefono, pais, ciudad, contraseña) 
                     VALUES ('$email', '$nombre', '$trabajadores', '$telefono', '$pais', '$ciudad', '$password')";
        
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