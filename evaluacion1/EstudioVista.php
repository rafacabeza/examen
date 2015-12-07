<?php
require_once '/smarty/libs/Smarty.class.php';

class EstudioVista {
    //put your code here
    
    public static function listado($estudios)
    {
        $vista = new Smarty();
        $vista->template_dir = 'plantilla';
        $vista->compile_dir = 'tmp';
        
        $vista->assign('titulo', 'Listado de estudios');
        $vista->assign('estudios', $estudios);
        
        $vista->display('lista.tpl');
    }
    
    public static function formulario(Estudio $estudio)
    {
        $vista = new Smarty();
        $vista->template_dir = 'plantilla';
        $vista->compile_dir = 'tmp';
        $vista->assign('estudio', $estudio);
        $fecha = $estudio->getFechaCurriculo();
        $fechaTxt = $fecha->format('d-m-Y');
        $vista->assign('fecha', $fechaTxt);
        
        $vista->display('form.tpl');
    }
}
