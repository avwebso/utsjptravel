<?php namespace App\Models\admin;

use CodeIgniter\Model;

class RoomcategoryModel extends Model
{
    protected $table            = 'room_category_master';
    protected $primaryKey       = 'room_category_id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'room_category_code',
        'room_category_name',
        'description',
        'status',
        'created_by',
        'created_at',
        'updated_at'
    ];

    protected $validationRules = [
        'room_category_code' => 'required|min_length[1]|max_length[20]|is_unique[room_category_master.room_category_code,room_category_id,{room_category_id}]',
        'room_category_name' => 'required|min_length[1]|max_length[100]',
    ];

    public function getAll($includeDeleted = false)
    {
        if ($includeDeleted) return $this->orderBy('room_category_id','DESC')->findAll();
        return $this->where('status !=', 'D')->orderBy('room_category_id','DESC')->findAll();
    }

    public function getById($id)
    {
        return $this->where('room_category_id', $id)->first();
    }
}
