<?php

namespace App\Models;

use CodeIgniter\Model;

class LivestockModel extends Model
{
    protected $table      = 'livestock';
    protected $primaryKey = 'id_livestock';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['name_livestock', 'description'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
