<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CompteModel;

class Auth extends Controller
{
    public function login()
    {
        // Display Login Form
        return view('auth/login');
    }

    public function auth()
    {
        helper(['form']);
        $session = session();
        $model = new CompteModel(); // Correct model

        // Retrieve POST data
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Check if user exists
        $user = $model->where('email', $email)->first();

        if ($user) {
            // Verify the password
            if ($password ==$user['password']) {
                // Set session data
                $sessionData = [
                    'id'        => $user['id_compte'],
                    'email'     => $user['email'],
                    'logged_in' => true
                ];
                $session->set($sessionData);
                $session->setFlashdata('error', 'Account Found');

                // Redirect to dashboard
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('error', 'Invalid email or password.');
            }
        } else {
            $session->setFlashdata('error', 'User not found');
        }

        // Redirect back with errors
        return redirect()->to('/login');
    }
    public function dashboard()
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/login'); // Redirect to login if not authenticated
        }
    
        return view('/auth/dashboard'); // Load dashboard view
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
