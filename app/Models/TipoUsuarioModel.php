<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoUsuarioModel extends Model {

    protected $table            = 'tipos_usuario';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['tipo'];

    public function obtenerTodosLosTipos()
    {
        return $this->db->table($this->table)->get(); 
    }
}