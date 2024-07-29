<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table            = 'nilais';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'id_polri',
        'moral',
        'penampilan',
        'kepemimpinan',
        'disiplin',
        'pengendalian',
        'label',];

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
            return $this->select('nilais.id as id_nilai, nilais.*, polris.*')
                ->join('polris', 'nilais.id_polri = polris.id')
                ->findAll();
        }

        return $this->select('nilais.*, polris.*')
            ->join('polris', 'nilais.id_polri = polris.id')
            ->where('nilais.id', $id)
            ->first();
    }

}
