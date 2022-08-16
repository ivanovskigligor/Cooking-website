<?php
namespace App\Models;

use CodeIgniter\Model;

class Post_model extends Model
{
    protected $table = 'posts';
    protected $allowedFields = ['title','user_id', 'body','slug', 'description','image','video'];

    public function get_posts($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function search($keyword)
    {
        $query = "SELECT * FROM posts WHERE title LIKE '%".$keyword."%'";
        return $this->db->query($query)->getResultArray();
    }
}
