<?php

namespace App\Models;

use CodeIgniter\Model;

class FarmRoadModel extends Model
{
    protected $table      = 'farm_roads_need_attention';
    protected $primaryKey = 'id_farm_roads';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['road_dist', 'road_name', 'road_length', 'num_farm', 'agr_act', 'work', 'remark'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
