<?php

class EstudioModelo {
    const DB='examen';
    const USER='alumno';
    const PSS='alumno';
    const HOST='localhost';
    
    private $_db;
    
    public function __construct() 
    {
        $this->_db = new mysqli(self::HOST, self::USER, self::PSS, self::DB);
        if ($this->_db->connect_errno){
            die ('Error de conexion ' . $this->_db->connect_error);
        }
    }
    public function getAll()
    {
        $sql="SELECT *, DATE_FORMAT(fechaCurriculo, '%m-%d-%Y') as fecha FROM estudio";

        $resultado = $this->_db->query($sql);

        if ($this->_db->errno){
            die ('Error en la consulta SELECT');
        }
        $tabla = $resultado->fetch_all(MYSQLI_ASSOC);
        return $tabla;
    }
    
    public function getEstudio($id)
    {
//        $sql='SELECT * FROM estudio WHERE id=' . $id;
//
//        $resultado = $this->_db->query($sql);
//
//        if ($this->_db->errno){
//            die ('Error en la consulta SELECT');
//        }
//        $fila = $resultado->fetch_assoc();
        $stmt = $this->_db->prepare("SELECT * FROM estudio WHERE id=?");
        $stmt->bind_param("i", $id);      
        
        $stmt->execute();
        
        $resultado = $stmt->get_result();
        
        $fila = $resultado->fetch_assoc();
                
        return $fila;
    }    
    public function grabar($fila)
    {
        var_dump($fila);
        $codigo=$fila['_codigo'];
        $titulo=$fila['_titulo'];
        $fecha=datetime::createFromFormat('d-m-Y', $fila['_fechaCurriculo']);
        $fechaTxt = $fecha->format('Y-m-d');
        $sql="UPDATE estudio "
                . " SET codigo = '$codigo',"
                . " titulo='$titulo',"
                . " fechaCurriculo='$fechaTxt' "
                . " WHERE id=" . $fila['_id'];
        $resultado = $this->_db->query($sql);

        if ($this->_db->errno){
            die ('Error en la consulta UPDATE' . '<br>' . $sql);
            
        }
    }
    
}
