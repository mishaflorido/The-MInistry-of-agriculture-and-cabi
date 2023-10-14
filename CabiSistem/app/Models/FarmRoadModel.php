<?php

namespace App\Models;

use CodeIgniter\Model;

class FarmRoadModel extends Model
{
    protected $table      = 'farm_roads_need_attention';
    protected $primaryKey = 'id_farm_roads';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['date_farm_road', 'id_lv1', 'id_lv2', 'id_lv3', 'road_name', 'road_length', 'num_farm', 'agr_act', 'work', 'remark', 'id_user', 'deleted_at'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
