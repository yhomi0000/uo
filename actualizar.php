<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./sanmartin.css">
    <title>Ingresar</title>
</head>
<body>
    <?php
        require('./conectar.php');
        if (isset($_POST['actualizar_button'])) {
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $email=$_POST['email'];
            $contraseña=$_POST['contraseña'];
            $conficontraseña = $_POST['conficontraseña'];
           if (!empty($_POST['nombre'])&& !empty($_POST['apellido'])&& !empty($_POST['email'])&&!empty($_POST['contraseña'])) {
        
           if($contraseña=$concontraseña) {
                $p=crud::conect()->prepare('UPDATE usuarios SET nombre=:n,apellido=:l,email=:e,pass=:p where id=:id');
                $p->bindValue(':n', $nombre);
                $p->bindValue(':l', $apellido);
                $p->bindValue(':e', $email);
                $p->bindValue(':p',$contraseña);
                $p->execute();
                echo 'Actualizaste con exito!';

            }
            else{


                echo 'no lograste actualizar'
            }
        }
    
        }
    

    ?>
    
    <div class="form">
        <div class="title">
            <p>Actualización de usuario</p>
        </div>
        <form action="" method="post">
            <input type="text" nombre="nombre" placeholder="nombre" value="<?php if(isset($data)){
echo $data['nombre'];
            } ?>">
            <input type="text" nombre="apellido" placeholder="apellido" value="<?php if(isset($data)){
echo $data['apellido'];
            } ?>">
            <input type="email" nombre="email" placeholder="Email" value="<?php if(isset($data)){
echo $data['email'];
            } ?>">
            <input type="text" nombre="contraseña" placeholder="contraseña" value="<?php if(isset($data)){
echo $data['contraseña'];
            } ?>">
            <input type="submit" value="Actualizar" nombre="actualizar_button"> 
        </form>
    </div>
</body>
</html>