<?php namespace App\Models\admin;

use CodeIgniter\Model;

class VehicleBrandModel extends Model
{
    protected $table            = 'vehicle_brand_master';
    protected $primaryKey       = 'vehicle_brand_id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'brand_code',
        'brand_name',
        'status',
        'created_by',
        'created_at',
        'updated_at'
    ];

    protected $validationRules = [
        'brand_code' => 'required|min_length[1]|max_length[20]|is_unique[vehicle_brand_master.brand_code,vehicle_brand_id,{vehicle_brand_id}]',
        'brand_name' => 'required|min_length[1]|max_length[100]'
    ];

    public function getById($id)
    {
        return $this->where($this->primaryKey, $id)->first();
    }
}
