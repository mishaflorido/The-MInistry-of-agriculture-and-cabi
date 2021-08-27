<?php

namespace App\Models;

use CodeIgniter\Model;

class PraedialModel extends Model
{
    protected $table      = 'praedial_lancery';
    protected $primaryKey = 'id_praedial';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['registration_number', 'farmer_name', 'parcel_address', 'parcel_number'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
