<?php namespace App\Models\admin;

use CodeIgniter\Model;

class VehicleDetailsModel extends Model
{
    protected $table            = 'vehicle_details_master';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'vehicle_name',
        'vehicle_type_id',
        'vehicle_brand_id',
        'vehicle_seater_id',
        'vehicle_category_id',
        'vehicle_size',
        'image',
        'rating',
        'status',
        'created_by',
        'created_at',
        'updated_at'
    ];

    protected $validationRules = [
        'vehicle_name' => 'required|min_length[1]|max_length[150]',
        'vehicle_type_id' => 'permit_empty|integer',
        'vehicle_brand_id' => 'permit_empty|integer',
        'vehicle_seater_id' => 'permit_empty|integer',
        'vehicle_category_id' => 'permit_empty|integer',
        'vehicle_size' => 'permit_empty|max_length[50]',
        'rating' => 'permit_empty|numeric'
    ];

    public function getById($id)
    {
        return $this->where($this->primaryKey, $id)->first();
    }
}
