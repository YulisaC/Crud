<?php

class Usuario extends CI_Controller {

    function __construct() {
        parent::__construct();
        //comunicacion con el modelo
        $this->load->model('Model_Usuario');
    }

    public function index() {
        $data['contenido'] = "usuario/index"; //enviar a la plantilla la vista usuario
        $data['selUsuario'] = $this->Model_Usuario->selUsuario();
        $data['selEstatus'] = $this->Model_Usuario->selEstatus();
        $data['selCiudades'] = $this->Model_Usuario->selCiudades();
        $data['list_usuarios'] = $this->Model_Usuario->list_usuarios();
        $this->load->view('plantilla', $data);
    }

    public function ins_usuario() {
        $datos = $this->input->post();

        if (isset($datos)) {
            $nombre = $datos['nombre'];
            $correo = $datos['correo'];
            $nacimiento = $datos['nacimiento'];
            $eCodEstatus = $datos['txtestatus'];
            $eCodCiudad = $datos['txtciudad'];
            //$fhRegistro = $datos['registro'];
            $this->Model_Usuario->ins_usuarios($nombre, $correo, $nacimiento, $eCodEstatus, $eCodCiudad);
            redirect('');
        }
    }

    public function del_usuario($id = NULL) {
        if ($id != NULL) {
            $this->Model_Usuario->del_usuario($id);
            redirect('');
        }
    }

    public function edit($id = NULL) {
        if ($id != NULL) {
            //mostrar datos
            $data['contenido'] = 'usuario/edit'; //directorio de la vista
            $data['selEstatus'] = $this->Model_Usuario->selEstatus();
            $data['selCiudades'] = $this->Model_Usuario->selCiudades();
            $data['datosUsuarios'] = $this->Model_Usuario->editUsuario($id);
            $this->load->view('plantilla', $data);
        } else {
            //regresar a index enviar parametros
            redirect('');
        }
    }
    
    public function update(){
        $datos = $this->input->post();
        if (isset($datos)) {
            $txtUsuarioID = $datos['txtUsuarioID'];
            $nombre = $datos['nombre'];
            $correo = $datos['correo'];
            $nacimiento = $datos['nacimiento'];
            $txtestatus = $datos['txtestatus'];
            $txtciudad = $datos['txtciudad'];
            //$fhRegistro = $datos['registro'];
            $this->Model_Usuario->updateUsuario($txtUsuarioID,$nombre, $correo, $nacimiento, $txtestatus, $txtciudad);
            redirect('');
        }
    }

}
