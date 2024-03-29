<?php

namespace App\Models;

use CodeIgniter\Model;

class PlantDoctorModel extends Model
{
    protected $table      = 'plant_doctor';
    protected $primaryKey = 'id_plant_doc';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['pdoc_name', 'pdoc_lastname', 'pdoc_phone', 'pdoc_email', 'pdoc_ocupation', 'pdoc_type_entity'];

    protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
