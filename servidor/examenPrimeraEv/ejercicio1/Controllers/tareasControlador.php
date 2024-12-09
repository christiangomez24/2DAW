<?php 
require_once "Models/modeloTareas.php";

class TareasControlador {
    private $tareasModelo;

    public function __construct(){
        $this->tareasModelo = new Tarea();
    }
    public function index(){
        $tareas = $this->tareasModelo->getAll();
        require "Views/listar.php";
    }
    public function create(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $apellido1 = $_POST['apellido1'];
            $apellido2 = $_POST['apellido2'];
            $profesor1 = $_POST['profesor1'];
            $profesor2 = $_POST['profesor2'];
            $profesor3 = $_POST['profesor3'];
            $tutor = $_POST['tutor'];
            $this->tareasModelo->save($nombre,$apellido1,$apellido2,$profesor1,$profesor2,$profesor3,$tutor);
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
            $this->tareasModelo->update($id,$nombre,$apellido1,$apellido2,$profesor1,$profesor2,$profesor3,$tutor);
            header("Location: index.php");
        } else {
            $tarea = $this->tareasModelo->getById($id);
            require "Views/edit.php";
        }
    }
    public function delete($id) {
        $this->tareasModelo->delete($id);
        header("Location: index.php");
    }
}




?>