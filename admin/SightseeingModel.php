<?php namespace App\Models\admin;

use CodeIgniter\Model;

class SightseeingModel extends Model
{
    protected $table            = 'sightseeing_master';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'sightseeing_code','sightseeing_name','address','city_id','city','state','country',
        'latitude','longitude','duration','best_time_to_visit','entry_fee','opening_time','closing_time',
        'description','image','status','created_by','created_at','updated_at'
    ];

    protected $validationRules = [
        'sightseeing_code' => 'required|min_length[1]|max_length[20]|is_unique[sightseeing_master.sightseeing_code,id,{id}]',
        'sightseeing_name' => 'required|min_length[2]|max_length[200]',
        'entry_fee'        => 'permit_empty|numeric',
        'latitude'         => 'permit_empty|numeric',
        'longitude'        => 'permit_empty|numeric'
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
