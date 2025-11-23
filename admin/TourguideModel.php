<?php namespace App\Models\admin;

use CodeIgniter\Model;

class TourguideModel extends Model
{
    protected $table            = 'tour_guide_master';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'guide_code','guide_name','gender','dob','mobile','alternate_mobile','email','address',
        'city_id','state_id','country_id','experience_years','languages_known','id_proof_type',
        'id_proof_number','certification_details','license_number','description','status',
        'created_by','created_at','updated_at'
    ];

    protected $validationRules = [
        'guide_code'  => 'required|min_length[2]|max_length[20]|is_unique[tour_guide_master.guide_code,id,{id}]',
        'guide_name'  => 'required|min_length[2]|max_length[150]',
        'mobile'      => 'required|numeric|min_length[7]|max_length[15]',
        'email'       => 'permit_empty|valid_email|max_length[120]',
        'experience_years' => 'permit_empty|integer'
    ];

    public function getAll($includeDeleted = false)
    {
        if ($includeDeleted) return $this->orderBy('id','DESC')->findAll();
        return $this->where('status !=', 'D')->orderBy('id','DESC')->findAll();
    }

    public function getById($id)
    {
        return $this->where('id',$id)->first();
    }
}
