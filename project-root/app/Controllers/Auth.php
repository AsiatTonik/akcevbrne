<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        return view('login'); 
    }

    public function processLogin() 
    {
        $session = session();
        $userModel = new UserModel();
    
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
    
        $user = $userModel->where('username', $username)->first();
    
        if (!$user) {
            return redirect()->to('/login')->with('chyba', 'Uživatel neexistuje.');
        }
    
        if ($password !== $user['password']) {
            return redirect()->to('/login')->with('chyba', 'Špatné heslo.');
        }
    
        
        $session->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'role' => $user['role'],
            'isLoggedIn' => true
        ]);
    
        return redirect()->to('/'); 
    }
    

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
