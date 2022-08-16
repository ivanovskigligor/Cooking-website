<?php
namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model{

    protected $table = 'users';
    protected $allowedFields = ['name','image' ,'aboutme','email', 'password', 'timestamp'];
}