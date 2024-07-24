<?php

namespace App\Models;

use CodeIgniter\Model;

class FarmerRegisterModel extends Model
{
    protected $table      = 'farm_register';
    protected $primaryKey = 'id_farm';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['date_reg', 'name', 'last_name', 'mo_last_name', 'AKA', 'birthdate', 'address', 'phone_num', 'sex', 'district', 'watershed', 'parcel_num', 'fe_pump', 'fe_irrig_line', 'fe_other', 'go_market', 'boundary'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
