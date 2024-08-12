<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilModel extends Model
{
    protected $table            = 'hasils';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'id_polri',
        'dt',
        'nb',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getNilaiWithPolri($id = false)
    {
        if ($id === false) {
            return $this->select('hasils.id as id_nilai, hasils.*, polris.*')
                ->join('polris', 'hasils.id_polri = polris.id')
                ->findAll();
        }

        return $this->select('hasils.*, polris.*')
            ->join('polris', 'hasils.id_polri = polris.id')
            ->where('hasils.id', $id)
            ->first();
    }
}
