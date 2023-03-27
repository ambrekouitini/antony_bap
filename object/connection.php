<?php

require_once 'user.php';

class Connection
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=antony_bap;host=127.0.0.1', 'root', 'root');
        //$this->pdo = new PDO('mysql:dbname=antony_bap;host=127.0.0.1', 'root', '');
    }

    public function InsertUser(User $user): bool
    {
        $query = 'INSERT INTO user (name, email, password, role)
                    VALUES (:name, :email, :password, :role)';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'name' => $user->name,
            'email' => $user->email,
            'password' => md5($user->password . 'SALT'),
            'role' => $user->role,
        ]);
    }

    public function LoginVerify(User $user): bool
    {
        $query = 'SELECT * FROM user WHERE email = :email';
        $statement = $this->pdo->prepare($query);

        $statement->execute([
            'email' => $user->email
        ]);

        $data = $statement->fetch();

        $passVerified = false;

        if (isset($data[0]) && md5($user->password . 'SALT') === $data['password']) {
            $passVerified = true;
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['user_email'] = $data['email'];
            $_SESSION['user_name'] = $data['name'];
            $_SESSION['user_password'] = $data['password'];
            $_SESSION['role'] = $data['role'];
        }

        return $passVerified;
    }
}