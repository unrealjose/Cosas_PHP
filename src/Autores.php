<?php
namespace Clases;

use PDO;
use PDOException;

class Autores extends Conexion{
    private $id_autor;
    private $nombre;
    private $apellidos;

    public function __construct(){
        parent::__construct();
    }

    //---CRUD-------------------------------

    public function create(){
        $cons = "INSERT INTO autores(nombre, apellidos) VALUES (:n, :a)";
        $stmt = parent::$conexion->prepare($cons);

        try{
            $stmt->execute([
                ":n"=>$this->nombre,
                ":a"=>$this->apellidos
            ]);
        }catch(PDOException $e){
            die("Error al crear autores");
        }
    }

    public function read(){
        $cons = "SELECT * FROM autores WHERE id_autor=:i";
        $stmt = parent::$conexion->prepare($cons);

        try{
            $stmt->execute([":i"=>$this->id_autor]);
        }catch(PDOException $e){
            die("Error al leer autores");
        }

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function update(){
        $cons = "UPDATE autores SET nombre=:n, apellidos=:a WHERE id_autor=:i";
        $stmt = parent::$conexion->prepare($cons);

        try{
            $stmt->execute([
                ":n"=>$this->nombre,
                ":a"=>$this->apellidos,
                ":i"=>$this->id_autor
            ]);
        }catch(PDOException $e){
            die("Error al actualizar autores");
            
        }
    }

    public function delete(){
        $cons = "DELETE FROM autores WHERE id_autor=:i";
        $stmt = parent::$conexion->prepare($cons);

        try{
            $stmt->execute([":i"=>$this->id_autor]);
        }catch(PDOException $e){
            die("Error al borrar autores");
        }
    }

    //---FIN CRUD----------------------------

    //---METODOS ESPECIALES------------------

    //Estudiar
    public function numeroAutores(){
        $cons = "SELECT COUNT(*) FROM autores";
        $stmt = parent::$conexion->query($cons);

        /*
        try{
            $stmt->execute();
        }catch(PDOException $e){
            die("Error al contar autores");
        }
        */

        return $stmt->fetchColumn()>0;
    }

    public function rellenarAutores($cant){
        if(!$this->numeroAutores()){
           for ($i=0; $i < $cant; $i++) { 
                $this->setNombre("Nombre ".$i);
                $this->setApellidos("Apellidos ".$i);
                $this->create();
            } 
        }     
    }

    public function traerAutores(){
        $cons = "SELECT * FROM autores";
        $stmt = parent::$conexion->prepare($cons);

        try{
            $stmt->execute();
        }catch(PDOException $e){
            die("Error al traer autores");
        }

        return $stmt;
    }

    //---FIN METODOS ESPECIALES--------------

    //---GETTERS Y SETTERS-------------------

    /**
     * Get the value of id_autor
     */ 
    public function getId_autor()
    {
        return $this->id_autor;
    }

    /**
     * Set the value of id_autor
     *
     * @return  self
     */ 
    public function setId_autor($id_autor)
    {
        $this->id_autor = $id_autor;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellidos
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */ 
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    //---PLANTILLA---------------------------
    /*
    public function nombre(){
        $cons = "";
        $stmt = parent::$conexion->prepare($cons);

        try{
            $stmt->execute();
        }catch(PDOException $e){
            die("Error");
        }
    }
    */
}