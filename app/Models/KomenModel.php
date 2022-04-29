<?php

namespace App\Models;

use CodeIgniter\Model;

class KomenModel extends Model
{
    protected $table = "komentar";
    protected $primaryKey = "commId";
    protected $returnType = "object";
    protected $allowedFields = ['postId', 'name', 'komen'];
}
