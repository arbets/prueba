<?php

namespace App\Controllers;

use App\Models\DireccionModel;
use App\Models\TipoUsuarioModel;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Users extends Controller {

    public function create() {

        $tipoUsuarioModel = new TipoUsuarioModel();
        $data['tiposUsuario'] = $tipoUsuarioModel->findAll();
        return view('view_html_header')
            .view('users/view_user_create', $data)
            .view('view_html_footer');
    }

    public function store() {
        $reglas = [
            'nombre'             => 'required',
            'apellido_paterno'   => 'required',
            'apellido_materno'   => 'required',
            'sexo'               => 'required|in_list[Masculino,Femenino]',
            'correo'             => 'required|valid_email|is_unique[usuarios.correo]',
            'telefono'           => 'required|min_length[8]|max_length[20]',
            'tipo_usuario'       => 'required|integer',
            'codigo_postal'      => 'required|max_length[5]',
            'colonia'            => 'required|max_length[60]',
            'municipio'          => 'required|max_length[50]',
            'estado'             => 'required|max_length[40]',
        ];

        $data['usuario'] = [
            'nombre'           => $this->request->getPost('nombre'),
            'apellido_paterno' => $this->request->getPost('apellido_paterno'),
            'apellido_materno' => $this->request->getPost('apellido_materno'),
            'sexo'             => $this->request->getPost('sexo'),
            'correo'           => $this->request->getPost('correo'),
            'telefono'         => $this->request->getPost('telefono'),
            'tipo_usuario'     => $this->request->getPost('tipo_usuario'),
            'password'         => $this->getPassword(),
            'estatus'          => "Activo"
        ];

        $data['direccion'] = [
            'codigo_postal'    => $this->request->getPost('codigo_postal'),
            'colonia'          => $this->request->getPost('colonia'),
            'municipio'        => $this->request->getPost('municipio'),
            'estado'           => $this->request->getPost('estado'),
        ];

        
        if (!$this->validate($reglas)) {
            $tipoUsuarioModel = new TipoUsuarioModel();
            $data['tiposUsuario'] = $tipoUsuarioModel->findAll();
            $data['errors'] = $this->validator->getErrors();
            return view('view_html_header')
                .view('users/view_user_create', $data)
                .view('view_html_footer');
        }

        $usuarioModel = new UsuarioModel();

        if ($usuarioModel->save($data['usuario'])) {
            $data['direccion']['id_usuario'] = $usuarioModel->getInsertID();
            $direccionModel = new DireccionModel();
            if ($direccionModel->save($data['direccion'])) {
                return $this->show($data['direccion']['id_usuario']);
            }
        }
        
        $tipoUsuarioModel = new TipoUsuarioModel();
        $data['tiposUsuario'] = $tipoUsuarioModel->findAll();
        $data['errors'] = array('Error al crear el usuario');
        return view('view_html_header')
            .view('users/view_user_create', $data)
            .view('view_html_footer');

    }

    public function show($id){

        $usuarioModel = new UsuarioModel();
        $data['usuario']  = $usuarioModel->getUsuarioDireccion($id);

        return view('view_html_header')
            .view('users/view_user_show', $data)
            .view('view_html_footer');
    }

    public function edit($id, $errores = null){
        $tipoUsuarioModel = new TipoUsuarioModel();
        $data['tiposUsuario'] = $tipoUsuarioModel->findAll();
        $usuarioModel = new UsuarioModel();
        $data['usuario']  = $usuarioModel->getUsuarioDireccion($id);
        $data['id_usuario'] = $id;
        $data['errors'] = $errores;

        return view('view_html_header')
            .view('users/view_user_create', $data)
            .view('view_html_footer');
    }

    public function list($mensaje = null){

        $usuarioModel = new UsuarioModel();
        $data['usuarios']  = $usuarioModel->getUsuariosTipo();
        $data['mensaje']  = $mensaje;

        return view('view_html_header')
            .view('users/view_user_list', $data)
            .view('view_html_footer');
    }

    public function update($id){
        
        $validationRules = [
            'nombre'             => 'required',
            'apellido_paterno'   => 'required',
            'apellido_materno'   => 'required',
            'sexo'               => 'required|in_list[Masculino,Femenino]',
            'correo'             => 'required|valid_email',
            'telefono'           => 'required|min_length[8]|max_length[20]',
            'tipo_usuario'       => 'required|integer',
            'codigo_postal'      => 'required|max_length[5]',
            'colonia'            => 'required|max_length[60]',
            'municipio'          => 'required|max_length[50]',
            'estado'             => 'required|max_length[40]',
        ];

        $data['usuario'] = [
            'nombre'           => $this->request->getPost('nombre'),
            'apellido_paterno' => $this->request->getPost('apellido_paterno'),
            'apellido_materno' => $this->request->getPost('apellido_materno'),
            'sexo'             => $this->request->getPost('sexo'),
            'correo'           => $this->request->getPost('correo'),
            'telefono'         => $this->request->getPost('telefono'),
            'tipo_usuario'     => $this->request->getPost('tipo_usuario'),
            'password'         => $this->getPassword(),
        ];

        $data['direccion'] = [
            'codigo_postal'    => $this->request->getPost('codigo_postal'),
            'colonia'          => $this->request->getPost('colonia'),
            'municipio'        => $this->request->getPost('municipio'),
            'estado'           => $this->request->getPost('estado'),
        ];

        if (!$this->validate($validationRules)) {
            return $this->edit($id, $this->validator->getErrors());
        }

        $usuarioModel = new UsuarioModel();
        if (!$usuarioModel->update($id, $data['usuario'])) {
            return $this->edit($id, array('Error al actualizar el usuario'));
        }

        $direccionModel = new DireccionModel();
        $direccion = $direccionModel->where('id_usuario', $id)->first();

        if (!$direccionModel->update($direccion['id'], $data['direccion'])) {
            return $this->edit($id, array('Error al actualizar la dirección'));
        }
        
        return $this->show($id);
    }

    public function delete($id){

        $usuarioModel = new UsuarioModel();
        $data['usuario']  = $usuarioModel->find($id);
        if($data['usuario']){
            $usuarioModel->update($id, ['estatus' => 'Inactivo']);
        }
        return $this->list("Usuario Inactivado correctamente.");
    }


    public function getPassword(){
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ#$*';
        $password = '';
        for ($i = 0; $i < 8; $i++) {
            $password .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
        return $password;
    }

}
