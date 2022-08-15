<?php

namespace App\Models;

use CodeIgniter\Model;

class Comment_model extends Model
{

    protected $table = 'comments';
    protected $allowedFields = ['name', 'body'];
    
}
