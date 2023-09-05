<?php

namespace Blakroku\PHPDevBoilerplate;

require_once 'vendor/autoload.php';

class Auth
{
    public function login()
    {

        $credentials = [
            'email' => $_POST['username'],
            'password' => $_POST['password']
        ];

        App\Catalyst\Sentinel::login($credentials);

        $username = $_POST['username'];
        $password = $_POST['password'];

        return ['username' => $username, 'password' => $password];
    }

    public function logout()
    {
        return 'logout';
    }
}