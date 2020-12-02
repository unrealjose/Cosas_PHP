<?php
    require "../vendor/autoload.php";

    $autor = new Clases\Autores();
    $autor->rellenarAutores(20);

    $todos = $autor->traerAutores();
    $autor = null;
    ?>
<html>
<head></head>
<body>
    <h3>Autores</h3>
    <button><a href="cAutores.php">Crear Autor</a></button>
    <table border="1px">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($filas = $todos->fetch(PDO::FETCH_OBJ)) {
                echo <<<txt
                    <tr>
                        <td>{$filas->nombre}</td>
                        <td>{$filas->apellidos}</td>
                        <td>
                            <button><a href="eAutores.php?id_autor={$filas->id_autor}">Editar</a></button>
                            <button><a href="bAutores.php?id_autor={$filas->id_autor}">Borrar</a></button>
                        </td>
                    </tr>
                txt;
            }
            ?>
        </tbody>
    </table>
</body>

</html>