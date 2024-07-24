<?php

namespace App\Models;

use CodeIgniter\Model;

class CropModel extends Model
{
    protected $table      = 'crops';
    protected $primaryKey = 'id_crop';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['Crop_name', 'Local_crop_name'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
