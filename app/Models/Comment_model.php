<?php

namespace App\Models;

use CodeIgniter\Model;

class Comment_model extends Model
{

    protected $table = 'comments';
    protected $allowedFields = ['name', 'body', 'user_id', 'post_id'];

    public function getComments()
    {
            $query = 'SELECT c.id, c.post_id, c.body, u.name, c.timestamp
            FROM comments c INNER JOIN users u ON c.user_id = u.id 
            INNER JOIN posts v ON c.post_id = v.id WHERE c.post_id = v.id
            ORDER BY c.timestamp ASC';

        return $this->db->query($query)->getResultArray();
    }
}
