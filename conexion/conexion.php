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
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $telefono = trim($_POST['telefono']);
        $profesion = trim($_POST['profesion']);
        $tipo_cuenta = 'usuario'
        
        // CORREGIDO: usar mysqli_query, no mysqli_connect
        $consulta = "INSERT INTO usuarios (nombre, apellido, email, contraseña, telefono, profesion) 
                     VALUES ('$nombre', '$apellidos', '$email', '$password', '$telefono', '$profesion')";
        
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