<?php 
require_once "../Models/modeloTareas.php";

class UsuarioControlador {
    private $usarioModelo;

    public function __construct(){
        $this->usuarioModelo = new Tarea();
    }
    public function index(){
        $tareas = $this->usuarioModelo->getAll();
        require "Views/listar.php";
    }
    public function create(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $this->usuarioModelo->save($titulo,$descripcion);
            header("Location: index.php");
        } else {
            require "Views/create.php";
        }
    }
    public function edit($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $apellido1 = $_POST['apellido1'];
            $apellido2 = $_POST['apellido2'];
            $profesor1 = $_POST['profesor1'];
            $profesor2 = $_POST['profesor2'];
            $profesor3 = $_POST['profesor3'];
            $tutor = $_POST['tutor'];
            $this->usuarioModelo->update($id,$nombre,$apellido1,$apellido2,$profesor1,$profesor2,$profesor3,$tutor);
            header("Location: index.php");
        } else {
            $tarea = $this->usuarioModelo->getById($id);
            require "Views/edit.php";
        }
    }
    public function delete($id) {
        $this->usuarioModelo->delete($id);
        header("Location: index.php");
    }
}




?>