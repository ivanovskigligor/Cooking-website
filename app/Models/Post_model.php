<?php
namespace App\Models;

use CodeIgniter\Model;

class Post_model extends Model
{
    protected $table = 'posts';
    protected $allowedFields = ['title', 'body', 'slug', 'description'];

    public function get_posts($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
