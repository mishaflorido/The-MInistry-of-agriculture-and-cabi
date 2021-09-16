<?php

namespace App\Models;

use CodeIgniter\Model;

class PestAppModel extends Model
{
    protected $table      = 'pest_app';
    protected $primaryKey = 'id_pest_app';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['spsig_pestapp', 'inf_far', 'date_pestapp', 'crop_pestapp', 'plsi_pestapp', 'targ_pestapp', 'pest_pestapp', 'rate_pestapp', 'amt_pestapp', 'com_pestapp'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
