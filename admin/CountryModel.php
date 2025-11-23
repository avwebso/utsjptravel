<?php namespace App\Models\admin;

use CodeIgniter\Model;

class CountryModel extends Model
{
    protected $table            = 'countries';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'iso2',
        'iso3',
        'iso_code',
        'name',
        'status',
        'deleted',
        'created_at',
        'updated_at'
    ];

    protected $validationRules = [
        'name'  => 'required|min_length[1]|max_length[200]|is_unique[countries.name,id,{id}]',
        'iso2'  => 'permit_empty|alpha|max_length[5]|is_unique[countries.iso2,id,{id}]',
        'iso3'  => 'permit_empty|alpha|max_length[5]',
        'iso_code' => 'permit_empty|alpha_numeric|max_length[10]'
    ];

    // Get only non-deleted by default (if you want)
    public function getAll($includeDeleted = false)
    {
        if ($includeDeleted) return $this->orderBy('id','DESC')->findAll();
        return $this->where('deleted', 0)->orderBy('id','DESC')->findAll();
    }

    public function getById($id)
    {
        return $this->where($this->primaryKey, $id)->first();
    }
}
