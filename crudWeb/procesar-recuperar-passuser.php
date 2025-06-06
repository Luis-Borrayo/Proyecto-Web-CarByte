<?php
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['user']);
    $nombre = trim($_POST['nombre']);
    $codigo = trim($_POST['cod_seguridad']);
    $nuevapass = trim($_POST['pass']);

    $stmt = $connec->prepare("SELECT Id1 FROM usuario WHERE username = ? AND nom_usuario = ? AND codigo_seguridad = ?");
    $stmt->bind_param("sss", $usuario, $nombre, $codigo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $nuevapass_hash = password_hash($nuevapass, PASSWORD_DEFAULT);
        $stmt2 = $connec->prepare("UPDATE usuario SET password = ? WHERE username = ?");
        $stmt2->bind_param("ss", $nuevapass_hash, $usuario);
        $stmt2->execute();

        echo "<script>
                alert('Contraseña actualizada correctamente');
                window.location.href='../index.php?login=1';
            </script>";
    } else {
        echo "<script>alert('Usuario, nombre o código incorrecto'); window.location.href='../index.php';</script>";
    }
}
?>
