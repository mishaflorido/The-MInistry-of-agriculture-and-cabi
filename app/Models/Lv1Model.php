<?php

namespace App\Models;

use CodeIgniter\Model;

class Lv1Model extends Model
{
    protected $table      = 'level1';
    protected $primaryKey = 'id_lv1';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name_lv1'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
