<?php

require_once "Config/conexion.php";

class Tarea {
    private $pdo;
    public function __construct() {
        $database = new Conexion();
        $this->pdo = $database->conectar();
    }
    // a partir de aquí irán todos los métodos CRUD.

    public function getAll(){
        try{
            $query = "SELECT * FROM notas";
            $registro = $this->pdo->prepare($query);
            $registro->execute();
            return $registro->fetchAll();
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }
    public function getById($id){
        try{
            $query = "SELECT * FROM notas WHERE id = $id";
            $registro = $this->pdo->prepare($query);
            $registro->execute();
            return $registro->fetch();
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }
    public function delete($id){
        try{
            $insercion = $this->pdo->prepare("DELETE FROM notas WHERE id=:id");
            $insercion->bindParam(':id',$id);
            return $insercion->execute();
        } catch (PDOException $e) {
            die ($e->getMessage());
        }
    }
    public function edit ($i,$t,$d,$c){ //id title description created_at
        try {
            $insercion = $this->pdo->prepare("UPDATE notas SET nombre=:nombre,apellido1=:apellido1,apellido2=:apellido2,profesor1=:profesor1,profesor2=:profesor2,profesor WHERE id=:id");
            $insercion->bindParam(":id",$i);
            $insercion->bindParam(":titulo",$t);
            $insercion->bindParam(":descripcion",$d);
            $insercion->bindParam(":fechaCreacion",$c);
            $insercion->execute();
        } catch (PDOException $e){
            die ($e->getMessage());
        }
    }
    public function save($nombre,$apellido1,$apellido2,$profesor1,$profesor2,$profesor3,$tutor){
        try{
            $insercion = $this->pdo->prepare("INSERT INTO notas(nombre,apellido1,apellido2,profesor1,profesor2,profesor3,tutor) VALUES(:nombre,:apellido1,:apellido2,:profesor1,:profesor2,:profesor3,:tutor)");
            $insercion->bindParam(":nombre",$nombre);
            $insercion->bindParam(":apellido1",$apellido1);
            $insercion->bindParam(":apellido2",$apellido2);
            $insercion->bindParam(":profesor1",$profesor1);
            $insercion->bindParam(":profesor2",$profesor2);
            $insercion->bindParam(":profesor3",$profesor3);
            $insercion->bindParam(":tutor",$tutor);
            return $insercion->execute();
        } catch (PDOException $e){
            die ($e->getMessage());
        }
    }
    public function update($id,$nombre,$apellido1,$apellido2,$profesor1,$profesor2,$profesor3,$tutor){
        $query = "UPDATE notas SET nombre=:nombre, apellido1=:apellido1, apellido2=:apellido2, profesor1=:profesor1,profesor2=:profesor2,profesor3=:profesor3,tutor=:tutor WHERE id = :id";
        $insercion = $this->pdo->prepare($query);
        $insercion->bindParam(":id",$id);
        $insercion->bindParam(":nombre",$nombre);
        $insercion->bindParam(":apellido1",$apellido1);
        $insercion->bindParam(":apellido2",$apellido2);
        $insercion->bindParam(":profesor1",$profesor1);
        $insercion->bindParam(":profesor2",$profesor2);
        $insercion->bindParam(":profesor3",$profesor3);
        $insercion->bindParam(":tutor",$tutor);
        return $insercion->execute();
    }
}



?>