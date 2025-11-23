<?php namespace App\Models\admin;

use CodeIgniter\Model;

class CitiesModel extends Model
{
    protected $table            = 'cities';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'country_id',
        'name',
        'status',
        'deleted',
        'created_at',
        'updated_at'
    ];

    protected $validationRules = [
        // unique on (country_id,name) - use is_unique with composite handled in controller on update
        'country_id' => 'required|integer',
        'name'       => 'required|min_length[1]|max_length[200]'
    ];

    public function getById($id)
    {
        return $this->where($this->primaryKey, $id)->first();
    }

    public function getAll($includeDeleted = false)
    {
        if ($includeDeleted) return $this->orderBy('id', 'DESC')->findAll();
        return $this->where('deleted', 0)->orderBy('id', 'DESC')->findAll();
    }
}
