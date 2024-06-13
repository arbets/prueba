<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model {
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'nombre', 
        'apellido_paterno', 
        'apellido_materno', 
        'sexo', 
        'correo', 
        'telefono', 
        'tipo_usuario', 
        'password', 
        'estatus'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getUsuariosTipo(){
        return $this->select('usuarios.*, tipos_usuario.tipo AS tipo_usuario')
                    ->join('tipos_usuario', 'usuarios.tipo_usuario = tipos_usuario.id')
                    ->findAll();
    }

    public function getUsuarioDireccion($usuarioId){
        return $this->select('usuarios.*, direcciones.*, tipos_usuario.id AS id_tipo_usuario, tipos_usuario.tipo AS tipo_usuario')
                ->join('direcciones', 'usuarios.id = direcciones.id_usuario', 'left')
                ->join('tipos_usuario', 'usuarios.tipo_usuario = tipos_usuario.id')
                ->where('usuarios.id', $usuarioId)
                ->first();
    }

}