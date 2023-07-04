<?php
namespace BankV3\Controllers;
use BankV3\App;
use BankV3\Messages;
use BankV3\OldData;

class LoginController
{
    public function index()
    {
        $old = OldData::getFlashData();
        
        return App::view('auth\index', [
            'pageTitle' => 'Login',
            'inLogin' => true,
            'old' => $old,
        ]);
    }

    public function login(array $data)
    {
        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';
        

        $user = App::get('bank_users')->getUserByEmailAndPass($email, $password);

        
            if ($user) {
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $user['name'];
                Messages::addMessage('success', 'Sėkmingai prisijungėte');
                header('Location: /');
                die;
            }
        
        

        Messages::addMessage('danger', 'Netinkamas paštas arba slaptažodis');
        OldData::flashData($data);
        header('Location: /login');
        die;
    }

    public function logout()
    {
        unset($_SESSION['email']);
        unset($_SESSION['name']);
        Messages::addMessage('success', 'Sėkmingai atsijungėte');
        header('Location: /');
        exit;
    }
}