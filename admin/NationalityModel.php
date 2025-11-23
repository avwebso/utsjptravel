<?php namespace App\Models\Admin;

use CodeIgniter\Model;

class NationalityModel extends Model
{
    protected $table            = 'nationality';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    // timestamps are handled by DB default/current_timestamp; leave them out of $useTimestamps
    protected $allowedFields = [
        'nationality_code',
        'nationality_name',
        'status',
        'created_by',
        'created_at',
        'updated_at'
    ];

    protected $validationRules = [
        'nationality_name' => 'required|min_length[1]|max_length[150]|is_unique[nationality.nationality_name,id,{id}]',
        'nationality_code' => 'permit_empty|alpha_numeric|max_length[10]|is_unique[nationality.nationality_code,id,{id}]',
        'status' => 'permit_empty|in_list[A,I,D]'
    ];

    /**
     * Get all non-deleted nationalities by default.
     * @param bool $includeDeleted include status = 'D'
     * @return array
     */
    public function getAll($includeDeleted = false)
    {
        if ($includeDeleted) {
            return $this->orderBy('id', 'DESC')->findAll();
        }

        return $this->where('status !=', 'D')->orderBy('id', 'DESC')->findAll();
    }

    public function getById($id)
    {
        return $this->where($this->primaryKey, $id)->first();
    }
}
