<?php

namespace App\Models;

use CodeIgniter\Model;

class DCAFormModel extends Model
{
    protected $table      = 'dca_form';
    protected $primaryKey = 'id_plant_apply';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_plant_doc', 'cli_det', 'farm_name_dca', 'phone_n_dca', 'f_id_dca', 'f_sex_dca', 'f_age_dca', 'id_lv1', 'id_lv2', 'id_lv3', 'id_crop', 'id_variety', 'sb_dca', 'dev_stage', 'pp_afected', 'yfs_dca', 'area_planted', 'unit_ap', 'per_cafected', 'symtoms', 'sym_dist', 'desc_problem', 'type_problem', 'diagnosis', 'Cur_cnt', 'rec_type', 'rec_curp', 'rec_prevp', 's_tolab', 'sheet_giv', 'field_v', 'date_dcaform'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
