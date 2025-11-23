<?php namespace App\Models\admin;

use CodeIgniter\Model;

class VehicleCategoryModel extends Model
{
    protected $table            = 'vehicle_category_master';
    protected $primaryKey       = 'vehicle_category_id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'vehicle_code',
        'vehicle_name',
        'status',
        'created_by',
        'created_at',
        'updated_at'
    ];

    protected $validationRules = [
        'vehicle_code' => 'required|min_length[1]|max_length[20]|is_unique[vehicle_category_master.vehicle_code,vehicle_category_id,{vehicle_category_id}]',
        'vehicle_name' => 'required|min_length[1]|max_length[100]'
    ];

    public function getById($id)
    {
        return $this->where($this->primaryKey, $id)->first();
    }
}
