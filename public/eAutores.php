<?php
    require "../vendor/autoload.php";

    if(!isset($_GET['id_autor'])){
        header("Location:listaAutores.php");
        die();
    }

    $id = $_GET['id_autor'];
    $autor = new Clases\Autores();

    if(isset($_POST['editar'])){
        if(strlen($_POST['nombre'])==0 || strlen($_POST['apellidos'])==0){
            echo "Error, nombre vacio";
        }else{           
            $autor->setNombre($_POST['nombre']);
            $autor->setApellidos($_POST['apellidos']);
            $autor->setId_autor($id);
            $autor->update();
            $autor = null;
            header("Location:listaAutores.php");
        }
    }
    $autor->setId_autor($id);
    $miAutor = $autor->read();
    $autor = null;
?>
<html>
<head></head>
<body>
    <h3>Editar Autores</h3>
    <form name="eAutor" method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?id_autor='.$id ?>">
        <table>
            <tr>
                <td>Nombre</td>
                <td colspan="2"><input type="text" name="nombre" value="<?php echo $miAutor->nombre; ?>" required></td>
            </tr>
            <tr>
                <td>Apellido</td>
                <td colspan="2"><input type="text" name="apellidos" value="<?php echo $miAutor->apellidos ?>" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="editar"></td>
                <td><input type="reset"></td>
                <td><button><a href="listaAutores.php">Volver</a></button></td>
            </tr>
        </table>    
    </form>
    
</body>
</html>