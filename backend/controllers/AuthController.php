<?php

namespace Backend\Controllers;

require_once __DIR__ . '/../models/User.php'; 
use Backend\Models\User;

if (empty($key) || $key !== "pytzch") { header('Location: ../login.php'); exit; }

class AuthController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db; 
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nim = $_POST['nim'];
            $password = $_POST['password'];
            $errorMessage = '';
            $successMessage = '';

            if (empty($nim) || empty($password)) {
                $_SESSION['error_message'] = json_encode([
                    'title' => 'Gagal!',
                    'text' => 'NIM dan password tidak boleh kosong',
                    'icon' => 'error'
                ]);
            } else {
                $userModel = new User($this->db);
                $user = $userModel->getUserByNim($nim);
            
                if ($user) {
                    $hashed_password = $user['user_password'];
                
                    if (password_verify($password, $hashed_password)) {
                        $_SESSION['users'] = $user['user_id'];
                        $_SESSION['success_message'] = json_encode([
                            'title' => 'Berhasil!',
                            'text' => 'Login Berhasil.',
                            'icon' => 'success',
                            'redirect' => 'dashboard'  
                        ]);
                    } else {
                        $_SESSION['error_message'] = json_encode([
                            'title' => 'Gagal!',
                            'text' => 'Username dan password salah.',
                            'icon' => 'error'
                        ]);
                    }
                } else {
                    $_SESSION['error_message'] = json_encode([
                        'title' => 'Gagal!',
                        'text' => 'Username dan password salah.',
                        'icon' => 'error'
                    ]);
                }
            }
        }
    }


}
