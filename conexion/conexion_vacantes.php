<?php
session_start();

$conexion = mysqli_connect("localhost", "root", "", "primerospasosbd");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}   
if (isset($_POST['publicar_vacante'])){
    
    if (empty($_POST['titulo_vacante']) ||
        empty($_POST['area']) || 
        empty($_POST['descripcion_tareas']) || 
        empty($_POST['jornada_laboral']) || empty($_POST['fecha_contratacion'])) {
        echo "Complete los campos requeridos";
        exit;
    }
    else{
        $titulo = trim($_POST['titulo_vacante']);
        $area = trim($_POST['area']);
        $descripcion = trim($_POST['descripcion_tareas']);
        $jornada = trim($_POST['jornada_laboral']);
        $fecha = $_POST['fecha_contratacion'];
        $salario = isset($_POST['salario']) ? $_POST['salario'] : null;
        $no_mostrar_salario = isset($_POST['no_mostrar_salario']) ? 1 : 0;
        $empresa_id = $_SESSION['usuario_id'] ?? null;

        date_default_timezone_set('America/Mexico_City');
        $fecha_publicacion = date('Y-m-d H:i:s'); 
        $consulta = "INSERT INTO vacantes (titulo, area, descripcion, jornada_laboral, fecha_contratacion, fecha_creacion, salario, no_mostrar_salario, id_em) VALUES ('$titulo', '$area', '$descripcion', '$jornada', '$fecha', '$fecha_publicacion', '$salario', '$no_mostrar_salario', '$empresa_id')";

        if (mysqli_query($conexion, $consulta)) {
            // Mostrar mensaje y redirigir con JS después de 2 segundos
            echo "<script>
                alert('Vacante publicada exitosamente!');
                setTimeout(function() {
                    window.location.href = '/primerpaso/index.php?page=mis_vacantes';
                }, 1500);
            </script>";
            exit;
        } else {
            echo "<script>
                alert('Error al publicar la vacante: " . mysqli_error($conexion) ."');
                </script>";
        }
    }


}
?>