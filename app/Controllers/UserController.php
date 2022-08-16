<?php

namespace App\Controllers;

use App\Models\User_model;
use App\Models\Post_model;

class UserController extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        $model = new User_model();
        $model1 = model(Post_model::class);


        $data = [
            'posts'  => $model1->where('user_id', session()->get('id'))->get_posts(),
            'title' => 'title',
        ];
        $data['users'] = $model->find(session()->get('id'));

        echo view('templates/header');
        echo view('user/profile', $data);
        echo view('templates/footer');
    }

    public function profile()
    {
        $model = new User_model();
        $data = [
            'users' => $model->find(session()->get('id')),
            'aboutme' => $this->request->getVar('aboutme')
        ];

        echo view('templates/header', $data);
        echo view('user/profile', $data);
        echo view('templates/footer');
    }
    public function edit_user()
    {
        $model = model(User_model::class);

        $data['users'] = $model->find(session()->get('id'));

        echo view('templates/header', ['title' => 'Edit User']);
        echo view('user/editprofile', $data);
        echo view('templates/footer');
    }

    public function update($id = null)
    {

        $model = new User_model();

        
        $rules = [
            'name' => 'required|min_length[2]|max_length[50]',
             ];

        if ($this->validate($rules)) {
            
            $data = [
                'name' => $this->request->getVar('name'),
                'aboutme' => $this->request->getVar('aboutme'),
                //'image' => $imageName
            ];
            $model->update($id, $data);
            return "ok";
        } else {
            $data['validation'] = $this->validator;
            return $data['validation']->listErrors();
        }
    }
}
