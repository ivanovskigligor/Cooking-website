<?php 
namespace App\Controllers;  
use App\Models\User_model;
  
class RegisterController extends BaseController
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('templates/header', $data);
        echo view('user/register', $data);
        echo view('templates/footer', $data);
    }
  
    public function store()
    {
        helper(['form']);
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];
        
        if($this->validate($rules)){
            $userModel = new User_model();
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            return "ok";
        }else{
            $data['validation'] = $this->validator;
            return $data['validation']->listErrors();
        }
          
    }
  
}