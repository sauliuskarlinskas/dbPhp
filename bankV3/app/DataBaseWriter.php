<?php

namespace BankV3;

use App\DB\DataBase;
use PDO;


class DataBaseWriter implements DataBase
{
    private $tableName, $pdo;

    public function __construct($tableName)
    {
        $this->tableName = $tableName;

        $host = 'localhost';
        $db = 'zuikis';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $this->pdo = new PDO($dsn, $user, $pass, $options);
    }


    public function create(array $userData): void
    {
        $sql =
            "
        INSERT INTO {$this->tableName} 
        (
            `name`,
            `last_name`,
             `personal_id`,
             `account_number`,
             `balance` 
        ) 
        VALUES 
        (
            ?, ?, ?, ?, ?
        )
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $userData['name'],
            $userData['last_name'],
            $userData['personal_id'],
            $userData['account_number'],
            $userData['balance']
        ]);
    }

    public function update(int $userId, array $userData): void
    {
        $sql =
            "
        UPDATE {$this->tableName}
        SET 
            `balance` = ?
        WHERE `id` = ?
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $userData['balance'],
            $userId
        ]);
    }

    public function delete(int $userId): void
    {
        $sql =
            "
        DELETE FROM {$this->tableName}
        WHERE `id` = ?
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId]);
    }

    public function show(int $userId): array
    {
        $sql =
            "
        SELECT *
        FROM {$this->tableName}
        WHERE `id` = ?
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId]);

        return $stmt->fetch();
    }

    public function showAll(): array
    {

        $sql =
            "
        SELECT *
        FROM {$this->tableName}
        ";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll();
    }

    public function getUserByEmailAndPass(string $email, string $password): ?array
    {
        $sql =
            "
        SELECT *
        FROM {$this->tableName}
        WHERE `email` = ?
        AND `password` = ?
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email, md5($password)]);

        $user = $stmt->fetch();

        return $user ? $user : null;
    }
}