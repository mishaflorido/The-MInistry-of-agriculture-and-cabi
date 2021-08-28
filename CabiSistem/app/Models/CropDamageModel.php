<?php

namespace App\Models;

use CodeIgniter\Model;

class CropDamageModel extends Model
{
    protected $table      = 'crop_damage';
    protected $primaryKey = 'id_crop_damage';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['cdf_ext_dist', 'cdf_date_dis', 'cdf_typ_dis'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
