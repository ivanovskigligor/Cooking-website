<?php

namespace App\Controllers;

use App\Models\Comment_model;
use App\Models\Post_model;
use App\Models\Video_model;
use CodeIgniter\CLI\Console;

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
        $model2 = model(Comment_model::class);
        $data['posts'] = $model->get_posts($slug);
        //$data['id'] = $this->request->getVar('id');

        $comments = $model2->getComments();
        $data['user_id'] = session()->get('id');
        $data['comments'] = $comments;
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

        $model = new Post_model();
        echo view('templates/header', ['title' => 'Create Post']);
        echo view('posts/create');
        echo view('templates/footer');

        $rules = [];
        if ($this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body' => 'required',
            'description' => 'required',
        ])) {
            $file = $this->request->getFile('image');
            $video = $this->request->getFile('video');
            $file_type = $video->getClientMimeType();
            $valid_file_types = array("video/webm", "video/mp4", "video/ogg");

            if ($file->isValid() && !$file->hasMoved() && in_array($file_type, $valid_file_types)) {
                $imageName = $file->getRandomName();
                $file->move('uploads/', $imageName);
                $videoName = $video->getRandomName();
                $video->move('uploads', $videoName);
            }

            $model->save(
                [
                    'title' => $this->request->getPost('title'),
                    'user_id' => session()->get('id'),
                    'slug'  => url_title($this->request->getPost('title'), '-', true),
                    'description'  => $this->request->getPost('description'),
                    'body'  => $this->request->getPost('body'),
                    'image' => $imageName,
                    'video' => $videoName
                ]
            );

            return redirect()->to('/posts');
        }
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

        //where('user_id', session()->get('id'))->get_posts()
        $data['posts'] = $model->find($id);
        echo view('templates/header', ['title' => 'Edit Post']);
        echo view('posts/edit', $data);
        echo view('templates/footer');
    }

    public function update($id = null)
    {

        $model = new Post_model();
        $oldImageName = $this->request->getPost('image');
        $file = $this->request->getFile('image');

        if ($file->isValid() && !$file->hasMoved()) {
            if (file_exists("../uploads." . $oldImageName)) {
                unlink("../uploads." . $oldImageName);
            }
            $imageName = $file->getRandomName();
            $file->move('uploads/', $imageName);
        } else {
            $imageName = $oldImageName['image'];
        }

        $data =
            [
                'title' => $this->request->getPost('title'),
                'slug'  => url_title($this->request->getPost('title'), '-', true),
                'description'  => $this->request->getPost('description'),
                'body'  => $this->request->getPost('body'),
                'image' => $imageName
            ];


        $model->update($id, $data);
        return redirect()->to('/posts/' . url_title($this->request->getPost('title'), '-', true));
    }
   

    public function search()
    {
        $model = new Post_model();
        $searchquery = $this->request->getVar('text');
        
        $data = [
            'post' => $model->search($searchquery)
        ];
        $result = $this->display($data);
        echo $result;
    }
    public function display($posts)
    {
        echo view('posts/index', $posts);
    }
}
