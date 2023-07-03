<?php
namespace BankV3\Controllers;
use BankV3\App;

class HomeController
{
    public function index()
    {
        return App::view('home/index', [
            'pageTitle' => 'Home - BankV3',
        ]);
    }


}