<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'username' => 'required',
                'password' => 'required|min_length[6]'
            ];
            
            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
            
            $model = new UserModel();
            $user = $model->getUserByUsername($this->request->getPost('username'));
            
            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                $sessionData = [
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'nama' => $user['nama_lengkap'],
                    'role' => $user['role'],
                    'logged_in' => true
                ];
                
                session()->set($sessionData);
                
                return redirect()->to($user['role'] === 'admin' ? '/admin' : '/staff');
            } else {
                return redirect()->back()->withInput()->with('error', 'Username atau password salah');
            }
        }
        
        return view('auth/login');
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}