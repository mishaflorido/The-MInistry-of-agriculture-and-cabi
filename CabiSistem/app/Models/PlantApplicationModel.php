<?php

namespace App\Models;

use CodeIgniter\Model;

class PlantApplicationModel extends Model
{
    protected $table      = 'plant_application';
    protected $primaryKey = 'id_plant_apply';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name_f', 'last_name_f', 'mo_last_name', 'id_farm', 'f_addres', 'plt_loc', 'f_phone', 'f_acr', 'f_dst', 'f_date_apl', 'plt_ofc', 'id_lv1', 'id_lv2', 'id_lv3', 'id_user', 'deleted_at'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
