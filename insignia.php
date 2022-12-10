<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./sanmartin.css">
    <title>INGRESAR</title>
    <style>
        .form{
            width: 230px;
            height: 280px;
        }
    </style>
</head>
<body>

        <?php
            require('./conectar.php');
            if (isset($_POST['ver_button'])) {
                $_SESSION['validate']=false;
                $nombre=$_POST['nombre'];
                $contraseña=$_POST['contraseña'];
                $p=crud::conect()->prepare('SELECT * FROM usuarios WHERE name=:n and contraseña=:p');
                $p->bindValue(':n',$nombre);
                $p->bindValue(':p',$contraseña);
                $p->execute();
                $d=$p->fetchAll(PDO::FETCH_ASSOC);
                if ($p->rowCount()>0) {
                    $_SESSION['nombre']=$name;
                    $_SESSION['contraseña']=$contr;
                    $_SESSION['validate']=true;
                    header('location:pagina.php');
                }else {
                    echo'No estas registrado';
                }

        }
        ?>
    <div class="form">
        <div class="title">
            <p>INGRESA TU USUARIO </p>
        </div>
        <form action="" method="post">
            <input type="text" name="nombre" placeholder="nombre">
            <input type="text" name="contraseña" placeholder="contraseña">
            <input type="submit" value="INGRESAR" name="ver_button"> 
            <a href="./sanmartin.php" style="position:relative; left:50px;top:-8px; font-size:14px">Click para registrarte</a>
        </form>
    </div>
</body>
</html>