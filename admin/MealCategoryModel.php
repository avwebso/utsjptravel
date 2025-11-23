<?php namespace App\Models\admin;

use CodeIgniter\Model;

class MealCategoryModel extends Model
{
    protected $table            = 'meal_category_master';
    protected $primaryKey       = 'meal_category_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields = [
        'meal_category_code',
        'meal_category_name',
        'description',
        'status',
        'created_by',
        'created_at',
        'updated_at'
    ];

    protected $validationRules = [
        'meal_category_code' => 'required|min_length[2]|max_length[20]|is_unique[meal_category_master.meal_category_code,meal_category_id,{meal_category_id}]',
        'meal_category_name' => 'required|min_length[2]|max_length[100]',
    ];

    public function getAll()
    {
        return $this->orderBy('meal_category_id', 'DESC')->findAll();
    }
}
