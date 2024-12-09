<?php

require_once "Config/conexion.php";

class Usuario {
    private $pdo;
    public function __construct() {
        $database = new Conexion();
        $this->pdo = $database->conectar();
    }
    // a partir de aquí irán todos los métodos CRUD.

    public function getAll(){
        try{
            $query = "SELECT * FROM usuarios";
            $registro = $this->pdo->prepare($query);
            $registro->execute();
            return $registro->fetchAll();
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }
    public function getById($id){
        try{
            $query = "SELECT * FROM usuarios WHERE id = $id";
            $registro = $this->pdo->prepare($query);
            $registro->execute();
            return $registro->fetch();
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }
    public function delete($id){
        try{
            $insercion = $this->pdo->prepare("DELETE FROM usuarios WHERE id=:id");
            $insercion->bindParam(':id',$id);
            return $insercion->execute();
        } catch (PDOException $e) {
            die ($e->getMessage());
        }
    }
    public function edit ($i,$t,$d,$c){ //id title description created_at
        try {
            $insercion = $this->pdo->prepare("UPDATE usuarios SET nombre=:nombre,apellido1=:apellido1,apellido2=:apellido2,profesor1=:profesor1,profesor2=:profesor2,profesor WHERE id=:id");
            $insercion->bindParam(":id",$i);
            $insercion->bindParam(":titulo",$t);
            $insercion->bindParam(":descripcion",$d);
            $insercion->bindParam(":fechaCreacion",$c);
            $insercion->execute();
        } catch (PDOException $e){
            die ($e->getMessage());
        }
    }
    public function save($t,$d){
        try{
            $insercion = $this->pdo->prepare("INSERT INTO usuarios(title,description) VALUES(:titulo,:descripcion)");
            $insercion->bindParam(':titulo',$t);
            $insercion->bindParam(':descripcion',$d);
            return $insercion->execute();
        } catch (PDOException $e){
            die ($e->getMessage());
        }
    }
    public function update($id,$titulo,$descripcion){
        $query = "UPDATE usuarios SET title = :titulo, description = :descripcion WHERE id = :id";
        $insercion = $this->pdo->prepare($query);
        $insercion->bindParam(":id",$id);
        $insercion->bindParam(":titulo",$titulo);
        $insercion->bindParam(":descripcion",$descripcion);
        return $insercion->execute();
    }

    // Como podéis observar las funciones de los métodos son las mismas que las estudiadas en el tema
    // anterior. Para que la clase se ajuste más al paradigma de la POO deberia tener los getter y setter de los
    // campos de la tabla y crear dichos campos como variables privadas. También seria conveniente a la
    // clase podenerle el sufijo del modelo, por ejemplo VideojuegoController o VideojuegoModel
}



?>