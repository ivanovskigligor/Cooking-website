<?php

namespace App\Controllers;

class Comments extends BaseController
{
    public function create_comment($post_id)
    {

        $model = model(Post_model::class);
        $model1 = model(Comment_model::class);
        $slug = $this->$model1->request->getPost('slug');
        $data['posts'] = $model->get_posts($slug);

        $model1 -> save([
            'post_id' => $post_id,
            'name' => $this -> request -> getPost('name'),
            'body' => $this -> request -> getPost('body'),
        ]);
    }
}
