<?php

namespace App\Controllers;

use App\Models\Comment_model;

class Comments extends BaseController
{
    
    public function comment(){
        $model = new Comment_model();
        $data = [
            'user_id' => session()->get('id'),
            'post_id' => $this -> request -> getVar('post_id'),
            'body' => $this -> request -> getVar('body'),
        ];
        $model -> save($data);
        return "ok";
    }
    
}
