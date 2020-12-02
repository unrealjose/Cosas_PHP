<?php
namespace Clases;

use PDO;
use PDOException;

class Libros extends Conexion{
    private $id_libro;
    private $titulo;
    private $isbn;
    private $autor;
    private $portada;

    public function __construct()
    {
        parent::__construct();
    }

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

    //---CRUD-------------------------------

    public function create(){
        $cons = "INSERT INTO libros(titulo, isbn, autor, portada) VALUES (:t,:i,:a,:p)";
        $stmt = parent::$conexion->prepare($cons);

        try{
            $stmt->execute([
                ":t"=>$this->titulo,
                ":i"=>$this->isbn,
                ":a"=>$this->autor,
                ":p"=>$this->portada
            ]);
        }catch(PDOException $e){
            die("Error al crear libro");
        }
    }

    public function read(){
        $cons = "SELECT * FROM libros WHERE id_libro=:i";
        $stmt = parent::$conexion->prepare($cons);

        try{
            $stmt->execute([":i"=>$this->id_libro]);
        }catch(PDOException $e){
            die("Error al leer libro");
        }

        return $stmt;
    }

    public function update(){
        $cons = "UPDATE libros SET titulo=:t, isbn=:i, autor=:a, portada=:p WHERE id_libro=:id";
        $stmt = parent::$conexion->prepare($cons);

        try{
            $stmt->execute([
                ":t"=>$this->titulo,
                ":i"=>$this->isbn,
                ":a"=>$this->autor,
                ":p"=>$this->portada,
                ":id"=>$this->id_libro
            ]);
        }catch(PDOException $e){
            die("Error al actualizar");
        }
    }

    public function delete(){
        $cons = "DELETE FROM libros WHERE id_libro=:i";
        $stmt = parent::$conexion->prepare($cons);

        try{
            $stmt->execute([":i"=>$this->id_libro]);
        }catch(PDOException $e){
            die("Error");
        }
    }

    //---FIN CRUD----------------------------

    //---METODOS ESPECIALES------------------

    //---FIN METODOS ESPECIALES--------------

    //---GETTERS Y SETTERS-------------------


    /**
     * Get the value of id_libro
     */ 
    public function getId_libro()
    {
        return $this->id_libro;
    }

    /**
     * Set the value of id_libro
     *
     * @return  self
     */ 
    public function setId_libro($id_libro)
    {
        $this->id_libro = $id_libro;

        return $this;
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of isbn
     */ 
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set the value of isbn
     *
     * @return  self
     */ 
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get the value of autor
     */ 
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set the value of autor
     *
     * @return  self
     */ 
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get the value of portada
     */ 
    public function getPortada()
    {
        return $this->portada;
    }

    /**
     * Set the value of portada
     *
     * @return  self
     */ 
    public function setPortada($portada)
    {
        $this->portada = $portada;

        return $this;
    }
}