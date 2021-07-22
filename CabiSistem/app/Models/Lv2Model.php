<?php namespace App\Models;

use CodeIgniter\Model;

class Lv2Model extends Model
{
    protected $table      = 'level2';
    protected $primaryKey = 'id_lv2';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['name_lv2', 'id_lv1'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}