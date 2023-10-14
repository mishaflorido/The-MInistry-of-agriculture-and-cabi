<?php

namespace App\Models;

use CodeIgniter\Model;

class OficersWeeklyReportModel extends Model
{
    protected $table      = 'ofice_weekly_report';
    protected $primaryKey = 'id_of_wr';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ofc_name', 'ofc_desig', 'ofc_week', 'ofc_dpt', 'wk_beg', 'id_user', 'deleted_at'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
