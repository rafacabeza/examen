<?php
require_once 'EstudioModelo.php';

class Estudio {
    private $_id;
    private $_codigo;
    private $_titulo;
    private $_fechaCurriculo;
    function getId() {
        return $this->_id;
    }

    function getCodigo() {
        return $this->_codigo;
    }

    function getTitulo() {
        return $this->_titulo;
    }

    function getFechaCurriculo() {
        return $this->_fechaCurriculo;
    }

    function setId($id) {
        $this->_id = $id;
    }

    function setCodigo($codigo) {
        $this->_codigo = $codigo;
    }

    function setTitulo($titulo) {
        $this->_titulo = $titulo;
    }

    function setFechaCurriculo($fechaCurriculo) {
        $this->_fechaCurriculo = $fechaCurriculo;
    }

        public function __construct($id)
    {
        $estudioModelo = new EstudioModelo;
        $fila=$estudioModelo->getEstudio($id);
        
        $this->_id = $fila['id'];
        $this->_codigo = $fila['codigo'];
        $this->_titulo = $fila['titulo'];
        $this->_fechaCurriculo = DateTime::createFromFormat('Y-m-d', $fila['fechaCurriculo']);
    }
    public static function getAll()
    {
        $estudioModelo = new EstudioModelo;
        return $estudioModelo->getAll();
    }
    
    public function grabar()
    {
        $estudioModelo = new EstudioModelo;
        $fila = get_object_vars($this);
        $estudioModelo->grabar($fila);
        
    }

}
