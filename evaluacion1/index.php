<?php
//require_once Estudio.php;
require_once 'Estudio.php';
require_once 'EstudioVista.php';

abstract class Index
{
    public static function ejecutar()
    {
        switch ($_GET['modulo']){
            case null:
            case 'listado':
                $estudios = Estudio::getAll();
                EstudioVista::listado($estudios);
                break;
            case 'modificarestudio':
                $id=$_GET['id'];
                $estudio = new Estudio($id);
                EstudioVista::formulario($estudio);
                break;
            case 'modificar':
                $id=$_GET['id'];
                $estudio = new Estudio($id);
                $estudio->setCodigo($_POST['codigo']);
                $estudio->setTitulo($_POST['titulo']);
                $estudio->setFechaCurriculo($_POST['fechaCurriculo']);
                $estudio->grabar();
                echo 'grabado';
                
                header("Location:index.php?modulo=listado");

                break;
            case 'borrar':
                echo 'Debe borrarse un registro';
                break;
            case 'nuevoestudio':
                echo 'Debe mostrarse un formulario de insercion';
                break;
            case 'insertar':
                echo 'Debe procesarse lo relleno en el formulario de insercion';
                break;
            case 'modificar':
                echo 'Debe mostrarse un formulario de modificacion';
                break;
            case 'modificar':
                echo 'Debe mostrarse un formulario de modificacion';
                break;
            default :
                echo 'Debe mostrarse un mensaje de error. <br>';
                echo 'Hacerlo desde la vista. <br>';
                echo 'Todos los "echo" de esta hoja deben eliminarse. <br>';
        }
    }
}
Index::ejecutar();
