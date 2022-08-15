<?php 
namespace App\Controllers;

use App\Models\User_model;

class UserController extends BaseController
{
    public function index()
    {
        $model = new User_model();
        $data['users'] = $model -> find(session()->get('id'));

        echo view('templates/header');
        echo view('user/profile', $data);
        echo view('templates/footer');
    }

    public function profile(){
        $model = new User_model();
        $data['users'] = $model -> find(session()->get('id'));

        echo view('templates/header', $data);
        echo view('user/profile', $data);
        echo view('templates/footer');
    }
}