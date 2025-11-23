<?php namespace App\Models\admin;

use CodeIgniter\Model;

class VehicleSeaterModel extends Model
{
    protected $table            = 'vehicle_seater_master';
    protected $primaryKey       = 'vehicle_seater_id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'seater_code',
        'seater_name',
        'total_seat',
        'status',
        'created_by',
        'created_at',
        'updated_at'
    ];

    protected $validationRules = [
        'seater_code' => 'required|min_length[1]|max_length[20]|is_unique[vehicle_seater_master.seater_code,vehicle_seater_id,{vehicle_seater_id}]',
        'seater_name' => 'required|min_length[1]|max_length[50]',
        'total_seat'  => 'required|integer'
    ];

    public function getById($id)
    {
        return $this->where($this->primaryKey, $id)->first();
    }
}
