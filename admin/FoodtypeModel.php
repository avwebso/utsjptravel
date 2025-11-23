<?php namespace App\Models\admin;

use CodeIgniter\Model;

class FoodtypeModel extends Model
{
    protected $table            = 'food_type_master';
    protected $primaryKey       = 'food_type_id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'food_type_code',
        'food_type_name',
        'description',
        'status',
        'created_by',
        'created_at',
        'updated_at'
    ];

    protected $validationRules = [
        'food_type_code' => 'required|min_length[1]|max_length[20]|is_unique[food_type_master.food_type_code,food_type_id,{food_type_id}]',
        'food_type_name' => 'required|min_length[1]|max_length[100]',
    ];

    public function getAll()
    {
        return $this->orderBy('food_type_id', 'DESC')->findAll();
    }

    public function getById($id)
    {
        return $this->where($this->primaryKey, $id)->first();
    }
}
