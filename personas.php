<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./tabla.css">
    <title>Document</title>
</head>
<body>
   
    <table>
        <thead>
            <tr>
                <th>nombre</th>
                <th>apellido</th>
                <th>Email</th>
                <th>contraseña</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require('./conectar.php');
            $p=crud::Selectdata();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $e = crud::eliminar($id);
        }
        if (count($p) > 0) {
            for ($i = 0; $i < count($p); $i++) {
                echo '<tr>';
                foreach ($p[$i] as $key => $value) {
                    if ($key != 'id') {
                        echo '<td>' . $value . '</td>';

                    }
                }

        ?>

                    <td><a href="personas.php?id=<?php echo $p[$i]['id'] ?>"><img src="./trash.svg" alt="" srcset=""></a></td>
                    <td><a href="actualizar.php?id_up=<?php echo $p[$i]['id'] ?>"><img src="./edit.svg" alt="" srcset=""></a></td>
                    <?php
                echo '</tr>';
            }

        }
    

    ?>
        </tbody>
    </table>
</body>
</html>