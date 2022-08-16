<?php

namespace App\Models;

use CodeIgniter\Model;

class Rating_model extends Model
{

    protected $table = 'rating';
    protected $allowedFields = ['post_id', 'user_id', 'rating'];

    public function rating(){
        
    }
}
