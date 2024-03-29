<?php

namespace App\Models;

use CodeIgniter\Model;

class KomenModel extends Model
{
    protected $table = 'komen';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_user',
        'id_produk',
        'komentar',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;

    public function getCommentsByProduct($productId)
    {
        return $this->where('id_produk', $productId)->findAll();
    }

    public function getCommentsByUser($userId)
    {
        return $this->where('id_user', $userId)->findAll();
    }

    // Jika Anda memiliki lebih banyak logika bisnis terkait komen, Anda dapat menambahkannya di sini.
}
