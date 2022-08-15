<?php

namespace App\Controllers;

use App\Models\Post_model;

class Posts extends BaseController
{
    public function index()
    {
        $model = model(Post_model::class);


        $data = [
            'post'  => $model->get_posts(),
            'title' => 'title',
        ];

        return view('templates/header')
            . view('posts/index', $data)
            . view('templates/footer');
    }
    public function view($slug = null)
    {

        $model = model(Post_model::class);
        $data['posts'] = $model->get_posts($slug);

        if (empty($data['posts'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the post: ' . $slug);
        }

        $data['title'] = $data['posts']['title'];
        
        return view('templates/header')
            . view('posts/view', $data)
            . view('templates/footer');
    }

    public function create_post()
    {
        helper('form');
        $model = new Post_model();


        if ($this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body' => 'required',
            'description' => 'required',
        ])) {
            $model->save(
                [
                    'title' => $this->request->getPost('title'),
                    'slug'  => url_title($this->request->getPost('title'), '-', true),
                    'description'  => $this->request->getPost('description'),
                    'body'  => $this->request->getPost('body')
                ]
            );

            return redirect()->to('/posts');
        }
        echo view('templates/header', ['title' => 'Create Post']);
        echo view('posts/create');
        echo view('templates/footer');
    }
    public function delete($id)
    {
        $model = model(Post_model::class);
        $data['posts'] = $model->where('id', $id)->delete();
        return redirect()->to('/posts');
    }
    public function edit($id)
    {
        $model = model(Post_model::class);
        $data['posts'] = $model->find($id);
        echo view('templates/header', ['title' => 'Edit Post']);
        echo view('posts/edit', $data);
        echo view('templates/footer');
    }

    public function update($id = null){

        $model = new Post_model();
        $data =
            [
                'title' => $this->request->getPost('title'),
                'slug'  => url_title($this->request->getPost('title'), '-', true),
                'description'  => $this->request->getPost('description'),
                'body'  => $this->request->getPost('body')
            ];
            
        
        $model -> update($id,$data);
        return redirect()->to('/posts');
    }

}
