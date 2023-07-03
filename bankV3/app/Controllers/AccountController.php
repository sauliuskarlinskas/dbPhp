<?php

namespace BankV3\Controllers;

use BankV3\App;
//use BankV3\FileWriter;
use BankV3\Messages;
use BankV3\OldData;

class AccountController
{
    public function index()
    {
        $data = App::get('account');

        return App::view('account/index', [
            'pageTitle' => 'accounts',
            'accounts' => $data->showAll(),
        ]);
    }

    public function create()
    {
        return App::view('account/create', [
            'pageTitle' => 'create account',
        ]);
    }

    public function store(array $request)
    {
        extract($request);

        $error1 = 0;
        $error2 = 0;

        if (strlen($name) < 3 || strlen($lastName) < 3) {
            Messages::addMessage('danger', 'Vardas ir pavardė turi būti bent iš trijų simbolių.');
            $error1 = 1;
        }

        if (!ctype_digit($personalId) || strlen(trim($personalId)) !== 11) {
            Messages::addMessage('danger', 'Asmens kodą turi sudaryti vienuolika skaičių.');
            $error2 = 1;
        }

        if ($error1 || $error2) {
            OldData::flashData($request);
            header('Location: /account/create');
            die;
        }

        $data = App::get('account');
        $newAccount = [
            'id' => $id,
            'name' => $name,
            'lastName' => $lastName,
            'personalId' => $personalId,
            'accountNumber' => $accountNumber,
            'balance' => 0
        ];
        $data->create($newAccount);

        Messages::addMessage('success', 'Nauja sąskaita sėkmingai sukurta.');
        header('Location: /account');

    }

    public function edit(int $id)
    {
        $data = App::get('account');
        $account = $data->show($id);

        $id = $account['id'];
        $name = $account['name'];
        $lastName = $account['lastName'];
        $personalId = $account['personalId'];
        $accountNumber = $account['accountNumber'];
        $balance = $account['balance'];

        return App::view('account/edit', [
            'pageTitle' => 'edit balance',
            'id' => $id,
            'name' => $name,
            'lastName' => $lastName,
            'personalId' => $personalId,
            'accountNumber' => $accountNumber,
            'balance' => $balance
        ]);
    }

    public function update(int $id, array $request, int $delete = 0)
    {
        $data = App::get('account');

        $account = $data->show($id);

        $amount = $request['amount'];

        if (isset($request['add'])) {
            if ($amount <= 0) {
                Messages::addMessage('danger', 'Įvesta suma turi būti teigiamas sveikasis skaičius.');
                header('Location: /account/edit/' . $id);
                die;
            }

            $account['balance'] += $amount;

            $data->update($id, $account);
            Messages::addMessage('success', 'Į sąskaitą pridėta lėšų.');
            header('Location: /account/edit/' . $id);
        }

        if (isset($_POST['withdraw'])) {
            if ($amount <= 0) {
                Messages::addMessage('danger', 'Įvesta suma turi būti teigiamas sveikasis skaičius.');
                header('Location: /account/edit/' . $id);
                die;
            }

            if ($account['balance'] < $amount) {
                Messages::addMessage('danger', 'Nepakankamas sąskaitos likutis.');
                header('Location: /account/edit/' . $id);
                die;
            }

            $account['balance'] -= $amount;

            $data->update($id, $account);
            Messages::addMessage('success', 'Iš sąskaitos išimta lėšų.');

            if ($delete == 0) {
                header('Location: /account/edit/' . $id);
            }
        }

    }

    public function delete(int $id)
    {
        $account = (App::get('account'))->show($id);
        return App::view('account/delete', [
            'pageTitle' => 'delete account',
            'account' => $account,
        ]);
    }

    public function destroy(int $id)
    {
        $data = App::get('account');

        $account = $data->show($id);
        if ($account['balance'] == 0) {
            $data->delete($id);
            Messages::addMessage('success', 'Saskaita ištrinta');
            header('Location: /account');
        } else {
            Messages::addMessage('danger', 'Saskaitoje yra lėšų');

            header('Location: /account/delete/' . $id);
        }

    }

}