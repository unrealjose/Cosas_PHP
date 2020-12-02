<?php
    require "../vendor/autoload.php";

    if(isset($_POST['crear'])){
        if(strlen($_POST['nombre'])==0 || strlen($_POST['apellidos'])==0){
            echo "Error, nombre vacio";
        }else{
            $autor = new Clases\Autores();
            $autor->setNombre($_POST['nombre']);
            $autor->setApellidos($_POST['apellidos']);
            $autor->create();
            $autor = null;
            header("Location:listaAutores.php");
        }
    }

?>
<html>
<head></head>
<body>
    <h3>Crear Autores</h3>
    <form name="cAutor" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <table>
            <tr>
                <td>Nombre</td>
                <td colspan="2"><input type="text" name="nombre" required></td>
            </tr>
            <tr>
                <td>Apellido</td>
                <td colspan="2"><input type="text" name="apellidos" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="crear"></td>
                <td><input type="reset"></td>
                <td><button><a href="listaAutores.php">Volver</a></button></td>
            </tr>
        </table>    
    </form>
    
</body>
</html>