<?php

namespace Backend\Controllers;

if (empty($key) || $key !== "pytzch") { header('Location: /login'); exit; }

class SessionController
{
    public static function checkAccess($pageAccess)
    {
        session_start(); 

        if ($pageAccess == "non-login") {
            
            if (isset($_SESSION['users'])) {
                header('Location: dashboard');
                exit();
            }
        } else if ($pageAccess == "users") {
            
            if (!isset($_SESSION['users'])) {
                header('Location: login');
                exit();
            }
        }
    }
}
