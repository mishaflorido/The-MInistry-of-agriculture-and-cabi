<?php

namespace App\Models;

use CodeIgniter\Model;

class VarietyModel extends Model
{
    protected $table      = 'variety';
    protected $primaryKey = 'id_variety';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name_variety', 'id_crop'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}