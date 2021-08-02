<?php

namespace App\Models;

use CodeIgniter\Model;

class ParcelRegisterModel extends Model
{
    protected $table      = 'farm_parcels';
    protected $primaryKey = 'id_parcel';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_farm', 'parc_address', 'parc_acreage', 'parc_tenure', 'crop_livestock', 'parc_num'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
