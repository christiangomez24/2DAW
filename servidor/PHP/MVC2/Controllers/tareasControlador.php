<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
include 'conexion.php';

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
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $this->tareasModelo->save($titulo,$descripcion);
            header("Location: index.php");
        } else {
            require "Views/create.php";
        }
    }
    public function edit($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $this->tareasModelo->update($id,$titulo,$descripcion);
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