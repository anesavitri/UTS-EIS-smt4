<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = "postingan";
    protected $primaryKey = "postId";
    protected $returnType = "object";
    protected $allowedFields = ['name', 'content'];
}
