<?php

namespace App\Controllers;

use App\Models\User_model;

class LoginController extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('templates/header');
        echo view('user/signin');
        echo view('templates/footer');
    }

    public function loginAuth()
    {
        $rules = [
            'email'         => 'required',
            'password'      => 'required',
        ];
        if ($this->validate($rules)) {
            
            $session = session();
            $userModel = new User_model();
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $data = $userModel->where('email', $email)->first();

            if ($data) {
                $pass = $data['password'];
                $authenticatePassword = password_verify($password, $pass);
                if ($authenticatePassword) {
                    $ses_data = [
                        'id' => $data['id'],
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'isLoggedIn' => TRUE
                    ];
                    $session->set($ses_data);
                    return "ok";
                } else {
                    return "Password is incorrect";
                }
            } else {
                return "Email does not exist";
            }
        } else {
            $data['validation'] = $this->validator;
            return $data['validation']->listErrors();
        }
    }

    public function logout(){
            $ses_data = [
                'id' => '',
                'name' => '',
                'email' => '',
                'isLoggedIn' => FALSE,
            ];
            session()->set($ses_data);
            return redirect()->to('/');
        
    }
}
