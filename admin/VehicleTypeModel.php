<?php namespace App\Models\admin;

use CodeIgniter\Model;

class VehicleTypeModel extends Model
{
    protected $table            = 'vehicle_type_master';
    protected $primaryKey       = 'vehicle_type_id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'vehicle_type_code',
        'vehicle_type_name',
        'status',
        'created_by',
        'created_at',
        'updated_at'
    ];

    protected $validationRules = [
        'vehicle_type_code' => 'required|min_length[1]|max_length[20]|is_unique[vehicle_type_master.vehicle_type_code,vehicle_type_id,{vehicle_type_id}]',
        'vehicle_type_name' => 'required|min_length[1]|max_length[100]'
    ];

    public function getById($id)
    {
        return $this->where($this->primaryKey, $id)->first();
    }
}
