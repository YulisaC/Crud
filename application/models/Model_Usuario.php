<?php

class Model_Usuario extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //la funcion de Select * en sql
    public function selUsuario(){
        $query = $this->db->query("Select * from cat_usuarios");
        
        //retornamos todos los registros de la tabla cat_usuarios
        return $query->result();
    }
    
     public function selEstatus(){
        $query = $this->db->query("Select * from cat_estatus");
        
        //retornamos todos los registros de la tabla cat_usuarios
        return $query->result();
    }
    
     public function selCiudades(){
        $query = $this->db->query("Select * from cat_ciudades");
        
        //retornamos todos los registros de la tabla cat_usuarios
        return $query->result();
    }
    
    //funcion para insertar usuarios
    public function ins_usuarios($nombre, $correo, $nacimiento, $eCodEstatus, $eCodCiudad){
        $arrayDatos = array(
            'tNombre' => $nombre,
            'tCorreo' => $correo,
            'tNacimiento' => $nacimiento,
            'fhRegistro' => date('Y-m-d H:i:s'),
            'eCodCiudad' => $eCodCiudad,
            'eCodEstatus' =>$eCodEstatus
        );
        
        $this->db->insert('cat_usuarios', $arrayDatos);
    }
    
    //funcion para listar los usuarios
    public function list_usuarios(){
        //$query = $this->db->query("SELECT * FROM cat_usuarios");
        $query = $this->db->query("SELECT cu.*,ce.tNombre tEstatus, cc.tNombre tCiudad  FROM cat_usuarios cu INNER JOIN cat_estatus ce ON cu.eCodEstatus = ce.eCodEstatus INNER JOIN cat_ciudades cc ON cu.eCodCiudad = cc.eCodCiudad");
        return $query->result();
    }
    
    //funcion para eliminar usuario
    public function del_usuario($id){
        $this->db->where('eCodUsuarios', $id);
        $this->db->delete('cat_usuarios');
    }
    
    public function editUsuario($id) {
        $consulta = $this->db->query("SELECT cu.*,ce.tNombre tEstatus, cc.tNombre tCiudad  FROM cat_usuarios cu INNER JOIN cat_estatus ce ON cu.eCodEstatus = ce.eCodEstatus INNER JOIN cat_ciudades cc ON cu.eCodCiudad = cc.eCodCiudad WHERE cu.eCodUsuarios = $id");
        return  $consulta->result();
    }
    
    public function updateUsuario($txtUsuarioID,$nombre, $correo, $nacimiento, $txtestatus, $txtciudad){
        $array = array(
            'tNombre' => $nombre,
            'tCorreo' => $correo,
            'tNacimiento' => $nacimiento,
            'eCodEstatus' =>$txtestatus,
            'fhRegistro' => date('Y-m-d H:i:s'),
            'eCodCiudad' => $txtciudad
            
        );
        $this->db->where('eCodUsuarios', $txtUsuarioID);
        $this->db->update('cat_usuarios', $array);
    }
}
