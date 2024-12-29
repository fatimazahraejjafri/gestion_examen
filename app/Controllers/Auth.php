<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CompteModel;
use App\Models\UserModel;
use App\Models\RoleModel;


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
            if (password_verify($password, $user['password'])) { 
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
    public function store()
    {
        helper(['form']);
        $session = session();
    
        $compteModel = new CompteModel();
        $userModel = new UserModel();
        $roleModel = new RoleModel();
    
        // Validation des champs
        $rules = [
            'email'    => 'required|valid_email|is_unique[compte.email]',
            'password' => 'required|min_length[6]',
        ];
    
        if ($this->validate($rules)) {
            // Récupérer les données du formulaire
            $email = $this->request->getPost('email');
            $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    
            // Déterminer le rôle en fonction de l'e-mail
            if (strpos($email, 'etudiant@') !== false) {
                $roleName = 'etudiant';
            } elseif (strpos($email, 'prof@') !== false) {
                $roleName = 'prof';
            } else {
                $roleName = 'autre';
            }
    
            // Vérifier si le rôle existe déjà dans la table `role`
            $existingRole = $roleModel->where('name', $roleName)->first();
            if (!$existingRole) {
                // Si le rôle n'existe pas, le créer
                $roleId = $roleModel->insert(['name' => $roleName]);
            } else {
                $roleId = $existingRole['id_role'];
            }
    
            // Créer un nouvel utilisateur dans la table `user` avec le rôle correspondant
            $userData = [
                'id_role' => $roleId,
            ];
            $userId = $userModel->insert($userData);
    
            // Créer un compte associé à l'utilisateur
            $compteData = [
                'email'    => $email,
                'password' => $password,
                'id_user'  => $userId,
            ];
            $compteModel->insert($compteData);
    
            // Rediriger avec succès
            $session->setFlashdata('success', 'Compte créé avec succès. Veuillez vous connecter.');
            return redirect()->to('login');
        } else {
            // Retourner au formulaire avec les erreurs
            $data['validation'] = $this->validator;
            return view('auth/inscrit', $data);
        }
    }
    public function signup()
    {
        // Display Login Form
        return view('auth/inscrit');
    }
    

}
