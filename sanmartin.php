<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./sanmartin.css">
    <title>PROYECTO FINAL</title>
</head>

<body>
    <?php
    require('./conectar.php');
    if (isset($_POST['INGRESAR_button'])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];
        $conficontraseña = $_POST['conficontraseña'];
        if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['email']) && !empty($_POST['contraseña'])) {
            if ($contraseña == $conficontraseña) {
                $p = crud::conect()->prepare('INSERT INTO usuarios(nombre,apellido,email,contraseña) VALUES(:n,:l,:e,:p)');
                $p->bindValue(':n', $nombre);
                $p->bindValue(':l', $apellido);
                $p->bindValue(':e', $email);
                $p->bindValue(':p', $contraseña);
                $p->execute();
                echo 'Ingresaste correctamente!';
            } else {
                echo 'Revisa tu contraseña!';
            }
        }
    }

    ?>
    <div class="form">
        <div class="title">
            <p>BIENVENIDO A NUESTRA PAGINA</p>
        </div>
        <form action="" method="post">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="apellido" placeholder="Apellido">
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="contraseña" placeholder="Contraseña">
            <input type="text" name="conficontraseña" placeholder="Confrimar contraseña">

            <input type="submit" value="INGRESAR" name="INGRESAR_button">
            <a href="./insignia.php"></a>
        </form>
    </div>
</body>

</html>