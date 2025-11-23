<?php namespace App\Models\admin;

use CodeIgniter\Model;

class LanguageModel extends Model
{
    protected $table            = 'language_master';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'language_code',
        'language_name',
        'status',
        'created_by',
        'created_at',
        'updated_at'
    ];

    protected $validationRules = [
        'language_code' => 'required|min_length[1]|max_length[20]|is_unique[language_master.language_code,id,{id}]',
        'language_name' => 'required|min_length[1]|max_length[100]',
    ];

    public function getAll($includeDeleted = false)
    {
        if ($includeDeleted) return $this->orderBy('id','DESC')->findAll();
        return $this->where('status !=', 'D')->orderBy('id','DESC')->findAll();
    }

    public function getById($id)
    {
        return $this->where('id', $id)->first();
    }
}
