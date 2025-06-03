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
        $email = trim($_POST['correo']);
        $password = trim($_POST['password']);
        $telefono = trim($_POST['telefono']);
        $pais = trim($_POST['pais']);
        $ciudad = trim($_POST['ciudad']);
        $trabajadores = trim($_POST['numero_trabajadores']);
        $tipo_cuenta = 'empresa'
        
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
mysqli_close();
?>