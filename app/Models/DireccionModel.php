<?php

namespace App\Models;

use CodeIgniter\Model;

class DireccionModel extends Model{

    protected $table            = 'direcciones';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['id_usuario', 'codigo_postal', 'colonia', 'municipio', 'estado'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}