<?php namespace App\Models;

use CodeIgniter\Model;

class Lv3Model extends Model
{
    protected $table      = 'level3';
    protected $primaryKey = 'id_lv3';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['name_lv3', 'id_lv2'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}