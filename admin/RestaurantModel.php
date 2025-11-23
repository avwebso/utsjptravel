<?php namespace App\Models\admin;

use CodeIgniter\Model;

class RestaurantModel extends Model
{
    protected $table            = 'restaurant_master';
    protected $primaryKey       = 'restaurant_id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'restaurant_code','restaurant_name','address','city','city_id','state','country',
        'pincode','phone','alternate_phone','email','contact_person','website',
        'opening_time','closing_time','description','image','status','created_by','created_at','updated_at'
    ];

    protected $validationRules = [
        'restaurant_code' => 'required|min_length[1]|max_length[20]|is_unique[restaurant_master.restaurant_code,restaurant_id,{restaurant_id}]',
        'restaurant_name' => 'required|min_length[1]|max_length[200]',
        'email'           => 'permit_empty|valid_email|max_length[100]'
    ];

    public function getById($id)
    {
        return $this->where($this->primaryKey, $id)->first();
    }
}
