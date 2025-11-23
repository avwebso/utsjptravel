<?php namespace App\Models\admin;

use CodeIgniter\Model;

class FoodmenuModel extends Model
{
    protected $table            = 'food_menu_master';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'item_code','item_name','food_type_id','meal_category_id',
        'description','price','image','status','created_by','created_at','updated_at'
    ];

    protected $validationRules = [
        'item_code' => 'required|min_length[1]|max_length[20]|is_unique[food_menu_master.item_code,id,{id}]',
        'item_name' => 'required|min_length[1]|max_length[200]',
        'price'     => 'permit_empty|numeric'
    ];

    public function getAll()
    {
        return $this->orderBy('id','DESC')->findAll();
    }

    public function getById($id)
    {
        return $this->where('id',$id)->first();
    }
}
