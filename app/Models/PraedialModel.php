<?php

namespace App\Models;

use CodeIgniter\Model;

class PraedialModel extends Model
{
    protected $table      = 'praedial_lancery';
    protected $primaryKey = 'id_praedial';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['registration_number', 'farmer_name', 'parcel_address', 'parcel_number','id_lv1','id_lv2','id_lv3', 'id_user', 'deleted_at'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
